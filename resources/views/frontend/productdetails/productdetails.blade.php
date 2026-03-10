<section class="tf-section tf-shop-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                <div class="pd-gallery">
                    {{-- Main image --}}
                    <div class="pd-gallery__main wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms">
                        <img src="{{ $product->main_img_url }}" alt="{{ $product->title }}" class="img-change" id="pd-main-img">
                    </div>

                    {{-- Thumbnails (shown only when other images exist) --}}
                    @if($product->other_img && count($product->other_img))
                    <div class="pd-gallery__thumbs wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms">
                        <div class="pd-thumb pd-thumb--active" data-src="{{ $product->main_img_url }}">
                            <img src="{{ $product->main_img_url }}" alt="{{ $product->title }}">
                        </div>
                        @foreach($product->other_img as $img)
                        <div class="pd-thumb" data-src="{{ Storage::url($img) }}">
                            <img src="{{ Storage::url($img) }}" alt="{{ $product->title }}">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                <div class="infor-product-details">
                    <h2 class="name-product">{{ $product->title }}</h2>
                    <div class="fx pricing align-center">
                        <ul class="fx start">
                            @for($i = 0; $i < 5; $i++)
                            <li><span><i class="fas fa-star"></i></span></li>
                            @endfor
                        </ul>
                        <h4>
                            @if($product->discounted_price && $product->discounted_price < $product->retail_price)
                                <del style="color:#aaa;font-size:18px;">${{ number_format($product->retail_price, 2) }}</del>
                                &nbsp;${{ number_format($product->discounted_price, 2) }}
                            @else
                                ${{ number_format($product->retail_price, 2) }}
                            @endif
                        </h4>
                    </div>
                    <div class="divider"></div>
                    <div class="f-mulish f-w500">{!! $product->description !!}</div>
                    <div class="divider style2"></div>
                    <div class="category-tag">
                        @if($product->category)
                        <div class="category fx">
                            <h6>Category</h6><span class="space">:</span>
                            <span>{{ $product->category->name }}</span>
                        </div>
                        @endif
                        @if($product->tags->count())
                        <div class="tag fx">
                            <h6>Tags</h6><span class="space">:</span>
                            <span>{{ $product->tags->pluck('name')->join(', ') }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="divider style3"></div>
                    <div class="product-actions fx">
                        <div class="quantity">
                            <span class="btn-quantity minus-btn"></span>
                            <input type="number" name="number" id="pd-qty" value="1" min="1">
                            <span class="btn-quantity plus-btn"></span>
                        </div>
                        <a href="#" class="tf-button color-text color-style1 btn-pd-cart"
                           data-id="{{ $product->id }}"
                           data-title="{{ $product->title }}">
                            ADD TO CART
                        </a>
                        <span class="heart btn-pd-wishlist" style="cursor:pointer;"
                              data-id="{{ $product->id }}"
                              data-title="{{ $product->title }}">
                            <i class="far fa-heart"></i>
                        </span>
                    </div>

                    {{-- Stock Status --}}
                    <div style="margin-top:12px;">
                        @if($product->product_status === 'in_stock' && $product->qty > 0)
                            <span style="color:#27ae60;font-weight:700;font-size:13px;">&#10003; In Stock ({{ $product->qty }} available)</span>
                        @else
                            <span style="color:#ff5a5f;font-weight:700;font-size:13px;">Out of Stock</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="flat-tabs tab-shop">
                    <ul class="menu-tab">
                        <li class="active"><span>Description</span></li>
                        @if($product->meta_description)
                        <li><span>Information</span></li>
                        @endif
                    </ul>
                    <div class="content-tab">
                        <div class="content-inner">
                            {!! $product->description !!}
                        </div>
                        @if($product->meta_description)
                        <div class="content-inner">
                            {!! $product->meta_description !!}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($relatedProducts->count())
<div class="tf-section tf-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading">Related Products</h2>
            </div>
            <div class="col-md-12">
                <div class="fx m-l-30">
                    @foreach($relatedProducts as $related)
                    <div class="sc-product {{ $loop->first ? 'active' : '' }}">
                        @if($related->discounted_price && $related->discounted_price < $related->retail_price)
                            @php $disc = round((1 - $related->discounted_price / $related->retail_price) * 100); @endphp
                            <div class="new sale"><span>{{ $disc }}% off</span></div>
                        @elseif($related->created_at->diffInDays() <= 14)
                            <div class="new"><span>new</span></div>
                        @endif

                        <div class="image">
                            <img src="{{ $related->main_img_url }}" alt="{{ $related->title }}">
                        </div>
                        <h4 class="name">
                            <a href="{{ url($related->slug) }}">{{ $related->title }}</a>
                        </h4>
                        <div class="action">
                            <div class="pricing {{ $related->discounted_price ? 'style' : '' }}">
                                @if($related->discounted_price && $related->discounted_price < $related->retail_price)
                                    <span class="un-pricing">${{ number_format($related->retail_price, 2) }}</span>
                                    <span>${{ number_format($related->discounted_price, 2) }}</span>
                                @else
                                    <span>${{ number_format($related->retail_price, 2) }}</span>
                                @endif
                            </div>
                            <ul class="fx">
                                <li>
                                    <a href="#" class="active btn-add-cart"
                                       data-id="{{ $related->id }}"
                                       data-title="{{ $related->title }}"
                                       title="Add to Cart">
                                        <i class="far fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn-add-wishlist"
                                       data-id="{{ $related->id }}"
                                       data-title="{{ $related->title }}"
                                       title="Add to Wishlist">
                                        <i class="far fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url($related->slug) }}" title="View Product">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<style>
/* ── Product Gallery ─────────────────────────────── */
.pd-gallery {
    display: flex;
    flex-direction: column;
    gap: 12px;
    position: sticky;
    top: 90px;
}

/* Main image frame */
.pd-gallery__main {
    width: 100%;
    aspect-ratio: 1 / 1;
    background: #f8f8f8;
    border-radius: 18px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1.5px solid #f0f0f0;
}
.pd-gallery__main #pd-main-img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 24px;
    transition: opacity .15s ease;
}

/* Thumbnails strip */
.pd-gallery__thumbs {
    display: flex;
    gap: 10px;
    flex-wrap: nowrap;
    overflow-x: auto;
    padding-bottom: 4px;
    scrollbar-width: thin;
    scrollbar-color: #ddd transparent;
}
.pd-gallery__thumbs::-webkit-scrollbar { height: 4px; }
.pd-gallery__thumbs::-webkit-scrollbar-thumb { background: #ddd; border-radius: 4px; }

/* Individual thumbnail */
.pd-thumb {
    flex-shrink: 0;
    width: 72px;
    height: 72px;
    border-radius: 12px;
    overflow: hidden;
    background: #f8f8f8;
    border: 2px solid transparent;
    cursor: pointer;
    transition: border-color .2s, transform .2s, box-shadow .2s;
    display: flex;
    align-items: center;
    justify-content: center;
}
.pd-thumb img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 6px;
}
.pd-thumb:hover {
    border-color: #ccc;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,.08);
}
.pd-thumb--active {
    border-color: #ff5a5f;
    box-shadow: 0 4px 14px rgba(255,90,95,.18);
}

@media (max-width: 768px) {
    .pd-gallery { position: static; }
    .pd-thumb { width: 60px; height: 60px; }
}
</style>

@push('scripts')
<script>
(function () {
    var csrfToken = '{{ csrf_token() }}';

    // Thumbnail image switcher
    document.querySelectorAll('.pd-thumb').forEach(function (thumb) {
        thumb.addEventListener('click', function () {
            var src = this.dataset.src;
            if (!src) return;
            var mainImg = document.getElementById('pd-main-img');
            mainImg.style.opacity = '0';
            setTimeout(function () {
                mainImg.src = src;
                mainImg.style.opacity = '1';
            }, 150);
            document.querySelectorAll('.pd-thumb').forEach(function (t) { t.classList.remove('pd-thumb--active'); });
            this.classList.add('pd-thumb--active');
        });
    });

    // Product detail add to cart
    var pdCartBtn = document.querySelector('.btn-pd-cart');
    if (pdCartBtn) {
        pdCartBtn.addEventListener('click', function (e) {
            e.preventDefault();
            var id  = this.dataset.id;
            var qty = parseInt(document.getElementById('pd-qty').value) || 1;
            fetch('{{ route("cart.add") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ product_id: id, qty: qty })
            })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                showToast(data.message || 'Added to cart!', 'cart');
            });
        });
    }

    // Product detail add to wishlist
    var pdWishBtn = document.querySelector('.btn-pd-wishlist');
    if (pdWishBtn) {
        pdWishBtn.addEventListener('click', function () {
            var id = this.dataset.id;
            fetch('{{ route("wishlist.add") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ product_id: id })
            })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                showToast(data.message || 'Added to wishlist!', data.success ? 'wishlist' : 'error');
                if (data.success) {
                    pdWishBtn.querySelector('i').classList.replace('far', 'fas');
                }
            });
        });
    }

    // Related product buttons
    document.querySelectorAll('.btn-add-cart').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            var id = this.dataset.id;
            fetch('{{ route("cart.add") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ product_id: id, qty: 1 })
            })
            .then(function (r) { return r.json(); })
            .then(function (data) { showToast(data.message || 'Added to cart!', 'cart'); });
        });
    });

    document.querySelectorAll('.btn-add-wishlist').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            var id = this.dataset.id;
            fetch('{{ route("wishlist.add") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ product_id: id })
            })
            .then(function (r) { return r.json(); })
            .then(function (data) { showToast(data.message || 'Added to wishlist!', data.success ? 'wishlist' : 'error'); });
        });
    });
})();
</script>
@endpush
