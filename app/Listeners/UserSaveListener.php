<?php

namespace App\Listeners;

use App\Events\UserSaveEvent;
use App\Jobs\UserJob;
use App\Models\User;
use App\Objects\Files;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserSaveListener
{
    public function handle(UserSaveEvent $event): void
    {
        UserJob::dispatchSync($event->user);
    }
}
