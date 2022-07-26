<x-tabler::layouts.vertical-transparent>
    <x-slot name="head">
        <link rel="shortcut icon" href="{{ asset('icon.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
        @vite(['resources/js/app.js'])
    </x-slot>

    <x-slot name="logo">
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('dashboard.index') }}">
                <img src="{{ asset('icon.png') }}" width="110" height="32" alt="Tabler"
                    class="navbar-brand-image">
            </a>
        </h1>
    </x-slot>

    <x-slot name="title">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                {{ $title ?? '' }}
            </div>
        </div>
    </x-slot>

    <x-slot name="menus">
        <x-tabler::layouts.menu title="Dashboard" :route="route('dashboard.index')" :active="request()->routeIs('dashboard.index')"
            icon='<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
            </svg>' />

        <x-tabler::layouts.menu title="Hero" :route="route('dashboard.hero.index')" :active="request()->routeIs('dashboard.hero.*')"
            icon='<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-section" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M20 20h.01"></path>
                <path d="M4 20h.01"></path>
                <path d="M8 20h.01"></path>
                <path d="M12 20h.01"></path>
                <path d="M16 20h.01"></path>
                <path d="M20 4h.01"></path>
                <path d="M4 4h.01"></path>
                <path d="M8 4h.01"></path>
                <path d="M12 4h.01"></path>
                <path d="M16 4l0 0"></path>
                <rect x="4" y="8" width="16" height="8" rx="1"></rect>
            </svg>' />

        <x-tabler::layouts.menu title="Skema Penelitian" :route="route('dashboard.skema-penelitian.index')" :active="request()->routeIs('dashboard.skema-penelitian.*')"
            icon='<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-route" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="6" cy="19" r="2"></circle>
                <circle cx="18" cy="5" r="2"></circle>
                <path d="M12 19h4.5a3.5 3.5 0 0 0 0 -7h-8a3.5 3.5 0 0 1 0 -7h3.5"></path>
            </svg>' />

        <x-tabler::layouts.menu title="CMS" :route="route('dashboard.cms.index')" :active="request()->routeIs('dashboard.cms.*')"
            icon='<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-text" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                <path d="M9 12h6"></path>
                <path d="M9 16h6"></path>
            </svg>' />

        <x-tabler::layouts.menu title="Kontak" :route="route('dashboard.contact.index')" :active="request()->routeIs('dashboard.contact.*')"
            icon='<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
            </svg>' />

        <x-tabler::layouts.menu title="Visi dan Misi" :route="route('dashboard.vision-mission.index')" :active="request()->routeIs('dashboard.vision-mission.*')"
            icon='<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-target" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="12" cy="12" r="1"></circle>
                <circle cx="12" cy="12" r="5"></circle>
                <circle cx="12" cy="12" r="9"></circle>
            </svg>' />

        <x-tabler::layouts.menu title="Galeri" :route="route('dashboard.gallery.index')" :active="request()->routeIs('dashboard.gallery.*')"
            icon='<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google-photos" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M7.5 7c2.485 0 4.5 1.974 4.5 4.409v.591h-8.397a0.61 .61 0 0 1 -.426 -.173a0.585 .585 0 0 1 -.177 -.418c0 -2.435 2.015 -4.409 4.5 -4.409z"></path>
                <path d="M16.5 17c-2.485 0 -4.5 -1.974 -4.5 -4.409v-.591h8.397c.333 0 .603 .265 .603 .591c0 2.435 -2.015 4.409 -4.5 4.409z"></path>
                <path d="M7 16.5c0 -2.485 1.972 -4.5 4.405 -4.5h.595v8.392a0.61 .61 0 0 1 -.173 .431a0.584 .584 0 0 1 -.422 .177c-2.433 0 -4.405 -2.015 -4.405 -4.5z"></path>
                <path d="M17 7.5c0 2.485 -1.972 4.5 -4.405 4.5h-.595v-8.397a0.61 .61 0 0 1 .175 -.428a0.584 .584 0 0 1 .42 -.175c2.433 0 4.405 2.015 4.405 4.5z"></path>
            </svg>' />

        <x-tabler::layouts.menu title="Footer" :route="route('dashboard.footer.index')" :active="request()->routeIs('dashboard.footer.*')"
            icon='<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-section" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M20 20h.01"></path>
                <path d="M4 20h.01"></path>
                <path d="M8 20h.01"></path>
                <path d="M12 20h.01"></path>
                <path d="M16 20h.01"></path>
                <path d="M20 4h.01"></path>
                <path d="M4 4h.01"></path>
                <path d="M8 4h.01"></path>
                <path d="M12 4h.01"></path>
                <path d="M16 4l0 0"></path>
                <rect x="4" y="8" width="16" height="8" rx="1"></rect>
            </svg>' />

        <li class="nav-item" x-data>
            <form action="{{ route('logout') }}" method="post" x-ref="formLogout">
                @csrf
            </form>
            <a class="nav-link" href="javascript:void(0)" x-on:click="$refs.formLogout.submit()">
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="20"
                        height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                        </path>
                        <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                    </svg>
                </span>
                <span class="nav-link-title">
                    Keluar
                </span>
            </a>
        </li>
    </x-slot>

    {{ $slot }}

    <x-slot name="scripts">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/datatables.min.js') }}"></script>
        <script src="{{ asset('js/ckeditor.js') }}"></script>
        <script>
            const watchdog = new CKSource.EditorWatchdog();

            window.watchdog = watchdog;

            watchdog.setCreator((element, config) => {
                return CKSource.Editor
                    .create(element, config)
                    .then(editor => {
                        return editor;
                    })
            });

            watchdog.setDestructor(editor => {
                return editor.destroy();
            });

            watchdog.on('error', handleError);

            function handleError(error) {
                console.error('Oops, something went wrong!');
                console.error(
                    'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                );
                console.warn('Build id: rfjdnu3tpy1i-kaexhdnv3vae');
                console.error(error);
            }
        </script>

        {{ $scripts ?? '' }}
    </x-slot>
</x-tabler::layouts.vertical-transparent>
