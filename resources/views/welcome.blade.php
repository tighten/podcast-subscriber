@extends('layouts.app')

@section('body')
    <h1 class="mb-6">
        <img src="/logo.svg" alt="Stauffers On Science" class="max-w-sm m-auto block">
    </h1>
    <h2>Subscribe to new episodes:</h2>
    <ul class="list-reset my-4">
        <li class="inline">
            <a class="mt-6 sm:mt-0 mx-auto sm:mx-2 max-w-xs rounded-full text-center leading-none font-semibold inline-block px-8 py-3 border-2 border-teal bg-teal text-white hover:border-teal-light hover:bg-teal-light no-underline" href="/facebook/subscribe">Facebook Messenger</a>
        </li>
        <li class="inline">
            <a class="mt-6 sm:mt-0 mx-auto sm:mx-2 max-w-xs rounded-full text-center leading-none font-semibold inline-block px-8 py-3 border-2 border-teal bg-teal text-white hover:border-teal-light hover:bg-teal-light no-underline" href="/sms/subscribe">SMS (Text Message)</a>
        </li>
    </ul>
@endsection
