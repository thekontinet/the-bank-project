<?php

namespace App\Listeners;

use App\Models\Account;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateNewAccountForUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        try{
            $user = User::findOrFail($event->user->id);
            Account::make($user, Account::TYPE_SAVINGS);
        }
        catch(\Exception $e){
            $user->delete();
            throw $e;
        }
    }
}
