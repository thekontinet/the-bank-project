<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:auth-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user account';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = $this->ask('Name');
        $email = $this->ask('Email');

        while(User::whereEmail($email)->first()){
            $email = $this->ask('Email');
        }

        $isAdmin = $this->confirm('Is this an admin account ?');
        $password = $this->secret('Password');
        $pin = $this->secret('pin');
        $factory = User::factory();

        $factory->create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => $isAdmin,
            'pin' => $pin
        ]);

        $this->info('Account created');
    }
}
