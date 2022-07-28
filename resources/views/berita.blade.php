<section class="u-align-center u-clearfix u-gradient u-section-7" id="carousel_adc8">
    <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-sheet-1">
        <h4 class="u-text u-text-body-alt-color u-text-default u-text-1">Berita</h4>
        <h2 class="u-text u-text-body-alt-color u-text-default u-text-2">Informasi Terbaru Kami</h2>
        <div class="u-expanded-width u-list u-list-1">
            <div class="u-repeater u-repeater-1">
                @foreach ($beritas as $berita)
                    <div class="u-align-center u-border-17 u-border-no-bottom u-border-no-left u-border-no-right u-border-palette-2-light-1 u-bottom-left-radius-20 u-bottom-right-radius-20 u-container-style u-list-item u-repeater-item u-shape-round u-white u-list-item-1">
                        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                            @if ($berita->attachments->count() > 0)
                                <div class="aspect-w-1 aspect-h-1 mt-4 mb-6">
                                    <img
                                        src="{{ $berita->attachments->first()->file }}"
                                        alt=""
                                        class="w-full h-full rounded object-cover"
                                    />
                                </div>
                            @else
                                <div class="aspect-w-1 aspect-h-1 mt-4 mb-6">
                                    <div class="w-full h-full rounded object-cover bg-gray-100 flex items-center justify-center text-sm select-none">
                                        Tidak ada gambar
                                    </div>
                                </div>
                            @endif
                            <h4 class="u-text u-text-default u-text-palette-2-base u-text-3">{{ $berita->title }}</h4>
                            <p class="u-text u-text-palette-1-dark-2 u-text-4">{{ mb_strimwidth(strip_tags($berita->description), 0, 100, '...') }}</p>
                            <a href="javascript:void(0)" class="u-active-palette-2-base u-border-2 u-border-active-white u-border-hover-white u-border-palette-2-base u-btn u-btn-round u-button-style u-hover-palette-2-base u-none u-radius-50 u-text-active-white u-text-body-color u-text-hover-white u-btn-1">
                                Baca
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>