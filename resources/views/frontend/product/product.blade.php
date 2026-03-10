{{-- Product List Section --}}
<section style=" padding:70px 0 110px;">
    <div class="container">
        <div class="row">

            {{-- ─── Sidebar ──────────────────────────────────────────── --}}
            <div class="col-xl-3 col-lg-3 col-md-12 col-12" style="margin-bottom:32px;">

                {{-- Search --}}
                <div style="background:#fff; border:1px solid #e0e0e0; border-radius:14px; padding:24px 22px; margin-bottom:20px;">
                    <p style="font-family:'Mulish',sans-serif; font-size:11px; font-weight:800; text-transform:uppercase; letter-spacing:.1em; color:var(--primary-color); margin:0 0 14px;">Search</p>
                    <form action="{{ route('products') }}" method="GET" style="display:flex; gap:0; border:1.5px solid #ddd; border-radius:8px; overflow:hidden;">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <input
                            type="text"
                            name="search"
                            placeholder="Search products..."
                            value="{{ request('search') }}"
                            style="flex:1; background:#f9f9f9; border:none; outline:none; padding:10px 14px; font-family:'Mulish',sans-serif; font-size:13px; color:#111; min-width:0;"
                        >
                        <button
                            type="submit"
                            style="background:var(--primary-color); border:none; padding:0 16px; color:#fff; cursor:pointer; font-size:13px; flex-shrink:0;"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                <circle cx="11" cy="11" r="7" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                                <path d="M16.5 16.5L21 21" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </form>
                </div>

                {{-- Categories --}}
                @if($categories->count())
                <div style="background:#fff; border:1px solid #e0e0e0; border-radius:14px; padding:24px 22px;">
                    <p style="font-family:'Mulish',sans-serif; font-size:11px; font-weight:800; text-transform:uppercase; letter-spacing:.1em; color:var(--primary-color); margin:0 0 16px;">Categories</p>

                    {{-- All Products --}}
                    <a
                        href="{{ route('products') }}"
                        style="display:flex; justify-content:space-between; align-items:center; padding:10px 14px; border-radius:8px; margin-bottom:6px; text-decoration:none; font-family:'Mulish',sans-serif; font-size:13px; font-weight:{{ !request('category') ? '800' : '500' }}; color:{{ !request('category') ? '#fff' : '#444' }}; background:{{ !request('category') ? 'var(--primary-color)' : 'transparent' }}; transition:background .2s;"
                    >
                        <span>All Products</span>
                        <span style="font-size:11px; font-weight:700; background:{{ !request('category') ? 'rgba(255,255,255,.2)' : '#eee' }}; color:{{ !request('category') ? '#fff' : '#555' }}; padding:2px 8px; border-radius:20px;">{{ str_pad($categories->sum('products_count'), 2, '0', STR_PAD_LEFT) }}</span>
                    </a>

                    {{-- Category Items --}}
                    @foreach($categories as $cat)
                    @php $active = request('category') === $cat->slug; @endphp
                    <a
                        href="{{ route('products', ['category' => $cat->slug]) }}"
                        style="display:flex; justify-content:space-between; align-items:center; padding:10px 14px; border-radius:8px; margin-bottom:6px; text-decoration:none; font-family:'Mulish',sans-serif; font-size:13px; font-weight:{{ $active ? '800' : '500' }}; color:{{ $active ? '#fff' : '#444' }}; background:{{ $active ? 'var(--primary-color)' : 'transparent' }};"
                    >
                        <span>{{ $cat->name }}</span>
                        <span style="font-size:11px; font-weight:700; background:{{ $active ? 'rgba(255,255,255,.2)' : '#eee' }}; color:{{ $active ? '#fff' : '#555' }}; padding:2px 8px; border-radius:20px;">{{ str_pad($cat->products_count, 2, '0', STR_PAD_LEFT) }}</span>
                    </a>
                    @endforeach
                </div>
                @endif

            </div>

            {{-- ─── Product Grid ──────────────────────────────────────── --}}
            <div class="col-xl-9 col-lg-9 col-md-12 col-12">

                {{-- Success Alert --}}
                @if(session('success'))
                    <div style="padding:12px 18px; background:#f0fdf4; border-left:3px solid var(--primary-color); border-radius:8px; font-family:'Mulish',sans-serif; font-size:14px; color:var(--primary-color); margin-bottom:24px;">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Grid --}}
                @if($products->count())
                <div class="row g-4">
                    @foreach($products as $product)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                        {{-- Card --}}
                        <div
                            class="gwl-pcard"
                            style="background:#fff; border:1px solid #e0e0e0; border-radius:16px; overflow:hidden; display:flex; flex-direction:column; height:100%; transition:border-color .25s, transform .25s;"
                        >
                            {{-- Image --}}
                            <div style="position:relative; height:220px; overflow:hidden; background:#f5f5f5; flex-shrink:0;">
                                <a href="{{ url($product->slug) }}" style="display:block; height:100%;">
                                    <img
                                        src="{{ $product->main_img_url }}"
                                        alt="{{ $product->title }}"
                                        class="gwl-pcard-img"
                                        style="width:100%; height:100%; object-fit:cover; display:block; transition:transform .4s;"
                                    >
                                </a>

                                {{-- Discount Badge --}}
                                @if($product->discounted_price && $product->discounted_price < $product->retail_price)
                                    @php $disc = round((($product->retail_price - $product->discounted_price) / $product->retail_price) * 100); @endphp
                                    <span style="position:absolute; top:12px; left:12px; background:var(--primary-color); color:#fff; font-family:'Mulish',sans-serif; font-size:10px; font-weight:800; padding:3px 10px; border-radius:20px; letter-spacing:.05em;">-{{ $disc }}%</span>
                                @endif

                                {{-- View overlay --}}
                                <a
                                    href="{{ url($product->slug) }}"
                                    style="position:absolute; inset:0; display:flex; align-items:center; justify-content:center; background:rgba(0,0,0,.5); opacity:0; transition:opacity .25s; font-family:'Mulish',sans-serif; font-size:12px; font-weight:800; color:#fff; letter-spacing:.08em; text-decoration:none; text-transform:uppercase;"
                                    class="gwl-pcard-overlay"
                                >
                                    View Details
                                </a>
                            </div>

                            {{-- Body --}}
                            <div style="padding:18px 20px 20px; display:flex; flex-direction:column; flex:1; gap:8px;">

                                {{-- Category --}}
                                @if($product->category)
                                    <span style="font-family:'Mulish',sans-serif; font-size:10px; font-weight:800; text-transform:uppercase; letter-spacing:.1em; color:var(--primary-color);">{{ $product->category->name }}</span>
                                @endif

                                {{-- Title --}}
                                <h5 style="font-family:'Mulish',sans-serif; font-size:15px; font-weight:700; color:#111; margin:0; line-height:1.4;">
                                    <a href="{{ url($product->slug) }}" style="color:#111; text-decoration:none;">{{ $product->title }}</a>
                                </h5>

                                {{-- Divider --}}
                                <div style="height:1px; background:#e8e8e8; margin:2px 0;"></div>

                                {{-- Price --}}
                                <div style="display:flex; align-items:center; gap:10px; flex-wrap:wrap;">
                                    @if($product->discounted_price && $product->discounted_price < $product->retail_price)
                                        <span style="font-family:'Mulish',sans-serif; font-size:17px; font-weight:900; color:#111;">LKR {{ number_format($product->discounted_price, 2) }}</span>
                                        <span style="font-family:'Mulish',sans-serif; font-size:13px; font-weight:500; color:#999; text-decoration:line-through;">LKR {{ number_format($product->retail_price, 2) }}</span>
                                    @else
                                        <span style="font-family:'Mulish',sans-serif; font-size:17px; font-weight:900; color:#111;">LKR {{ number_format($product->retail_price, 2) }}</span>
                                    @endif
                                </div>

                                {{-- Stock indicator --}}
                                @if($product->qty > 0)
                                    <span style="font-family:'Mulish',sans-serif; font-size:11px; font-weight:700; color:var(--primary-color);">&#10003; In Stock</span>
                                @else
                                    <span style="font-family:'Mulish',sans-serif; font-size:11px; font-weight:700; color:#f87171;">Out of Stock</span>
                                @endif

                                {{-- Add to Cart --}}
                                <form action="{{ route('cart.add') }}" method="POST" style="margin-top:auto; padding-top:10px;">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="qty" value="1">
                                    <button
                                        type="submit"
                                        class="gwl-cart-btn"
                                        style="display:flex; align-items:center; justify-content:center; gap:8px; width:100%; padding:11px 0; background:transparent; border:1.5px solid var(--primary-color); border-radius:8px; font-family:'Mulish',sans-serif; font-size:13px; font-weight:700; color:var(--primary-color); cursor:pointer; letter-spacing:.04em; transition:background .2s, color .2s, border-color .2s;"
                                        {{ $product->qty <= 0 ? 'disabled' : '' }}
                                    >
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                                        Add to Cart
                                    </button>
                                </form>

                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
                @else
                    {{-- Empty State --}}
                    <div style="text-align:center; padding:80px 0;">
                        <div style="width:70px; height:70px; background:#fff; border:1.5px solid #e0e0e0; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 20px;">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                        </div>
                        <p style="font-family:'Mulish',sans-serif; font-size:17px; font-weight:700; color:#444; margin:0 0 20px;">No products found.</p>
                        @if(request('search') || request('category'))
                            <a href="{{ route('products') }}" style="display:inline-block; padding:10px 28px; background:var(--primary-color); color:#fff; border-radius:8px; font-family:'Mulish',sans-serif; font-size:13px; font-weight:700; text-decoration:none; letter-spacing:.05em;">Clear Filters</a>
                        @endif
                    </div>
                @endif

                {{-- Pagination --}}
@if($products->hasPages())
                    <div style="display:flex; justify-content:center; align-items:center; gap:8px; margin-top:48px; flex-wrap:wrap;">

                        {{-- Prev --}}
                        @if($products->onFirstPage())
                            <span style="width:38px; height:38px; display:flex; align-items:center; justify-content:center; border-radius:8px; background:#fff; border:1px solid #ddd; cursor:not-allowed;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M6.5 1.5L3 5L6.5 8.5" stroke="#bbb" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        @else
                            <a href="{{ $products->previousPageUrl() }}" style="width:38px; height:38px; display:flex; align-items:center; justify-content:center; border-radius:8px; background:#fff; border:1px solid var(--primary-color); text-decoration:none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M6.5 1.5L3 5L6.5 8.5" stroke="var(--primary-color)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                        @endif

                        {{-- Pages --}}
                        @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if($products->currentPage() === $page)
                                <span style="width:38px; height:38px; display:flex; align-items:center; justify-content:center; border-radius:8px; background:var(--primary-color); border:1px solid var(--primary-color); color:#fff; font-family:'Mulish',sans-serif; font-size:13px; font-weight:800;">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" style="width:38px; height:38px; display:flex; align-items:center; justify-content:center; border-radius:8px; background:#fff; border:1px solid #ddd; color:#333; font-family:'Mulish',sans-serif; font-size:13px; font-weight:600; text-decoration:none;">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}" style="width:38px; height:38px; display:flex; align-items:center; justify-content:center; border-radius:8px; background:#fff; border:1px solid var(--primary-color); text-decoration:none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M3.5 1.5L7 5L3.5 8.5" stroke="var(--primary-color)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                        @else
                            <span style="width:38px; height:38px; display:flex; align-items:center; justify-content:center; border-radius:8px; background:#fff; border:1px solid #ddd; cursor:not-allowed;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M3.5 1.5L7 5L3.5 8.5" stroke="#bbb" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                        @endif

                    </div>
                @endif

            </div>
        </div>
    </div>
</section>

<style>
.gwl-pcard:hover {
    border-color: var(--primary-color) !important;
    transform: translateY(-5px);
}
.gwl-pcard:hover .gwl-pcard-img {
    transform: scale(1.07);
}
.gwl-pcard:hover .gwl-pcard-overlay {
    opacity: 1 !important;
}
.gwl-cart-btn:hover {
    background: var(--primary-color) !important;
    color: #fff !important;
    border-color: var(--primary-color) !important;
}
.gwl-cart-btn:disabled {
    opacity: .4;
    cursor: not-allowed !important;
}
@media (max-width: 767px) {
    .gwl-pcard > div:first-child { height: 180px !important; }
}
</style>
