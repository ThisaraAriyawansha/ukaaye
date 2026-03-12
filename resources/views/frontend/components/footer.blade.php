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
              <h2>Have a CATV, CCTV or Fiber Project?<br>Let's Build It Together.</h2>
            </div>

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
    <li><a href="#" style="color: #ccc; text-decoration: none; font-size: 14px;">Privacy Policy</a></li>
    <li><a href="#" style="color: #ccc; text-decoration: none; font-size: 14px;">Terms & Conditions</a></li>
    <li><a href="{{ route('about') }}" style="color: #ccc; text-decoration: none; font-size: 14px;">About Us</a></li>
  </ul>
</div>
  </div>
  <img src="assets/img/footer-icon.png" alt="footer-icon" class="footer-icon">
</footer>