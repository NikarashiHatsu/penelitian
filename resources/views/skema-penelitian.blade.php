<section class="u-align-center u-clearfix u-grey-10 u-section-3 pb-20" id="carousel_2ffc">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h2 class="u-text u-text-1">
            Skema Penelitian
        </h2>
        <div class="u-expanded-width u-layout-grid u-list u-list-1">
            <div class="u-repeater u-repeater-1">
                @foreach ($skema_penelitians as $index => $skema_penelitian)
                    <div class="u-align-center u-border-20 u-border-no-bottom u-border-no-left u-border-no-right u-border-palette-{{ $index }}-base u-bottom-left-radius-20 u-bottom-right-radius-20 u-container-style u-custom-item u-list-item u-repeater-item u-shape-round u-white u-list-item-1">
                        <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                            <img src="{{ $skema_penelitian->file }}" class="w-40 h-40 mx-auto rounded-full object-cover" />
                            <h4 class="u-text u-text-2">
                                {{ $skema_penelitian->title }}
                            </h4>
                            <div class="prose-sm text-left prose-p:!text-sm prose-ul:list-disc">
                                {!! $skema_penelitian->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>