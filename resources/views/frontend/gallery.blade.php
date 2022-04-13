<div class="section section-we-made-3 section-with-hover" id="gallery">
    <div class="container">
        <div class="row">
            <div class="title add-animation">
                <h2>{{ __('Gallery') }}</h2>
                <div class="separator-container">
                    <div class="separator line-separator"><i class="fa fa-headphones" aria-hidden="true"></i></div>
                </div>
                <p>Algunos de los eventos que hemos realizado.</p>
            </div>
        </div>
        <div class="row">
            <div class="hidden col-lg-4 col-md-6">
                <div class="project add-animation animation-1">
                    <img src="{{ asset('rubik/img/rubik_background2.jpg') }}">
                    <div class="over-area over-area-sm hidden" onClick="" data-target="project_1">
                        <div class="content">
                            <h4>Watch Anish</h4>
                            <p>We've been working with Kingsman Studios and we are proud that...</p>
                        </div>
                        <button class="btn hidden-sm hidden-xs" onClick="rubik.showModal(this)" data-target="project_1">
                            More Details
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="project add-animation animation-1">
                    <img src="{{ asset('rubik/img/gallery/photo-1.jpg') }}">
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="project add-animation animation-2">
                    <img src="{{ asset('rubik/img/gallery/photo-2.jpg') }}">
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="project add-animation animation-3">
                    <img src="{{ asset('rubik/img/gallery/photo-3.jpg') }}">
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="project add-animation animation-4">
                    <img src="{{ asset('rubik/img/gallery/photo-4.jpg') }}">
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="project add-animation animation-5">
                    <img src="{{ asset('rubik/img/gallery/photo-5.jpg') }}">
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="project add-animation animation-5">
                    <img src="{{ asset('rubik/img/gallery/photo-6.jpg') }}">
                </div>
            </div>
        </div>
    </div>
</div>
