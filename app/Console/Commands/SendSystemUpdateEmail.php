<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Notifications\SoftwareUpdate; 

class SendSystemUpdateEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-system-update-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a software update details email to company owners.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $ceos = User::with('company')->get();
        foreach ($ceos as $user) {
            if (!empty($user->company)) {
                $user->notify(new PayoutInvoice($user->name));
            }
        }
    }
}
