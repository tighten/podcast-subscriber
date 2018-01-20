<?php

namespace App\Console\Commands;

use App\Notifications\NewEpisodeReleased;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class NotifyAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifyall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify All';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $botman->startConversation(new PizzaConversation(), 'my-recipient-user-id', TelegramDriver::class);
        Notification::send(User::all(), new NewEpisodeReleased(new class {
    public function get_title()
    {
        return 'fake title';
    }

    public function get_permalink()
    {
        return 'http://www.fakepermalink.com/';
    }
}));
    }
}
