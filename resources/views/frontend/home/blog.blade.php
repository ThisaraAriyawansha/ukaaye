<section class="tf-section tf-sc-blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading st-1">
                    <div class="title-heading">
                        <div class="sub-heading clr-pri-3 f-mulish"><span class="inner-sub st-2">Parenting Tips & Blog </span>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="77" height="30" viewBox="0 0 77 30">
                                <g>
                                <image width="77" height="30" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAE0AAAAeCAYAAABpE5PpAAAEMUlEQVRoge2Ze4hVVRTGf46WMyWmZvkaNSWfST7I1EINyVQ0kSxsQiyS3JFo/lGhUQSCJokk5aONhijhHyGRkKTlI3JMFKQaBx2o1HS0klSs66ucGVl3vhOnw73XwblPnQ8OZ+acfc/e+zvr8a11mtXNmsUtDe8T79659sAVvP87eqvo1mYsJR4C9ica0ERaclQBfXFuSHREE2nJ4P0x4BzwdXREE2mp8S3QDucGhUc1kZYa23V3SXhUizxb5I3AXnxPYCDQG+gAtAk9x7Lfb8AvwA/AT0BtA+cJSBuDcyV4f4kCJu1OYAowERgLtA/dqwFiIus2oDVQErp/FtgGbNZxOeks3lfhXDVQCowDPqcASesDvA5MA1rJYvYA5TpbxjsO/Bv5nRHXD3gwbjX1RJcB53HuY+B9vK9OMucO4HlgUkBaocS07sBG4DAwU8TMBjoBo4A3gS1ywShhhr+AfcAakdURmCCLexU4gnPLcK5tgt9+o/PjwYV8J605MF9k2Wa/12YHAKuA0zf4XHPhrbLYXsB6YF58HuemRsaW69wd57qS56R1AXYC7wIWgF+QSrfN1qVtFu+P4v1LwOC4xcEmnFsbD/z1938GTmn0aPKYtMEqYcz1vgQekDWkj6wovK8ARgJv6QXtwrl7NWqfzo+Sp6Q9IlHZGVgKPAn8npWZva/B+0XA+HgJBd/hXGmoBjVLzzvSBsmyLDMuAN5Q/MkuvN8uq7tLieC45h+Acy0C0koiWicX6Kp41VrZcElOV+P9QckTE8rv6Gox0L9IWu0i8EEOl3iHNJCp+dUK/rlHPXFPAT1Ca+lnhF0FLENMllvEcrBYI2qIsuXcnJHl3N3xAr2+4ghQLUtbrP/7BhXBCmA5MB34KMtLfRmYAZwEntVLzDT6K2YNxLleCg3dIuVWMvQJ2t1Wo/0DnADu19/ZwMPAbiWkx1QKZQLN9fyp8qgujZhjTWBpVnrMAT6UMn4vC4TdExeScDvwWoYIs2e/Ld1VGrpeo2ripM4mXs8oNMVUdl1WrA9QF++SeP9r+MNKkSzMCBwKVGZgEwGK1XYxsfgZ8HSGhGsrJZVTittHJR/+/K89lOzDSgqEuxy1KhPKVfyOCJUP6YS5ygYRdlAdhEwp/Zg8KK2Iits9aoV0UwegY4YIe0auMTlH2bpRSFQRTNSGrJOwVz2sdMBE4hfAc3KPJ4BjhUHT/5GItCuq/2xD9wEHgFcaWXKZRVWopjuiQvxQOjaQCyQjwoLlcIlNE3orgR/lVi0buM4idUh3q61sWugrYJj6YwWLVO3uP7RpS68L5a6fKh1vEaGVGndVJHVQ0T1CPfVOetZptak3FDJZAa73jaBWFcInykIvSvyW6bgeqqT91qmReFOgoR9WYtI7dph7mbo2NW8xz6zLXPaCLMpczz6VWYvHSLu5AFwD7u/9V73LPFIAAAAASUVORK5CYII="/>
                                </g>
                            </svg>
                        </div>
                        <h2 class="title clr-pri-2">Helpful Tips For New Parents</h2>
                    </div>
                    <div class="heading-btn st-1">
                        <a href="{{ route('blog') }}" class="fl-btn st-3">
                            <span class="inner">view all articles</span>
                        </a>
                    </div>
                </div>
            </div>
            @foreach($latestBlogs as $blog)
            <div class="col-xl-4 col-lg-4 col-md-4 col-12 d-flex">
                <div class="box-artice fl-scale st-2 wow fadeIn animated" data-wow-delay="0.3ms" data-wow-duration="1200ms" style="display:flex!important; flex-direction:column; width:100%;">
                    <div class="box-feature inner-scale" style="height:220px; overflow:hidden;">
                        <a href="{{ url($blog->slug) }}" style="display:block; height:100%;">
                            <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" style="width:100%; height:100%; object-fit:cover;">
                        </a>
                    </div>
                    <div class="box-content" style="flex:1; display:flex; flex-direction:column;">
                        <div class="meta-post st-1">
                            <ul class="fx">
                                <li>
                                    <a href="{{ url($blog->slug) }}" class="fx">
                                        <i class="far fa-calendar-alt clr-pri-3"></i>
                                        {{ \Carbon\Carbon::parse($blog->published_at)->format('d M Y') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url($blog->slug) }}" class="fx">
                                        <i class="far fa-tag clr-pri-3"></i>
                                        {{ $blog->category->name ?? 'General' }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <h4 class="title-article-post" style="flex:1;">
                            <a href="{{ url($blog->slug) }}">{{ $blog->title }}</a>
                        </h4>
                        <div class="btn-rm" style="margin-top:auto;">
                            <a href="{{ url($blog->slug) }}" class="fl-btn st-4">
                                <span class="inner">read more</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
