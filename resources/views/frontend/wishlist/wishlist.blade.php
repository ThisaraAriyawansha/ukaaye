{{-- Wishlist Section --}}
<section style="padding: 70px 0 100px; background: #fafafa;">
    <div class="container">

        @if(count($wishlist) > 0)
        <div class="wl-labels">
            <span></span>
            <span>Product</span>
            <span>Price</span>
            <span>Stock</span>
            <span>Action</span>
            <span></span>
        </div>

        <div class="wl-list">
            @foreach($wishlist as $item)
            @php $inStock = ($item['status'] === 'in_stock'); @endphp
            <div class="wl-card" data-id="{{ $item['id'] }}">
                <div class="wl-card__image">
                    <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}">
                </div>
                <div class="wl-card__info">
                    <div class="wl-card__name">
                        <a href="{{ url($item['slug']) }}" style="color:inherit;text-decoration:none;">{{ $item['title'] }}</a>
                    </div>
                </div>
                <div class="wl-card__price">LKR {{ number_format($item['price'], 2) }}</div>
                <div class="wl-card__stock">
                    @if($inStock)
                        <span class="wl-badge wl-badge--in">In Stock</span>
                    @else
                        <span class="wl-badge wl-badge--out">Out of Stock</span>
                    @endif
                </div>
                <div class="wl-card__action">
                    @if($inStock)
                    <button class="wl-btn-cart btn-wl-to-cart" type="button" data-id="{{ $item['id'] }}">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                        Add to Cart
                    </button>
                    @else
                    <button class="wl-btn-cart wl-btn-cart--disabled" type="button" disabled>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                        Add to Cart
                    </button>
                    @endif
                </div>
                <div class="wl-card__remove-wrap">
                    <button class="wl-card__remove btn-wl-remove" type="button" title="Remove from wishlist"
                            data-id="{{ $item['id'] }}"
                            data-remove-url="{{ route('wishlist.remove', $item['id']) }}">
                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"><path d="M1 1l10 10M11 1L1 11" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        @else
        <div style="text-align:center;padding:80px 0;">
            <i class="far fa-heart" style="font-size:60px;color:#ddd;display:block;margin-bottom:20px;"></i>
            <h4 style="color:#888;margin-bottom:16px;">Your wishlist is empty</h4>
            <a href="{{ route('products') }}" class="tf-button color-text color-style1">Browse Products</a>
        </div>
        @endif

    </div>
</section>

<style>
.wl-labels,.wl-card{display:grid;grid-template-columns:72px 1fr 120px 130px 180px 44px;align-items:center;column-gap:14px;}
.wl-labels{padding:0 14px 6px;font-family:'Mulish',sans-serif;font-size:11px;font-weight:700;color:#c0c0c0;text-transform:uppercase;letter-spacing:.07em;}
.wl-labels span{text-align:center;}.wl-labels span:nth-child(2){text-align:left;}
.wl-list{display:flex;flex-direction:column;gap:10px;margin-top:4px;}
.wl-card{background:#fff;border-radius:14px;padding:14px;transition:box-shadow .2s;}
.wl-card:hover{box-shadow:0 6px 22px rgba(0,0,0,.07);}
.wl-card__image{width:64px;height:64px;border-radius:50%;background:#f5f5f5;display:flex;align-items:center;justify-content:center;overflow:hidden;flex-shrink:0;}
.wl-card__image img{width:100%;height:100%;object-fit:contain;padding:6px;}
.wl-card__info{min-width:0;}
.wl-card__name{font-family:'Mulish',sans-serif;font-size:14px;font-weight:700;color:#1a1a2e;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
.wl-card__price{font-family:'Mulish',sans-serif;font-size:14px;font-weight:700;color:#1a1a2e;text-align:center;}
.wl-card__stock{text-align:center;}
.wl-badge{display:inline-block;padding:4px 12px;border-radius:20px;font-family:'Mulish',sans-serif;font-size:11px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;}
.wl-badge--in{background:#edfaf3;color:#27ae60;}.wl-badge--out{background:#fff0f0;color:#ff5a5f;}
.wl-card__action{display:flex;justify-content:center;}
.wl-btn-cart{display:inline-flex;align-items:center;gap:7px;padding:9px 18px;background:#ff5a5f;color:#fff;border:none;border-radius:8px;font-family:'Mulish',sans-serif;font-size:12px;font-weight:800;letter-spacing:.05em;text-transform:uppercase;cursor:pointer;white-space:nowrap;transition:background .15s;}
.wl-btn-cart:hover{background:#e04449;}
.wl-btn-cart--disabled{background:#e5e5e5;color:#aaa;cursor:not-allowed;}
.wl-btn-cart--disabled:hover{background:#e5e5e5;}
.wl-card__remove-wrap{display:flex;align-items:center;justify-content:center;}
.wl-card__remove{width:30px;height:30px;border-radius:50%;background:#fff0f0;border:none;color:#ff5a5f;cursor:pointer;display:flex;align-items:center;justify-content:center;padding:0;transition:background .15s,color .15s;}
.wl-card__remove:hover{background:#ff5a5f;color:#fff;}
@media(max-width:960px){.wl-labels,.wl-card{grid-template-columns:64px 1fr 100px 110px 160px 36px;column-gap:10px;}}
@media(max-width:600px){
    .wl-labels{display:none;}
    .wl-card{grid-template-columns:52px 1fr auto;grid-template-rows:auto auto;column-gap:12px;row-gap:10px;padding:12px;}
    .wl-card__image{grid-column:1;grid-row:1;width:50px;height:50px;}
    .wl-card__info{grid-column:2;grid-row:1;}
    .wl-card__remove-wrap{grid-column:3;grid-row:1;align-self:center;}
    .wl-card__price{grid-column:1;grid-row:2;text-align:left;}
    .wl-card__stock{grid-column:2;grid-row:2;text-align:left;}
    .wl-card__action{grid-column:3;grid-row:2;justify-content:flex-end;}
    .wl-btn-cart{padding:7px 12px;font-size:11px;}
}
</style>

@push('scripts')
<script>
(function(){
    var csrfToken='{{ csrf_token() }}';
    document.querySelectorAll('.btn-wl-to-cart').forEach(function(btn){
        btn.addEventListener('click',function(){
            var id=this.dataset.id;
            fetch('{{ route("cart.add") }}',{
                method:'POST',
                headers:{'Content-Type':'application/json','X-CSRF-TOKEN':csrfToken},
                body:JSON.stringify({product_id:id,qty:1})
            })
            .then(function(r){return r.json();})
            .then(function(data){showToast(data.message||'Added to cart!','cart');});
        });
    });
    document.querySelectorAll('.btn-wl-remove').forEach(function(btn){
        btn.addEventListener('click',function(){
            var card=this.closest('.wl-card'),url=this.dataset.removeUrl;
            fetch(url,{method:'DELETE',headers:{'X-CSRF-TOKEN':csrfToken}})
            .then(function(r){return r.json();})
            .then(function(data){
                card.style.transition='opacity .3s';
                card.style.opacity='0';
                setTimeout(function(){card.remove();if(data.count===0)location.reload();},300);
            });
        });
    });
})();
</script>
@endpush
