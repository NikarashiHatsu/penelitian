<x-app-layout>
    <x-slot name="title">
        <div class="col">
            <div class="page-pretitle">
                Index
            </div>
            <h2 class="page-title">
                Peneliti
            </h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <a href="{{ route('dashboard.peneliti.create') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Tambah Data Baru
                </a>
            </div>
        </div>
    </x-slot>

    <x-tabler::form.alerts
        error-title="Terjadi kesalahan"
        success-title="Berhasil"
    />

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        {{ $dataTable->scripts() }}
    </x-slot>
</x-app-layout>
