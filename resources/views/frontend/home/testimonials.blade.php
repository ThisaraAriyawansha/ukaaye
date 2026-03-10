<section class="tf-section tf-quote">
    <div class="container">
        <div class="row">
            <!-- Title + decorative waves -->
            <div class="col-12">
                <div class="title-heading st-3 text-center">
                    <div class="sub-heading clr-pri-3 f-mulish d-flex align-items-center justify-content-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="30" viewBox="0 0 77 30">
                            <path d="M5 15 Q19 5 38 15 T72 15" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            <path d="M10 20 Q24 10 38 20 T67 20" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" opacity="0.7"/>
                        </svg>

                        <span class="inner-sub st-1">Happy Parents</span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="30" viewBox="0 0 77 30">
                            <path d="M5 15 Q19 25 38 15 T72 15" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            <path d="M10 10 Q24 20 38 10 T67 10" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" opacity="0.7"/>
                        </svg>
                    </div>
                    <h2 class="title clr-pri-2 mt-3">What Parents Say About <span class="clr-pri-3">Aromat</span> Baby Food</h2>
                </div>
            </div>

            <div class="col-12">
                <div class="sc-quote">
                    <div class="list-author m-t-62"></div>
                    <div class="inner">
                        <div class="themesflat-carousel clearfix" data-margin="30" data-item="1" data-item2="1" data-item3="1" data-item4="1" data-auto="false">
                            <div class="owl-carousel owl-theme none">
                                @forelse($homeTestimonials as $testimonial)
                                    <div class="item-quote" data-dot="">
                                        <div class="heading">
                                            <div class="left fx">
                                                <div class="box-avt" style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; border: 3px solid #f8c146; flex-shrink: 0;">
                                                    <img src="{{ $testimonial->image_url }}" 
                                                         alt="{{ $testimonial->name }}" 
                                                         style="width: 100%; height: 100%; object-fit: cover; display: block;">
                                                </div>
                                                <ul style="margin-left: 15px;">
                                                    <li>
                                                        <h4 class="name-author clr-pri-2">{{ $testimonial->name }}</h4>
                                                        @if($testimonial->star_count)
                                                            <div class="star-rating" style="color: #f8c146; font-size: 14px;">
                                                                @for($i = 1; $i <= 5; $i++)
                                                                    @if($i <= $testimonial->star_count)
                                                                        <i class="fas fa-star"></i>
                                                                    @else
                                                                        <i class="far fa-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        <p class="clr-pri-5 f-mulish">{{ $testimonial->position }}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="right">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="91" height="71" viewBox="0 0 91 71">
                                                    <g>
                                                        <image width="91" height="71" xlink:href="data:img/png;base64,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"/>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="wrap">
                                            <p class="clr-pri-2">{{ $testimonial->message }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="item-quote">
                                        <div class="wrap text-center">
                                            <p class="clr-pri-2">No testimonials available at the moment.</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div><!--/.themesflat-carousel-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>