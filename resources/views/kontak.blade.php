
<section class="u-clearfix u-white u-section-10" id="carousel_6697">
    <div class="u-expanded-width u-grey-10 u-shape u-shape-rectangle u-shape-1"></div>
    <div class="u-container-style u-group u-shape-rectangle u-group-1">
        <div class="u-container-layout u-valign-middle-sm u-container-layout-1">
            <div class="u-palette-1-light-2 u-shape u-shape-circle u-shape-2"></div>
            <div class="u-align-left u-image u-image-circle u-image-1"></div>
            <div class="u-align-left u-image u-image-circle u-preserve-proportions u-image-2"></div>
        </div>
    </div>

    <div class="u-list u-list-1">
        <div class="u-repeater u-repeater-1">
            <div class="u-align-left u-bottom-left-radius-20 u-bottom-right-radius-20 u-container-style u-gradient u-list-item u-repeater-item u-shape-round u-list-item-1">
                <div class="u-container-layout u-similar-container u-container-layout-2">
                    <h5 class="u-text u-text-body-alt-color u-text-2">
                        <span class="u-file-icon u-icon u-text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="192" height="192" fill="#FFFFFF" viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none"></rect>
                                <path d="M222,158.4l-46.9-20a15.6,15.6,0,0,0-15.1,1.3l-25.1,16.7a76.5,76.5,0,0,1-35.2-35h0L116.3,96a15.9,15.9,0,0,0,1.4-15.1L97.6,34a16.3,16.3,0,0,0-16.7-9.6A56.2,56.2,0,0,0,32,80c0,79.4,64.6,144,144,144a56.2,56.2,0,0,0,55.6-48.9A16.3,16.3,0,0,0,222,158.4Z"></path>
                            </svg>
                        </span>
                        Telepon
                    </h5>
                    <p class="u-text u-text-body-alt-color u-text-3">
                        <ul>
                            @foreach ($phones as $phone)
                                <li style="color: white; margin-bottom: 0.25rem !important; margin-top: 0 !important;">{{ $phone->content }}</li>
                            @endforeach
                        </ul>
                    </p>
                </div>
            </div>
            <div class="u-align-left u-bottom-left-radius-20 u-bottom-right-radius-20 u-container-style u-gradient u-list-item u-repeater-item u-shape-round u-list-item-2">
                <div class="u-container-layout u-similar-container u-container-layout-3">
                    <h5 class="u-text u-text-body-alt-color u-text-4">
                        <span class="u-file-icon u-icon u-text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="192" height="192" fill="#FFFFFFF" viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none"></rect>
                                <path d="M128,16a88.1,88.1,0,0,0-88,88c0,75.3,80,132.2,83.4,134.6a8.3,8.3,0,0,0,9.2,0C136,236.2,216,179.3,216,104A88.1,88.1,0,0,0,128,16Zm0,56a32,32,0,1,1-32,32A32,32,0,0,1,128,72Z"></path>
                            </svg>
                        </span>
                        Lokasi
                    </h5>
                    <p class="u-text u-text-body-alt-color u-text-5">
                        @foreach ($addresses as $address)
                            <p style="color: white;">{{ $address->content }}</p>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>