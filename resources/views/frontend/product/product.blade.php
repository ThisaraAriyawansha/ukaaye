<section class="tf-section tf-shop">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                <div id="sidebar" class="side-bar-shop wow fadeInLeft animated" data-wow-delay="0.3ms" data-wow-duration="1200ms">
                    <div class="widget widget-search">
                        <div class="form-search-widget">
                            <form action="{{ route('products') }}" method="GET">
                                @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
                                @if(request('tag')) <input type="hidden" name="tag" value="{{ request('tag') }}"> @endif
                                <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="widget widget-category st-2">
                        <h4 class="title-widget fl-ctm-1">Category</h4>
                        <div class="list-category">
                            <ul>
                                <li class="fx">
                                    <a href="{{ route('products') }}" class="st wd-ctm {{ !request('category') ? 'active' : '' }}">All</a>
                                    <span class="st">{{ $products->total() }}</span>
                                </li>
                                @foreach($categories as $cat)
                                <li class="fx">
                                    <a href="{{ route('products', ['category' => $cat->slug] + request()->except('category', 'page')) }}"
                                       class="st wd-ctm {{ request('category') === $cat->slug ? 'active' : '' }}">
                                        {{ $cat->name }}
                                    </a>
                                    <span class="st">{{ str_pad($cat->products_count, 2, '0', STR_PAD_LEFT) }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="widget widget-tag st-2">
                        <h4 class="title-widget fl-ctm-1">Popular Tags</h4>
                        <ul class="list-tag">
                            @foreach($tags as $tag)
                            <li>
                                <a href="{{ route('products', ['tag' => $tag->slug] + request()->except('tag', 'page')) }}"
                                   class="f-rubik {{ request('tag') === $tag->slug ? 'active' : '' }}">
                                    {{ $tag->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                <article class="article">
                    <div class="jus-bet mg-bt-35 align-center p-t5">
                        <div class="show-result">
                            <span>Showing {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} Results</span>
                        </div>
                    </div>

                    <div class="wap m-l-30 flex-wrap fx wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms">
                        @forelse($products as $product)
                        <div class="sc-product">
                            @if($product->discounted_price && $product->retail_price && $product->discounted_price < $product->retail_price)
                                @php
                                    $discount = round((1 - $product->discounted_price / $product->retail_price) * 100);
                                @endphp
                                <div class="new sale"><span>{{ $discount }}% off</span></div>
                            @elseif($product->created_at->diffInDays() <= 14)
                                <div class="new"><span>new</span></div>
                            @endif

                            <div class="image">
                                <img src="{{ $product->main_img_url }}" alt="{{ $product->title }}">
                            </div>

                            <h4 class="name">
                                <a href="{{ url($product->slug) }}">{{ $product->title }}</a>
                            </h4>
                            <div class="action">
                                <div class="pricing {{ $product->discounted_price ? 'style' : '' }}">
                                    @if($product->retail_price && $product->discounted_price && $product->discounted_price < $product->retail_price)
                                        <span class="un-pricing">${{ number_format($product->retail_price, 2) }}</span>
                                        <span>${{ number_format($product->discounted_price, 2) }}</span>
                                    @else
                                        <span>${{ number_format($product->retail_price, 2) }}</span>
                                    @endif
                                </div>
                                <ul class="fx">
                                    <li>
                                        <a href="#" class="active btn-add-cart"
                                           data-id="{{ $product->id }}"
                                           data-title="{{ $product->title }}"
                                           title="Add to Cart">
                                            <i class="far fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn-add-wishlist"
                                           data-id="{{ $product->id }}"
                                           data-title="{{ $product->title }}"
                                           title="Add to Wishlist">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url($product->slug) }}" title="View Product">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center py-5">
                            <p>No products found.</p>
                        </div>
                        @endforelse
                    </div>
                </article>

                <div class="themesflat-pagination style fx fx-style2 m-t30">
                    {{ $products->withQueryString()->links('vendor.pagination.aromat') }}
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
(function () {
    var csrfToken = '{{ csrf_token() }}';

    document.querySelectorAll('.btn-add-cart').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            var id    = this.dataset.id;
            var title = this.dataset.title;
            fetch('{{ route("cart.add") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ product_id: id, qty: 1 })
            })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                showToast(data.message || 'Added to cart!', data.success ? 'cart' : 'error');
            });
        });
    });

    document.querySelectorAll('.btn-add-wishlist').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            var id    = this.dataset.id;
            var title = this.dataset.title;
            fetch('{{ route("wishlist.add") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ product_id: id })
            })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                showToast(data.message || 'Added to wishlist!', data.success ? 'wishlist' : 'error');
            });
        });
    });
})();
</script>
@endpush
