<section class="tf-section tf-faq-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-heading text-center">
                    <div class="sub-heading clr-pri-3 f-mulish d-flex align-items-center justify-content-center gap-3">
                        <!-- Left wave -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="30" viewBox="0 0 77 30">
                            <path d="M5 15 Q19 5 38 15 T72 15" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            <path d="M10 20 Q24 10 38 20 T67 20" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" opacity="0.7"/>
                        </svg>

                        <span class="inner-sub st-2">Asked Questions</span>

                        <!-- Right wave -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="30" viewBox="0 0 77 30">
                            <path d="M5 15 Q19 25 38 15 T72 15" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            <path d="M10 10 Q24 20 38 10 T67 10" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" opacity="0.7"/>
                        </svg>
                    </div>
                    <h2 class="title clr-pri-2 mt-3">Frequently Asked Questions</h2>
                </div>
            </div>

            <div class="col-md-12">
                <div class="flat-tabs tab-faq m-t50">
                    <div class="content-tab">
                        <div class="content-inner">
                            <div class="flat-accordion">
                                @forelse($faqs as $index => $faq)
                                    <div class="flat-toggle {{ $index === 0 ? 'active' : '' }}">
                                        <h6 class="toggle-title">{{ $faq->question }}</h6>
                                        <div class="toggle-content">
                                            {!! $faq->answer !!}
                                        </div>
                                    </div>
                                @empty
                                    <div class="flat-toggle active">
                                        <h6 class="toggle-title">No FAQs available at the moment</h6>
                                        <div class="toggle-content">
                                            <p>Please check back later for frequently asked questions about our products.</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>