<?php

namespace App;

use App\Jobs\NotifySubscribersOfNewEpisode;
use willvincent\Feeds\Facades\FeedsFacade as Feeds;

class Feed
{
    protected static $feedUrl = 'https://rss.simplecast.com/podcasts/4062/rss';

    public static function checkAndNotify()
    {
        $feed = Feeds::make(self::$feedUrl);

        foreach ($feed->get_items() as $episode) {
            if (Episode::where('permalink', $episode->get_permalink())->count() === 0) {
                dispatch(new NotifySubscribersOfNewEpisode($episode));

                Episode::create(['permalink' => $episode->get_permalink()]);
            }
        }
    }
}
