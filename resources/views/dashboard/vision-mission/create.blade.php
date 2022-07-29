<x-app-layout>
    <x-slot name="title">
        <div class="col">
            <div class="btn-list">
                <a href="{{ route('dashboard.vision-mission.index') }}" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <line x1="5" y1="12" x2="11" y2="18"></line>
                        <line x1="5" y1="12" x2="11" y2="6"></line>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <div class="page-pretitle d-flex justify-content-end">
                Tambah Data Baru
            </div>
            <h2 class="page-title">
                Visi, Misi, Tujuan
            </h2>
        </div>
    </x-slot>

    <x-tabler::form.alerts
        error-title="Terjadi kesalahan"
        success-title="Berhasil"
    />

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.vision-mission.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3">
                        <x-tabler::form.input.select
                            name="type"
                            label="Tipe"
                            required
                        >
                            <option {{ old('type') == "Vision" ? "selected" : "" }} value="Vision">2016-2020</option>
                            <option {{ old('type') == "Mission" ? "selected" : "" }} value="Mission">2021-2025</option>
                            <option {{ old('type') == "Target" ? "selected" : "" }} value="Target">2026-2030</option>
                        </x-tabler::form.input.select>
                    </div>
                    <div class="col-sm-12">
                        <x-tabler::form.input.textarea
                            name="description"
                            label="Deskripsi"
                            placeholder="Masukkan isi..."
                        >{{ old('description') }}</x-tabler::form.input.textarea>
                    </div>
                    <div class="col-sm-12 d-flex justify-content-end">
                        <button class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            ["description"].forEach(function(field) {
                watchdog
                    .create(document.querySelector(`textarea[name='${field}']`), {
                        licenseKey: '',
                    })
                    .catch(handleError);
            });
        </script>
    </x-slot>
</x-app-layout>
