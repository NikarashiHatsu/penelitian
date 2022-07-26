<x-app-layout>
    <x-slot name="title">
        <div class="col">
            <div class="btn-list">
                <a href="{{ route('dashboard.gallery.index') }}" class="btn btn-secondary">
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
                Galeri
            </h2>
        </div>
    </x-slot>

    <x-tabler::form.alerts
        error-title="Terjadi kesalahan"
        success-title="Berhasil"
    />

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.gallery.store') }}" method="post" enctype="multipart/form-data" x-data="{ isDescription: false }">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3">
                        <x-tabler::form.input.select
                            x-on:change="isDescription = $el.val == 'Image' ? false : true"
                            name="type"
                            label="Tipe"
                            required
                        >
                            <option {{ old('type') == "Image" ? "selected" : "" }} value="Image">Foto</option>
                            <option {{ old('type') == "Description" ? "selected" : "" }} value="Description">Deskripsi</option>
                        </x-tabler::form.input.select>
                    </div>
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3" x-transition x-show="!isDescription">
                        <div class="mb-3">
                            <label class="form-label">
                                Lampiran
                            </label>
                            <input type="file" name="file" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3">
                        <x-tabler::form.input.text
                            type="file"
                            name="description"
                            label="Deskripsi"
                            placeholder="Masukkan isi..."
                            value="{{ old('description') }}"
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
</x-app-layout>
