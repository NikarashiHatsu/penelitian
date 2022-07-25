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
</head>

<body class="u-body u-xl-mode" style="font-size: 16px;">
    @include('hero')

    @include('program')

    @include('fokus')

    @include('visi-misi-tujuan', [
        'visi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin justo risus, luctus ut faucibus at, iaculis ut neque. Nulla ut.',
        'misi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris luctus, nulla sed sagittis porta, justo quam elementum orci, eu efficitur.',
        'tujuan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum lorem sed vulputate tincidunt. Donec ullamcorper sapien ex, vel faucibus.',
    ])

    @include('peneliti')

    @include('berita', ['beritas' => $beritas])

    @include('galeri')

    @include('counter')

    @include('kontak')

    @include('footer', [
        'facebook' => $facebook,
        'twitter' => $twitter,
        'instagram' => $instagram,
        'linkedIn' => $linkedIn,
    ])
</body>
</html>
