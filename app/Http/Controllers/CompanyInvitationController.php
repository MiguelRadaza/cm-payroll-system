<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Notifications\RegistrationInvitation;
use Illuminate\Support\Facades\Notification;
use App\Models\RegistrationKey;
use Illuminate\Support\Str;
use App\Rules\UniqueEmail;
use Illuminate\Support\Carbon;

class CompanyInvitationController extends Controller
{
    public function createPage()
    {
        $keys = RegistrationKey::where('is_deleted', 0)->get();
        if (!empty($keys)) {
            foreach ($keys as $key => &$value) {
                $expirationDate = Carbon::parse($value->expiration);
                $now = Carbon::now();
                $expirationDuration = $now->diff($expirationDate);
                $value->countdown = $expirationDuration->format('%h hours, %i minutes');
            }
        }
        return view('pages.admin.company-registration', compact('keys'));
    }

    public function createInvitation(Request $request)
    {
        $user = $this->checkUserSession();
        
        $checkEmail = User::where('email', $request->email)->first();
        if ($checkEmail) {
            return redirect()->back()->with(['message' => 'The Email is already exists in users table.']);
        }
        if (!$user->hasRole('super admin')) {
            Auth::logout();
            return redirect()->route('home'); 
        }

        if (empty($request->email)) {
            return redirect()->back()->with(['message' => 'Please provide required parameter.']);
        }

        $hashKey = Str::random(40); 
        $expiration = Carbon::now()->addDay();
        RegistrationKey::create([
            'hash_key' => $hashKey,
            'expiration' => $expiration,
            'email' => $request->email,
            'role' => 'ceo'
        ]);

        Notification::route('mail', $request->email)
            ->notify(new InvitationToCMSystem($hashKey, $request->email, $expiration, route('register')));

        return redirect()->back()->with(['success' => 'Company Invitation Created Successfully.']);
    }

    public function deleteInvitation(Request $request)
    {
        $key = RegistrationKey::where('id', $id)->first();
        if (!$key) {
            return redirect()->back()->with(['message' => 'Cannot find invitation by id: ' . $id . ' Please try again.']);
        }
        $key->is_deleted = 1;
        $key->save();
        return redirect()->back()->with(['success' => 'Successfully deleted.']);
    }
}
