<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta6
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ config('app.name', 'Laravel') }} - Sign In</title>
    <link href="{{ asset('vendor/tabler/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/tabler/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/tabler/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/tabler/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    @vite(['resources/js/app.js'])
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            {{ $slot }}
        </div>
    </div>

    <script src="{{ asset('vendor/tabler/js/tabler.min.js') }}"></script>
</body>
</html>
