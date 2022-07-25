<x-app-layout>
    <x-slot name="title">
        <div class="col">
            <div class="btn-list">
                <a href="{{ route('dashboard.cms.index') }}" class="btn btn-secondary">
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
                Edit Data
            </div>
            <h2 class="page-title">
                Content Management System
            </h2>
        </div>
    </x-slot>

    <x-tabler::form.alerts
        error-title="Terjadi kesalahan"
        success-title="Berhasil"
    />

    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('dashboard.cms.update', $cms) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3">
                        <x-tabler::form.input.select
                            name="feature"
                            label="Menu / Fitur"
                            required
                        >
                            <option {{ $cms->feature == "Berita" ? "selected" : "" }} value="Berita">Berita</option>
                            <option {{ $cms->feature == "Lampiran" ? "selected" : "" }} value="Lampiran">Lampiran</option>
                        </x-tabler::form.input.select>
                    </div>
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3">
                        <x-tabler::form.input.text
                            name="writer"
                            label="Penulis"
                            placeholder="Masukkan nama penulis..."
                            value="{{ $cms->writer }}"
                            required
                        />
                    </div>
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3">
                        <x-tabler::form.input.text
                            name="title"
                            label="Judul"
                            placeholder="Masukkan judul..."
                            value="{{ $cms->title }}"
                            required
                        />
                    </div>
                    <div class="col-sm-12">
                        <x-tabler::form.input.textarea
                            name="description"
                            label="Deskripsi"
                            placeholder="Masukkan isi..."
                        >{{ $cms->description }}</x-tabler::form.input.textarea>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <label class="form-label">
                            Tambah Lampiran
                        </label>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Lampiran</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody x-data="{ attachmentCount: 1 }">
                                    <template x-for="(i, index) in attachmentCount" key="i">
                                        <tr>
                                            <td x-html="i"></td>
                                            <td>
                                                <input type="file" name="file[]" />
                                            </td>
                                            <td>
                                                <div class="d flex align-items-center justify-content-between" x-show="attachmentCount === i">
                                                    <div class="d-flex align-items-center">
                                                        <button class="btn btn-danger btn-sm" x-on:click="attachmentCount--" type="button" x-show="i != 1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <line x1="4" y1="7" x2="20" y2="7"></line>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                            </svg>
                                                            <span>
                                                                Hapus
                                                            </span>
                                                        </button>
                                                        <button class="btn btn-success btn-sm" x-on:click="attachmentCount++" type="button" x-show="i > 0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                            </svg>
                                                            <span>
                                                                Tambah
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
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

    <div class="card">
        <div class="card-body">
            <div class="col-sm-12 mb-3">
                <label class="form-label">
                    Lampiran yang sudah ada
                </label>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Lampiran</th>
                                <th>Link Lampiran</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cms->attachments as $attachment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $attachment->filename }}</td>
                                    <td>
                                        <a href="{{ url($attachment->file) }}" download>
                                            Download
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('dashboard.cms.attachment.destroy', [$cms, $attachment]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus lampiran ini?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <line x1="4" y1="7" x2="20" y2="7"></line>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg>
                                                <span>
                                                    Hapus
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
