<x-tabler::layouts.vertical-transparent>
    <x-slot name="scripts">
        @vite(['resources/js/app.js'])
    </x-slot>

    <x-slot name="logo">
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('dashboard.index') }}">
                <img src="{{ asset('icon.png') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>
    </x-slot>

    <x-slot name="title">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                {{ $title ?? "" }}
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

        <x-tabler::layouts.menu-dropdown title="Data Master" :active="request()->routeIs('master.*')"
            icon='<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                <path d="M4 6v6a8 3 0 0 0 16 0v-6"></path>
                <path d="M4 12v6a8 3 0 0 0 16 0v-6"></path>
            </svg>'>
            <x-tabler::layouts.menu-dropdown-item :route="'javascript:void(0)'" :active="false" title="Landing Page" />
            <x-tabler::layouts.menu-dropdown-item :route="'javascript:void(0)'" :active="false" title="Section" />
            <x-tabler::layouts.menu-dropdown-item :route="'javascript:void(0)'" :active="false" title="Kontak" />
            <x-tabler::layouts.menu-dropdown-item :route="'javascript:void(0)'" :active="false" title="Sosial Media"/>
        </x-tabler::layouts.menu-dropdown>

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
</x-tabler::layouts.vertical-transparent>
