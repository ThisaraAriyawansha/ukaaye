{{-- Cart Section --}}
<section style="padding: 70px 0 100px;">
    <div class="container">
        @if(count($cart) > 0)
        <div class="cart-wrapper">

            {{-- Cart Items --}}
            <div class="cart-items">

                <div class="cart-labels">
                    <span></span>
                    <span>Product</span>
                    <span>Price</span>
                    <span>Quantity</span>
                    <span>Subtotal</span>
                    <span></span>
                </div>

                @foreach($cart as $item)
                @php $subtotal = $item['price'] * $item['qty']; @endphp
                <div class="cart-card" data-id="{{ $item['id'] }}">
                    <div class="cart-card__image">
                        <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}">
                    </div>
                    <div class="cart-card__info">
                        <div class="cart-card__name">
                            <a href="{{ url($item['slug']) }}" style="color:inherit;text-decoration:none;">{{ $item['title'] }}</a>
                        </div>
                        <div class="cart-card__price-mobile">LKR {{ number_format($item['price'], 2) }}</div>
                    </div>
                    <div class="cart-card__price">LKR {{ number_format($item['price'], 2) }}</div>
                    <div class="cart_qty_wrapper">
                        <button class="cart_qty_decrement" type="button">−</button>
                        <input type="text" inputmode="numeric" pattern="[0-9]*"
                               value="{{ $item['qty'] }}" class="cart_qty_input"
                               data-id="{{ $item['id'] }}"
                               data-update-url="{{ route('cart.update', $item['id']) }}">
                        <button class="cart_qty_increment" type="button">+</button>
                    </div>
                    <div class="cart-card__subtotal" data-subtotal>LKR {{ number_format($subtotal, 2) }}</div>
                    <div class="cart-card__remove-wrap">
                        <button class="cart-card__remove" type="button" title="Remove item"
                                data-id="{{ $item['id'] }}"
                                data-remove-url="{{ route('cart.remove', $item['id']) }}">
                            <svg width="10" height="10" viewBox="0 0 12 12" fill="none"><path d="M1 1l10 10M11 1L1 11" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>
                        </button>
                    </div>
                </div>
                @endforeach

            </div>

            {{-- Cart Totals --}}
            @php
                $cartSubtotal = collect($cart)->sum(fn($i) => $i['price'] * $i['qty']);
                $shipping     = 200;
                $total        = $cartSubtotal + $shipping;
            @endphp
            <div class="cart-totals">
                <h5 class="totals-title">Cart Totals</h5>
                <div class="totals-row">
                    <span class="totals-label">Subtotal</span>
                    <span class="totals-value" id="cart-subtotal">LKR {{ number_format($cartSubtotal, 2) }}</span>
                </div>
                <div class="totals-row">
                    <span class="totals-label">Shipping</span>
                    <span class="totals-value">LKR {{ number_format($shipping, 2) }}</span>
                </div>
                <div class="totals-row totals-row--total">
                    <span class="totals-label">Total</span>
                    <span class="totals-value totals-value--total" id="cart-total">LKR {{ number_format($total, 2) }}</span>
                </div>
                <a href="{{ route('checkout') }}" class="btn-checkout">Proceed to Checkout</a>
                <a href="{{ route('products') }}" class="btn-continue">&#8592; Continue Shopping</a>
            </div>

        </div>
        @else
        <div style="text-align:center;padding:80px 0;">
            <i class="far fa-shopping-cart" style="font-size:60px;color:#ddd;display:block;margin-bottom:20px;"></i>
            <h4 style="color:#888;margin-bottom:16px;">Your cart is empty</h4>
            <a href="{{ route('products') }}" class="tf-button color-text color-style1">Browse Products</a>
        </div>
        @endif
    </div>
</section>

<style>
.cart-labels,
.cart-card {
    display: grid;
    grid-template-columns: 72px 1fr 110px 148px 120px 44px;
    align-items: center;
    column-gap: 14px;
}
.cart-wrapper { display: flex; align-items: flex-start; gap: 28px; flex-wrap: wrap; }
.cart-items { flex: 1; min-width: 0; display: flex; flex-direction: column; gap: 10px; }
.cart-labels { padding: 0 14px 6px; font-family: 'Mulish', sans-serif; font-size: 11px; font-weight: 700; color: #c0c0c0; text-transform: uppercase; letter-spacing: .07em; }
.cart-labels span { text-align: center; }
.cart-labels span:nth-child(2) { text-align: left; }
.cart-card { background: #fff; border-radius: 14px; padding: 14px; transition: box-shadow .2s; }
.cart-card:hover { box-shadow: 0 6px 22px rgba(0,0,0,.07); }
.cart-card__image { width: 64px; height: 64px; border-radius: 50%; background: #f5f5f5; display: flex; align-items: center; justify-content: center; overflow: hidden; }
.cart-card__image img { width: 100%; height: 100%; object-fit: contain; padding: 6px; }
.cart-card__info { min-width: 0; }
.cart-card__name { font-family: 'Mulish', sans-serif; font-size: 14px; font-weight: 700; color: #1a1a2e; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin-bottom: 3px; }
.cart-card__price-mobile { display: none; }
.cart-card__price { font-family: 'Mulish', sans-serif; font-size: 14px; font-weight: 600; color: #444; text-align: center; }
.cart_qty_wrapper { display: flex; align-items: stretch; justify-content: center; height: 36px; border: 1.5px solid #e8e8e8; border-radius: 9px; background: #fff; overflow: hidden; width: 100%; box-sizing: border-box; }
.cart_qty_decrement, .cart_qty_increment { flex: 0 0 34px; width: 34px; height: 36px; background: transparent; border: none; font-size: 20px; color: #999; cursor: pointer; display: flex; align-items: center; justify-content: center; padding: 0; transition: background .15s, color .15s; }
.cart_qty_decrement:hover, .cart_qty_increment:hover { background: #ff5a5f; color: #fff; }
.cart_qty_input { flex: 1; min-width: 44px; width: auto; height: 36px; border: none; border-left: 1.5px solid #e8e8e8; border-right: 1.5px solid #e8e8e8; text-align: center; font-family: 'Mulish', sans-serif; font-size: 14px; font-weight: 700; color: #1a1a2e; background: #fff; padding: 0 6px; outline: none; box-sizing: border-box; text-decoration: none; }
.cart-card__subtotal { font-family: 'Mulish', sans-serif; font-size: 14px; font-weight: 700; color: #1a1a2e; text-align: center; }
.cart-card__remove-wrap { display: flex; align-items: center; justify-content: center; }
.cart-card__remove { width: 30px; height: 30px; border-radius: 50%; background: #fff0f0; border: none; color: #ff5a5f; cursor: pointer; display: flex; align-items: center; justify-content: center; padding: 0; transition: background .15s, color .15s; }
.cart-card__remove:hover { background: #ff5a5f; color: #fff; }
.cart-totals { width: 290px; flex-shrink: 0; background: #fff; border-radius: 14px; padding: 26px 22px; }
.totals-title { font-family: 'Mulish', sans-serif; font-size: 19px; font-weight: 800; color: #1a1a2e; margin: 0 0 14px; }
.totals-row { display: flex; justify-content: space-between; align-items: center; padding: 11px 0; border-bottom: 1px solid #f3f3f3; }
.totals-row--total { border-bottom: none; padding-bottom: 18px; }
.totals-label { font-family: 'Mulish', sans-serif; font-size: 14px; color: #888; font-weight: 500; }
.totals-value { font-family: 'Mulish', sans-serif; font-size: 14px; font-weight: 600; color: #1a1a2e; }
.totals-row--total .totals-label { font-size: 15px; font-weight: 800; color: #1a1a2e; }
.totals-value--total { font-size: 17px; font-weight: 800; }
.btn-checkout { display: block; text-align: center; padding: 14px 0; background: #ff5a5f; color: #fff; border-radius: 8px; font-family: 'Mulish', sans-serif; font-size: 13px; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; text-decoration: none; transition: background .2s; }
.btn-checkout:hover { background: #e04449; }
.btn-continue { display: block; text-align: center; margin-top: 12px; font-family: 'Mulish', sans-serif; font-size: 13px; font-weight: 600; color: #b250fe; text-decoration: none; }
.btn-continue:hover { text-decoration: underline; }
@media (max-width: 960px) {
    .cart-wrapper { flex-direction: column; }
    .cart-totals { width: 100%; box-sizing: border-box; }
    .cart-labels, .cart-card { grid-template-columns: 64px 1fr 90px 130px 100px 36px; column-gap: 10px; }
}
@media (max-width: 560px) {
    .cart-labels { display: none; }
    .cart-card { grid-template-columns: 52px 1fr auto; grid-template-rows: auto auto; column-gap: 12px; row-gap: 10px; padding: 12px; }
    .cart-card__image { grid-column: 1; grid-row: 1; width: 50px; height: 50px; }
    .cart-card__info { grid-column: 2; grid-row: 1; }
    .cart-card__remove-wrap { grid-column: 3; grid-row: 1; align-self: center; }
    .cart-card__price { display: none; }
    .cart_qty_wrapper { grid-column: 2; grid-row: 2; width: auto; justify-content: flex-start; }
    .cart-card__subtotal { grid-column: 3; grid-row: 2; text-align: right; white-space: nowrap; align-self: center; }
    .cart-card__price-mobile { display: block; font-family: 'Mulish', sans-serif; font-size: 12px; font-weight: 600; color: #aaa; margin-top: 2px; }
}
</style>

@push('scripts')
<script>
(function () {
    var csrfToken = '{{ csrf_token() }}';
    var shipping  = 200;

    function recalcTotals() {
        var subtotal = 0;
        document.querySelectorAll('.cart-card').forEach(function (card) {
            var price    = parseFloat(card.querySelector('.cart-card__price').textContent.replace('LKR', '').replace(/,/g, '').trim());
            var qty      = parseInt(card.querySelector('.cart_qty_input').value) || 1;
            var sub      = price * qty;
            subtotal += sub;
            card.querySelector('[data-subtotal]').textContent = 'LKR ' + sub.toLocaleString('en-US', { minimumFractionDigits: 2 });
        });
        document.getElementById('cart-subtotal').textContent = 'LKR ' + subtotal.toLocaleString('en-US', { minimumFractionDigits: 2 });
        document.getElementById('cart-total').textContent    = 'LKR ' + (subtotal + shipping).toLocaleString('en-US', { minimumFractionDigits: 2 });
    }

    // Digits-only on qty inputs
    document.querySelectorAll('.cart_qty_input').forEach(function (input) {
        input.addEventListener('keydown', function (e) {
            var allowed = ['Backspace','Delete','ArrowLeft','ArrowRight','Tab'];
            if (allowed.indexOf(e.key) === -1 && !/^[0-9]$/.test(e.key)) {
                e.preventDefault();
            }
        });
        input.addEventListener('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value === '' || parseInt(this.value) < 1) this.value = 1;
            updateCartQty(this);
        });
    });

    // Qty stepper
    document.querySelectorAll('.cart_qty_decrement').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var input = this.closest('.cart_qty_wrapper').querySelector('.cart_qty_input');
            var newVal = Math.max(1, parseInt(input.value || 1) - 1);
            input.value = newVal;
            updateCartQty(input);
        });
    });
    document.querySelectorAll('.cart_qty_increment').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var input = this.closest('.cart_qty_wrapper').querySelector('.cart_qty_input');
            input.value = parseInt(input.value || 1) + 1;
            updateCartQty(input);
        });
    });

    function updateCartQty(input) {
        recalcTotals();
        var sentQty = parseInt(input.value);
        fetch(input.dataset.updateUrl, {
            method: 'PATCH',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
            body: JSON.stringify({ qty: sentQty })
        })
        .then(function (r) { return r.json(); })
        .then(function (data) {
            // Only warn if server capped the qty below what was actually sent
            if (data.qty && data.qty < sentQty) {
                input.value = data.qty;
                recalcTotals();
                showToast('Max available stock reached.', 'error');
            }
        });
    }

    // Remove item
    document.querySelectorAll('.cart-card__remove').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var card = this.closest('.cart-card');
            var url  = this.dataset.removeUrl;
            fetch(url, {
                method: 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrfToken }
            })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                card.remove();
                recalcTotals();
                if (data.count === 0) location.reload();
            });
        });
    });
})();
</script>
@endpush
