<section class="gap">
  <div class="container">
    <div class="heading">
      <img src="assets/img/heading-img.png" alt="img">
      <span>Recent Articles</span>
      <h2>News & Updates</h2>
    </div>
    <div class="row">
      @foreach($latestBlogs as $blog)
      <div class="col-lg-4 col-md-6">
        <div class="blog {{ $loop->last ? 'mb-0' : '' }}">
          <div class="blog-img" style="position: relative; height: 280px; overflow: hidden;">
            <figure style="margin: 0; height: 100%;">
              <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" style="width: 100%; height: 100%; object-fit: cover;">
            </figure>
                <div class="admin" style="position: absolute; bottom: 15px; left: 15px; display: flex; flex-direction: column; gap: 6px; align-items: flex-start;">
                <h5 style="margin: 0; background: #1a3c6e; color: #fff; padding: 4px 12px; display: inline-block;">
                    {{ $blog->published_at->format('M d, Y') }}
                </h5>
                <h6 style="margin: 0; background: #f5c518; color: #1a1a1a; padding: 4px 12px; display: inline-block;">
                    By {{ $blog->author_name ?? 'Admin' }}
                </h6>
                </div>
          </div>
          <h4><a href="{{ url($blog->slug) }}">{{ $blog->title }}</a></h4>
          <a href="{{ url($blog->slug) }}"><i class="flaticon-right-up"></i></a>
        </div>
      </div>
      @endforeach

      <div class="center">
        <a href="{{ route('blog') }}" class="btn">View All News</a>
      </div>
    </div>
  </div>
</section>