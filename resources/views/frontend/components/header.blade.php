<header>
  <div class="top-bar">
    <div class="container">
      <div class="top-bar-slid">
        <div>
          <div class="phone-data">
            <div class="phone">
              <i class="flaticon-iphone"></i>
              <span>Call Agent:</span><a href="callto:+94777384992">+94777384992</a>
            </div>
            <div class="phone d-flax align-items-center">
              <i>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0.833313 12.7083C0.488135 12.7083 0.208313 12.9882 0.208313 13.3333C0.208313 13.6785 0.488135 13.9583 0.833313 13.9583H3.33331C3.67849 13.9583 3.95831 13.6785 3.95831 13.3333C3.95831 12.9882 3.67849 12.7083 3.33331 12.7083H0.833313Z" fill="black"/>
                  <path d="M0.833313 15.2083C0.488135 15.2083 0.208313 15.4882 0.208313 15.8333C0.208313 16.1785 0.488135 16.4583 0.833313 16.4583H5.83331C6.17849 16.4583 6.45831 16.1785 6.45831 15.8333C6.45831 15.4882 6.17849 15.2083 5.83331 15.2083H0.833313Z" fill="black"/>
                  <path d="M2.59071 4.24172L2.5 4.16667C2.757 3.81294 3.0305 3.55276 3.38422 3.29576C4.4795 2.5 6.04189 2.5 9.16667 2.5H10.8333C13.9581 2.5 15.5205 2.5 16.6157 3.29576C16.9695 3.55276 17.2214 3.78443 17.4784 4.13816L17.3737 4.24225L15.4505 6.16551C14.0491 7.56689 13.0416 8.5725 12.1726 9.23558C11.318 9.88758 10.6712 10.1491 9.99992 10.1491C9.3285 10.1491 8.68175 9.88758 7.82717 9.23558C6.95817 8.5725 5.95066 7.56689 4.54927 6.16551L2.92989 4.54612L2.59071 4.24172Z" fill="black"/>
                  <path d="M1.66663 9.99999C1.66663 7.80006 1.66663 6.37454 1.94431 5.34122L2.06983 5.45388L3.69916 7.08319C5.05938 8.44341 6.12537 9.50941 7.06891 10.2293C8.03468 10.9662 8.94529 11.3991 9.99988 11.3991C11.0544 11.3991 11.965 10.9662 12.9308 10.2293C13.8743 9.50941 14.9403 8.44341 16.3005 7.08321L18.0528 5.3309C18.3333 6.36504 18.3333 7.79274 18.3333 9.99999C18.3333 13.1247 18.3333 14.6872 17.5375 15.7824C17.2805 16.1362 16.9695 16.4472 16.6157 16.7042C15.5205 17.5 13.958 17.5 10.8333 17.5H9.16663C7.97633 17.5 7.01273 17.5 6.2153 17.456C6.95166 17.2833 7.49996 16.6223 7.49996 15.8333C7.49996 14.9128 6.75377 14.1667 5.83329 14.1667H4.77699C4.9188 13.9215 4.99996 13.6369 4.99996 13.3333C4.99996 12.4128 4.25377 11.6667 3.33329 11.6667H1.67263C1.66663 11.1657 1.66663 10.6129 1.66663 9.99999Z" fill="black"/>
                  </svg>
              </i>
              <span>Send Email: </span>
              <a class="me-3" href="mailto:info@ukaaye.com">info@ukaaye.com</a>
            </div>
          </div>
        </div>
        <div class="social-media-text">
            <a href="#"><i class="fa-brands fa-facebook"></i>Facebook</a>
            <a href="#"><i class="fa-brands fa-twitter"></i>Twitter</a>
            <a href="#"><i class="fa-brands fa-linkedin"></i>Linked in</a>
        </div>
      </div>
    </div>
  </div>
  <div class="bottom-bar">
    <div class="container">
        <div class="bottom-bar-text">
            <div class="logo" style="display:flex;align-items:center;gap:12px;">
                <a href="{{ route('home') }}" style="display:flex;align-items:center;text-decoration:none;">
                    <img src="assets/img/logo/logo_bg_remove.png" 
                        alt="Ukaaye" 
                        style="max-height:70px;width:auto;height:auto;vertical-align:middle;">
                    <span style="display:none; font-family:'Poppins',sans-serif;font-size:28px;font-weight:700;color:#ffffff;letter-spacing:1px;line-height:1;">
                        Ukaaye
                    </span>
                </a>
            </div>
            <nav class="navbar">
                <ul class="navbar-links">
                    <li class="navbar-dropdown">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="navbar-dropdown">
                        <a href="{{ route('about') }}">About</a>
                    </li>
                    <li class="navbar-dropdown">
                        <a href="{{ route('services') }}">Services</a>
                    </li>
                    <li class="navbar-dropdown menu-item-children">
                        <a href="{{ route('products') }}">Products</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('products') }}">Products</a></li>
                            <li><a href="{{ route('cart') }}">Cart</a></li>
                        </ul>
                    </li>

                    <li class="navbar-dropdown">
                        <a href="{{ route('blog') }}">Blog</a>
                    </li>
                    
                    <li class="navbar-dropdown menu-item-children">
                        <a href="#">More</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
                            <li><a href="{{ route('faq') }}">FAQs</a></li>
                            <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        </ul>
                    </li>
                    <li class="navbar-dropdown">
                        <a href="{{ route('contactus') }}">Contact</a>
                    </li>
                </ul>
            </nav>
            <div class="menu-end" style="display:flex; align-items:center; gap:16px;">
                <div class="bar-menu">
                  <i class="fa-solid fa-bars"></i>
                </div>

                <a href="{{ route('cart') }}" id="header-cart-icon" style="position:relative; display:inline-flex; align-items:center; justify-content:center; width:42px; height:42px; border-radius:50%; background:var(--primary-color); color:#fff; text-decoration:none; flex-shrink:0;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                    @php $cartCount = count(session('cart', [])); @endphp
                    <span id="cart-count-badge" style="position:absolute; top:-5px; right:-5px; min-width:18px; height:18px; background:#fff; color:var(--primary-color); border:2px solid var(--primary-color); border-radius:20px; font-family:'Mulish',sans-serif; font-size:10px; font-weight:800; display:{{ $cartCount > 0 ? 'flex' : 'none' }}; align-items:center; justify-content:center; padding:0 4px; line-height:1;">{{ $cartCount }}</span>
                </a>
                <a href="{{ route('contactus') }}" class="btn">Request a Quote</a>
            </div>
      </div>
    </div>
  </div>
    <div class="mobile-nav hmburger-menu" id="mobile-nav" style="display:block;">
        <div class="res-log">
            <a href="{{ route('home') }}" class="logo">
                <img src="assets/img/logo.png" alt="Responsive Logo" class="white-logo">
            </a>
        </div>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="about.html">about</a></li>
            <li class="menu-item-has-children"><a href="JavaScript:void(0)">pages</a>
                <ul class="sub-menu">
                    <li><a href="our-project.html">our project</a></li>
                    <li><a href="our-project-2.html">our project 2</a></li>
                    <li><a href="project-details.html">project details</a></li>
                    <li><a href="our-history.html">our history</a></li>
                    <li><a href="pricing-plans.html">pricing plans</a></li>
                    <li><a href="faq.html">faq</a></li>
                    <li><a href="404.html">404</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a href="JavaScript:void(0)">service</a>
                <ul class="sub-menu">
                    <li><a href="our-services.html">our services</a></li>
                    <li><a href="service-details.html">service details</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a href="JavaScript:void(0)">News</a>
                <ul class="sub-menu">
                    <li><a href="our-blog.html">our blog</a></li>
                    <li><a href="blog-details.html">blog details</a></li>
                </ul>
            </li>
            <li><a href="Contact.html">Contact</a></li>
        </ul>
        <a href="JavaScript:void(0)" id="res-cross"></a>
    </div>
    <div class="mobile-nav desktop-menu">
          <h2>Installation and Maintenance of Solar Panels</h2>
          <p class="des">Practical renewable energy technology thatreduces costs and helps the environment</p>
          <figure>
            <img src="https://placehold.co/320x163" alt="img">
          </figure>
          <h3>Get in touch</h3>
          <p class="num"><a href="callto:+18880002222">+18880002222</a></p>
          <p class="adrs">374 William S Canning Blvd, Fall River MA 2721, USA</p>
          <div class="social-medias">
              <a href="javascript:void(0)">Facebook</a>
              <a href="javascript:void(0)">Twitter</a>
              <a href="javascript:void(0)">Linkedin</a>
            </div>
        </div>
</header>