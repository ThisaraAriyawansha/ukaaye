<section class="tf-section tf-galley">
    <div class="container">
        <div class="row">
            <!-- Title + decorative waves -->
            <div class="col-12">
                <div class="title-heading st-4 text-center">
                    <div class="sub-heading clr-pri-3 f-mulish d-flex align-items-center justify-content-center gap-3">
                        <!-- Left wave SVG (pure vector) -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="30" viewBox="0 0 77 30">
                            <path d="M5 15 Q19 5 38 15 T72 15" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            <path d="M10 20 Q24 10 38 20 T67 20" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" opacity="0.7"/>
                        </svg>

                        <span class="inner-sub st-1">Photo Gallery</span>

                        <!-- Right wave SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="30" viewBox="0 0 77 30">
                            <path d="M5 15 Q19 25 38 15 T72 15" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            <path d="M10 10 Q24 20 38 10 T67 10" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" opacity="0.7"/>
                        </svg>
                    </div>
                    <h2 class="title clr-pri-2 mt-3">Happy Babies, Happy Moments</h2>
                </div>
            </div>

            @forelse($homeGalleries as $gallery)
                @php
                    $colClass = $loop->index < 3
                        ? 'col-xl-4 col-lg-4 col-md-4 col-12'
                        : 'col-xl-6 col-lg-6 col-md-6 col-12';
                    $mgClass  = $loop->last && $loop->index >= 3 ? 'mg-bt-0' : '';
                @endphp
                <div class="{{ $colClass }}">
                    <div class="sc-gallery {{ $mgClass }} wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms">
                        <div class="box-feature {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ $gallery->image_url }}" alt="{{ $gallery->name }}">
                            <div class="overlay"></div>
                            <div class="box-content">
                                <h5 class="title">
                                    <a href="{{ route('gallery') }}" class="clr-pri-2">{{ $gallery->name }}</a>
                                </h5>
                                <p class="f-rubik">{{ $gallery->category_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No gallery items found.</p>
                </div>
            @endforelse

        </div>
    </div>
</section>
