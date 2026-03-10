<section class="tf-section tf-blog-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                <article class="article">
                    <div class="feature-article wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms">
                        <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}">
                    </div>

                    <div class="meta-post st-2">
                        <ul class="fx">
                            <li class="fx">
                                <i class="far fa-calendar-alt clr-pri-3"></i>
                                {{ \Carbon\Carbon::parse($blog->published_at)->format('d F Y') }}
                            </li>
                            <li class="fx">
                                <i class="far fa-user clr-pri-3"></i>
                                {{ $blog->author_name }}
                            </li>
                            @if($blog->category)
                            <li class="fx">
                                <i class="far fa-folder clr-pri-3"></i>
                                {{ $blog->category->name }}
                            </li>
                            @endif
                        </ul>
                    </div>

                    <h3 class="title-article clr-pri-2">
                        {{ $blog->title }}
                    </h3>

                    <div class="wrap st-1 f-rubik">
                        {!! $blog->description !!}
                    </div>

                    <div class="quotes-article st-1 fx">
                        <div class="box-icon">
                            <svg id="Blog_Info" data-name="Blog Info" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60" height="46" viewBox="0 0 60 46">
                                <g>
                                    <image id="quote_1_" data-name="quote(1)" width="60" height="46" xlink:href="data:img/png;base64,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"/>
                                </g>
                            </svg>
                        </div>
                        <div class="box-content">
                            <div class="inner clr-pri-5">
                                "As Sri Lankan parents ourselves, we know how hard it is to find trustworthy baby food. That's why Aromat exists — safe, natural, affordable nutrition made right here in Piliyandala for every family."
                            </div>
                            <div class="author clr-pri-2">Aromat Team</div>
                        </div>
                    </div>

                    @if($blog->tags->count())
                    <div class="tag-article">
                        <div class="box-lt">
                            <p class="title clr-pri-2">Tags</p>
                            <ul class="fx">
                                @foreach($blog->tags as $tag)
                                    <li><a href="{{ route('blog') }}?search={{ urlencode($tag->name) }}" class="jus-ct f-rubik">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    @if($relatedBlogs->count())
                    <div class="box-related">
                        <h4 class="title st-1 fl-ctm-1">Related Posts <span class="ctm-inner"></span></h4>
                        <div class="box-blog-grid st-2" style="display:flex; gap:20px; align-items:stretch;">
                            @foreach($relatedBlogs as $related)
                            <div class="box-artice fl-scale wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms" style="display:flex; flex-direction:column; flex:1;">
                                <div class="box-feature inner-scale" style="height:180px; overflow:hidden;">
                                    <a href="{{ url($related->slug) }}" style="display:block; height:100%;">
                                        <img src="{{ $related->image_url }}" alt="{{ $related->title }}" style="width:100%; height:100%; object-fit:cover;">
                                    </a>
                                </div>
                                <div class="box-content" style="flex:1; display:flex; flex-direction:column;">
                                    <div class="meta-post st-1">
                                        <ul class="fx">
                                            <li>
                                                <a href="{{ url($related->slug) }}" class="fx">
                                                    <i class="far fa-calendar-alt clr-pri-3"></i>
                                                    {{ \Carbon\Carbon::parse($related->published_at)->format('d M Y') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="title-article-post" style="flex:1;">
                                        <a href="{{ url($related->slug) }}">{{ $related->title }}</a>
                                    </h4>
                                    <div class="btn-rm" style="margin-top:auto;">
                                        <a href="{{ url($related->slug) }}" class="fl-btn st-4">
                                            <span class="inner">read more</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </article>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                <div id="sidebar" class="sidebar-style2 wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms">
                    <div class="inner-sidebar fl-st-1">

                        <div class="widget widget-search st-2">
                            <h4 class="title-widget fl-ctm-1">Search<span class="ctm-inner"></span></h4>
                            <div class="form-search-widget">
                                <form action="{{ route('blog') }}" method="GET">
                                    <input type="text" name="search" placeholder="Search blog posts...">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>

                        @if(isset($categories) && $categories->count())
                        <div class="widget widget-category st-2">
                            <h4 class="title-widget fl-ctm-1">Categories<span class="ctm-inner"></span></h4>
                            <div class="list-category">
                                <ul>
                                    @foreach($categories as $cat)
                                    <li class="fx">
                                        <span class="st wd-ctm">{{ $cat->name }}</span>
                                        <span class="st">{{ str_pad($cat->blogs_count, 2, '0', STR_PAD_LEFT) }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif

                        @if(isset($recentPosts) && $recentPosts->count())
                        <div class="widget widget-news st-2">
                            <h4 class="title-widget fl-ctm-1">Recent Posts<span class="ctm-inner"></span></h4>
                            <ul class="list-news">
                                @foreach($recentPosts as $recent)
                                <li class="fx">
                                    <img src="{{ $recent->image_url }}" alt="{{ $recent->title }}" class="feature">
                                    <ul class="box-content">
                                        <li>
                                            <h6 class="title">
                                                <a href="{{ url($recent->slug) }}">{{ $recent->title }}</a>
                                            </h6>
                                        </li>
                                        <li>
                                            <a href="{{ url($recent->slug) }}" class="fx meta-news clr-pri-4">
                                                <i class="far fa-calendar-alt"></i>
                                                <span class="f-rubik">{{ \Carbon\Carbon::parse($recent->published_at)->format('d M Y') }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(isset($allTags) && $allTags->count())
                        <div class="widget widget-tag st-2">
                            <h4 class="title-widget fl-ctm-1">Popular Tags<span class="ctm-inner"></span></h4>
                            <ul class="list-tag">
                                @foreach($allTags as $tag)
                                <li>
                                    <a href="{{ route('blog') }}?search={{ urlencode($tag->name) }}" class="f-rubik {{ $blog->tags->contains($tag) ? 'active' : '' }}">
                                        {{ $tag->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </div><!--/inner-sidebar-->
                </div>
            </div>
        </div>
    </div>
</section>
