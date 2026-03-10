<section class="tf-section" style="padding: 60px 0 100px; ">
    <div class="container">

        @if(session('success'))
            <div style="padding:12px 18px; background:#f0fdf4; border-left:4px solid var(--primary-color); border-radius:8px; font-family:'Mulish',sans-serif; font-size:14px; color:var(--primary-color); margin-bottom:28px;">
                {{ session('success') }}
            </div>
        @endif

        {{-- ── Main Product Layout ──────────────────────────────── --}}
        <div class="row g-5 align-items-start">

            {{-- Gallery Column --}}
            <div class="col-xl-5 col-lg-5 col-md-12 col-12 wow fadeIn animated" data-wow-delay="0.1ms" data-wow-duration="900ms">
                <div class="pd-gallery">
                    <div class="pd-gallery__main">
                        <img id="pd-main-img" src="{{ $product->main_img_url }}" alt="{{ $product->title }}">
                    </div>

                    @if(!empty($product->other_img) && count($product->other_img))
                        <div class="pd-gallery__thumbs">
                            <div class="pd-thumb active" data-img="{{ $product->main_img_url }}" style="background-image:url('{{ $product->main_img_url }}')"></div>
                            @foreach($product->other_img as $img)
                                @php
                                    $thumbUrl = str_starts_with($img, 'assets/')
                                        ? asset($img)
                                        : \Illuminate\Support\Facades\Storage::url($img);
                                @endphp
                                <div class="pd-thumb" data-img="{{ $thumbUrl }}" style="background-image:url('{{ $thumbUrl }}')"></div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            {{-- Info Column --}}
            <div class="col-xl-7 col-lg-7 col-md-12 col-12 wow fadeIn animated" data-wow-delay="0.2ms" data-wow-duration="900ms">
                <div class="pd-info">

                    {{-- Category + Code --}}
                    <div class="pd-info__meta">
                        @if($product->category)
                            <span class="pd-cat">{{ $product->category->name }}</span>
                        @endif
                        @if($product->product_code)
                            <span class="pd-code">SKU: {{ $product->product_code }}</span>
                        @endif
                    </div>

                    <h2 class="pd-info__title">{{ $product->title }}</h2>

                    {{-- Price --}}
                    <div class="pd-info__price">
                        @if($product->discounted_price && $product->discounted_price < $product->retail_price)
                            <span class="pd-price-sale">LKR {{ number_format($product->discounted_price, 2) }}</span>
                            <span class="pd-price-original">LKR {{ number_format($product->retail_price, 2) }}</span>
                            @php $discount = round((($product->retail_price - $product->discounted_price) / $product->retail_price) * 100); @endphp
                            <span class="pd-price-badge">{{ $discount }}% OFF</span>
                        @else
                            <span class="pd-price-sale">LKR {{ number_format($product->retail_price, 2) }}</span>
                        @endif
                    </div>

                    {{-- Stock --}}
                    <div class="pd-info__stock">
                        @if($product->qty > 0)
                            <span class="pd-in-stock">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                In Stock ({{ $product->qty }} available)
                            </span>
                        @else
                            <span class="pd-out-stock">Out of Stock</span>
                        @endif
                    </div>

                    {{-- Short Description --}}
                    @if($product->description)
                        <div class="pd-info__desc">
                            {!! Str::limit(strip_tags($product->description), 280) !!}
                        </div>
                    @endif

                    {{-- Add to Cart --}}
                    @if($product->qty > 0)
                    <form action="{{ route('cart.add') }}" method="POST" class="pd-info__form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="pd-info__form-row">
                            {{-- Qty Stepper --}}
                            <div class="cart_qty_wrapper" style="width:140px; flex-shrink:0;">
                                <button class="cart_qty_decrement" type="button">−</button>
                                <input type="number" name="qty" value="1" min="1" max="{{ $product->qty }}" class="cart_qty_input">
                                <button class="cart_qty_increment" type="button">+</button>
                            </div>

                            <button type="submit" class="pd-btn-cart">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                        </div>
                    </form>
                    @endif

                    {{-- Tags --}}
                    @if($product->tags->count())
                        <div class="pd-info__tags">
                            <span class="pd-tags-label">Tags:</span>
                            @foreach($product->tags as $tag)
                                <a href="{{ route('products') }}?search={{ urlencode($tag->name) }}" class="pd-tag">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>

        {{-- ── Full Description ─────────────────────────────────── --}}
        @if($product->description)
        <div class="row mt-5">
            <div class="col-12">
                <div class="pd-full-desc wow fadeIn animated" data-wow-delay="0.1ms" data-wow-duration="800ms">
                    <h4 class="pd-section-title">Product Description</h4>
                    <div class="pd-desc-body f-rubik">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
        @endif

        {{-- ── Related Products ─────────────────────────────────── --}}
        @if($relatedProducts->count())
        <div class="row mt-5">
            <div class="col-12 mb-4">
                <h4 class="pd-section-title">Related Products</h4>
            </div>

            @foreach($relatedProducts as $related)
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                <div class="product-card wow fadeIn animated" data-wow-delay="0.1ms" data-wow-duration="800ms">
                    <div class="product-card__img-wrap">
                        <a href="{{ url($related->slug) }}">
                            <img src="{{ $related->main_img_url }}" alt="{{ $related->title }}">
                        </a>
                        @if($related->discounted_price && $related->discounted_price < $related->retail_price)
                            @php $dis = round((($related->retail_price - $related->discounted_price) / $related->retail_price) * 100); @endphp
                            <span class="product-card__badge">-{{ $dis }}%</span>
                        @endif
                    </div>
                    <div class="product-card__body">
                        <h5 class="product-card__title">
                            <a href="{{ url($related->slug) }}" class="product-card__title-link">{{ $related->title }}</a>
                        </h5>
                        <div class="product-card__price">
                            @if($related->discounted_price && $related->discounted_price < $related->retail_price)
                                <span class="price-sale">LKR {{ number_format($related->discounted_price, 2) }}</span>
                                <span class="price-original">LKR {{ number_format($related->retail_price, 2) }}</span>
                            @else
                                <span class="price-sale">LKR {{ number_format($related->retail_price, 2) }}</span>
                            @endif
                        </div>
                        <form action="{{ route('cart.add') }}" method="POST" class="product-card__form">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $related->id }}">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" class="product-card__btn">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

    </div>
</section>

<style>
/* ── Gallery ───────────────────────────────────── */
.pd-gallery__main {
    border-radius: 16px;
    overflow: hidden;
    background: #f5f5f5;
    border: 1px solid var(--primary-color);
    height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.pd-gallery__main img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: opacity .3s;
}
.pd-gallery__thumbs {
    display: flex;
    gap: 10px;
    margin-top: 12px;
    flex-wrap: wrap;
}
.pd-thumb {
    width: 72px;
    height: 72px;
    border-radius: 10px;
    background-size: cover;
    background-position: center;
    cursor: pointer;
    border: 2px solid transparent;
    transition: border-color .2s, opacity .2s;
    opacity: .5;
    background-color: #e8e8e8;
}
.pd-thumb:hover, .pd-thumb.active {
    border-color: var(--primary-color);
    opacity: 1;
}

/* ── Info ──────────────────────────────────────── */
.pd-info { display: flex; flex-direction: column; gap: 16px; }
.pd-info__meta { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }

.pd-cat {
    font-family: 'Mulish', sans-serif;
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .07em;
    background: var(--primary-color);
    padding: 3px 12px;
    border-radius: 20px;
    border: 1px solid var(--primary-color);
    color: #ffffff;
}
.pd-code {
    font-family: 'Mulish', sans-serif;
    font-size: 12px;
    color: #666;
    font-weight: 500;
}
.pd-info__title {
    font-size: 28px;
    font-weight: 800;
    line-height: 1.3;
    margin: 0;
    color: #111;
}
.pd-info__price { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
.pd-price-sale {
    font-family: 'Mulish', sans-serif;
    font-size: 26px;
    font-weight: 900;
}
.pd-price-original {
    font-family: 'Mulish', sans-serif;
    font-size: 17px;
    font-weight: 500;
    color: #555;
    text-decoration: line-through;
}
.pd-price-badge {
    font-family: 'Mulish', sans-serif;
    font-size: 11px;
    font-weight: 800;
    color: #fff;
    background: #c0392b;
    padding: 3px 10px;
    border-radius: 20px;
}
.pd-in-stock {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-family: 'Mulish', sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: var(--primary-color);
}
.pd-out-stock {
    font-family: 'Mulish', sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: #e05555;
}
.pd-info__desc {
    font-family: 'Mulish', sans-serif;
    font-size: 14px;
    line-height: 1.7;
    color: #444;
}

/* ── Form row ──────────────────────────────────── */
.pd-info__form-row {
    display: flex;
    gap: 12px;
    align-items: center;
    flex-wrap: wrap;
}
.pd-btn-cart {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 0 32px;
    height: 48px;
    background: var(--primary-color);
    color: #fff;
    border: 1px solid var(--primary-color);
    border-radius: 8px;
    font-family: 'Mulish', sans-serif;
    font-size: 14px;
    font-weight: 800;
    cursor: pointer;
    transition: background .2s, box-shadow .2s;
    letter-spacing: .04em;
    box-shadow: 0 4px 16px rgba(0, 87, 183, 0.35);
}
.pd-btn-cart:hover {
    background: var(--primary-color);
    box-shadow: 0 6px 22px rgba(18, 65, 121, 0.55);
}

/* ── Tags ──────────────────────────────────────── */
.pd-info__tags { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
.pd-tags-label {
    font-family: 'Mulish', sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: #666;
}
.pd-tag {
    font-family: 'Mulish', sans-serif;
    font-size: 12px;
    padding: 3px 12px;
    background: #f0f0f0;
    border: 1px solid #ddd;
    border-radius: 20px;
    color: #444;
    text-decoration: none;
    transition: background .2s, color .2s, border-color .2s;
}
.pd-tag:hover {
    background: var(--primary-color);
    color: #fff;
    border-color: var(--primary-color);
}

/* ── Section titles ────────────────────────────── */
.pd-section-title {
    font-family: 'Mulish', sans-serif;
    font-size: 20px;
    font-weight: 800;
    color: #111;
    padding-bottom: 12px;
    border-bottom: 2px solid var(--primary-color);
    margin-bottom: 20px;
}

/* ── Description block ─────────────────────────── */
.pd-full-desc {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 16px;
    padding: 32px;
}
.pd-desc-body {
    font-size: 15px;
    line-height: 1.8;
    color: #444;
}
.pd-desc-body p  { color: #444; }
.pd-desc-body h1,
.pd-desc-body h2,
.pd-desc-body h3,
.pd-desc-body h4 { color: #111; }
.pd-desc-body a  { color: var(--primary-color); }
.pd-desc-body strong { color: #222; }

/* ── Related Product Card ──────────────────────── */
.product-card {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 16px;
    overflow: hidden;
    transition: box-shadow .25s, transform .25s, border-color .25s;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.product-card:hover {
    box-shadow: 0 10px 36px rgba(0,0,0,.12);
    transform: translateY(-4px);
    border-color: var(--primary-color);
}
.product-card__img-wrap {
    position: relative;
    height: 200px;
    overflow: hidden;
    background: #f5f5f5;
}
.product-card__img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .4s;
}
.product-card:hover .product-card__img-wrap img { transform: scale(1.06); }
.product-card__badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #c0392b;
    color: #fff;
    font-family: 'Mulish', sans-serif;
    font-size: 11px;
    font-weight: 800;
    padding: 3px 9px;
    border-radius: 20px;
    letter-spacing: .04em;
}
.product-card__body {
    padding: 16px 18px 18px;
    display: flex;
    flex-direction: column;
    flex: 1;
    gap: 6px;
}
.product-card__title {
    font-family: 'Mulish', sans-serif;
    font-size: 14px;
    font-weight: 700;
    margin: 0;
}
.product-card__title-link {
    color: #111;
    text-decoration: none;
    transition: color .2s;
}
.product-card__title-link:hover { color: var(--primary-color); }

.product-card__price { display: flex; align-items: center; gap: 8px; }
.price-sale {
    font-family: 'Mulish', sans-serif;
    font-size: 15px;
    font-weight: 800;
}
.price-original {
    font-family: 'Mulish', sans-serif;
    font-size: 12px;
    font-weight: 500;
    color: #555;
    text-decoration: line-through;
}
.product-card__form { margin-top: auto; padding-top: 10px; }
.product-card__btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    padding: 9px 0;
    background: transparent;
    border: 1.5px solid var(--primary-color);
    border-radius: 8px;
    font-family: 'Mulish', sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: var(--primary-color);
    cursor: pointer;
    transition: background .2s, color .2s;
}
.product-card__btn:hover {
    background: var(--primary-color);
    color: #fff;
}

/* ── Qty Stepper ───────────────────────────────── */
.cart_qty_wrapper {
    display: flex;
    align-items: stretch;
    height: 48px;
    border-radius: 9px;
    background: #f0f0f0;
    overflow: hidden;
    box-sizing: border-box;
}
.cart_qty_decrement,
.cart_qty_increment {
    flex: 0 0 38px;
    width: 38px;
    height: 48px;
    background: #f0f0f0;
    border: none;
    font-size: 22px;
    color: var(--primary-color);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background .15s, color .15s;
    font-weight: 700;
}
.cart_qty_decrement:hover,
.cart_qty_increment:hover {
    background: var(--primary-color);
    color: #fff;
}
.cart_qty_input {
    flex: 1;
    min-width: 0;
    height: 48px;
    border: none;
    border-left: 1.5px solid #ddd;
    border-right: 1.5px solid #ddd;
    text-align: center;
    font-family: 'Mulish', sans-serif;
    font-size: 15px;
    font-weight: 700;
    color: #111;
    background: #f0f0f0;
    padding: 0 4px;
    outline: none;
    -moz-appearance: textfield;
}
.cart_qty_input::-webkit-inner-spin-button,
.cart_qty_input::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }

/* ── Mobile ≤767px ─────────────────────────────── */
@media (max-width: 767px) {
    .pd-gallery__main { height: 280px; }
    .pd-info__title   { font-size: 22px; }
    .pd-price-sale    { font-size: 22px; }
    .pd-btn-cart      { padding: 0 20px; font-size: 13px; }
    .pd-full-desc     { padding: 20px 16px; }
    .pd-info__form-row { gap: 10px; }
    .cart_qty_wrapper { height: 44px; }
    .cart_qty_decrement,
    .cart_qty_increment { height: 44px; }
    .cart_qty_input   { height: 44px; font-size: 14px; }
}
</style>

<script>
// Gallery thumbs
document.querySelectorAll('.pd-thumb').forEach(function(thumb) {
    thumb.addEventListener('click', function() {
        document.getElementById('pd-main-img').src = this.dataset.img;
        document.querySelectorAll('.pd-thumb').forEach(function(t) { t.classList.remove('active'); });
        this.classList.add('active');
    });
});

// Qty stepper
document.querySelectorAll('.cart_qty_decrement').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var input = this.closest('.cart_qty_wrapper').querySelector('.cart_qty_input');
        input.value = Math.max(1, parseInt(input.value || 1) - 1);
    });
});
document.querySelectorAll('.cart_qty_increment').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var input = this.closest('.cart_qty_wrapper').querySelector('.cart_qty_input');
        var max = parseInt(input.max) || 9999;
        input.value = Math.min(max, parseInt(input.value || 1) + 1);
    });
});

// Add to Cart — AJAX for all cart forms
(function () {
    var csrfToken = '{{ csrf_token() }}';

    document.querySelectorAll('form[action="{{ route("cart.add") }}"]').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var productId = form.querySelector('[name="product_id"]').value;
            var qtyInput  = form.querySelector('[name="qty"]');
            var qty       = qtyInput ? qtyInput.value : 1;
            var btn       = form.querySelector('button[type="submit"]');
            btn.disabled  = true;

            fetch('{{ route("cart.add") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ product_id: productId, qty: qty })
            })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                showToast(data.message || 'Added to cart!', data.success ? 'cart' : 'error');
                if (data.success && data.count !== undefined) updateCartCount(data.count);
                btn.disabled = false;
            })
            .catch(function () {
                showToast('Something went wrong.', 'error');
                btn.disabled = false;
            });
        });
    });
})();
</script>