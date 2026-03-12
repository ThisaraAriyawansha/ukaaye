<section class="gap our-projects">
  <div class="container">

{{-- Active Filter Banner --}}
@if(request()->hasAny(['category', 'tag', 'search']))
<div style="margin-bottom:24px; padding:12px 20px; background:#ffffff; border-left:4px solid var(--primary-color); display:flex; justify-content:space-between; align-items:center; box-shadow:0 2px 8px rgba(0,0,0,0.03); border-radius:0 4px 4px 0; border-top:1px solid #f0f0f0; border-right:1px solid #f0f0f0; border-bottom:1px solid #f0f0f0;">
  <span style="color:#555555; font-size:14px; font-weight:400;">
    @if(request('search'))
      Showing results for: <strong style="color:var(--primary-color); font-weight:600; background:#f0f7ff; padding:2px 8px; border-radius:4px; margin-left:4px;">{{ request('search') }}</strong>
    @elseif(request('category'))
      Filtered by category: <strong style="color:var(--primary-color); font-weight:600; background:#f0f7ff; padding:2px 8px; border-radius:4px; margin-left:4px;">{{ request('category') }}</strong>
    @elseif(request('tag'))
      Filtered by tag: <strong style="color:var(--primary-color); font-weight:600; background:#f0f7ff; padding:2px 8px; border-radius:4px; margin-left:4px;">{{ request('tag') }}</strong>
    @endif
  </span>
  <a href="{{ route('blog') }}" style="color:var(--primary-color); font-size:13px; text-decoration:none; display:inline-flex; align-items:center; gap:4px; border:1px solid rgba(var(--primary-color), 0.2); padding:4px 10px; border-radius:20px; background:#ffffff; transition:all 0.2s ease;" onmouseover="this.style.background='var(--primary-color)'; this.style.color='#ffffff';" onmouseout="this.style.background='#ffffff'; this.style.color='var(--primary-color)';">
    <span style="font-size:16px;">✕</span> Clear filter
  </a>
</div>
@endif

    <div class="row">

      {{-- Blog Cards --}}
      <div class="col-lg-9">
        <div class="row">
          @forelse($blogs as $blog)
          <div class="col-lg-4 col-md-6" style="margin-bottom:30px;">
            <div class="projects" style="height:100%; display:flex; flex-direction:column;">
              <div class="project-img" style="height:280px; overflow:hidden; position:relative; flex-shrink:0;">
                <figure style="margin:0; height:100%;">
                  <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" style="width:100%; height:100%; object-fit:cover;">
                </figure>
                <img src="{{ asset('assets/img/bolt-img.png') }}" alt="img" class="bolt-img">
                <a href="{{ url($blog->slug) }}"><i class="flaticon-right-up"></i></a>
              </div>
              <div style="flex:1; display:flex; flex-direction:column; justify-content:space-between; padding-top:15px;">
                <a href="{{ url($blog->slug) }}">{{ $blog->title }}</a>
                <h5>{{ $blog->published_at->format('M d, Y') }}</h5>
                <span>{{ $blog->category->name ?? 'General' }}</span>
              </div>
            </div>
          </div>
          @empty
          <div class="col-12">
            <p style="text-align:center; padding:60px 0; color:#aaa;">No blogs found.</p>
          </div>
          @endforelse
        </div>

        {{-- Pagination --}}
        @if($blogs->hasPages())
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <li class="page-item {{ $blogs->onFirstPage() ? 'disabled' : '' }}">
              <a class="page-link previous" href="{{ $blogs->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">«</span>
              </a>
            </li>
            @foreach($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
              @if($page == 1 || $page == $blogs->lastPage() || abs($page - $blogs->currentPage()) <= 1)
                <li class="page-item {{ $page == $blogs->currentPage() ? 'active' : '' }}">
                  <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
              @elseif($page == $blogs->currentPage() - 2 || $page == $blogs->currentPage() + 2)
                <li class="page-item disabled"><span class="page-link">...</span></li>
              @endif
            @endforeach
            <li class="page-item {{ !$blogs->hasMorePages() ? 'disabled' : '' }}">
              <a class="page-link next" href="{{ $blogs->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">»</span>
              </a>
            </li>
          </ul>
        </nav>
        @endif
      </div>

      {{-- Sidebar --}}
      <div class="col-lg-3">

        {{-- Search --}}
        <div class="sidebar">
          <h3>Search</h3>
          <form action="{{ route('blog') }}" method="GET">
            <div style="display:flex; gap:0;">
              <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Search blogs..."
                style="flex:1; padding:10px 14px; border:1px solid #EAEFEF;  flex:1; padding:12px 18px;  background:#ffffff; color:#333333;">
              <button type="submit"
                style="padding:10px 16px; background:#f5c518; border:none; cursor:pointer;">
                <i class="fa-solid fa-magnifying-glass" style="color:#111;"></i>
              </button>
            </div>
          </form>
        </div>

        {{-- Categories --}}
        @if($categories->count())
        <div class="sidebar">
          <h3>Categories</h3>
          <ul class="meta">
            @foreach($categories as $category)
            <li>
              <a href="{{ route('blog', ['category' => $category->slug]) }}"
                 style="{{ request('category') == $category->slug ? 'color:#f5c518; font-weight:700;' : '' }}">
                {{ Str::limit($category->name, 15) }}
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
               style="background:{{ request('tag') == $tag->slug ? '#f5c518' : '#1a1a1a' }};
                      border:1px solid #333;
                      color:{{ request('tag') == $tag->slug ? '#111' : '#ccc' }};
                      padding:5px 14px; font-size:13px; text-decoration:none;">
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