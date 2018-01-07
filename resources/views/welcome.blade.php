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
                        <img src="logo-pad.png" alt="Stauffers On Science">
                    </h1>
                    <h2>Subscribe:</h2>
                    <ul class="list-reset">
                        <li class="inline pr-8">
                            <a href="#">Facebook Messenger</a>
                        </li>
                        <li class="inline pr-8">
                            <a href="#">SMS (text message)</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
