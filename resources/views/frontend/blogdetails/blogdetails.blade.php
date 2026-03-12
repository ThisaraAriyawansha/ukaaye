<section class="gap our-blog">
  <div class="container">
    <div class="row">

      {{-- Main Blog Content --}}
      <div class="col-lg-8">
        <div class="blog pb-0">
          <div class="blog-img">
            <figure>
              <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" style="width:100%; height:420px; object-fit:cover;">
            </figure>
            <div class="admin">
              <div style="display:flex; flex-direction:column; gap:6px; align-items:flex-start;">
                <h5 style="margin:0; background:#1a3c6e; color:#fff; padding:4px 12px; display:inline-block;">
                  {{ $blog->published_at->format('M d, Y') }}
                </h5>
                <h6 style="margin:0; background:#f5c518; color:#1a1a1a; padding:4px 12px; display:inline-block;">
                  By {{ $blog->author_name ?? 'Admin' }}
                </h6>
              </div>
            </div>
          </div>


          <h2><a href="{{ url($blog->slug) }}">{{ $blog->title }}</a></h2>

          <div class="blog-details">
            {!! $blog->description !!}
          </div>

          {{-- Tags --}}
          @if($blog->tags->count())
          <div style="margin-top:24px; display:flex; flex-wrap:wrap; gap:8px; align-items:center;">
            <strong>Tags:</strong>
            @foreach($blog->tags as $tag)
            <a href="{{ route('blog', ['tag' => $tag->slug]) }}"
               style="background:#1a1a1a; border:1px solid #333; color:#ccc; padding:4px 12px; font-size:13px; text-decoration:none;">
              {{ $tag->name }}
            </a>
            @endforeach
          </div>
          @endif
        </div>

        {{-- Related Blogs --}}
        @if($relatedBlogs->count())
        <div style="margin-top:50px;">
          <h3 style="margin-bottom:24px;">Related Posts</h3>
          <div class="row">
            @foreach($relatedBlogs as $related)
            <div class="col-lg-4 col-md-6" style="margin-bottom:30px;">
              <div class="projects" style="height:100%; display:flex; flex-direction:column;">
                <div class="project-img" style="height:200px; overflow:hidden; position:relative; flex-shrink:0;">
                  <figure style="margin:0; height:100%;">
                    <img src="{{ $related->image_url }}" alt="{{ $related->title }}" style="width:100%; height:100%; object-fit:cover;">
                  </figure>
                  <img src="{{ asset('assets/img/bolt-img.png') }}" alt="img" class="bolt-img">
                  <a href="{{ url($related->slug) }}"><i class="flaticon-right-up"></i></a>
                </div>
                <div style="flex:1; display:flex; flex-direction:column; justify-content:space-between; padding-top:12px;">
                  <a href="{{ url($related->slug) }}">{{ $related->title }}</a>
                  <h5>{{ $related->published_at->format('M d, Y') }}</h5>
                  <span>{{ $related->category->name ?? 'General' }}</span>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @endif
      </div>

      {{-- Sidebar --}}
      <div class="col-lg-4">

        {{-- Search --}}
        <div class="sidebar">
          <h3>Search</h3>
          <form action="{{ route('blog') }}" method="GET">
            <div style="display:flex; gap:0;">
              <input type="text" name="search"
                placeholder="Search blogs..."
                style="flex:1; padding:10px 14px; border:1px solid #EAEFEF;  flex:1; padding:12px 18px;  background:#ffffff; color:#333333; font-size:14px; outline:none;">
              <button type="submit"
                style="padding:10px 16px; background:#f5c518; border:none; cursor:pointer;">
                <i class="fa-solid fa-magnifying-glass" style="color:#111;"></i>
              </button>
            </div>
          </form>
        </div>

        {{-- Recent Posts --}}
        <div class="sidebar">
          <h3>Recent Posts</h3>
          <ul class="recent-post">
            @foreach($recentPosts as $index => $post)
            <li>
              @if($index === 0)
              <figure>
                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" style="width:100%; height:130px; object-fit:cover;">
              </figure>
              @endif
              <a href="{{ url($post->slug) }}">{{ $post->title }}</a>
              <h6>{{ $post->published_at->format('M d, Y') }}</h6>
            </li>
            @endforeach
          </ul>
        </div>

        {{-- Categories --}}
        @if($categories->count())
        <div class="sidebar">
          <h3>Categories</h3>
          <ul class="meta">
            @foreach($categories as $category)
            <li>
              <a href="{{ route('blog', ['category' => $category->slug]) }}">
                {{ Str::limit($category->name, 25) }}
                <span style="float:right;">({{ $category->blogs_count }})</span>
              </a>
            </li>
            @endforeach
          </ul>
        </div>
        @endif

        {{-- Tags --}}
        @if($allTags->count())
        <div class="sidebar">
          <h3>Tags</h3>
          <div style="display:flex; flex-wrap:wrap; gap:8px;">
            @foreach($allTags as $tag)
            <a href="{{ route('blog', ['tag' => $tag->slug]) }}"
               style="background:#1a1a1a; border:1px solid #333; color:#ccc; padding:5px 14px; font-size:13px; text-decoration:none;">
              {{ $tag->name }}
            </a>
            @endforeach
          </div>
        </div>
        @endif

      </div>
    </div>
  </div>
</section>