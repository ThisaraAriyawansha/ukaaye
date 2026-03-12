<section class="gap our-projects">
  <div class="container">
    <div class="row">
      @forelse($blogs as $blog)
      <div class="col-lg-4 col-md-6" style="margin-bottom: 30px;">
        <div class="projects" style="height: 100%; display: flex; flex-direction: column;">
          <div class="project-img" style="height: 350px; overflow: hidden; position: relative; flex-shrink: 0;">
            <figure style="margin: 0; height: 100%;">
              <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" style="width: 100%; height: 100%; object-fit: cover;">
            </figure>
            <img src="{{ asset('assets/img/bolt-img.png') }}" alt="img" class="bolt-img">
            <a href="{{ url($blog->slug) }}"><i class="flaticon-right-up"></i></a>
          </div>
          <div style="flex: 1; display: flex; flex-direction: column; justify-content: space-between; padding-top: 15px;">
            <a href="{{ url($blog->slug) }}">{{ $blog->title }}</a>
            <h5>{{ \Carbon\Carbon::parse($blog->published_at)->format('M d, Y') }}</h5>
            <span>{{ $blog->category->name ?? 'General' }}</span>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12">
        <p style="text-align: center; padding: 40px 0;">No blogs found.</p>
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
</section>