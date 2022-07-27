<x-app-layout>
    <x-slot name="title">
        <div class="col">
            <div class="btn-list">
                <a href="{{ route('dashboard.peneliti.index') }}" class="btn btn-secondary">
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
                Peneliti
            </h2>
        </div>
    </x-slot>

    <x-tabler::form.alerts
        error-title="Terjadi kesalahan"
        success-title="Berhasil"
    />

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.peneliti.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="mb-3">
                            <label for="file" class="form-label">
                                Foto
                                <sup class="text-danger">
                                    *
                                </sup>
                            </label>
                            <input type="file" name="file" id="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3">
                        <x-tabler::form.input.text
                            name="name"
                            label="Nama Peneliti"
                            placeholder="Masukkan nama peneliti..."
                            value="{{ old('name') }}"
                            required
                        />
                    </div>
                    <div class="col-sm-12">
                        <x-tabler::form.input.textarea
                            name="detail"
                            label="Isi"
                            placeholder="Detail peneliti..."
                        >{{ old('detail') }}</x-tabler::form.input.textarea>
                    </div>
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3">
                        <x-tabler::form.input.text
                            name="facebook"
                            label="Facebook"
                            placeholder="URL Facebook..."
                            value="{{ old('facebook') }}"
                        />
                    </div>
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3">
                        <x-tabler::form.input.text
                            name="twitter"
                            label="Twitter"
                            placeholder="URL Twitter..."
                            value="{{ old('twitter') }}"
                        />
                    </div>
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3">
                        <x-tabler::form.input.text
                            name="instagram"
                            label="Instagram"
                            placeholder="URL Instagram..."
                            value="{{ old('instagram') }}"
                        />
                    </div>
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3">
                        <x-tabler::form.input.text
                            name="linkedIn"
                            label="LinkedIn"
                            placeholder="URL LinkedIn..."
                            value="{{ old('linkedIn') }}"
                        />
                    </div>
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3">
                        <x-tabler::form.input.text
                            name="twitter"
                            label="Twitter"
                            placeholder="URL Twitter..."
                            value="{{ old('twitter') }}"
                        />
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
            ["detail"].forEach(function(field) {
                watchdog
                    .create(document.querySelector(`textarea[name='${field}']`), {
                        licenseKey: '',
                    })
                    .catch(handleError);
            });
        </script>
    </x-slot>
</x-app-layout>
