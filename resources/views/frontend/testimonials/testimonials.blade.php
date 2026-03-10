<section class="tf-section tf-testimonial">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-heading st-3 text-center">
                    <div class="sub-heading clr-pri-3 f-mulish d-flex align-items-center justify-content-center gap-3">
                        <!-- Left wave (vector) -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="30" viewBox="0 0 77 30">
                            <path d="M5 15 Q19 5 38 15 T72 15" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            <path d="M10 20 Q24 10 38 20 T67 20" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" opacity="0.7"/>
                        </svg>

                        <span class="inner-sub st-1">Parents Feedback</span>

                        <!-- Right wave (vector) -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="30" viewBox="0 0 77 30">
                            <path d="M5 15 Q19 25 38 15 T72 15" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            <path d="M10 10 Q24 20 38 10 T67 10" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" opacity="0.7"/>
                        </svg>
                    </div>
                    <h2 class="title clr-pri-2 mt-3">
                        What Sri Lankan Parents Say About <span class="clr-pri-3">Aromat</span> Baby Food
                    </h2>
                </div>
            </div>

            @foreach ($testimonials as $t)
                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                    <div class="item-fb wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1300ms">
                        <div class="heading fx">
                            <div class="box-avt" style="width: 80px; border-radius: 50%; overflow: hidden; border: 3px solid #f8c146; flex-shrink: 0;">
                                <img src="{{ $t->image_url }}"
                                     alt="{{ $t->name }}"
                                     style="width: 100%; height: 100%; object-fit: cover; display: block;">
                            </div>
                            <ul style="margin-left: 15px;">
                                <li><h4 class="name-author clr-pri-2">{{ $t->name }}</h4></li>
                                <li><p class="clr-pri-5 f-mulish">{{ $t->position }}</p></li>
                                <li>
                                    <span style="color: #f8c146; font-size: 14px;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            {{ $i <= $t->star_count ? '★' : '☆' }}
                                        @endfor
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="wrap">
                            <p class="clr-pri-2">{{ $t->message }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
