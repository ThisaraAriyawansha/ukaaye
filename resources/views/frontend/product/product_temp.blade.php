<section class="tf-section product-listing-section">
    <div class="container-fluid px-4 px-lg-5">
        <div class="row g-4">

            {{-- ===========================
                 LEFT SIDEBAR — FILTERS
            =========================== --}}
            <div class="col-xl-3 col-lg-3 col-12">
                <aside class="product-filter-sidebar">

                    {{-- Sidebar Header --}}
                    <div class="filter-sidebar-header">
                        <h4><i class="fas fa-sliders-h"></i> Filters</h4>
                        <span class="filter-active-count" id="activeFilterCount">0 active</span>
                    </div>

                    <div class="filter-sidebar-body">

                    {{-- Search --}}
                    <div class="filter-widget">
                        <h5 class="filter-widget-title">Search Products</h5>
                        <div class="filter-search-wrap">
                            <input type="text" id="productSearch" placeholder="Search by name..." class="filter-search-input">
                            <button class="filter-search-btn"><i class="fas fa-search"></i></button>
                        </div>
                    </div>

                    {{-- Categories --}}
                    <div class="filter-widget">
                        <h5 class="filter-widget-title">Categories</h5>
                        <ul class="filter-category-list">
                            <li>
                                <label class="filter-check-label">
                                    <input type="checkbox" value="all" class="filter-checkbox category-filter" checked>
                                    <span class="checkmark"></span>
                                    All Products <span class="filter-count">8</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-check-label">
                                    <input type="checkbox" value="cereals" class="filter-checkbox category-filter">
                                    <span class="checkmark"></span>
                                    Baby Cereals <span class="filter-count">3</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-check-label">
                                    <input type="checkbox" value="snacks" class="filter-checkbox category-filter">
                                    <span class="checkmark"></span>
                                    Baby Snacks <span class="filter-count">2</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-check-label">
                                    <input type="checkbox" value="purees" class="filter-checkbox category-filter">
                                    <span class="checkmark"></span>
                                    Baby Purees <span class="filter-count">1</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-check-label">
                                    <input type="checkbox" value="sweeteners" class="filter-checkbox category-filter">
                                    <span class="checkmark"></span>
                                    Natural Sweeteners <span class="filter-count">1</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-check-label">
                                    <input type="checkbox" value="dairy" class="filter-checkbox category-filter">
                                    <span class="checkmark"></span>
                                    Baby Dairy <span class="filter-count">1</span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    {{-- Age Range --}}
                    <div class="filter-widget">
                        <h5 class="filter-widget-title">Suitable Age</h5>
                        <ul class="filter-category-list">
                            <li>
                                <label class="filter-check-label">
                                    <input type="checkbox" value="6m" class="filter-checkbox age-filter">
                                    <span class="checkmark"></span>
                                    6+ Months
                                </label>
                            </li>
                            <li>
                                <label class="filter-check-label">
                                    <input type="checkbox" value="8m" class="filter-checkbox age-filter">
                                    <span class="checkmark"></span>
                                    8+ Months
                                </label>
                            </li>
                            <li>
                                <label class="filter-check-label">
                                    <input type="checkbox" value="12m" class="filter-checkbox age-filter">
                                    <span class="checkmark"></span>
                                    12+ Months
                                </label>
                            </li>
                            <li>
                                <label class="filter-check-label">
                                    <input type="checkbox" value="2y" class="filter-checkbox age-filter">
                                    <span class="checkmark"></span>
                                    2+ Years
                                </label>
                            </li>
                        </ul>
                    </div>

                    {{-- Tags --}}
                    <div class="filter-widget">
                        <h5 class="filter-widget-title">Tags</h5>
                        <div class="filter-tags-wrap">
                            <span class="filter-tag active">All</span>
                            <span class="filter-tag">Organic</span>
                            <span class="filter-tag">Gluten Free</span>
                            <span class="filter-tag">No Added Sugar</span>
                            <span class="filter-tag">Dairy Free</span>
                            <span class="filter-tag">Vegan</span>
                        </div>
                    </div>

                    {{-- Reset Button --}}
                    <button class="filter-reset-btn" id="resetFilters">
                        <i class="fas fa-redo-alt"></i> Reset All Filters
                    </button>

                    </div>{{-- /filter-sidebar-body --}}
                </aside>
            </div>

            {{-- ===========================
                 RIGHT — PRODUCT GRID
            =========================== --}}
            <div class="col-xl-9 col-lg-9 col-12">

                {{-- Toolbar --}}
                <div class="product-toolbar d-flex align-items-center justify-content-between flex-wrap mb-4" style="gap: 16px;">
                    <p class="toolbar-result-count f-rubik mb-0">
                        Showing <strong><span id="productCount">8</span></strong> products
                    </p>
                    <div class="toolbar-sort d-flex align-items-center" style="gap: 14px;">
                        <label class="f-rubik mb-0">Sort by:</label>
                        <select class="toolbar-sort-select" id="sortProducts">
                            <option value="default">Default</option>
                            <option value="name-asc">Name: A → Z</option>
                            <option value="name-desc">Name: Z → A</option>
                            <option value="newest">Newest First</option>
                        </select>
                        <div class="toolbar-view-toggle">
                            <button class="view-btn active" id="gridView" title="Grid View">
                                <i class="fas fa-th"></i>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Product Grid --}}
                <div class="row" id="productGrid">

                    @php
                    $products = [
                        [
                            'id'       => 1,
                            'name'     => 'Baby Cereal',
                            'category' => 'Baby Cereals',
                            'cat_slug' => 'cereals',
                            'flavors'  => 'Brown Rice · Oatmeal · Ragi',
                            'age'      => '6+ Months',
                            'img'      => 'assets/images/home/5623566.jpg',
                            'badge'    => 'Bestseller',
                            'badge_class' => 'badge-bestseller',
                            'tags'     => ['Organic', 'Gluten Free'],
                        ],
                        [
                            'id'       => 2,
                            'name'     => 'Baby Puffs',
                            'category' => 'Baby Snacks',
                            'cat_slug' => 'snacks',
                            'flavors'  => 'Vanilla · Apple · Strawberry',
                            'age'      => '8+ Months',
                            'img'      => 'assets/images/home/5623566.jpg',
                            'badge'    => 'New',
                            'badge_class' => 'badge-new',
                            'tags'     => ['No Added Sugar'],
                        ],
                        [
                            'id'       => 3,
                            'name'     => 'Baby Puree',
                            'category' => 'Baby Purees',
                            'cat_slug' => 'purees',
                            'flavors'  => 'Apple · Mango · Sweet Potato',
                            'age'      => '6+ Months',
                            'img'      => 'assets/images/home/5623566.jpg',
                            'badge'    => null,
                            'badge_class' => '',
                            'tags'     => ['Organic', 'Vegan'],
                        ],
                        [
                            'id'       => 4,
                            'name'     => 'Baby Curry Mix',
                            'category' => 'Baby Cereals',
                            'cat_slug' => 'cereals',
                            'flavors'  => 'Aromat Special Blend',
                            'age'      => '8+ Months',
                            'img'      => 'assets/images/home/5623566.jpg',
                            'badge'    => 'Popular',
                            'badge_class' => 'badge-popular',
                            'tags'     => ['Gluten Free'],
                        ],
                        [
                            'id'       => 5,
                            'name'     => 'Natural Sweetener',
                            'category' => 'Natural Sweeteners',
                            'cat_slug' => 'sweeteners',
                            'flavors'  => 'Dates Powder · Himalayan Honey',
                            'age'      => '12+ Months',
                            'img'      => 'assets/images/home/5623566.jpg',
                            'badge'    => 'Organic',
                            'badge_class' => 'badge-organic',
                            'tags'     => ['Organic', 'Vegan', 'No Added Sugar'],
                        ],
                        [
                            'id'       => 6,
                            'name'     => 'Baby Melts',
                            'category' => 'Baby Snacks',
                            'cat_slug' => 'snacks',
                            'flavors'  => 'Jamun · Mango · Yogurt',
                            'age'      => '8+ Months',
                            'img'      => 'assets/images/home/5623566.jpg',
                            'badge'    => null,
                            'badge_class' => '',
                            'tags'     => ['No Added Sugar'],
                        ],
                        [
                            'id'       => 7,
                            'name'     => 'Baby Yogurt',
                            'category' => 'Baby Dairy',
                            'cat_slug' => 'dairy',
                            'flavors'  => 'Blueberry · Strawberry',
                            'age'      => '6+ Months',
                            'img'      => 'assets/images/home/5623566.jpg',
                            'badge'    => 'New',
                            'badge_class' => 'badge-new',
                            'tags'     => ['Dairy Free'],
                        ],
                        [
                            'id'       => 8,
                            'name'     => 'Baby Biscuits',
                            'category' => 'Baby Snacks',
                            'cat_slug' => 'snacks',
                            'flavors'  => 'Coming Soon',
                            'age'      => '12+ Months',
                            'img'      => 'assets/images/home/5623566.jpg',
                            'badge'    => 'Soon',
                            'badge_class' => 'badge-soon',
                            'tags'     => [],
                        ],
                    ];
                    @endphp

                    @foreach ($products as $product)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 product-item"
                         data-category="{{ $product['cat_slug'] }}"
                         data-name="{{ strtolower($product['name']) }}">
                        <div class="product-card wow fadeInUp animated" data-wow-delay="0.1s">

                            {{-- Image Wrapper --}}
                            <div class="product-card-img-wrap">
                                <img src="{{ $product['img'] }}" alt="{{ $product['name'] }}" class="product-card-img">

                                @if($product['badge'])
                                <span class="product-badge {{ $product['badge_class'] }}">{{ $product['badge'] }}</span>
                                @endif

                                {{-- Hover Actions --}}
                                <div class="product-card-actions">
                                    <button class="card-action-btn wishlist-btn" title="Add to Wishlist"
                                            data-id="{{ $product['id'] }}" data-name="{{ $product['name'] }}">
                                        <i class="far fa-heart"></i>
                                    </button>
                                    <button class="card-action-btn quick-view-btn" title="Quick View"
                                            data-id="{{ $product['id'] }}">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            {{-- Card Body --}}
                            <div class="product-card-body" style="padding: 20px 18px 20px !important;">

                                {{-- Top row: category + wishlist --}}
                                <div class="product-card-top-row">
                                    <span class="product-category-badge">{{ $product['category'] }}</span>
                                    <button class="card-wishlist-body wishlist-btn"
                                            title="Add to Wishlist"
                                            data-id="{{ $product['id'] }}"
                                            data-name="{{ $product['name'] }}">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>

                                <h5 class="product-card-title">
                                    <a href="#">{{ $product['name'] }}</a>
                                </h5>

                                <div class="product-card-divider"></div>

                                <p class="product-card-flavors">{{ $product['flavors'] }}</p>

                                <div class="product-card-meta">
                                    <span class="product-age-tag">
                                        <i class="fas fa-baby"></i>{{ $product['age'] }}
                                    </span>
                                    @if(!empty($product['tags']))
                                    <span class="product-tag-pill">{{ $product['tags'][0] }}</span>
                                    @endif
                                </div>

                                {{-- Add to Cart --}}
                                <button class="product-add-to-cart-btn add-to-cart"
                                        data-id="{{ $product['id'] }}" data-name="{{ $product['name'] }}"
                                        {{ $product['flavors'] === 'Coming Soon' ? 'disabled' : '' }}>
                                    @if($product['flavors'] === 'Coming Soon')
                                        <i class="fas fa-clock"></i> Coming Soon
                                    @else
                                        <i class="fas fa-shopping-cart"></i> Add to Cart
                                    @endif
                                </button>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
                {{-- /Product Grid --}}

                {{-- No Results Message --}}
                <div class="no-products-msg text-center py-5" id="noProductsMsg" style="display:none;">
                    <i class="fas fa-search fa-3x mb-3" style="color: var(--clr-pri-1, #2563eb); opacity:0.4;"></i>
                    <h5 class="f-rubik">No products found</h5>
                    <p class="f-mulish">Try adjusting your filters or search term.</p>
                </div>

            </div>
            {{-- /Right Product Grid --}}

        </div>
    </div>
</section>

{{-- ===========================
     WISHLIST / CART TOAST
=========================== --}}
<div class="product-toast" id="productToast">
    <div class="product-toast-inner">
        <i class="fas fa-check-circle me-2"></i>
        <span id="productToastMsg">Added successfully!</span>
    </div>
</div>

{{-- ===========================
     INLINE STYLES
=========================== --}}
<style>
/* ============================
   PAGE-LEVEL BLUE PALETTE OVERRIDE
============================ */
:root {
    --primary-color3 : #4a9fd5;  /* medium blue  */
    --primary-color4 : #6b7a99;  /* blue-gray    */
    --primary-color5 : #6b7a99 ;  /* vivid blue   */
    --primary-color7 : #eef4ff;  /* light blue   */
    --primary-color8 : #0ea5e9;  /* sky blue     */
    --primary-color9 : #3b82f6;  /* std blue     */
}

/* ============================
   THEME PALETTE REFERENCE
   --primary-color1 : #fff
   --primary-color2 : #2b3c6b  (navy)
   --primary-color3 : #4a9fd5  (medium blue)
   --primary-color4 : #6b7a99  (blue-gray)
   --primary-color5 : #2563eb  (vivid blue)
   --primary-color6 : #1ab9ff  (sky blue)
   --primary-color7 : #eef4ff  (light blue)
   --primary-color8 : #0ea5e9  (sky blue)
   --primary-color9 : #3b82f6  (standard blue)
============================ */

/* ============================
   SECTION
============================ */
.product-listing-section {
    padding: 70px 0 90px;
}

/* ============================
   SIDEBAR
============================ */
.product-filter-sidebar {
    background: var(--primary-color1);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 2px 24px rgba(43, 60, 107, 0.10);
    position: sticky;
    top: 96px;
}

/* Sidebar header */
.filter-sidebar-header {
    background: var(--primary-color2);
    padding: 20px 24px 18px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.filter-sidebar-header h4 {
    font-size: 15px;
    font-weight: 700;
    color: var(--primary-color1);
    margin: 0;
    font-family: 'Rubik', sans-serif;
    letter-spacing: 0.4px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.filter-active-count {
    background: rgba(255,255,255,0.18);
    color: var(--primary-color1);
    font-size: 11px;
    font-weight: 700;
    font-family: 'Rubik', sans-serif;
    padding: 2px 9px;
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.3);
}

/* Sidebar body */
.filter-sidebar-body {
    padding: 22px 22px 10px;
}

/* Widget */
.filter-widget {
    margin-bottom: 24px;
    padding-bottom: 24px;
    border-bottom: 1px dashed rgba(43, 60, 107, 0.12);
}

.filter-widget:last-of-type {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.filter-widget-title {
    font-size: 12px;
    font-weight: 700;
    color: var(--primary-color4);
    text-transform: uppercase;
    letter-spacing: 1.2px;
    font-family: 'Rubik', sans-serif;
    margin-bottom: 14px;
}

/* ---- Search ---- */
.filter-search-wrap {
    display: flex !important;
    flex-direction: row !important;
    align-items: center !important;
    flex-wrap: nowrap !important;
    background: var(--primary-color1);
    border: 1.5px solid rgba(43, 60, 107, 0.15);
    border-radius: 12px;
    overflow: hidden;
    transition: border-color 0.2s, box-shadow 0.2s;
    width: 100%;
}

.filter-search-wrap:focus-within {
    border-color: var(--primary-color2);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
}

.filter-search-input {
    flex: 1 1 auto !important;
    min-width: 0;
    width: 100%;
    border: none !important;
    outline: none !important;
    box-shadow: none !important;
    padding: 11px 14px !important;
    font-size: 13.5px;
    font-family: 'Rubik', sans-serif !important;
    font-style: normal !important;
    font-weight: 400 !important;
    color: var(--primary-color2);
    background: transparent !important;
    -webkit-font-smoothing: antialiased;
    display: block !important;
}

.filter-search-input::placeholder {
    color: var(--primary-color4);
    font-style: normal !important;
    font-family: 'Rubik', sans-serif !important;
    font-weight: 400 !important;
    opacity: 0.7;
}

.filter-search-btn {
    flex-shrink: 0 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    border: none !important;
    background: var(--primary-color2) !important;
    color: var(--primary-color1) !important;
    padding: 11px 16px !important;
    cursor: pointer;
    transition: background 0.2s, opacity 0.2s;
    font-size: 13px;
    height: 100%;
    min-height: 44px;
}

.filter-search-btn:hover { opacity: 0.85; }

/* ---- Custom Checkboxes ---- */
.filter-category-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.filter-category-list li {
    border-radius: 10px;
    transition: background 0.18s;
}

.filter-category-list li:hover {
    background: var(--primary-color7);
}

.filter-check-label {
    display: flex;
    align-items: center;
    gap: 11px;
    cursor: pointer;
    padding: 8px 10px;
    font-size: 13.5px;
    color: var(--primary-color2);
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    user-select: none;
    border-radius: 10px;
    transition: color 0.18s;
}

.filter-check-label:hover { color: var(--primary-color5); }

.filter-check-label input[type="checkbox"] { display: none; }

.filter-check-label .checkmark {
    width: 18px;
    height: 18px;
    min-width: 18px;
    border-radius: 5px;
    border: 2px solid rgba(43, 60, 107, 0.25);
    background: var(--primary-color1);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
    position: relative;
}

.filter-check-label .checkmark::after {
    content: '';
    width: 5px;
    height: 9px;
    border-right: 2px solid var(--primary-color1);
    border-bottom: 2px solid var(--primary-color1);
    transform: rotate(45deg) scale(0);
    transition: transform 0.15s ease;
    margin-top: -2px;
}

.filter-check-label input:checked ~ .checkmark {
    background: var(--primary-color5);
    border-color: var(--primary-color5);
}

.filter-check-label input:checked ~ .checkmark::after {
    transform: rotate(45deg) scale(1);
}

.filter-check-label input:checked ~ span:not(.checkmark):not(.filter-count) {
    color: var(--primary-color5);
    font-weight: 600;
}

.filter-count {
    margin-left: auto;
    background: var(--primary-color7);
    color: var(--primary-color2);
    font-size: 11px;
    font-weight: 700;
    font-family: 'Rubik', sans-serif;
    padding: 2px 9px;
    border-radius: 20px;
    min-width: 26px;
    text-align: center;
    transition: background 0.2s, color 0.2s;
    border: 1px solid rgba(43, 60, 107, 0.12);
}

.filter-check-label input:checked ~ .filter-count {
    background: var(--primary-color5);
    color: var(--primary-color1);
    border-color: var(--primary-color5);
}

/* ---- Tags ---- */
.filter-tags-wrap {
    display: flex;
    flex-wrap: wrap;
    gap: 7px;
}

.filter-tag {
    font-size: 12px;
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    padding: 5px 13px;
    border-radius: 20px;
    border: 1.5px solid rgba(43, 60, 107, 0.18);
    color: var(--primary-color4);
    cursor: pointer;
    transition: all 0.2s;
    background: var(--primary-color1);
}

.filter-tag:hover {
    border-color: var(--primary-color5);
    color: var(--primary-color5);
}

.filter-tag.active {
    background: var(--primary-color5);
    border-color: var(--primary-color5);
    color: var(--primary-color1);
    box-shadow: 0 3px 10px rgba(37, 99, 235, 0.25);
}

/* ---- Reset btn ---- */
.filter-reset-btn {
    width: 100%;
    margin-top: 20px;
    margin-bottom: 22px;
    padding: 11px;
    border: 1.5px solid rgba(43, 60, 107, 0.2);
    border-radius: 12px;
    background: var(--primary-color7);
    color: var(--primary-color2);
    font-size: 13.5px;
    font-weight: 600;
    font-family: 'Rubik', sans-serif;
    cursor: pointer;
    transition: all 0.25s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.filter-reset-btn:hover {
    background: var(--primary-color2);
    border-color: var(--primary-color2);
    color: var(--primary-color1);
    box-shadow: 0 4px 14px rgba(43, 60, 107, 0.25);
}

/* ============================
   TOOLBAR
============================ */
.product-toolbar {
    background: var(--primary-color1);
    border-radius: 14px;
    padding: 14px 22px;
    box-shadow: 0 2px 14px rgba(43, 60, 107, 0.07);
    border: 1px solid rgba(43, 60, 107, 0.1);
}

.toolbar-result-count {
    font-size: 13.5px;
    color: var(--primary-color4);
    font-family: 'Rubik', sans-serif;
}

.toolbar-result-count strong {
    color: var(--primary-color2);
    font-weight: 700;
}

.toolbar-sort label {
    font-size: 13.5px;
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    color: var(--primary-color2);
    white-space: nowrap;
    font-style: normal;
}

.toolbar-sort-select {
    border: 1.5px solid rgba(43, 60, 107, 0.18);
    border-radius: 9px;
    padding: 7px 30px 7px 12px;
    font-size: 13px;
    font-family: 'Rubik', sans-serif;
    color: var(--primary-color2);
    outline: none;
    cursor: pointer;
    background: var(--primary-color1);
    transition: border-color 0.2s;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%232b3c6b' stroke-width='1.8' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 10px center;
}

.toolbar-sort-select:focus { border-color: var(--primary-color5); }

.toolbar-view-toggle { display: flex; gap: 6px; }

.view-btn {
    border: 1.5px solid rgba(43, 60, 107, 0.18);
    background: var(--primary-color1);
    color: var(--primary-color4);
    width: 36px;
    height: 36px;
    border-radius: 9px;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
}

.view-btn.active, .view-btn:hover {
    background: var(--primary-color5);
    border-color: var(--primary-color5);
    color: var(--primary-color1);
}

/* ============================
   PRODUCT GRID GAP
============================ */
#productGrid .product-item {
    margin-bottom: 30px;
}

/* ============================
   PRODUCT CARD
============================ */
.product-card {
    background: var(--primary-color1);
    border-radius: 20px !important;
    overflow: hidden;
    box-shadow: 0 2px 18px rgba(43, 60, 107, 0.08);
    border: 1px solid rgba(43, 60, 107, 0.10) !important;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s;
    height: 100%;
    display: flex !important;
    flex-direction: column !important;
    padding: 0 !important;
}

.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 40px rgba(43, 60, 107, 0.14);
    border-color: var(--primary-color5) !important;
}

/* Image area */
.product-card-img-wrap {
    position: relative;
    overflow: hidden;
    height: 200px;
    background: var(--primary-color7);
    flex-shrink: 0;
}

.product-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
    display: block;
}

.product-card:hover .product-card-img { transform: scale(1.06); }

/* Dark scrim for badge readability */
.product-card-img-wrap::after {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.08);
    pointer-events: none;
}

/* Badge */
.product-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    font-size: 10px;
    font-weight: 700;
    font-family: 'Rubik', sans-serif;
    padding: 4px 11px;
    border-radius: 6px;
    z-index: 3;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}

.badge-bestseller { background: var(--primary-color9);  color: #fff; }
.badge-new        { background: var(--primary-color6);  color: #fff; }
.badge-popular    { background: var(--primary-color5);  color: #fff; }
.badge-organic    { background: var(--primary-color2);  color: #fff; }
.badge-soon       { background: var(--primary-color4);  color: #fff; }

/* Hover actions */
.product-card-actions {
    position: absolute;
    top: 12px;
    right: 12px;
    display: flex;
    flex-direction: column;
    gap: 7px;
    z-index: 3;
}

.card-action-btn {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    border: none;
    background: var(--primary-color1);
    color: var(--primary-color4);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(0,0,0,0.14);
    transition: all 0.22s;
    font-size: 13px;
    opacity: 0;
    transform: translateX(10px);
}

.product-card:hover .card-action-btn {
    opacity: 1;
    transform: translateX(0);
}

.product-card:hover .card-action-btn:nth-child(2) { transition-delay: 0.06s; }

.card-action-btn:hover {
    background: var(--primary-color5);
    color: var(--primary-color1);
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.35);
}

.wishlist-btn.wishlisted {
    background: #eff6ff;
    color: var(--primary-color3);
    opacity: 1;
    transform: translateX(0);
}

/* ---- Card Body ---- */
.product-card-body,
.product-listing-section .product-card .product-card-body,
.product-item .product-card .product-card-body {
    padding: 20px 18px 20px !important;
    display: flex !important;
    flex-direction: column !important;
    flex: 1;
    box-sizing: border-box !important;
}

/* Top row: category + wishlist */
.product-card-top-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
}

.product-category-badge {
    font-size: 10px;
    font-weight: 700;
    color: var(--primary-color5);
    font-family: 'Rubik', sans-serif;
    text-transform: uppercase;
    letter-spacing: 1px;
    background: rgba(37, 99, 235, 0.08);
    padding: 4px 10px;
    border-radius: 6px;
}

/* Wishlist button (always visible) */
.card-wishlist-body {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 1.5px solid rgba(43, 60, 107, 0.15);
    background: var(--primary-color1);
    color: var(--primary-color4);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.22s;
    font-size: 12px;
    flex-shrink: 0;
}

.card-wishlist-body:hover {
    border-color: var(--primary-color3);
    color: var(--primary-color3);
    background: #eff6ff;
}

.card-wishlist-body.wishlisted {
    background: #eff6ff;
    border-color: var(--primary-color3);
    color: var(--primary-color3);
}

/* Title */
.product-card-title {
    font-size: 16px;
    font-weight: 700;
    color: var(--primary-color2);
    margin-bottom: 4px;
    line-height: 1.3;
}

.product-card-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.2s;
}

.product-card-title a:hover { color: var(--primary-color5); }

/* Divider */
.product-card-divider {
    height: 1px;
    background: rgba(43, 60, 107, 0.08);
    margin: 8px 0;
}

/* Flavors */
.product-card-flavors {
    font-size: 12.5px;
    color: var(--primary-color4);
    font-family: 'Mulish', sans-serif;
    margin-bottom: 0;
    flex: 1;
    line-height: 1.5;
}

/* Meta row */
.product-card-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 12px;
    margin-bottom: 14px;
    flex-wrap: wrap;
    gap: 5px;
}

.product-age-tag {
    font-size: 11.5px;
    color: var(--primary-color2);
    font-family: 'Rubik', sans-serif;
    font-weight: 600;
    background: rgba(43, 60, 107, 0.07);
    padding: 3px 10px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.product-tag-pill {
    font-size: 11px;
    background: rgba(14, 165, 233, 0.12);
    color: var(--primary-color8);
    padding: 3px 10px;
    border-radius: 6px;
    font-family: 'Rubik', sans-serif;
    font-weight: 600;
}

/* Add to Cart */
.product-add-to-cart-btn {
    width: 100%;
    padding: 11px;
    border: none;
    border-radius: 10px;
    background: var(--primary-color5);
    color: var(--primary-color1);
    font-size: 13.5px;
    font-weight: 600;
    font-family: 'Rubik', sans-serif;
    cursor: pointer;
    transition: all 0.25s;
    letter-spacing: 0.3px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    box-shadow: 0 3px 12px rgba(37, 99, 235, 0.20);
}

.product-add-to-cart-btn:hover:not(:disabled) {
    background: var(--primary-color2);
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(43, 60, 107, 0.25);
}

.product-add-to-cart-btn:active:not(:disabled) { transform: translateY(0); }

.product-add-to-cart-btn:disabled {
    background: rgba(43, 60, 107, 0.08);
    color: var(--primary-color4);
    cursor: not-allowed;
    box-shadow: none;
}

.product-add-to-cart-btn.added {
    background: var(--primary-color6);
    box-shadow: 0 3px 12px rgba(26, 185, 255, 0.25);
}

/* ============================
   TOAST
============================ */
.product-toast {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 9999;
    opacity: 0;
    transform: translateY(16px);
    transition: all 0.32s cubic-bezier(0.34, 1.56, 0.64, 1);
    pointer-events: none;
}

.product-toast.show { opacity: 1; transform: translateY(0); }

.product-toast-inner {
    background: var(--primary-color2);
    color: var(--primary-color1);
    padding: 13px 20px;
    border-radius: 12px;
    font-size: 14px;
    font-family: 'Rubik', sans-serif;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 8px 32px rgba(43, 60, 107, 0.25);
    white-space: nowrap;
}

.product-toast-inner i { color: var(--primary-color6); font-size: 16px; }

/* ============================
   RESPONSIVE
============================ */
@media (max-width: 991px) {
    .product-filter-sidebar { position: static; }
}
</style>

{{-- ===========================
     INLINE SCRIPTS
=========================== --}}
<script>
(function () {
    const grid        = document.getElementById('productGrid');
    const items       = () => Array.from(document.querySelectorAll('.product-item'));
    const countEl     = document.getElementById('productCount');
    const noMsg       = document.getElementById('noProductsMsg');
    const searchInput = document.getElementById('productSearch');
    const sortSelect  = document.getElementById('sortProducts');
    const gridBtn     = document.getElementById('gridView');
    const resetBtn    = document.getElementById('resetFilters');
    const toast       = document.getElementById('productToast');
    const toastMsg    = document.getElementById('productToastMsg');

    let toastTimer = null;

    // ---- Toast helper ----
    function showToast(msg) {
        toastMsg.textContent = msg;
        toast.classList.add('show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => toast.classList.remove('show'), 2800);
    }

    // ---- Filter logic ----
    function applyFilters() {
        const searchVal   = searchInput.value.toLowerCase().trim();
        const checkedCats = Array.from(document.querySelectorAll('.category-filter:checked')).map(c => c.value);
        const activeTag   = document.querySelector('.filter-tag.active');
        const tagVal      = activeTag ? activeTag.textContent.trim().toLowerCase() : 'all';

        let visible = 0;

        items().forEach(item => {
            const name     = item.dataset.name || '';
            const category = item.dataset.category || '';
            const itemText = item.innerText.toLowerCase();

            const matchCat    = checkedCats.includes('all') || checkedCats.length === 0 || checkedCats.includes(category);
            const matchSearch = !searchVal || name.includes(searchVal);
            const matchTag    = tagVal === 'all' || itemText.includes(tagVal);

            const show = matchCat && matchSearch && matchTag;
            item.style.display = show ? '' : 'none';
            if (show) visible++;
        });

        countEl.textContent = visible;
        noMsg.style.display = visible === 0 ? 'block' : 'none';
        updateActiveCount();
    }

    // ---- Category checkboxes ----
    document.querySelectorAll('.category-filter').forEach(cb => {
        cb.addEventListener('change', function () {
            if (this.value === 'all' && this.checked) {
                document.querySelectorAll('.category-filter:not([value="all"])').forEach(c => c.checked = false);
            } else {
                document.querySelector('.category-filter[value="all"]').checked = false;
            }
            applyFilters();
        });
    });

    // ---- Age checkboxes ----
    document.querySelectorAll('.age-filter').forEach(cb => {
        cb.addEventListener('change', applyFilters);
    });

    // ---- Search ----
    searchInput.addEventListener('input', applyFilters);

    // ---- Tags ----
    document.querySelectorAll('.filter-tag').forEach(tag => {
        tag.addEventListener('click', function () {
            document.querySelectorAll('.filter-tag').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            applyFilters();
        });
    });

    // ---- Sort ----
    sortSelect.addEventListener('change', function () {
        const val      = this.value;
        const list     = items();
        const parent   = grid;

        list.sort((a, b) => {
            const nameA = a.dataset.name || '';
            const nameB = b.dataset.name || '';
            if (val === 'name-asc')  return nameA.localeCompare(nameB);
            if (val === 'name-desc') return nameB.localeCompare(nameA);
            return 0;
        });

        list.forEach(el => parent.appendChild(el));
    });

    // ---- Reset ----
    resetBtn.addEventListener('click', function () {
        searchInput.value = '';
        document.querySelectorAll('.category-filter').forEach(c => c.checked = false);
        document.querySelector('.category-filter[value="all"]').checked = true;
        document.querySelectorAll('.age-filter').forEach(c => c.checked = false);
        document.querySelectorAll('.filter-tag').forEach(t => t.classList.remove('active'));
        document.querySelector('.filter-tag:first-child').classList.add('active');
        sortSelect.value = 'default';
        applyFilters();
    });

    // ---- Active filter count ----
    function updateActiveCount() {
        const checkedCats = Array.from(document.querySelectorAll('.category-filter:checked')).filter(c => c.value !== 'all').length;
        const checkedAges = Array.from(document.querySelectorAll('.age-filter:checked')).length;
        const searchVal   = searchInput.value.trim() ? 1 : 0;
        const activeTagEl = document.querySelector('.filter-tag.active');
        const tagActive   = activeTagEl && activeTagEl.textContent.trim().toLowerCase() !== 'all' ? 1 : 0;
        const total = checkedCats + checkedAges + searchVal + tagActive;
        const el = document.getElementById('activeFilterCount');
        if (el) el.textContent = total + ' active';
    }

    // ---- Wishlist ----
    document.querySelectorAll('.wishlist-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const name     = this.dataset.name;
            const id       = this.dataset.id;
            const isAdded  = this.classList.toggle('wishlisted');
            const icon     = this.querySelector('i');
            icon.className = isAdded ? 'fas fa-heart' : 'far fa-heart';
            // Sync all wishlist buttons with same product id
            document.querySelectorAll(`.wishlist-btn[data-id="${id}"]`).forEach(b => {
                if (b !== this) {
                    b.classList.toggle('wishlisted', isAdded);
                    b.querySelector('i').className = isAdded ? 'fas fa-heart' : 'far fa-heart';
                }
            });
            showToast(isAdded ? `"${name}" added to wishlist` : `"${name}" removed from wishlist`);
        });
    });

    // ---- Add to Cart ----
    document.querySelectorAll('.add-to-cart').forEach(btn => {
        btn.addEventListener('click', function () {
            if (this.disabled) return;
            const name    = this.dataset.name;
            const origHtml = this.innerHTML;
            this.classList.add('added');
            this.innerHTML = '<i class="fas fa-check me-2"></i> Added!';
            showToast(`"${name}" added to cart 🛒`);
            setTimeout(() => {
                this.classList.remove('added');
                this.innerHTML = origHtml;
            }, 2000);
        });
    });

})();
</script>
