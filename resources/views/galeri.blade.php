<section class="u-clearfix u-white u-section-8" id="carousel_7987">
    <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xl u-sheet-1">
        <div class="u-palette-2-base u-shape u-shape-rectangle u-shape-1"></div>
        <div class="u-gallery u-layout-grid u-lightbox u-show-text-on-hover u-gallery-1" data-pswp-uid="1">
            <div class="u-gallery-inner u-gallery-inner-1">
                @foreach ($galleries as $index => $gallery)
                    <div class="u-effect-fade u-gallery-item" data-pswp-item-id="{{ $index }}" data-gallery-uid="1">
                        <div class="u-back-slide" data-image-width="626" data-image-height="626">
                            <img class="u-back-image u-expanded" src="{{ $gallery->file }}">
                        </div>
                        <div class="u-over-slide u-shading u-over-slide-1">
                            <h3 class="u-gallery-heading"></h3>
                            <p class="u-gallery-text">
                                {{ $gallery->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="u-align-left u-container-style u-gradient u-group u-radius-20 u-shape-round u-group-1">
            <div class="u-container-layout u-valign-middle u-container-layout-1">
                <h2 class="u-text u-text-body-alt-color u-text-1">Galeri</h2>
                <p class="u-text u-text-body-alt-color u-text-2">
                    {{ $gallery_description->description }}
                </p>
                <a href="javascript:void(0)" class="u-active-white u-border-2 u-border-active-white u-border-hover-white u-border-white u-btn u-btn-round u-button-style u-hover-white u-none u-radius-50 u-text-active-palette-2-base u-text-body-alt-color u-text-hover-palette-2-base u-btn-2">
                    Lihat Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>