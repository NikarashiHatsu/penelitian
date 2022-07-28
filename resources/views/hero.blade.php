<section class="u-clearfix u-valign-middle-lg u-valign-middle-xl u-section-2 relative" id="carousel_fceb">
    <img
        class="u-expanded-height-lg u-expanded-height-xl u-expanded-height-xs u-image u-image-1"
        src="{{ $hero_image }}"
    />

    <div class="u-align-left u-container-style u-group u-opacity u-opacity-60 u-shape-rectangle u-white u-group-1">
        <div class="u-container-layout u-valign-top u-container-layout-1 -mt-16">
            <div class="flex mb-16">
                @foreach ($hero_logos as $logo)
                    <img src="{{ asset($logo->content) }}" class="h-16 object-contain">
                @endforeach
            </div>

            <h1 class="u-text u-text-palette-1-base u-text-1" style="width: 600px;">
                {!! $hero_title !!}
            </h1>
            <p class="u-text u-text-2">{!! $hero_description !!}</p>
            <a
                href="{{ route('index') }}"
                class="u-active-palette-2-base u-border-2 u-border-active-palette-2-base u-border-hover-palette-2-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-2-base u-none u-radius-50 u-text-active-white u-text-hover-white u-text-palette-1-base u-btn-2"
            >
                Selengkapnya
            </a>
        </div>
    </div>
</section>