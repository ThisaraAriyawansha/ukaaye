<footer id="footer">
    <section class="tf-subcribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="subcribe-wp">
                        <h2 class="title">Subscribe For Parenting Tips</h2>
                        <p class="sub f-mulish">Get expert advice, new product updates & special offers for your little one.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="subcribe-form fx" id="subscribe-form">
                        <form action="#">
                            <input type="email" id="subscribe-email" placeholder="Email Address">
                            <button class="fl-btn st-7" id="subscribe-button"><span class="inner">Subscribe</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="footer-inner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="widget-footer">
                        <div class="widget widget-logo">
                            <div class="logo-bottom" id="logo-footer">
                                <a href="index.html"><img src="assets/images/logo/logo_bg.png" 
                                style="max-height: 80px; width: auto; height: auto;" alt="Aromat Baby Food"></a>
                            </div>
                            <p class="wrap f-mulish">Sri Lanka's most trusted baby food brand. Made with love, fed with trust. Pure, organic nutrition for every stage.</p>
                            <div class="list-contact">
                                <ul>
                                    <li class="fx"><span><i class="far fa-map-marker-alt"></i> Piliyandala, Sri Lanka</span></li>
                                    <li class="fx"><a href="mailto:info@aromat.lk"><i class="far fa-envelope"></i> info@aromat.lk</a></li>
                                    <li class="fx"><a href="tel:+94765445356"><i class="fal fa-phone"></i> +94 76 544 5356</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget widget-business">
                           <div class="inner">
                                <div class="op-time">
                                    <h4 class="title-widget">Opening Hours</h4>
                                    <ul>
                                        <li><span class="f-mulish">Monday - Friday</span></li>
                                        <li><span class="f-mulish">9:00 am - 6:00 pm</span></li>
                                        <li><span class="f-mulish">Saturday</span></li>
                                        <li><span class="f-mulish">9:00 am - 1:00 pm</span></li>
                                    </ul>
                                </div>
                                <div class="cls-time">
                                    <p>Sunday & Public Holidays Closed</p>
                                </div>
                           </div>
                        </div>
                        <div class="widget widget-link">
                            <h4 class="title-widget">Quick Links</h4>
                            <ul class="list-link">
                                <li class="fx"><a href="{{ route('home') }}" class="wd-ctm f-mulish">Home</a></li>
                                <li class="fx"><a href="{{ route('about') }}" class="wd-ctm f-mulish">About Us</a></li>
                                <li class="fx"><a href="{{ route('products') }}" class="wd-ctm f-mulish">Products</a></li>
                                <li class="fx"><a href="{{ route('blog') }}" class="wd-ctm f-mulish">Blogs</a></li>
                                <li class="fx"><a href="{{ route('contactus') }}" class="wd-ctm f-mulish">Contacts</a></li>
                                <li class="fx"><a href="{{ route('cart') }}" class="wd-ctm f-mulish">Cart</a></li>
                                <li class="fx"><a href="{{ route('wishlist') }}" class="wd-ctm f-mulish">Whishlist</a></li>
                            </ul>
                        </div>
                        <div class="widget widget-news st-3">
                            <h4 class="title-widget">Recent Articles</h4>
                            <ul class="list-news">
                                @foreach($footerRecentBlogs as $recentBlog)
                                <li class="fx">
                                    <img src="{{ $recentBlog->image_url }}" alt="{{ $recentBlog->title }}" class="feature">
                                    <ul class="box-content">
                                        <li><h6 class="title"><a href="{{ url('/' . $recentBlog->slug) }}">{{ Str::limit($recentBlog->title, 30) }}</a></h6></li>
                                        <li><a href="{{ url('/' . $recentBlog->slug) }}" class="fx meta-news clr-pri-6"><i class="far fa-calendar-alt"></i>{{ $recentBlog->published_at ? $recentBlog->published_at->format('d M Y') : '' }}</a></li>
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="footer-bottom jus-ct">
                        <p class="copy-right">Copyright &copy; <?= date('Y') ?>, Aromat Baby Food. All Rights Reserved.</p>
                        <p class="copy-right">Design & Developed by <a href="https://creatxsoftware.com/" target="_blank" rel="noopener noreferrer">CreatX Software</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>