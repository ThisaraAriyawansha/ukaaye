<style>
  .cta-section {
    background-color: var(--primary-color);
    padding: 80px 0;
    position: relative;
    overflow: hidden;
  }
  .cta-inner {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 32px;
  }
  .cta-text {
    flex: 1;
    min-width: 0;
  }
  .cta-text h2 {
    color: #ffffff;
    font-size: 36px;
    font-weight: 900;
    margin: 0;
    line-height: 1.2;
  }
  .cta-text span {
    color: #ffffff;
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 3px;
    display: block;
    margin-bottom: 12px;
    opacity: 0.9;
  }
  .cta-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 14px;
    align-items: center;
    flex-shrink: 0;
  }
  .cta-btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--theme-colour);
    color: #ffffff;
    padding: 16px 36px;
    font-size: 15px;
    font-weight: 700;
    text-decoration: none;
    transition: opacity 0.3s;
  }
  .cta-btn-outline {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: transparent;
    border: 2px solid var(--theme-colour);
    color: var(--theme-colour);
    padding: 14px 30px;
    font-size: 15px;
    font-weight: 700;
    text-decoration: none;
    transition: opacity 0.3s;
  }
  .cta-btn-primary:hover,
  .cta-btn-outline:hover {
    opacity: 0.9;
  }
  @media (max-width: 767px) {
    .cta-section {
      padding: 50px 0;
    }
    .cta-inner {
      flex-direction: column;
      align-items: flex-start;
      gap: 24px;
    }
    .cta-text h2 {
      font-size: 24px;
    }
    .cta-buttons {
      width: 100%;
    }
    .cta-btn-primary,
    .cta-btn-outline {
      width: 100%;
      justify-content: center;
      padding: 14px 20px;
    }
  }
  @media (min-width: 768px) and (max-width: 991px) {
    .cta-inner {
      flex-direction: column;
      align-items: flex-start;
      gap: 28px;
    }
    .cta-text h2 {
      font-size: 28px;
    }
    .cta-buttons {
      width: 100%;
    }
  }
</style>

<footer style="background-image: url(assets/img/footer-line.png);">
  <div class="footer-top">
      <section class="cta-section">
        {{-- Decorative elements --}}
        <div style="position:absolute; top:-60px; left:-60px; width:250px; height:250px; border-radius:50%; background:rgba(255,255,255,0.08); pointer-events:none;"></div>
        <div style="position:absolute; bottom:-80px; right:-40px; width:320px; height:320px; border-radius:50%; background:rgba(255,255,255,0.06); pointer-events:none;"></div>
        <div style="position:absolute; top:50%; right:10%; transform:translateY(-50%); opacity:0.06; pointer-events:none;">
          <svg width="200" height="200" viewBox="0 0 24 24" fill="#ffffff">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
          </svg>
        </div>

        <div class="container">
          <div class="cta-inner">

            {{-- Left Text --}}
            <div class="cta-text">
              <span>Get Started Today</span>
              <h2>Looking for CATV, CCTV or Fiber Products?<br>We Provide Quality Solutions.</h2>            </div>

            {{-- Right Buttons --}}
            <div class="cta-buttons">
              <a href="{{ route('contactus') }}" class="cta-btn-primary">
                Contact Us Now
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.5">
                  <line x1="5" y1="12" x2="19" y2="12"/>
                  <polyline points="12 5 19 12 12 19"/>
                </svg>
              </a>

              <a href="tel:+94777384992" class="cta-btn-outline">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--theme-colour)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
                </svg>
                Call Us Now
              </a>
            </div>

          </div>
        </div>
      </section>
    </div>
  <div class="container">
    
    
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="widget-title">
          <h3>Contact Us</h3>
          <div class="boder"></div>
          <div class="get-in-touch">
            <div><i>
              <svg width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_94_1733)">
                <path d="M15.31 0H7.65726C6.30674 0.00153143 5.21234 1.09593 5.211 2.44646V20.5537C5.21234 21.9042 6.30674 22.9986 7.65726 22.9999H15.31C16.6605 22.9986 17.7549 21.9042 17.7565 20.5537V2.44646C17.7549 1.09593 16.6605 0.00153143 15.31 0ZM11.4837 20.9092C10.9062 20.9092 10.4381 20.4411 10.4381 19.8636C10.4381 19.2862 10.9062 18.8182 11.4837 18.8182C12.0611 18.8182 12.5291 19.2862 12.5291 19.8636C12.5291 20.4411 12.0611 20.9092 11.4837 20.9092ZM13.0519 3.13636H9.91554C9.62687 3.13636 9.39275 2.90225 9.39275 2.61357C9.39275 2.3249 9.62687 2.09097 9.91554 2.09097H13.0519C13.3406 2.09097 13.5745 2.3249 13.5745 2.61357C13.5745 2.90225 13.3406 3.13636 13.0519 3.13636Z" fill="black"/>
                </g>
              </svg>
            </i></div>
            <div>
              <span>Phone No:</span> 
              <h6><a href="callto:+94777384992">+94777384992</a></h6>
            </div>
          </div>
          <div class="get-in-touch">
            <div><i>
              <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_94_1722)">
                <path d="M1.49888 15.54C1.09073 15.54 0.759857 15.8709 0.759857 16.2791C0.759857 16.6872 1.09073 17.0181 1.49888 17.0181H4.45496C4.8631 17.0181 5.19398 16.6872 5.19398 16.2791C5.19398 15.8709 4.8631 15.54 4.45496 15.54H1.49888Z" fill="black"/>
                <path d="M1.49888 18.4961C1.09073 18.4961 0.759857 18.827 0.759857 19.2351C0.759857 19.6433 1.09073 19.9741 1.49888 19.9741H7.41104C7.81919 19.9741 8.15006 19.6433 8.15006 19.2351C8.15006 18.827 7.81919 18.4961 7.41104 18.4961H1.49888Z" fill="black"/>
                <path d="M3.57686 5.5292L3.4696 5.44045C3.77349 5.02219 4.09688 4.71454 4.51514 4.41066C5.81023 3.46973 7.65765 3.46973 11.3525 3.46973H13.3232C17.018 3.46973 18.8655 3.46973 20.1605 4.41066C20.5788 4.71454 20.8767 4.98848 21.1806 5.40674L21.0568 5.52982L18.7827 7.80394C17.1256 9.46098 15.9343 10.65 14.9068 11.4341C13.8963 12.205 13.1316 12.5142 12.3377 12.5142C11.5438 12.5142 10.7791 12.205 9.76863 11.4341C8.74109 10.65 7.54977 9.46098 5.89273 7.80394L3.97792 5.88913L3.57686 5.5292Z" fill="black"/>
                <path d="M2.48424 12.3383C2.48424 9.737 2.48424 8.05142 2.81258 6.82958L2.961 6.96279L4.88757 8.88935C6.49594 10.4977 7.7564 11.7582 8.87207 12.6094C10.014 13.4807 11.0908 13.9926 12.3377 13.9926C13.5846 13.9926 14.6614 13.4807 15.8034 12.6094C16.919 11.7582 18.1795 10.4977 19.7879 8.88937L21.8598 6.81738C22.1914 8.04019 22.1914 9.72833 22.1914 12.3383C22.1914 16.0331 22.1914 17.8805 21.2505 19.1756C20.9466 19.5939 20.5788 19.9617 20.1605 20.2656C18.8655 21.2065 17.018 21.2065 13.3232 21.2065H11.3525C9.94503 21.2065 8.80564 21.2065 7.86274 21.1545C8.73343 20.9503 9.38176 20.1687 9.38176 19.2358C9.38176 18.1474 8.49944 17.2651 7.41104 17.2651H6.16204C6.32971 16.9752 6.42568 16.6387 6.42568 16.2797C6.42568 15.1913 5.54336 14.309 4.45496 14.309H2.49134C2.48424 13.7167 2.48424 13.063 2.48424 12.3383Z" fill="black"/>
                </g>
              </svg>
            </i></div>
            <div>
              <span>Email Address:</span> 
              <h6><a href="mailto:info@ukaaye.com">info@ukaaye.com</a></h6>
            </div>
          </div>
          <div class="get-in-touch">
            <div><i>
              <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_94_1710)">
                <path d="M12.3379 7.11523C10.6713 7.11523 9.31538 8.47115 9.31538 10.1377C9.31538 11.8043 10.6713 13.1602 12.3379 13.1602C14.0045 13.1602 15.3604 11.8043 15.3604 10.1377C15.3604 8.47115 14.0045 7.11523 12.3379 7.11523Z" fill="black"/>
                <path d="M19.4104 3.44324C17.5213 1.55407 15.0095 0.513672 12.3379 0.513672C9.66623 0.513672 7.15444 1.55407 5.26532 3.44324C3.37611 5.33245 2.33571 7.8442 2.33571 10.5158C2.33571 15.9205 7.44603 20.4158 10.1915 22.8309C10.573 23.1665 10.9024 23.4563 11.1648 23.7014C11.4937 24.0087 11.9157 24.1623 12.3378 24.1623C12.7599 24.1623 13.182 24.0087 13.5108 23.7015C13.7733 23.4563 14.1028 23.1665 14.4842 22.8309C17.2297 20.4159 22.34 15.9205 22.34 10.5159C22.34 7.8442 21.2996 5.33245 19.4104 3.44324ZM12.3379 14.5457C9.90739 14.5457 7.93009 12.5684 7.93009 10.1379C7.93009 7.70739 9.90739 5.73009 12.3379 5.73009C14.7684 5.73009 16.7457 7.70739 16.7457 10.1379C16.7457 12.5684 14.7683 14.5457 12.3379 14.5457Z" fill="black"/>
                </g>
              </svg>
            </i></div>
            <div>
              <span class="pt-2 pb-0">No. 12/7, Galle Road, Colombo 03, Sri Lanka</span>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6">
        <div class="widget-title">
          <h3>Useful Links</h3>
          <div class="boder"></div>
          <ul>
            <li><i class="fa-solid fa-caret-right"></i><a href="{{ route('home') }}">Home </a></li>
            <li><i class="fa-solid fa-caret-right"></i><a href="{{ route('about') }}">About Us</a></li>
            <li><i class="fa-solid fa-caret-right"></i><a href="{{ route('gallery') }}">Image Gallery </a></li>
            <li><i class="fa-solid fa-caret-right"></i><a href="{{ route('contactus') }}">Contact Us</a></li>
            <li><i class="fa-solid fa-caret-right"></i><a href="{{ route('faq') }}">Faq’s</a></li>
            <li><i class="fa-solid fa-caret-right"></i><a href="{{ route('services') }}">Services</a></li>
            <li><i class="fa-solid fa-caret-right"></i><a href="{{ route('products') }}">Products</a></li>
            <li><i class="fa-solid fa-caret-right"></i><a href="{{ route('testimonials') }}">Testimonials</a></li>
            <li><i class="fa-solid fa-caret-right"></i><a href="{{ route('blog') }}">News</a></li>
            <li><i class="fa-solid fa-caret-right"></i><a href="{{ route('cart') }}">Cart</a></li>
          </ul>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6">
        <div class="widget-title mb-0">
          <h3>Recent News</h3>
          <div class="boder"></div>
          <ul class="recent-news mb-0">
            @forelse($footerRecentBlogs as $blog)
            <li class="{{ $loop->last ? 'pb-0' : '' }}">
              <figure>
                  <img src="{{ $blog->image ? asset('storage/' . $blog->image) : 'assets/img/blog/544356456.png' }}" 
                      alt="{{ $blog->title }}" 
                      style="width:130px; height:110px; object-fit:cover;">
              </figure>
              <div>
                <span>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
                <a href="{{ url($blog->slug) }}">{{ Str::limit($blog->title, 40) }}</a>
              </div>
            </li>
            @empty
            <li>
              <p>No recent news available</p>
            </li>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
    
<div class="footer-bottom" style="border-top: 1px solid #333; padding: 20px 0; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
  <div>
    <h6 style="color: #fff; margin: 0 0 4px 0; font-size: 14px;">
      <b>Ⓒ Copyright UKAAYE {{ date('Y') }}</b>. All Right Reserved.
    </h6>
    <p style="margin: 0; font-size: 13px; color: #aaa;">
      Designed & Developed by
      <a href="https://creatxsoftware.com/" target="_blank" style="color: #BFC9D1; font-weight: 600; text-decoration: none;">
        Creatx Software
      </a>
    </p>
  </div>
  <ul style="list-style: none; padding: 0; margin: 0; display: flex; gap: 24px;">
    <li><a href="{{ route('privacypolicy') }}" style="color: #ccc; text-decoration: none; font-size: 14px;">Privacy Policy</a></li>
    <li><a href="{{ route('terms') }}" style="color: #ccc; text-decoration: none; font-size: 14px;">Terms & Conditions</a></li>
    <li><a href="{{ route('about') }}" style="color: #ccc; text-decoration: none; font-size: 14px;">About Us</a></li>
  </ul>
</div>
  </div>
  <img src="assets/img/footer-icon.png" alt="footer-icon" class="footer-icon">
</footer>

<!-- WhatsApp Chat Widget -->
<style>
  .wa-widget {
    position: fixed;
    bottom: 28px;
    left: 24px;
    z-index: 9999;
    font-family: sans-serif;
  }
  .wa-popup {
    display: none;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.18);
    width: 320px;
    overflow: hidden;
    margin-bottom: 14px;
    animation: waFadeIn 0.25s ease;
  }
  .wa-popup.active { display: block; }
  @keyframes waFadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .wa-popup-header {
    background: #25D366;
    padding: 18px 20px;
    display: flex;
    align-items: center;
    gap: 14px;
    position: relative;
  }
  .wa-popup-header svg { flex-shrink: 0; }
  .wa-popup-header-text h4 {
    color: #fff;
    margin: 0 0 4px;
    font-size: 16px;
    font-weight: 700;
  }
  .wa-popup-header-text p {
    color: rgba(255,255,255,0.9);
    margin: 0;
    font-size: 12.5px;
  }
  .wa-close-btn {
    position: absolute;
    right: 14px;
    top: 14px;
    background: rgba(255,255,255,0.25);
    border: none;
    border-radius: 50%;
    width: 26px;
    height: 26px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 14px;
    line-height: 1;
  }
  .wa-close-btn:hover { background: rgba(255,255,255,0.4); }
  .wa-popup-body {
    padding: 16px 20px;
    background: #f5f5f5;
  }
  .wa-popup-body p {
    color: #888;
    font-size: 12.5px;
    margin: 0 0 12px;
  }
  .wa-contact-item {
    background: #fff;
    border-radius: 10px;
    border-left: 3px solid #25D366;
    padding: 12px 14px;
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
    color: #333;
    transition: background 0.2s;
  }
  .wa-contact-item:hover { background: #f0fdf4; color: #333; }
  .wa-contact-item span { font-size: 14px; font-weight: 500; flex: 1; }
  .wa-float-btn {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #25D366;
    color: #fff;
    border: none;
    border-radius: 50px;
    padding: 14px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    box-shadow: 0 4px 16px rgba(37,211,102,0.45);
    transition: background 0.2s, box-shadow 0.2s;
    text-decoration: none;
  }
  .wa-float-btn:hover { background: #1ebe5d; box-shadow: 0 6px 20px rgba(37,211,102,0.55); color: #fff; }
  .wa-float-btn span { white-space: nowrap; }
  @media (max-width: 480px) {
    .wa-widget { left: 14px; bottom: 18px; }
    .wa-popup { width: 290px; }
  }
</style>

<div class="wa-widget">
  <!-- Popup -->
  <div class="wa-popup" id="waPopup">
    <div class="wa-popup-header">
      <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="20" cy="20" r="20" fill="rgba(255,255,255,0.2)"/>
        <path d="M20 8C13.373 8 8 13.373 8 20c0 2.14.558 4.148 1.532 5.893L8 32l6.312-1.507A11.94 11.94 0 0020 32c6.627 0 12-5.373 12-12S26.627 8 20 8zm5.89 16.396c-.248.698-1.458 1.337-2.01 1.386-.552.05-1.07.248-3.605-.748-3.04-1.196-4.99-4.31-5.138-4.507-.149-.198-1.19-1.585-1.19-3.022s.748-2.147 1.04-2.44c.248-.248.547-.31.73-.31.18 0 .36.002.52.01.165.007.39-.063.61.465.228.545.773 1.882.841 2.02.069.136.115.296.023.474-.09.178-.136.29-.27.445-.136.154-.286.345-.408.463-.136.13-.277.271-.12.531.16.26.705 1.162 1.513 1.882.99.885 1.826 1.16 2.086 1.29.26.13.41.11.563-.066.154-.176.66-.77.836-1.034.176-.265.35-.22.59-.132.24.088 1.524.72 1.785.85.26.13.433.196.496.307.063.11.063.64-.184 1.336z" fill="white"/>
      </svg>
      <div class="wa-popup-header-text">
        <h4>Start a Conversation</h4>
        <p>Hi! Click one of our member below to chat on <strong>WhatsApp</strong></p>
      </div>
      <button class="wa-close-btn" onclick="toggleWaPopup()" aria-label="Close">✕</button>
    </div>
    <div class="wa-popup-body">
      <p>The team typically replies in a few minutes.</p>
      <a href="https://wa.me/94777384992" target="_blank" class="wa-contact-item">
        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="18" cy="18" r="18" fill="#25D366"/>
          <path d="M18 7C12.477 7 8 11.477 8 17c0 1.925.502 3.733 1.379 5.304L8 28l5.832-1.352A10.946 10.946 0 0018 28c5.523 0 10-4.477 10-10S23.523 7 18 7zm4.8 14.756c-.223.628-1.312 1.203-1.809 1.247-.497.045-.963.223-3.245-.672-2.736-1.076-4.491-3.879-4.624-4.056-.134-.178-1.071-1.426-1.071-2.72s.673-1.932.936-2.196c.223-.223.492-.279.656-.279.163 0 .324.002.468.009.148.006.351-.057.549.419.205.49.696 1.694.757 1.818.062.123.103.266.021.427-.082.16-.123.261-.243.4-.122.139-.257.31-.367.417-.122.117-.249.244-.108.478.144.234.634 1.046 1.362 1.694.891.797 1.643 1.044 1.877 1.161.234.117.369.099.506-.06.138-.158.594-.693.752-.930.158-.238.315-.198.531-.119.216.08 1.372.648 1.607.765.234.117.39.176.447.276.057.099.057.576-.166 1.201z" fill="white"/>
        </svg>
        <span>Ukaaye Customer Support</span>
        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="11" cy="11" r="11" fill="#25D366"/>
          <path d="M11 4C7.134 4 4 7.134 4 11c0 1.178.307 2.284.843 3.243L4 18l3.832-.824A6.97 6.97 0 0011 18c3.866 0 7-3.134 7-7s-3.134-7-7-7zm2.94 9.02c-.137.384-.804.736-1.108.763-.304.028-.589.136-1.986-.412-1.674-.659-2.75-2.375-2.834-2.486-.082-.109-.655-.873-.655-1.665s.412-1.183.573-1.344c.136-.136.301-.17.401-.17.1 0 .198.001.286.006.091.004.215-.035.336.257.125.299.425 1.037.463 1.112.038.075.063.163.013.261-.05.098-.075.16-.149.245-.075.085-.157.19-.225.255-.075.072-.152.149-.066.293.088.143.388.64.834 1.037.546.488 1.006.639 1.149.711.143.072.226.061.31-.037.084-.097.364-.424.461-.570.097-.146.193-.121.325-.073.133.049.84.397.984.469.144.072.239.108.274.169.035.061.035.353-.101.737z" fill="white"/>
        </svg>
      </a>
    </div>
  </div>

  <!-- Float Button -->
  <button class="wa-float-btn" onclick="toggleWaPopup()">
    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M13 1C6.373 1 1 6.373 1 13c0 2.34.664 4.524 1.814 6.376L1 25l5.812-1.773A11.952 11.952 0 0013 25c6.627 0 12-5.373 12-12S19.627 1 13 1zm5.46 16.42c-.273.767-1.6 1.467-2.21 1.52-.61.054-1.178.271-3.97-.828-3.35-1.32-5.49-4.74-5.655-4.96-.165-.22-1.317-1.753-1.317-3.342s.827-2.372 1.15-2.695c.273-.273.607-.342.807-.342.2 0 .4.002.574.011.183.008.433-.07.678.518.252.602.856 2.082.93 2.234.074.15.124.327.025.525-.1.197-.15.32-.297.494-.15.17-.315.38-.45.51-.15.144-.305.3-.132.588.174.287.776 1.28 1.666 2.073 1.09.976 2.01 1.278 2.3 1.422.29.145.458.121.625-.073.17-.194.73-.852.924-1.144.193-.29.385-.242.649-.146.263.097 1.675.792 1.963.936.287.144.478.217.546.34.07.12.07.703-.2 1.47z" fill="white"/>
    </svg>
  </button>
</div>

<script>
  function toggleWaPopup() {
    var popup = document.getElementById('waPopup');
    popup.classList.toggle('active');
  }
  // Close popup when clicking outside
  document.addEventListener('click', function(e) {
    var widget = document.querySelector('.wa-widget');
    if (widget && !widget.contains(e.target)) {
      document.getElementById('waPopup').classList.remove('active');
    }
  });
</script>