<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="bg-brand-lightest font-sans font-normal">
    <div class="flex flex-col">
        <div class="min-h-screen flex items-center justify-center">
            <div class="flex flex-col justify-around h-full">
                <div>
                    <h1 class="text-grey-darker text-center font-hairline tracking-wide text-7xl mb-6">
                        <img src="/logo.svg" alt="Stauffers On Science">
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
                </div>
            </div>
        </div>
    </div>
</body>
</html>
