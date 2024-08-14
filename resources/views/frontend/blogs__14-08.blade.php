@extends('frontend.layouts.main')


@section('main.container')

 
 
    
      <!--Page Title-->
    <section class="page-title style-two centred" >
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Latest News</h1>
                <ul class="bread-crumb clearfix">
                  <li><a href="{{asset('/')}}">Home</a></li>
                    <li>Blog Grid</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    
    
    
    <!-- news-section -->
    <section class="news-section blog-grid sec-pad">
        <div class="auto-container">
            <div class="row clearfix">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><a href="{{ route('blog-detail', $blog->id) }}"><img src="{{ $blog->thumb_image }}" alt=""></a></figure>
                            <div class="lower-content">
                                <ul class="post-info">
                                    <li>By <a>Admin</a></li>
                                    <li>{{ $blog->blog_date }}</li>
                                    @if (false)
                                    <li class="share">
                                        <a href="#"><i class="fas fa-share-alt"></i></a>
                                        <ul class="social-links">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </li>
                                    @endif
                                </ul>
                                <h3><a href="{{ route('blog-detail', $blog->id) }}">{{ $blog->title }}</a></h3>
                                <p>{!! $blog->description !!}</p>
                                <div class="link"><a href="{{ route('blog-detail', $blog->id) }}"><i class="fas fa-arrow-right"></i><span>Read More</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="more-btn centred"><a href="blog-grid.html">Load More</a></div>
        </div>
    </section>
    <!-- news-section end -->


   @endsection   