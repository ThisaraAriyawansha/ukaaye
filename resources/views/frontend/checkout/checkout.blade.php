{{-- Checkout Section --}}
<section style="padding: 70px 0 100px; background: #fafafa;">
    <div class="container">
        <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
        @csrf
        <div class="co-wrapper">

            {{-- LEFT: Billing Details --}}
            <div class="co-form-col">
    <div class="co-card">
        <h4 class="co-card__title">Billing Details</h4>

        @if(session('error'))
        <div style="background:#fff3f3; border:1px solid #ffcdd2; border-radius:8px; padding:12px 16px; margin-bottom:16px; color:#c62828; font-size:13px;">
            {{ session('error') }}
        </div>
        @endif

        @if($errors->any())
        <div style="background:#fff3f3; border:1px solid #ffcdd2; border-radius:8px; padding:12px 16px; margin-bottom:16px; color:#c62828; font-size:13px;">
            <ul style="margin:0; padding-left:18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Name Row --}}
        <div class="co-row-2">
            <div class="co-field">
                <label class="co-label">First Name <span class="co-required">*</span></label>
                <input type="text" name="first_name" class="co-input" placeholder="Kamal" value="{{ old('first_name') }}" required>
            </div>
            <div class="co-field">
                <label class="co-label">Last Name <span class="co-required">*</span></label>
                <input type="text" name="last_name" class="co-input" placeholder="Perera" value="{{ old('last_name') }}" required>
            </div>
        </div>

        {{-- Town / City --}}
        <div class="co-field">
            <label class="co-label">Town / City <span class="co-required">*</span></label>
            <input type="text" name="town" class="co-input" placeholder="Colombo" value="{{ old('town') }}" required>
        </div>

        {{-- Address --}}
        <div class="co-field">
            <label class="co-label">Address <span class="co-required">*</span></label>
            <input type="text" name="address" class="co-input" placeholder="No. 45, Galle Road" value="{{ old('address') }}" required>
        </div>

        {{-- State & ZIP --}}
        <div class="co-row-2">
            <div class="co-field">
                <label class="co-label">State <span class="co-required">*</span></label>
                <input type="text" name="state" class="co-input" placeholder="Western Province" value="{{ old('state') }}" required>
            </div>
            <div class="co-field">
                <label class="co-label">ZIP Code <span class="co-required">*</span></label>
                <input type="text" name="zip" class="co-input" placeholder="00300" value="{{ old('zip') }}" required>
            </div>
        </div>

        {{-- Phone & Email --}}
        <div class="co-row-2">
            <div class="co-field">
                <label class="co-label">Phone <span class="co-required">*</span></label>
                <input type="tel" name="phone" class="co-input" placeholder="+94 77 123 4567" value="{{ old('phone') }}" required>
            </div>
            <div class="co-field">
                <label class="co-label">Email Address <span class="co-required">*</span></label>
                <input type="email" name="email" class="co-input" placeholder="kamal@example.com" value="{{ old('email') }}" required>
            </div>
        </div>

        {{-- Additional Info --}}
        <div class="co-field">
            <label class="co-label">Additional Information</label>
            <textarea name="notes" class="co-input co-textarea" placeholder="Notes about your order, e.g. special delivery instructions…" rows="4">{{ old('notes') }}</textarea>
        </div>
    </div>
</div>

            {{-- RIGHT: Order Summary --}}
            <div class="co-summary-col">

                {{-- Order Items --}}
                <div class="co-card">
                    <h4 class="co-card__title">Your Order</h4>

                    <div class="co-order-header">
                        <span>Product</span>
                        <span>Subtotal</span>
                    </div>

                    @forelse($cart as $item)
                    <div class="co-order-item">
                        <div class="co-order-item__left">
                            <div class="co-order-item__img">
                                <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}">
                            </div>
                            <div style="min-width:0; overflow:hidden;">
                                <div class="co-order-item__name">{{ \Illuminate\Support\Str::limit($item['title'], 25) }}</div>
                                <div class="co-order-item__meta">&times; {{ $item['qty'] }}</div>
                            </div>
                        </div>
                        <div class="co-order-item__price">LKR {{ number_format($item['price'] * $item['qty'], 2) }}</div>
                    </div>
                    @empty
                    <div style="text-align:center; padding: 20px 0; color: #aaa; font-size: 13px;">Your cart is empty.</div>
                    @endforelse

                    {{-- Totals --}}
                    <div class="co-totals">
                        <div class="co-totals__row">
                            <span class="co-totals__label">Subtotal</span>
                            <span class="co-totals__value">LKR {{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="co-totals__row">
                            <span class="co-totals__label">Shipping</span>
                            <span class="co-totals__value">LKR {{ number_format($shipping, 2) }}</span>
                        </div>
                        <div class="co-totals__row co-totals__row--total">
                            <span class="co-totals__label">Total</span>
                            <span class="co-totals__value co-totals__value--total">LKR {{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                </div>

                {{-- Payment --}}
                <div class="co-card">
                    <h4 class="co-card__title">Payment Method</h4>

                    <label class="co-radio">
                        <input type="radio" name="payment_type" value="cash_on_delivery" checked>
                        <span class="co-radio__dot"></span>
                        <span class="co-radio__label">Cash on Delivery</span>
                    </label>
                    <label class="co-radio" style="display:none;">
                         <input type="radio" name="payment_type" value="mobile_payment">
                        <input type="radio" name="payment_type" value="bank_transfer">
                        <span class="co-radio__dot"></span>
                        <span class="co-radio__label">Bank Transfer</span>
                    </label>
                    <label class="co-radio" style="display:none;">
                        <input type="radio" name="payment_type" value="credit_debit_card">
                        <span class="co-radio__dot"></span>
                        <span class="co-radio__label">Credit / Debit Card</span>
                    </label>

                    <button class="co-btn-place" type="submit" id="place-order-btn">Place Order</button>
                </div>

            </div>
        </div>
        </form>
    </div>
</section>

<script>
document.getElementById('checkout-form').addEventListener('submit', function () {
    var btn = document.getElementById('place-order-btn');
    btn.disabled = true;
    btn.textContent = 'Placing Order…';
    btn.style.opacity = '0.7';
    btn.style.cursor = 'not-allowed';
});
</script>

<style>
/* ── Layout ───────────────────────────────────────── */
.co-wrapper {
    display: flex;
    align-items: flex-start;
    gap: 28px;
    flex-wrap: wrap;
}
.co-form-col {
    flex: 1;
    min-width: 0;
    display: flex;
    flex-direction: column;
    gap: 20px;
}
.co-summary-col {
    width: 340px;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* ── Card shell (matches cart style) ─────────────── */
.co-card {
    background: #fff;
    border-radius: 14px;
    padding: 26px 24px;
}
.co-card__title {
    font-family: 'Mulish', sans-serif;
    font-size: 18px;
    font-weight: 800;
    color: #1a1a2e;
    margin: 0 0 22px;
}

/* ── Form fields ──────────────────────────────────── */
.co-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}
.co-field {
    display: flex;
    flex-direction: column;
    gap: 7px;
    margin-bottom: 16px;
}
.co-field:last-child { margin-bottom: 0; }
.co-label {
    font-family: 'Mulish', sans-serif;
    font-size: 12px;
    font-weight: 700;
    color: #555;
    text-transform: uppercase;
    letter-spacing: .05em;
}
.co-required { color: var(--primary-color); }
.co-input {
    width: 100%;
    height: 44px;
    border: 1.5px solid #e8e8e8;
    border-radius: 9px;
    background: #fafafa;
    font-family: 'Mulish', sans-serif;
    font-size: 14px;
    color: #1a1a2e;
    padding: 0 14px;
    box-sizing: border-box;
    outline: none;
    transition: border-color .15s, background .15s;
    -webkit-appearance: none;
    appearance: none;
}
.co-input:focus {
    border-color: var(--primary-color);
    background: #fff;
}
.co-input::placeholder { color: #b0b0b0; }
.co-textarea {
    height: auto;
    padding: 12px 14px;
    resize: vertical;
    line-height: 1.6;
}

/* ── Order summary ────────────────────────────────── */
.co-order-header {
    display: flex;
    justify-content: space-between;
    font-family: 'Mulish', sans-serif;
    font-size: 11px;
    font-weight: 700;
    color: #c0c0c0;
    text-transform: uppercase;
    letter-spacing: .07em;
    padding-bottom: 10px;
    border-bottom: 1.5px solid #f3f3f3;
    margin-bottom: 4px;
}

.co-order-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid #f7f7f7;
}
.co-order-item__left {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 0;
    flex: 1;
}
.co-order-item__img {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: #f5f5f5;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    flex-shrink: 0;
}
.co-order-item__img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 5px;
}
.co-order-item__name {
    font-family: 'Mulish', sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: #1a1a2e;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    margin-bottom: 2px;
}
.co-order-item__meta {
    font-family: 'Mulish', sans-serif;
    font-size: 11px;
    color: #bbb;
}
.co-order-item__price {
    font-family: 'Mulish', sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: #1a1a2e;
    white-space: nowrap;
    padding-left: 24px;
}

/* ── Totals ───────────────────────────────────────── */
.co-totals { margin-top: 6px; }
.co-totals__row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #f3f3f3;
}
.co-totals__row--total { border-bottom: none; padding-bottom: 0; }
.co-totals__label {
    font-family: 'Mulish', sans-serif;
    font-size: 13px;
    color: #888;
    font-weight: 500;
}
.co-totals__value {
    font-family: 'Mulish', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #1a1a2e;
}
.co-totals__row--total .co-totals__label { font-size: 15px; font-weight: 800; color: #1a1a2e; }
.co-totals__value--total { font-size: 17px; font-weight: 800; }

/* ── Payment radios ───────────────────────────────── */
.co-radio {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 11px 14px;
    border: 1.5px solid #eee;
    border-radius: 9px;
    cursor: pointer;
    margin-bottom: 10px;
    transition: border-color .15s, background .15s;
}
.co-radio:last-of-type { margin-bottom: 0; }
.co-radio input[type="radio"] { display: none; }
.co-radio__dot {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    border: 2px solid #ddd;
    flex-shrink: 0;
    position: relative;
    transition: border-color .15s;
}
.co-radio__dot::after {
    content: '';
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--primary-color);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: transform .15s;
}
.co-radio input[type="radio"]:checked ~ .co-radio__dot {
    border-color: var(--primary-color);
}
.co-radio input[type="radio"]:checked ~ .co-radio__dot::after {
    transform: translate(-50%, -50%) scale(1);
}
.co-radio:has(input:checked) {
    border-color: var(--primary-color);
    background: #f5faf5;
}
.co-radio__label {
    font-family: 'Mulish', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: #333;
}

/* ── Place Order button ───────────────────────────── */
.co-btn-place {
    display: block;
    width: 100%;
    margin-top: 18px;
    padding: 15px 0;
    background: var(--primary-color);
    color: #fff;
    border: none;
    border-radius: 9px;
    font-family: 'Mulish', sans-serif;
    font-size: 13px;
    font-weight: 800;
    letter-spacing: .08em;
    text-transform: uppercase;
    cursor: pointer;
    box-shadow: 0 4px 14px rgba(0,0,0,.18);
    transition: transform .2s, box-shadow .2s, filter .2s;
}
.co-btn-place:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,.28); filter: brightness(1.08); }
.co-btn-place:disabled { opacity: .65; cursor: not-allowed; transform: none; box-shadow: none; filter: none; }

/* ── Tablet ≤960px ────────────────────────────────── */
@media (max-width: 960px) {
    .co-wrapper { flex-direction: column; }
    .co-summary-col { width: 100%; }
}

/* ── Mobile ≤560px ────────────────────────────────── */
@media (max-width: 560px) {
    .co-row-2 { grid-template-columns: 1fr; gap: 0; }
    .co-card  { padding: 18px 16px; }
    .co-card__title { font-size: 16px; margin-bottom: 16px; }
}
</style>