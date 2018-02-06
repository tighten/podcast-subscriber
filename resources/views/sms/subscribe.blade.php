@extends('layouts.app')

@section('body')
    <h1 class="text-center mb-6">
        <a href="/">
            <img src="/logo.svg" alt="{{ config('app.name') }}" class="w-64">
        </a>
    </h1>
    @include('components.errors')
    <h2>Subscribe via SMS:</h2>
    <form action="/sms/subscribe" method="post">
        {{ csrf_field() }}
        <input type="text" name="subscribe-sms-phone-number" class="my-2 text-lg border-teal shadow appearance-none border rounded py-2 px-3 text-grey-darker" placeholder="313-867-5309" value="{{ old('subscribe-sms-phone-number') }}">
        <input type="submit" class="my-2 text-lg border-teal bg-teal text-white shadow appearance-none border rounded py-2 px-4 text-grey-darker" value="Subscribe">
    </form>

    <p class="mt-4 mb-1">Here's what a notification might look like:</p>
    <img src="/sms-message-example.png" alt="Example notification" class="max-w-sm">
@endsection
