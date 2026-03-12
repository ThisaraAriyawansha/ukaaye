<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>404 – Page Not Found | Ukaaye Satellite Systems</title>
  <meta name="robots" content="NOINDEX,FOLLOW">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/logo_bg_remove.webp') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Mulish:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #124179;
      --theme-colour: #FFC80B;
    }
    *, *::before, *::after { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: 'Mulish', sans-serif;
      background: #f5f7fa;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    /* ── Header ── */
    .err-header {
      background: #fff;
      border-bottom: 3px solid var(--theme-colour);
      padding: 18px 40px;
      display: flex;
      align-items: center;
    }
    .err-header a { display: inline-block; }
    .err-header img { height: 52px; width: auto; }

    /* ── Main ── */
    .err-main {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 60px 20px;
    }
    .err-card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 8px 40px rgba(18,65,121,0.10);
      padding: 60px 50px;
      max-width: 620px;
      width: 100%;
      text-align: center;
    }
    .err-code {
      font-family: 'Poppins', sans-serif;
      font-size: 100px;
      font-weight: 700;
      line-height: 1;
      color: var(--primary-color);
      position: relative;
      display: inline-block;
      margin-bottom: 8px;
    }
    .err-code span {
      color: var(--theme-colour);
    }
    .err-icon {
      font-size: 48px;
      color: var(--theme-colour);
      margin-bottom: 16px;
      display: block;
    }
    .err-title {
      font-family: 'Poppins', sans-serif;
      font-size: 26px;
      font-weight: 700;
      color: var(--primary-color);
      margin: 0 0 12px;
    }
    .err-desc {
      font-size: 15px;
      color: #666;
      margin: 0 0 36px;
      line-height: 1.7;
    }
    .err-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 14px;
      justify-content: center;
    }
    .btn-primary-err {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--primary-color);
      color: #fff;
      padding: 14px 32px;
      font-size: 14px;
      font-weight: 700;
      text-decoration: none;
      border-radius: 4px;
      transition: opacity .25s;
    }
    .btn-primary-err:hover { opacity: .85; color: #fff; }
    .btn-outline-err {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      border: 2px solid var(--primary-color);
      color: var(--primary-color);
      padding: 12px 28px;
      font-size: 14px;
      font-weight: 700;
      text-decoration: none;
      border-radius: 4px;
      transition: opacity .25s;
      background: transparent;
    }
    .btn-outline-err:hover { opacity: .75; color: var(--primary-color); }

    /* ── Footer ── */
    .err-footer {
      background: var(--primary-color);
      color: rgba(255,255,255,0.7);
      text-align: center;
      padding: 18px 20px;
      font-size: 13px;
    }
    .err-footer a { color: var(--theme-colour); text-decoration: none; }

    @media (max-width: 480px) {
      .err-card { padding: 40px 24px; }
      .err-code { font-size: 72px; }
      .err-title { font-size: 20px; }
      .err-header { padding: 14px 20px; }
    }
  </style>
</head>
<body>

  <header class="err-header">
    <a href="{{ url('/') }}">
      <img src="{{ asset('assets/img/logo/main_img_3.webp') }}" alt="Ukaaye Satellite Systems">
    </a>
  </header>

  <main class="err-main">
    <div class="err-card">
      <span class="err-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
      <div class="err-code">4<span>0</span>4</div>
      <h1 class="err-title">Page Not Found</h1>
      <p class="err-desc">
        Sorry, the page you are looking for doesn't exist or may have been moved.<br>
        Let's get you back on track.
      </p>
      <div class="err-actions">
        <a href="{{ url('/') }}" class="btn-primary-err">
          <i class="fa-solid fa-house"></i> Back to Home
        </a>
        <a href="{{ route('products') }}" class="btn-outline-err">
          <i class="fa-solid fa-box-open"></i> Browse Products
        </a>
        <a href="{{ route('contactus') }}" class="btn-outline-err">
          <i class="fa-solid fa-headset"></i> Contact Support
        </a>
      </div>
    </div>
  </main>

  <footer class="err-footer">
    &copy; {{ date('Y') }} Ukaaye Satellite Systems. All rights reserved. &nbsp;|&nbsp;
    <a href="{{ route('privacypolicy') }}">Privacy Policy</a> &nbsp;|&nbsp;
    <a href="{{ route('terms') }}">Terms &amp; Conditions</a>
  </footer>

</body>
</html>
