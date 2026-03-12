<section class="gap" style="background-color:#ffffff;">
  <div class="container">

    {{-- Heading --}}
    <div class="heading" style="text-align:center; margin-bottom:50px;">
      <img src="{{ asset('assets/img/heading-img.png') }}" alt="img">
      <span>Our Gallery</span>
      <h2>Explore Our Work</h2>
    </div>

    {{-- Filter Buttons --}}
    @php
      $categoryNames = $galleries->pluck('category_name')->filter()->unique()->values();
    @endphp

    @if($categoryNames->count())
    <div style="display:flex; flex-wrap:wrap; gap:10px; justify-content:center; margin-bottom:40px;">
      <button onclick="filterGallery('all')" id="btn-all"
        style="padding:8px 22px; border:2px solid var(--common-colour); background:var(--common-colour); color:#fff; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.3s;">
        All
      </button>
      @foreach($categoryNames as $cat)
      <button onclick="filterGallery('{{ Str::slug($cat) }}')" id="btn-{{ Str::slug($cat) }}"
        style="padding:8px 22px; border:2px solid var(--common-colour); background:transparent; color:var(--common-colour); font-size:14px; font-weight:600; cursor:pointer; transition:all 0.3s;">
        {{ $cat }}
      </button>
      @endforeach
    </div>
    @endif

    {{-- Gallery Grid --}}
    <div class="row" id="gallery-grid">
      @forelse($galleries as $gallery)
      <div class="col-lg-4 col-md-6 gallery-item"
           data-category="{{ Str::slug($gallery->category_name) }}"
           style="margin-bottom:24px; transition:all 0.3s;">
        <div style="position:relative; overflow:hidden; height:280px; cursor:pointer;"
             onclick="openLightbox('{{ $gallery->image_url }}', '{{ $gallery->name }}')">

          {{-- Image --}}
          <img src="{{ $gallery->image_url }}" alt="{{ $gallery->name }}"
            style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;"
            onmouseover="this.style.transform='scale(1.08)'"
            onmouseout="this.style.transform='scale(1)'">

          {{-- Overlay --}}
          <div style="
            position:absolute;
            inset:0;
            background:rgba(18,65,121,0.65);
            opacity:0;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            gap:8px;
            transition:opacity 0.3s ease;
          "
          onmouseover="this.style.opacity='1'"
          onmouseout="this.style.opacity='0'">

            <div style="width:44px; height:44px; border:2px solid var(--theme-colour); border-radius:50%; display:flex; align-items:center; justify-content:center;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--theme-colour)" stroke-width="2.5">
                <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                <line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/>
              </svg>
            </div>

            @if($gallery->name)
            <span style="color:#fff; font-size:14px; font-weight:600; text-align:center; padding:0 16px;">
              {{ $gallery->name }}
            </span>
            @endif

            @if($gallery->category_name)
            <span style="color:var(--theme-colour); font-size:12px; font-weight:600; text-transform:uppercase; letter-spacing:1px;">
              {{ $gallery->category_name }}
            </span>
            @endif

          </div>
        </div>
      </div>
      @empty
      <div class="col-12">
        <p style="text-align:center; color:#aaa; padding:60px 0;">No gallery items found.</p>
      </div>
      @endforelse
    </div>

  </div>
</section>

{{-- Lightbox --}}
<div id="lightbox" onclick="closeLightbox()"
  style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0); z-index:9999; align-items:center; justify-content:center; padding:20px; transition:background 0.3s ease;">
  <div id="lightbox-inner"
       onclick="event.stopPropagation()"
       style="position:relative; max-width:900px; width:100%; transform:scale(0.85); opacity:0; transition:transform 0.35s ease, opacity 0.35s ease;">

    {{-- Close Button --}}
    <button onclick="closeLightbox()"
      style="position:absolute; top:-44px; right:0; background:none; border:none; color:#fff; font-size:30px; cursor:pointer; line-height:1;">
      ✕
    </button>

    {{-- Top accent bar --}}
    <div style="height:4px; background:var(--theme-colour); width:100%; margin-bottom:0;"></div>

    <img id="lightbox-img" src="" alt=""
      style="width:100%; max-height:80vh; object-fit:contain; display:block; background:#111;">

    {{-- Caption bar --}}
    <div style="background:var(--common-colour); padding:12px 20px; display:flex; justify-content:space-between; align-items:center;">
      <span id="lightbox-caption" style="color:#fff; font-size:15px; font-weight:600;"></span>
      <span id="lightbox-category" style="color:var(--theme-colour); font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:1px;"></span>
    </div>

  </div>
</div>

<script>
  function openLightbox(src, caption) {
    const lb    = document.getElementById('lightbox');
    const inner = document.getElementById('lightbox-inner');
    const img   = document.getElementById('lightbox-img');

    img.src = '';
    document.getElementById('lightbox-caption').textContent = caption;

    lb.style.display = 'flex';
    document.body.style.overflow = 'hidden';

    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        lb.style.background    = 'rgba(0,0,0,0.92)';
        inner.style.opacity    = '1';
        inner.style.transform  = 'scale(1)';
      });
    });

    img.src = src;
  }

  function closeLightbox() {
    const lb    = document.getElementById('lightbox');
    const inner = document.getElementById('lightbox-inner');

    lb.style.background   = 'rgba(0,0,0,0)';
    inner.style.opacity   = '0';
    inner.style.transform = 'scale(0.85)';

    setTimeout(() => {
      lb.style.display          = 'none';
      document.body.style.overflow = '';
      inner.style.transform     = 'scale(0.85)';
      inner.style.opacity       = '0';
    }, 350);
  }

  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeLightbox();
  });

  function filterGallery(category) {
    const items   = document.querySelectorAll('.gallery-item');
    const buttons = document.querySelectorAll('[id^="btn-"]');

    buttons.forEach(btn => {
      btn.style.background = 'transparent';
      btn.style.color      = 'var(--common-colour)';
      btn.style.border     = '2px solid var(--common-colour)';
    });

    const activeBtn = document.getElementById('btn-' + category);
    if (activeBtn) {
      activeBtn.style.background = 'var(--common-colour)';
      activeBtn.style.color      = '#fff';
    }

    items.forEach(item => {
      item.style.display = (category === 'all' || item.dataset.category === category)
        ? 'block'
        : 'none';
    });
  }
</script>