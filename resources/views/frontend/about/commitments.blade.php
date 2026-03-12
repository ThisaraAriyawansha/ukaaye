<style>
  /* ── Why Choose Us ── */
  .wcu-image-wrap {
    position: relative;
    margin-bottom: 40px;
  }

  .wcu-image-wrap .wcu-img-box {
    height: auto;
    overflow: hidden;
  }

  .wcu-image-wrap .wcu-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .wcu-stats-card {
    position: absolute;
    bottom: 30px;
    right: -20px;
    background: var(--common-colour);
    padding: 24px 28px;
    min-width: 180px;
    text-align: center;
  }

  .wcu-stats-card h2 {
    color: var(--theme-colour);
    font-size: 44px;
    font-weight: 900;
    margin: 0;
    line-height: 1;
  }

  .wcu-stats-card p {
    color: rgba(255,255,255,0.85);
    font-size: 13px;
    margin: 6px 0 0;
    font-weight: 600;
  }

  .wcu-accent-block {
    position: absolute;
    top: -20px;
    left: -20px;
    width: 90px;
    height: 90px;
    background: var(--theme-colour);
    z-index: -1;
  }

  .wcu-content {
    padding-left: 50px;
  }

  .wcu-content p {
    color: #555;
    font-size: 15px;
    line-height: 1.9;
    margin-bottom: 32px;
  }

  .wcu-features {
    display: flex;
    flex-direction: column;
    gap: 22px;
  }

  .wcu-feature-item {
    display: flex;
    gap: 18px;
    align-items: flex-start;
  }

  .wcu-feature-icon {
    width: 52px;
    height: 52px;
    background: var(--common-colour);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .wcu-feature-item h5 {
    color: var(--common-colour);
    font-size: 16px;
    font-weight: 700;
    margin: 0 0 5px;
  }

  .wcu-feature-item p {
    color: #666;
    font-size: 14px;
    line-height: 1.7;
    margin: 0;
  }

  .wcu-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--common-colour);
    color: #fff;
    padding: 14px 32px;
    font-size: 15px;
    font-weight: 700;
    text-decoration: none;
    margin-top: 32px;
    transition: opacity 0.3s;
  }

  .wcu-btn:hover { opacity: 0.85; color: #fff; }

  /* ── CTA Banner ── */
  .cta-section {
    background-color: var(--theme-colour);
    padding: 80px 0;
    position: relative;
    overflow: hidden;
  }

  .cta-deco-1 {
    position: absolute;
    top: -60px; left: -60px;
    width: 250px; height: 250px;
    border-radius: 50%;
    background: rgba(18,65,121,0.08);
    pointer-events: none;
  }

  .cta-deco-2 {
    position: absolute;
    bottom: -80px; right: -40px;
    width: 320px; height: 320px;
    border-radius: 50%;
    background: rgba(18,65,121,0.06);
    pointer-events: none;
  }

  .cta-deco-3 {
    position: absolute;
    top: 50%; right: 10%;
    transform: translateY(-50%);
    opacity: 0.06;
    pointer-events: none;
  }

  .cta-inner {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 28px;
  }

  .cta-text { flex: 1; min-width: 260px; }

  .cta-text span {
    color: var(--common-colour);
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 3px;
    display: block;
    margin-bottom: 10px;
    opacity: 0.7;
  }

  .cta-text h2 {
    color: var(--common-colour);
    font-size: 34px;
    font-weight: 900;
    margin: 0;
    line-height: 1.2;
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
    background: var(--common-colour);
    color: #fff;
    padding: 15px 32px;
    font-size: 15px;
    font-weight: 700;
    text-decoration: none;
    transition: opacity 0.3s;
  }

  .cta-btn-primary:hover { opacity: 0.85; color: #fff; }

  .cta-btn-outline {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: transparent;
    border: 2px solid var(--common-colour);
    color: var(--common-colour);
    padding: 13px 28px;
    font-size: 15px;
    font-weight: 700;
    text-decoration: none;
    transition: opacity 0.3s;
  }

  .cta-btn-outline:hover { opacity: 0.7; color: var(--common-colour); }

  /* ── Responsive ── */
  @media (max-width: 991px) {
    .wcu-content {
      padding-left: 15px;
      margin-top: 20px;
    }

    .wcu-image-wrap .wcu-img-box {
      height: 420px;
    }

    .wcu-stats-card {
      right: 10px;
      bottom: 15px;
      padding: 18px 22px;
      min-width: 150px;
    }

    .wcu-stats-card h2 { font-size: 36px; }

    .cta-text h2 { font-size: 28px; }
  }

  @media (max-width: 767px) {
    .wcu-image-wrap .wcu-img-box {
      height: 300px;
    }

    .wcu-accent-block {
      width: 60px;
      height: 60px;
      top: -10px;
      left: -10px;
    }

    .wcu-stats-card {
      right: 10px;
      bottom: 10px;
      padding: 14px 18px;
      min-width: 130px;
    }

    .wcu-stats-card h2 { font-size: 30px; }
    .wcu-stats-card p  { font-size: 11px; }

    .wcu-content { padding-left: 0; margin-top: 30px; }

    .wcu-btn {
      width: 100%;
      justify-content: center;
      padding: 13px 20px;
    }

    .cta-section { padding: 50px 0; }

    .cta-inner {
      flex-direction: column;
      align-items: flex-start;
    }

    .cta-text h2 {
      font-size: 24px;
      line-height: 1.3;
    }

    .cta-buttons {
      width: 100%;
      flex-direction: column;
    }

    .cta-btn-primary,
    .cta-btn-outline {
      width: 100%;
      justify-content: center;
      padding: 14px 20px;
    }

    .cta-deco-3 { display: none; }
  }

  @media (max-width: 480px) {
    .wcu-image-wrap .wcu-img-box { height: 240px; }

    .wcu-stats-card {
      position: relative;
      right: auto;
      bottom: auto;
      display: inline-flex;
      align-items: center;
      gap: 12px;
      padding: 14px 20px;
      margin-top: 12px;
      min-width: unset;
      width: 100%;
      text-align: left;
    }

    .wcu-stats-card h2 { font-size: 28px; margin: 0; }
  }
</style>

<!-- ── Why Choose Us Section ── -->
<section class="gap" style="background-color:#ffffff;">
  <div class="container">
    <div class="row" style="align-items:center;">

      <!-- Left Image -->
      <div class="col-lg-6">
        <div class="wcu-image-wrap">
          <div class="wcu-img-box">
            <img src="{{ asset('assets/img/about/Gemini_Generated_Image_qtm7zoqtm7zoqtm7.png') }}" alt="Why Choose Us">
          </div>
          <div class="wcu-stats-card">
            <h2>25+</h2>
            <p>Years of Experience</p>
          </div>
          <div class="wcu-accent-block"></div>
        </div>
      </div>

      <!-- Right Content -->
      <div class="col-lg-6">
        <div class="wcu-content">
          <div class="heading" style="text-align:left; margin-left:0;">
            <span>Why Choose Us</span>
            <h2>We Deliver What Others Only Promise</h2>
          </div>

          <p>With over two decades of experience, we bring unmatched expertise, dedication, and quality to every project. Our team of professionals is committed to exceeding your expectations at every step.</p>

          @php
            $features = [
              [
                'icon' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
                'title' => 'Trusted & Certified',
                'desc'  => 'Fully certified and compliant with all industry standards and regulations.',
              ],
              [
                'icon' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
                'title' => 'On-Time Delivery',
                'desc'  => 'We respect your time and consistently deliver projects on schedule.',
              ],
              [
                'icon' => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/>',
                'title' => 'Expert Team',
                'desc'  => 'Our skilled professionals bring years of hands-on experience to every job.',
              ],
              [
                'icon' => '<path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>',
                'title' => '100% Quality Guarantee',
                'desc'  => 'Every product and service comes with our full quality assurance promise.',
              ],
            ];
          @endphp

          <div class="wcu-features">
            @foreach($features as $feature)
            <div class="wcu-feature-item">
              <div class="wcu-feature-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="var(--theme-colour)" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  {!! $feature['icon'] !!}
                </svg>
              </div>
              <div>
                <h5>{{ $feature['title'] }}</h5>
                <p>{{ $feature['desc'] }}</p>
              </div>
            </div>
            @endforeach
          </div>

          <a href="{{ route('about') }}" class="wcu-btn">
            Learn More About Us
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5">
              <line x1="5" y1="12" x2="19" y2="12"/>
              <polyline points="12 5 19 12 12 19"/>
            </svg>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── CTA Banner Section ── -->
<section class="cta-section" style="display:none">
  <div class="cta-deco-1"></div>
  <div class="cta-deco-2"></div>
  <div class="cta-deco-3">
    <svg width="200" height="200" viewBox="0 0 24 24" fill="var(--common-colour)">
      <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
    </svg>
  </div>

  <div class="container">
    <div class="cta-inner">

      <div class="cta-text">
        <span>Get Started Today</span>
        <h2>Have a Project in Mind?<br>Let's Build It Together.</h2>
      </div>

      <div class="cta-buttons">
        <a href="{{ route('contactus') }}" class="cta-btn-primary">
          Contact Us Now
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5">
            <line x1="5" y1="12" x2="19" y2="12"/>
            <polyline points="12 5 19 12 12 19"/>
          </svg>
        </a>

        <a href="tel:+94777384992" class="cta-btn-outline">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="var(--common-colour)" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
          </svg>
          Call Us Now
        </a>
      </div>

    </div>
  </div>
</section>