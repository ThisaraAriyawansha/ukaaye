<section class="section-customer" style="background-image: url(assets/img/customer-background.png);">
  <div class="container">
    <div class="row">

      <div class="col-lg-6">
        <div class="heading two">
          <img src="assets/img/heading-img-two.png" alt="img"><span>Client's Reviews & Testimoials</span>
          <h2>What Our Customers Are Saying About Us</h2>
        </div>
        <div class="nav-c-slider">

          @foreach($homeTestimonials as $index => $testimonial)
          <a class="next-slide {{ $index === 0 ? 'nav-active' : '' }}" href="JavaScript:void(0)" data-slide="{{ $index + 1 }}">
            <img class="animate__animated animate__fadeIn" src="{{ $testimonial->image_url }}" alt="{{ $testimonial->name }}">
          </a>
          @endforeach

        </div>
        <div class="customer">
          <h5>customer satisfaction is very important to us</h5>
          <ul class="star">
            <li><i class="fa-solid fa-star"></i></li>
            <li><i class="fa-solid fa-star"></i></li>
            <li><i class="fa-solid fa-star"></i></li>
            <li><i class="fa-solid fa-star"></i></li>
            <li><i class="fa-solid fa-star"></i></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6">
          <div class="c-slider">
            @foreach($homeTestimonials as $testimonial)
            <div>
              <img src="assets/img/double-quote.png" alt="img">
              <p>{{ $testimonial->message }}</p>
              <ul class="star">
                @for($i = 1; $i <= 5; $i++)
                  <li><i class="fa-{{ $i <= $testimonial->star_count ? 'solid' : 'regular' }} fa-star"></i></li>
                @endfor
              </ul>
              <ul>
                <li><h3>{{ $testimonial->name }}</h3></li>
                <li><h5>{{ $testimonial->position }}</h5></li>
              </ul>
            </div>
            @endforeach
          </div>
      </div>
    </div>
  </div>
</section>
