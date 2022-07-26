<x-app-layout>
    <x-slot name="title">
        <div class="col">
            <div class="btn-list">
                <a href="{{ route('dashboard.footer.index') }}" class="btn btn-secondary">
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
                Footer
            </h2>
        </div>
    </x-slot>

    <x-tabler::form.alerts
        error-title="Terjadi kesalahan"
        success-title="Berhasil"
    />

    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('dashboard.footer.update', $footer) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3">
                        <x-tabler::form.input.select
                            name="type"
                            label="Tipe"
                            required
                        >
                            <option {{ $footer->type == "Description" ? "selected" : "" }} value="Description">Deskripsi Footer</option>
                            <option {{ $footer->type == "Facebook" ? "selected" : "" }} value="Facebook">Facebook</option>
                            <option {{ $footer->type == "Twitter" ? "selected" : "" }} value="Twitter">Twitter</option>
                            <option {{ $footer->type == "Instagram" ? "selected" : "" }} value="Instagram">Instagram</option>
                            <option {{ $footer->type == "LinkedIn" ? "selected" : "" }} value="LinkedIn">LinkedIn</option>
                        </x-tabler::form.input.select>
                    </div>
                    <div class="col-sm-12" x-show="!isImage">
                        <x-tabler::form.input.textarea
                            name="content"
                            label="Konten"
                            placeholder="Masukkan isi..."
                        >{{ $footer->content }}</x-tabler::form.input.textarea>
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
            ["content"].forEach(function(field) {
                watchdog
                    .create(document.querySelector(`textarea[name='${field}']`), {
                        licenseKey: '',
                    })
                    .catch(handleError);
            });
        </script>
    </x-slot>
</x-app-layout>
