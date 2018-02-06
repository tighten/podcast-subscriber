@extends('layouts.app')

@section('body')
    <h1 class="text-center mb-6">
        <a href="/">
            <img src="/logo.svg" alt="{{ config('app.name') }}" class="w-64">
        </a>
    </h1>

    <h2 class="mb-2">You're subscribed via SMS!</h2>
    <p>Get ready for something great.</p>
    <br>
    <p>In the meantime, <a href="{{ config('subscriber.podcast_url') }}">check out old episodes</a>.</p>
@endsection
