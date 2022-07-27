<html class="u-responsive-xl">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('nicepage/css/app.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('nicepage/css/section.css') }}">
    <script class="u-script" type="text/javascript" src="{{ asset('nicepage/js/jquery-1.9.1.min.js') }}" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ asset('nicepage/js/nicepage.js') }}" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i&display=swap">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="u-body u-xl-mode" style="font-size: 16px;">
    @include('hero', [
        'hero_title' => $hero_title,
        'hero_description' => $hero_description,
        'hero_image' => $hero_image,
        'hero_logos' => $hero_logos,
    ])

    @include('skema-penelitian', [
        'skema_penelitians' => $skema_penelitians,
    ])

    @include('fokus', [
        'fokus_penelitians' => $fokus_penelitians,
    ])

    @include('visi-misi-tujuan', [
        'visi' => $vision,
        'misi' => $mission,
        'tujuan' => $target,
    ])

    @include('peneliti')

    @include('berita', ['beritas' => $beritas])

    @include('galeri', [
        'gallery_description' => $gallery_description,
        'galleries' => $galleries,
    ])

    @include('counter')

    @include('kontak', [
        'phones' => $phones,
        'addresses' => $addresses,
    ])

    @include('footer', [
        'footer_content' => $footer_content,
        'footer_logo' => $footer_logo,
        'footer_small_logos' => $footer_small_logos,
        'facebook' => $facebook,
        'twitter' => $twitter,
        'instagram' => $instagram,
        'linkedIn' => $linkedIn,
    ])
</body>
</html>
