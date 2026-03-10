<section class="tf-section tf-sc-blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-heading st-3 text-center">
                    <div class="sub-heading clr-pri-3 f-mulish d-flex align-items-center justify-content-center gap-3">
                        <!-- Left decorative wave (vector) -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="30" viewBox="0 0 77 30">
                            <path d="M5 15 Q19 5 38 15 T72 15" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            <path d="M10 20 Q24 10 38 20 T67 20" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" opacity="0.7"/>
                        </svg>

                        <span class="inner-sub st-1">Latest News & Blog</span>

                        <!-- Right decorative wave (vector) -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="30" viewBox="0 0 77 30">
                            <path d="M5 15 Q19 25 38 15 T72 15" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                            <path d="M10 10 Q24 20 38 10 T67 10" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" opacity="0.7"/>
                        </svg>
                    </div>
                    <h2 class="title clr-pri-2 mt-3">
                        Nourishing Sri Lankan Babies – <br>Latest from Aromat
                    </h2>
                </div>
            </div>

                       @foreach($latestBlogs as $blog)
            <div class="col-xl-4 col-lg-4 col-md-4 col-12 d-flex">
                <div class="box-artice fl-scale st-2 wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms" style="display:flex!important; flex-direction:column; width:100%;">
                    <div class="box-feature inner-scale" style="height:220px; overflow:hidden;">
                        <a href="{{ url($blog->slug) }}" style="display:block; height:100%;">
                            <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" style="width:100%; height:100%; object-fit:cover;">
                        </a>
                    </div>
                    <div class="box-content" style="flex:1; display:flex; flex-direction:column;">
                        <div class="meta-post st-1">
                            <ul class="fx">
                                <li>
                                    <a href="{{ url($blog->slug) }}" class="fx">
                                        <i class="far fa-calendar-alt clr-pri-3"></i>
                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('d M Y') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url($blog->slug) }}" class="fx">
                                        <i class="far fa-tag clr-pri-3"></i>
                                        {{ $blog->category->name ?? 'General' }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <h4 class="title-article-post" style="flex:1;">
                            <a href="{{ url($blog->slug) }}">{{ $blog->title }}</a>
                        </h4>
                        <div class="btn-rm" style="margin-top:auto;">
                            <a href="{{ url($blog->slug) }}" class="fl-btn st-4">
                                <span class="inner">read more</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

           

            
        </div>
    </div>
</section>