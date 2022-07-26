<section class="u-align-center u-clearfix u-gradient u-section-4" id="carousel_a18f">
    <div class="u-clearfix u-sheet u-sheet-1 mt-8">
        <h2 class="u-text u-text-body-alt-color u-text-default u-text-1">
            {{ $section_title->title }}
        </h2>

        <div class="text-white">
            {!! $section_description->description !!}
        </div>

        <div class="u-expanded-width u-list u-list-1">
            <div class="u-repeater u-repeater-1">
                @foreach ($fokus_penelitians as $focus)
                    <div class="u-bottom-left-radius-20 u-bottom-right-radius-20 u-container-style u-list-item u-repeater-item u-shape-round u-white u-list-item-1">
                        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                            <img src="{{ $focus->file }}" class="w-48 h-48 rounded-full mx-auto object-cover" />
                            <h4 class="u-align-center u-text u-text-3">
                                {!! $focus->title !!}
                            </h4>
                            <div class="prose-sm text-left prose-p:!text-sm prose-ul:list-disc">
                                {!! $focus->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>