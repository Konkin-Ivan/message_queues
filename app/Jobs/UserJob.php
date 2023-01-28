<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;

class UserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    public array $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = new User();
        $this->user['password'] = Hash::make($this->user['password']);
        $user->fill($this->user);
        $user->save();
        return $user;
    }
}
