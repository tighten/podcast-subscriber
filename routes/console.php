<?php

use App\Jobs\NotifySubscribersOfNewEpisode;
use Facades\App\Feed;

Artisan::command('check', function () {
    Feed::checkAndNotify();
})->describe('Check for a new episode, and notify if appropriate.');
