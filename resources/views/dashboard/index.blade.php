<x-app-layout>
    <x-slot name="title">
        <div class="col">
            <div class="page-pretitle">
                Overview
            </div>
            <h2 class="page-title">
                Dashboard
            </h2>
        </div>
    </x-slot>

    <div class="card">
        <div class="card-body">
            Selamat datang, {{ auth()->user()->name }}
        </div>
    </div>
</x-app-layout>
