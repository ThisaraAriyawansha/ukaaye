<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ukaaye - Home</title>
  <link rel="icon" href="assets/img/logo/logo_bg_remove.webp">
  <!-- CSS only -->
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
   <!-- fancybox -->
   <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
   <link rel="stylesheet" href="assets/css/slick.css">
   <link rel="stylesheet" href="assets/css/slick-theme.css">
   <link rel="stylesheet" href="assets/css/swiper.css">
   <link rel="stylesheet" href="assets/css/fontawesome.min.css">
   <link rel="stylesheet" href="assets/font/flaticon_mycollection.css">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="assets/css/flaticon-updated.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


   <!-- style -->
   <link rel="stylesheet" href="assets/css/style.css">
   <!-- responsive -->
   <link rel="stylesheet" href="assets/css/responsive.css"> 
   <script src="assets/js/jquery-3.6.0.min.js"></script>
   <script src="assets/js/preloader.js"></script>

 </head>
<body>
    <div class="preloader">
    <div id="loader"></div>
    </div> 

            <!-- header begin -->
            @include('frontend.components.header')
            <!-- header close -->

            @yield('content')

            <!-- footer begin -->
            @include('frontend.components.footer')
            <!-- footer close -->

            <!-- search-popup -->

            <!-- search-popup end -->
            <!-- progress -->
            <div id="progress">
                <span id="progress-value"><i class="fa-solid fa-up-long"></i></span>
            </div>
            <!-- search-popup -->
            <!-- Bootstrap Js -->
            <script src="assets/js/bootstrap.min.js"></script>
            <!-- fancybox -->
            <script src="assets/js/jquery.fancybox.min.js"></script>
            <script src="assets/js/slick.min.js"></script>
            <script src="assets/js/swiper.js"></script>
            <script src="assets/js/sweetalert.min.js"></script> 
            <script src="assets/js/contact.js"></script>
            <script src="assets/js/custom.js"></script>



    <!-- Toast Alert System -->
    <div id="aromat-toast-container" style="
        position: fixed;
        bottom: 28px;
        right: 28px;
        z-index: 99999;
        display: flex;
        flex-direction: column;
        gap: 10px;
        pointer-events: none;
    "></div>

    <style>
    .aromat-toast {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 13px 18px;
        border-radius: 12px;
        font-family: 'Mulish', sans-serif;
        font-size: 13px;
        font-weight: 700;
        color: var(--primary-color);
        background: #fff;
        border: 1.5px solid var(--primary-color);
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        pointer-events: all;
        opacity: 0;
        transform: translateY(12px);
        transition: opacity .28s ease, transform .28s ease;
        min-width: 220px;
        max-width: 320px;
    }
    .aromat-toast.show { opacity: 1; transform: translateY(0); }
    .aromat-toast.hide { opacity: 0; transform: translateY(12px); }
    .aromat-toast__icon { font-size: 16px; flex-shrink: 0; color: var(--primary-color); }
    .aromat-toast__msg  { flex: 1; }
    </style>

    <script>
    function updateCartCount(count) {
        var badge = document.getElementById('cart-count-badge');
        if (!badge) return;
        badge.textContent = count;
        badge.style.display = count > 0 ? 'flex' : 'none';
    }

    function showToast(message, type) {
        type = type || 'cart';
        var icons = { cart: '&#128722;', wishlist: '&#10084;', error: '&#9888;' };
        var container = document.getElementById('aromat-toast-container');
        var toast = document.createElement('div');
        toast.className = 'aromat-toast aromat-toast--' + type;
        toast.innerHTML =
            '<span class="aromat-toast__icon">' + (icons[type] || icons.cart) + '</span>' +
            '<span class="aromat-toast__msg">' + message + '</span>';
        container.appendChild(toast);
        requestAnimationFrame(function () {
            requestAnimationFrame(function () { toast.classList.add('show'); });
        });
        setTimeout(function () {
            toast.classList.add('hide');
            toast.classList.remove('show');
            setTimeout(function () { toast.remove(); }, 320);
        }, 3000);
    }
    </script>

    @stack('scripts')
</body>