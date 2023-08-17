<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\RegistrationKey;
use App\Models\Employee;
use App\Rules\ValidInvitationKey;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $user = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'key' => ['required', 'string', new ValidInvitationKey()],
        ]);

        $company = Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:companies'],
        ]);

        return $user;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $registrationKeyDetails = RegistrationKey::where('hash_key', $data['key'])->where('is_deleted', 0)->first();
        $role = Role::where('name', $registrationKeyDetails->role)->first();
        $user->assignRole($role);

        if ($registrationKeyDetails->role == "ceo") {
            $company = Company::create([
                'name' => $data['company_name'],
                'state' => Company::STATE_ACTIVE,
                'user_id' => $user->id
            ]);
        } else {
            $employeeDetails = Employee::where('registration_key_id', $registrationKeyDetails->id)->first();
            $employeeDetails->user_id = $user->id;
            $employeeDetails->save();
        }

        $registrationKeyDetails->is_deleted = 1;
        $registrationKeyDetails->save();
    
        return $user;
    }
}
