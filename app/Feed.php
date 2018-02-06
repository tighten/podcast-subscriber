<?php

namespace App;

use App\Jobs\NotifySubscribersOfNewEpisode;
use willvincent\Feeds\FeedsFactory;

class Feed
{
    protected $feedUrl;
    protected $feeds;

    public function __construct(FeedsFactory $feeds)
    {
        $this->feedUrl = config('subscriber.rss_url');
        $this->feeds = $feeds;
    }

    public function getItems()
    {
        return $this->feeds->make($this->feedUrl)->get_items();
    }

    public function checkAndNotify()
    {
        foreach ($this->getItems() as $episode) {
            if (Episode::where('permalink', $episode->get_permalink())->count() === 0) {
                // Create the episode first so we don't double notify, even if there are failures
                Episode::create(['permalink' => $episode->get_permalink()]);

                dispatch(new NotifySubscribersOfNewEpisode($episode));
            }
        }
    }
}
