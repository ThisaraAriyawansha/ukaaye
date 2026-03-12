<section style="background-image: url(assets/img/hero/asnTr.jpg);" class="bannr">
  <div class="container">
    <div class="bannr-text">
      <h2>{{ $product->title }}</h2>
      <p>Expert network, satellite, and electronic solutions for homes and businesses</p>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ route('products') }}">Our Products</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
      </ol>
    </div>
  </div>
</section>