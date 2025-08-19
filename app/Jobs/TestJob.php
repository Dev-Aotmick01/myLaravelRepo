<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TestJob implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function handle(): void
    {
        User::create([
            'name' => 'Ariyan',
            'email' => 'ar@gmail.com',
            'password' => bcrypt('password'),
            ]);
    }
}
