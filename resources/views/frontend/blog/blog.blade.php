<section class="tf-section tf-blog-grid">
    <div class="container">
        <div class="row">

            @forelse($blogs as $blog)
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
            @empty
                <div class="col-12 text-center">
                    <p>No blog posts found.</p>
                </div>
            @endforelse

            @if($blogs->hasPages())
                <div class="col-12">
                    <div class="themesflat-pagination style fx fx-style2 m-t30" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <ul>
                            {{-- Previous --}}
                            <li class="custom">
                                @if($blogs->onFirstPage())
                                    <a href="javascript:void(0)" class="muted3-color" style="opacity:0.4; cursor:default; pointer-events:none;"><i class="fas fa-chevron-left"></i></a>
                                @else
                                    <a href="{{ $blogs->previousPageUrl() }}" class="muted3-color"><i class="fas fa-chevron-left"></i></a>
                                @endif
                            </li>

                            {{-- Page Numbers --}}
                            @foreach($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                <li>
                                    <a href="{{ $url }}" class="page-numbers {{ $blogs->currentPage() === $page ? 'active' : '' }}">
                                        {{ str_pad($page, 2, '0', STR_PAD_LEFT) }}
                                    </a>
                                </li>
                            @endforeach

                            {{-- Next --}}
                            <li class="custom st-2">
                                @if($blogs->hasMorePages())
                                    <a href="{{ $blogs->nextPageUrl() }}" class="muted3-color"><i class="fas fa-chevron-right"></i></a>
                                @else
                                    <a href="javascript:void(0)" class="muted3-color" style="opacity:0.4; cursor:default; pointer-events:none;"><i class="fas fa-chevron-right"></i></a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            @endif

        </div>
    </div>
</section>
