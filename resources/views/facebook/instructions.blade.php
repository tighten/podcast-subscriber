@extends('layouts.app')

@section('body')
    <h1 class="text-center mb-6">
        <a href="/">
            <img src="/logo.svg" alt="Stauffers On Science" class="w-64">
        </a>
    </h1>
    <h2>Subscribe via Facebook:</h2>

    <p class="mt-2">Click <a href="https://www.facebook.com/messages/t/stauffersonscience">here</a> and send us the message <code>subscribe</code>. We'll notify you every time there's a new episode!</p>

    <p class="mt-4 mb-1">Here's an example of how to subscribe:</p>
    <a href="https://www.facebook.com/messages/t/stauffersonscience"><img src="/fb-subscribe-example.png" alt="How to subscribe via Facebook Messenger" class="max-w-sm"></a>

    <p class="mt-4 mb-1">... and here's what a notification might look like:</p>
    <img src="/fb-message-example.png" alt="Example notification" class="max-w-sm">
@endsection
