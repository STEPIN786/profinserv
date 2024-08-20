@extends('frontend.layouts.main')


@section('main.container')

 
 
    
      <!--Page Title-->
    <section class="page-title style-two centred" >
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>  Blog  </h1>
                <ul class="bread-crumb clearfix">
                  <li><a href="{{asset('/')}}">Home</a></li>
                    <li>Blog </li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    
    
    
    <!-- news-section -->
    <section class="news-section blog-grid sec-pad sidebar-page-container">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 content-side">
                <div class="row clearfix">
                    @foreach($blogs as $data)
                        <div class="col-lg-4 col-md-6 col-sm-12 news-block">

                            <div class="news-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                                <div class="inner-box">
                                    <figure class="image-box"><a href="{{ url ('/blog').'/'. $data->id }}"><img src="{{$data->img_name}}" alt=""></a></figure>
                                    <div class="lower-content">
                                        <!--<ul class="post-info">-->
                                        <!--    <li>By <a href="index.html">Fionca</a></li>-->
                                        <!--    <li>January 31, 2020</li>-->
                                        <!--    <li class="share">-->
                                        <!--        <a href="#"><i class="fas fa-share-alt"></i></a>-->
                                        <!--        <ul class="social-links">-->
                                        <!--            <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>-->
                                        <!--            <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>-->
                                        <!--            <li><a href="index.html"><i class="fab fa-vimeo-v"></i></a></li>-->
                                        <!--            <li><a href="index.html"><i class="fab fa-linkedin-in"></i></a></li>-->
                                        <!--        </ul>-->
                                        <!--    </li>-->
                                        <!--</ul>-->
                                        <h3><a href="{{ url ('/blog').'/'. $data->id }}">{{$data->title}}</a></h3> 
                                        {!! stripslashes($data->description) !!}
                                        <div class="link"><a href="{{ url ('/blog').'/'. $data->id }}" class="blog-btn"><i class="fas fa-arrow-right text-white"></i>
                                        <span class="border-0 text-white">Read More</span></a></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    <div class="more-btn centred"><a href="{{asset('/blogsdetails')}}">Load More</a></div>
                </div>
                    
                </div>
                
                <div class="col-lg-3 col-md-12 col-sm-12 sidebar-side">
                        <div class="sidebar"> 
                            <div class="sidebar-widget sidebar-categories">
                                <div class="widget-title">
                                    <h3>Categories</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="categories-list clearfix">
                                    @foreach($categories as $cat)
                                        <li><a href="{{url('blog/catagory').'/'.$cat->id}}">{{ $cat->name }} <span>({{$cat->blog_count}})</span></a></li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget sidebar-post">
                                <div class="widget-title">
                                    <h3>Recent Blog</h3>
                                </div>
                                <div class="widget-content">
                                @foreach($blogs as $k=>$bg)
                                    @if($k > 3)
                                        <div class="post">
                                            <figure class="post-thumb"><a href="{{ url ('/blog').'/'.$bg->id }}"><img src="{{ $bg->thumb_image }}" alt=""></a></figure>
                                            <h6><a href="{{ url ('/blog').'/'.$bg->id }}">{{$bg->title}}</a></h6>
                                            <div class="post-date"><i class="far fa-calendar-alt"></i>{{ $bg->blog_date }}</div>
                                        </div>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                            <!-- <div class="sidebar-widget sidebar-gallery">
                                <div class="widget-title">
                                    <h3>Image Gallery</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="image-list clearfix">
                                        <li><a href="public/assets/images/news/gallery-1.jpg" class="lightbox-image" data-fancybox="gallery"><img src="public/assets/images/news/gallery-1.jpg" alt=""></a></li>
                                        <li><a href="public/assets/images/news/gallery-2.jpg" class="lightbox-image" data-fancybox="gallery"><img src="public/assets/images/news/gallery-2.jpg" alt=""></a></li>
                                        <li><a href="public/assets/images/news/gallery-3.jpg" class="lightbox-image" data-fancybox="gallery"><img src="public/assets/images/news/gallery-3.jpg" alt=""></a></li>
                                        <li><a href="public/assets/images/news/gallery-4.jpg" class="lightbox-image" data-fancybox="gallery"><img src="public/assets/images/news/gallery-4.jpg" alt=""></a></li>
                                        <li><a href="public/assets/images/news/gallery-5.jpg" class="lightbox-image" data-fancybox="gallery"><img src="public/assets/images/news/gallery-5.jpg" alt=""></a></li>
                                        <li><a href="public/assets/images/news/gallery-6.jpg" class="lightbox-image" data-fancybox="gallery"><img src="public/assets/images/news/gallery-6.jpg" alt=""></a></li>
                                        <li><a href="public/assets/images/news/gallery-7.jpg" class="lightbox-image" data-fancybox="gallery"><img src="public/assets/images/news/gallery-7.jpg" alt=""></a></li>
                                        <li><a href="public/assets/images/news/gallery-8.jpg" class="lightbox-image" data-fancybox="gallery"><img src="public/assets/images/news/gallery-8.jpg" alt=""></a></li>
                                        <li><a href="public/assets/images/news/gallery-9.jpg" class="lightbox-image" data-fancybox="gallery"><img src="public/assets/images/news/gallery-9.jpg" alt=""></a></li>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="sidebar-widget sidebar-tags">
                                <div class="widget-title">
                                    <h3>Popular Tags</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="tags-list clearfix">
                                        <li><a href="{{asset('/blogsdetails')}}">Business</a></li>
                                        <li><a href="{{asset('/blogsdetails')}}">Event</a></li>
                                        <li><a href="{{asset('/blogsdetails')}}">Web Development</a></li>
                                        <li><a href="{{asset('/blogsdetails')}}">Speakers</a></li>
                                        <li><a href="{{asset('/blogsdetails')}}">Technology</a></li>
                                        <li><a href="{{asset('/blogsdetails')}}">Digital</a></li>
                                        <li><a href="{{asset('/blogsdetails')}}">Marketing</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- news-section end -->


   @endsection   