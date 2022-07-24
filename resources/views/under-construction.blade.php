<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }} - Under Construction</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <div class="flex flex-col items-center justify-center w-full h-screen px-6">
        <h1 class="text-3xl md:text-5xl font-bold uppercase tracking-widest text-center">
            Under Construction
        </h1>
        <img src="{{ asset('images/under-construction.jpg') }}" class="w-3/4 md:w-4/12 lg:w-2/12 my-4" />
        <p class="italic font-serif max-w-md text-center leading-relaxed">
            Website kami sedang dalam masa pengembangan, mohon kunjungi secara berkala.
        </p>

        <p class="font-serif mt-12 text-sm text-gray-500">
            Gambar dari <a href="https://www.freepik.com/free-vector/construction-set-icons_6589393.htm" class="underline_">Freepik</a>
        </p>
    </div>
</body>
</html>