<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }} - Galeri</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <div class="antialiased font-sans">
        <div class="bg-gradient-to-r from-indigo-600 to-fuchsia-600 w-full h-[500px]">
            <div class="max-w-4xl mx-auto p-6">
                <div class="flex mt-6 -ml-0 md:-ml-6">
                    <a href="{{ route('index') }}" class="transition duration-300 ease-in-out flex items-center rounded-md text-white gap-4 hover:bg-black/20 px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <line x1="5" y1="12" x2="11" y2="18"></line>
                            <line x1="5" y1="12" x2="11" y2="6"></line>
                        </svg>
                        <span>
                            Kembali
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto p-6 -mt-96">
            <div class="grid grid-cols-12 grid-flow-row gap-8">
                @foreach ($galleries as $index => $gallery)
                    <a href="{{ $gallery->file }}" target="_blank" class="u-effect-fade u-gallery-item col-span-12 sm:col-span-6 md:col-span-4 bg-white rounded" data-pswp-item-id="{{ $index }}" data-gallery-uid="1">
                        <img class="u-back-image u-expanded w-full h-full rounded object-cover" src="{{ $gallery->file }}">
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>