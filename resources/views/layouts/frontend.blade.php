<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Aromat</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">       

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="assets/images/logo/logo_bg.webp">
    <link rel="apple-touch-icon-precomposed" href="assets/images/logo/logo_bg.webp">

</head>

<body class="counter-scroll header-fixed @yield('body-class', 'home2')">

    <!-- Preloader -->
    <div id="preload" class="preload">
        <div class="preload-logo"></div>
    </div>

    <div id="wrapper">
        <div id="page" class="clearfix">
            <div class="top-bar">
                <div class="inner jus-ct">
                    <p class="clr-pri-1">Working Jours : Sun - Friday, 08:00 am - 05:00 pm</p>
                </div>
            </div>

            <!-- header begin -->
            @include('frontend.components.header')
            <!-- header close -->

            @yield('content')

            <!-- footer begin -->
            @include('frontend.components.footer')
            <!-- footer close -->

    </div>
    </div>
    <!-- /#wrapper -->

    <a id="scroll-top"></a>

    <!-- Javascript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/plugin.js"></script>
    <script src="assets/js/countto.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/owl.carousel2.thumbs.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/shortcodes.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

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
        color: #666;
        background: #fff;
        border: 1.5px solid #ddd;
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
    .aromat-toast__icon { font-size: 16px; flex-shrink: 0; color: #aaa; }
    .aromat-toast__msg  { flex: 1; }
    </style>

    <script>
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

</html>