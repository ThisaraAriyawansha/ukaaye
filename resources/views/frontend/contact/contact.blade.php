<style>
  .inputbox.select-box {
    background: #fff;
    border: 1px solid #7a8187;
    padding: 0;
    position: relative;
  }

  .inputbox.select-box select {
    width: 100%;
    height: 100%;
    border: none;
    background: transparent;
    outline: none;
    font-size: inherit;
    color: #999;
    cursor: pointer;
    padding: 15px 20px;
    appearance: none;
    -webkit-appearance: none;
  }

  .inputbox.select-box select.selected {
    color: #333;
  }

  .inputbox.select-box::after {
    content: '▾';
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
    color: #999;
    font-size: 16px;
  }

  /* ── Custom Toast ── */
  #custom-toast {
    position: fixed;
    z-index: 9999;
    background: #fff;
    border-left: 5px solid var(--primary-color);
    border-radius: 10px;
    padding: 16px 18px;
    display: flex;
    align-items: flex-start;
    gap: 12px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    opacity: 0;
    pointer-events: none;
    overflow: hidden;
    transition: opacity 0.35s ease, transform 0.35s ease;

    /* Desktop: top-right */
    top: 30px;
    right: 30px;
    left: auto;
    bottom: auto;
    min-width: 320px;
    max-width: 420px;
    width: auto;
    transform: translateX(80px);
  }

  #custom-toast.show {
    opacity: 1;
    transform: translateX(0);
    pointer-events: all;
  }

  /* Mobile: full-width bottom bar */
  @media (max-width: 575px) {
    #custom-toast {
      top: auto;
      bottom: 20px;
      right: 16px;
      left: 16px;
      min-width: unset;
      max-width: unset;
      width: calc(100% - 32px);
      border-radius: 10px;
      transform: translateY(100px);
    }

    #custom-toast.show {
      transform: translateY(0);
    }
  }

  /* Tablet: slightly smaller than desktop */
  @media (min-width: 576px) and (max-width: 991px) {
    #custom-toast {
      top: 20px;
      right: 20px;
      min-width: 280px;
      max-width: 360px;
    }
  }

  #custom-toast .toast-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--primary-color);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: #fff;
    font-size: 16px;
    font-weight: 700;
  }

  #custom-toast .toast-body {
    flex: 1;
    min-width: 0;
  }

  #custom-toast .toast-title {
    font-weight: 700;
    font-size: 14px;
    color: #222;
    margin-bottom: 3px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  #custom-toast .toast-msg {
    font-size: 13px;
    color: #666;
    line-height: 1.5;
    word-break: break-word;
  }

  #custom-toast .toast-close {
    background: none;
    border: none;
    font-size: 16px;
    color: #aaa;
    cursor: pointer;
    padding: 0;
    line-height: 1;
    flex-shrink: 0;
    transition: color 0.2s;
    align-self: flex-start;
  }

  #custom-toast .toast-close:hover {
    color: var(--primary-color);
  }

  #custom-toast .toast-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 4px;
    width: 100%;
    background: var(--primary-color);
    transform-origin: left;
    opacity: 0.5;
  }

  @keyframes toast-shrink {
    from { transform: scaleX(1); }
    to   { transform: scaleX(0); }
  }
</style>

<!-- Custom Toast -->
<div id="custom-toast">
  <div class="toast-icon">✓</div>
  <div class="toast-body">
    <div class="toast-title" id="toast-title"></div>
    <div class="toast-msg"   id="toast-msg"></div>
  </div>
  <button class="toast-close" onclick="hideToast()">✕</button>
  <div class="toast-progress" id="toast-progress"></div>
</div>

<section class="gap content-page">
  <div class="container">
    <div class="heading">
      <img src="assets/img/heading-img.png" alt="img">
      <span>Sri Lanka's Trusted Supplier for CATV, CCTV & Fiber Optic Solutions</span>
      <h2>We'd Love to Hear From You!</h2>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <form class="content-form" id="contact-form" method="post" action="{{ route('contact.store') }}">
          @csrf
          <h4>Let's Get in Touch – Send Your Enquiry</h4>

          <div class="inputbox">
            <input type="text" name="name" placeholder="Your Name" required>
            <div class="error-text text-danger small" id="error-name"></div>
          </div>

          <div class="inputbox">
            <input type="tel" name="number" placeholder="Phone / WhatsApp Number" required>
            <div class="error-text text-danger small" id="error-number"></div>
          </div>

          <div class="inputbox">
            <input type="email" name="mail" placeholder="Email Address" required>
            <div class="error-text text-danger small" id="error-mail"></div>
          </div>

          <div class="inputbox select-box">
            <select name="subject" required>
              <option value="" disabled selected>Type of Requirement</option>
              <option value="CATV & Satellite Distribution">CATV & Satellite Distribution</option>
              <option value="CCTV & Security">CCTV & Security</option>
              <option value="Fiber Optics & Data">Fiber Optics & Data</option>
              <option value="Other">Other</option>
            </select>
            <div class="error-text text-danger small" id="error-subject"></div>
          </div>

          <div class="textareabox">
            <textarea name="messagewr2" placeholder="Message / Project Details"></textarea>
            <div class="error-text text-danger small" id="error-messagewr2"></div>
          </div>

          <button type="submit" class="btn bk" id="submit-btn">Submit Enquiry Now</button>
        </form>
      </div>

      <div class="col-lg-4">
        <div class="content-page-info">
          <div class="d-flex align-items-center"><h3>Phone / WhatsApp:</h3><i class="flaticon-iphone"></i></div>
          <h5>Sri Lanka - <a href="tel:+94777384992">+94 777 38 4992</a></h5>
        </div>

        <div class="content-page-info">
          <div class="d-flex align-items-center"><h3>Location:</h3>
            <i><svg width="35" height="35" viewBox="0 0 35 35" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.4997 9.77051C15.0331 9.77051 13.0264 11.7773 13.0264 14.2438C13.0264 16.7104 15.0331 18.7171 17.4997 18.7171C19.9663 18.7171 21.973 16.7104 21.973 14.2438C21.973 11.7773 19.9662 9.77051 17.4997 9.77051Z" fill="black"/>
                <path d="M27.9679 4.33576C25.172 1.53979 21.4545 0 17.5005 0C13.5464 0 9.82899 1.53979 7.03309 4.33576C4.23706 7.1318 2.69727 10.8492 2.69727 14.8032C2.69727 22.8021 10.2605 29.4552 14.3238 33.0295C14.8884 33.5262 15.376 33.9551 15.7644 34.3178C16.2512 34.7727 16.8757 35 17.5004 35C18.1251 35 18.7498 34.7726 19.2365 34.318C19.625 33.9551 20.1125 33.5262 20.6771 33.0295C24.7404 29.4552 32.3036 22.8022 32.3036 14.8032C32.3036 10.8492 30.7638 7.1318 27.9679 4.33576ZM17.5005 20.7674C13.9033 20.7674 10.977 17.841 10.977 14.2438C10.977 10.6467 13.9033 7.7203 17.5005 7.7203C21.0976 7.7203 24.024 10.6467 24.024 14.2438C24.024 17.841 21.0976 20.7674 17.5005 20.7674Z" fill="black"/>
            </svg></i>
          </div>
          <h5>216A, Sea Beach Road,<br>Colombo 11, Sri Lanka</h5>
        </div>

        <div class="content-page-info">
          <div class="d-flex align-items-center"><h3>Email:</h3>
            <i><svg width="33" height="27" viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.45801 18.2397C0.853946 18.2397 0.364258 18.7295 0.364258 19.3335C0.364258 19.9375 0.853946 20.4272 1.45801 20.4272H5.83301C6.43706 20.4272 6.92676 19.9375 6.92676 19.3335C6.92676 18.7295 6.43706 18.2397 5.83301 18.2397H1.45801Z" fill="black"/>
              <path d="M1.45801 22.6147C0.853946 22.6147 0.364258 23.1045 0.364258 23.7085C0.364258 24.3125 0.853946 24.8022 1.45801 24.8022H10.208C10.8121 24.8022 11.3018 24.3125 11.3018 23.7085C11.3018 23.1045 10.8121 22.6147 10.208 22.6147H1.45801Z" fill="black"/>
              <path d="M4.53374 3.42302L4.375 3.29167C4.82475 2.67265 5.30337 2.21733 5.92239 1.76758C7.83912 0.375 10.5733 0.375 16.0417 0.375H18.9583C24.4266 0.375 27.1609 0.375 29.0776 1.76758C29.6966 2.21733 30.1375 2.62276 30.5872 3.24178L30.4041 3.42394L27.0384 6.78964C24.5859 9.24206 22.8228 11.0019 21.302 12.1623C19.8065 13.3033 18.6747 13.7609 17.4999 13.7609C16.3249 13.7609 15.1931 13.3033 13.6976 12.1623C12.1768 11.0019 10.4137 9.24206 7.96123 6.78964L5.12731 3.95572L4.53374 3.42302Z" fill="black"/>
              <path d="M2.91602 13.5C2.91602 9.65013 2.91602 7.15547 3.40196 5.34716L3.62163 5.54431L6.47295 8.39561C8.85334 10.776 10.7188 12.6415 12.37 13.9013C14.0601 15.1908 15.6537 15.9484 17.4992 15.9484C19.3446 15.9484 20.9382 15.1908 22.6283 13.9013C24.2794 12.6415 26.1449 10.776 28.5254 8.39564L31.5918 5.3291C32.0827 7.13885 32.0827 9.63731 32.0827 13.5C32.0827 18.9683 32.0827 21.7026 30.6901 23.6192C30.2404 24.2383 29.696 24.7827 29.0769 25.2324C27.1602 26.625 24.426 26.625 18.9577 26.625H16.041C13.958 26.625 12.2717 26.625 10.8762 26.548C12.1648 26.2458 13.1243 25.0891 13.1243 23.7083C13.1243 22.0975 11.8185 20.7917 10.2077 20.7917H8.35916C8.60732 20.3626 8.74935 19.8646 8.74935 19.3333C8.74935 17.7225 7.44351 16.4167 5.83268 16.4167H2.92653C2.91602 15.5401 2.91602 14.5726 2.91602 13.5Z" fill="black"/>
            </svg></i>
          </div>
          <h5><a href="mailto:info@ukaaye.com">info@ukaaye.com</a></h5>
        </div>
      </div>
    </div>

    <div class="mapouter">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126800!2d79.8612!3d6.9271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae253d10f7a81c7%3A0x2c7b0c3c0f3b0f0a!2sColombo%2C%20Sri%20Lanka!5e0!3m2!1sen!2slk!4v1720000000000"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</section>

<script>
  let toastTimer = null;

  function hideToast() {
    document.getElementById('custom-toast').classList.remove('show');
    clearTimeout(toastTimer);
  }

  function openToast(title, message, duration = 4000) {
    const toast    = document.getElementById('custom-toast');
    const progress = document.getElementById('toast-progress');

    document.getElementById('toast-title').textContent = title;
    document.getElementById('toast-msg').textContent   = message;

    progress.style.animation = 'none';
    progress.offsetHeight;
    progress.style.animation = `toast-shrink ${duration}ms linear forwards`;

    toast.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => hideToast(), duration);
  }

  // Select color toggle
  document.querySelector('select[name="subject"]').addEventListener('change', function () {
    this.classList.toggle('selected', this.value !== '');
  });

  // ── Attach BEFORE the theme's JS runs ──
  document.getElementById('contact-form').addEventListener('submit', function (e) {
    e.preventDefault();
    e.stopImmediatePropagation(); // 👈 blocks the theme's own submit handler

    const form      = this;
    const submitBtn = document.getElementById('submit-btn');

    document.querySelectorAll('.error-text').forEach(el => el.textContent = '');

    submitBtn.disabled    = true;
    submitBtn.textContent = 'Sending...';

    fetch(form.action, {
      method:  'POST',
      headers: {
        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
        'Accept':       'application/json',
      },
      body: new FormData(form)
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        openToast('Message Sent!', data.message);
        form.reset();
        form.querySelector('select[name="subject"]').classList.remove('selected');
      } else {
        if (data.errors) {
          Object.entries(data.errors).forEach(([field, messages]) => {
            const errEl = document.getElementById('error-' + field);
            if (errEl) errEl.textContent = messages[0];
          });
        }
        openToast('Oops!', data.message || 'Please correct the errors and try again.');
      }
    })
    .catch(() => {
      openToast('Oops!', 'Network error. Please try again.');
    })
    .finally(() => {
      submitBtn.disabled    = false;
      submitBtn.textContent = 'Submit Enquiry Now';
    });

  }, true); // 👈 useCapture:true — fires before any other listener on the form
</script>