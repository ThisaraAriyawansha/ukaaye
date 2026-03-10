@php
  $icons = ['flaticon-link', 'flaticon-global', 'flaticon-maintenance'];
@endphp

<section>
  <div class="container">
    <div class="heading">
      <img src="{{ asset('assets/img/heading-img.png') }}" alt="Ukaaye">
      <span>Welcome to Ukaaye – Reliable Connectivity Solutions</span>
      <h2>Empower Your Network & Satellite Experience</h2>
    </div>
    <div class="row">
      @foreach($homeServices as $service)
      <div class="col-lg-4">
        <div class="services">
          <i class="{{ $icons[$loop->index % 3] }}"></i>
          <h3><a href="{{ url($service->slug) }}">{{ $service->title }}</a></h3>
          <p>{{ Str::limit(strip_tags($service->description), 150) }}</p>
          <a href="{{ url($service->slug) }}"><i class="flaticon-right-up"></i></a>
          @if($service->image_path && str_starts_with($service->image_path, 'assets/'))
            <img src="{{ asset($service->image_path) }}" alt="{{ $service->title }}" style="width:100%; height:199px; object-fit:cover;">
          @elseif($service->image_path)
            <img src="{{ Storage::url($service->image_path) }}" alt="{{ $service->title }}" style="width:100%; height:199px; object-fit:cover;">
          @else
            <img src="{{ asset('assets/img/services/pexels-tima-miroshnichenko-6755135.jpg') }}" alt="{{ $service->title }}" style="width:100%; height:199px; object-fit:cover;">
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
    <div class="center">
        <a href="{{ route('services') }}" class="btn">View All Services</a>
      </div>
</section>