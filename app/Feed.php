<?php

namespace App;

use App\Jobs\NotifySubscribersOfNewEpisode;
use willvincent\Feeds\FeedsFactory;

class Feed
{
    protected $feedUrl = 'https://rss.simplecast.com/podcasts/4062/rss';
    protected $feeds;

    public function __construct(FeedsFactory $feeds)
    {
        $this->feeds = $feeds;
    }

    protected function getItems()
    {
        return $this->feeds->make(self::$feedUrl)->get_items();
    }

    public function checkAndNotify()
    {
        foreach ($this->getItems() as $episode) {
            if (Episode::where('permalink', $episode->get_permalink())->count() === 0) {
                dispatch(new NotifySubscribersOfNewEpisode($episode));

                Episode::create(['permalink' => $episode->get_permalink()]);
            }
        }
    }
}
