<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class SmsSubscriptionTest extends TestCase
{
    use RefreshDatabase;

    function setUp()
    {
        parent::setUp();

        Notification::fake();
    }

    /** @test */
    function successful_subscription_creates_user()
    {
        $response = $this->post('/sms/subscribe', [
            'subscribe-sms-phone-number' => '+13136875309'
        ]);

        $response->assertRedirect('/sms/subscribed');

        $this->assertDatabaseHas('users', ['phone_number' => '+13136875309']);
    }

    /** @test */
    function unsuccessful_subscription_does_not_create_user()
    {
        $response = $this->post('/sms/subscribe', [
            'subscribe-sms-phone-number' => 'i am a bad number'
        ]);

        $this->assertEquals(0, User::count());
    }

    /** @test */
    function null_phone_numbers_fail()
    {
        $this->get('/sms/subscribe'); // for 'back'

        $response = $this->post('/sms/subscribe', [
            'subscribe-sms-phone-number' => null
        ]);

        $response->assertSessionHasErrors();

        $response->assertRedirect('/sms/subscribe');
    }

    /** @test */
    function invalid_phone_numbers_fail()
    {
        $this->get('/sms/subscribe'); // for 'back'

        $response = $this->post('/sms/subscribe', [
            'subscribe-sms-phone-number' => 'abcdefghijklmnop'
        ]);

        $response->assertSessionHasErrors();

        $response->assertRedirect('/sms/subscribe');
    }

    /** @test */
    function international_phone_numbers_fail()
    {
        $this->get('/sms/subscribe'); // for 'back'

        $response = $this->post('/sms/subscribe', [
            'subscribe-sms-phone-number' => '012 34 56 78'
        ]);

        $response->assertSessionHasErrors();

        $response->assertRedirect('/sms/subscribe');
    }

    /** @test */
    function resubscribing_doesnt_duplicate()
    {
        $this->post('/sms/subscribe', [
            'subscribe-sms-phone-number' => '+13138675309'
        ]);
        $this->post('/sms/subscribe', [
            'subscribe-sms-phone-number' => '+13138675309'
        ]);

        $this->assertEquals(1, User::count());
    }

    /** @test */
    function numbers_are_reformatted_consistently()
    {
        $this->post('/sms/subscribe', [
            'subscribe-sms-phone-number' => '+13138675309'
        ]);
        $this->post('/sms/subscribe', [
            'subscribe-sms-phone-number' => '3138675308'
        ]);
        $this->post('/sms/subscribe', [
            'subscribe-sms-phone-number' => '313-867-5307'
        ]);
        $this->post('/sms/subscribe', [
            'subscribe-sms-phone-number' => '313 867-5306'
        ]);
        $this->post('/sms/subscribe', [
            'subscribe-sms-phone-number' => '(313) 867-5305'
        ]);

        $this->assertEquals(
            User::all()->pluck('phone_number')->toArray(),
            [
                '+13138675309',
                '+13138675308',
                '+13138675307',
                '+13138675306',
                '+13138675305',
            ]
        );
    }
}
