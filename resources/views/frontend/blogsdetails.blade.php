@extends('frontend.layouts.main')


@section('main.container')

 
 
    
      <!--Page Title-->
    <section class="page-title style-two centred" >
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>  Blogs Details  </h1>
                <ul class="bread-crumb clearfix">
                  <li><a href="{{asset('/')}}">Home</a></li>
                    <li> Blogs Details </li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    
   <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-9 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <figure class="image-box">
                            <img src="public/assets/images/news/news-20.jpg" alt="">
                            <span class="category"> {{ $blog->bolgcatname }}</span>
                        </figure>
                        <div class="inner-box">
                            <ul class="post-info clearfix">
                                <li><i class="far fa-user"></i><a href="{{asset('/blog-details')}}">Admin</a></li>
                                <li><i class="far fa-calendar-alt"></i>{{$blog->blog_date}}</li>
                                <li><i class="far fa-comment-alt"></i><a href="{{asset('/blog-details')}}">{{count($comments)}} Comments</a></li>
                                <li><i class="far fa-heart"></i><a href="{{asset('/blog-details')}}">1.5k Likes</a></li>
                            </ul>
                            <div class="text">
                            {!! stripslashes($blog->description) !!}

                            </div>
                           
                        </div>
                        <div class="post-share-option clearfix">
                            <ul class="post-tags pull-left clearfix">
                            @foreach($categories as $cat)   
                                <li><a href="{{ url('blog/catagory').'/'.$cat->id }}">{{ $cat->name }}</a></li>
                            @endforeach
                            </ul>
                            <ul class="post-share pull-right clearfix">
                                <li class="share">
                                    <a href="{{asset('/blog-details')}}"><i class="fas fa-share-alt"></i></a>
                                    <ul class="social-links">
                                        <li><a href="{{asset('/blog-details')}}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{asset('/blog-details')}}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{asset('/blog-details')}}"><i class="fab fa-vimeo-v"></i></a></li>
                                        <li><a href="{{asset('/blog-details')}}"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </li>
                                <li>Share This Post</li>
                            </ul>
                        </div>
                        <div class="comments-area">
                            <div class="group-title">
                                <h2>Comments</h2>
                            </div>
                            <div class="comment-box">
                            @foreach($comments as $comment)
                                <div class="comment">
                                    <figure class="thumb-box">
                                        <img src="public/assets/images/news/comment-1.jpg" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <div class="name pull-left">
                                                <h5>{{ $comment->name }}</h5>
                                            </div>
                                            <div class="info pull-right">
                                                <span>{{ $comment->date }}</span>
                                                <a href="{{asset('/blog-details')}}"><i class="fas fa-share"></i>Reply</a>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            
                            </div>
                        </div>
                        <div class="comments-form-area">
                            <div class="group-title">
                                <h2>Post a Reply</h2>
                            </div>
                            <form action="{{route('blog-comment-store')}}" method="post">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{$blog->id}}" />
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="comment" placeholder="Comment *"></textarea>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="name" placeholder="Name *" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email *" required="">
                                    </div>
                                    <!--<div class="col-lg-4 col-md-6 col-sm-12 form-group">-->
                                    <!--    <input type="text" name="website" placeholder="Website" required="">-->
                                    <!--</div>-->
                                    <div class="col-lg-4 col-md-6 col-sm-12 form-group message-btn">
                                        <button type="submit" class="theme-btn style-one">post comment</button>
                                    </div>
                                    <div class="col-lg-8 col-md-6 col-sm-12 form-group">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">Save my name, email, and website for later use.</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                                @foreach($recent_blogs as $k=>$bg)
                                    @if($k < 3)
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
                                        <li><a href="{{asset('/blog-details')}}">Conference</a></li>
                                        <li><a href="{{asset('/blog-details')}}">Business</a></li>
                                        <li><a href="{{asset('/blog-details')}}">Event</a></li>
                                        <li><a href="{{asset('/blog-details')}}">Web Development</a></li>
                                        <li><a href="{{asset('/blog-details')}}">Speakers</a></li>
                                        <li><a href="{{asset('/blog-details')}}">Technology</a></li>
                                        <li><a href="{{asset('/blog-details')}}">Digital</a></li>
                                        <li><a href="{{asset('/blog-details')}}">Marketing</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            </div>
        </div>
    </section>

   @endsection   