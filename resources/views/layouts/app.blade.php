<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('icon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('tabler/css/tabler.min.css') }}">
    @vite(['resources/js/app.js'])
</head>
<body>
    {{ $slot }}
    <script src="{{ asset('tabler/js/tabler.min.js') }}"></script>
</body>
</html>