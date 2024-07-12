@extends('frontend.layouts.main')


@section('main.container')

 
 
   
    
    
      <!--Page Title-->
    <section class="page-title style-three centred" style="background-image: url(public/assets/images/background/page-title-5.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Latest News</h1>
                <ul class="bread-crumb clearfix">
                  <li><a href="{{asset('/')}}">Home</a></li>
                    <li>Blog Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
   

  <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-9 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <figure class="image-box">
                            <img src="{{ $blog->img_name }}" alt="">
                            <span class="category">{{ $blog->bolgcatname }}</span>
                        </figure>
                        <div class="inner-box">
                            <ul class="post-info clearfix">
                                <li><i class="far fa-user"></i><a>Admin</a></li>
                                <li><i class="far fa-calendar-alt"></i>{{ $blog->blog_date }}</li>
                            </ul>
                            <div class="text">
                                <h2>{{ $blog->title }}</h2>
                                <p>Eabore etsu dolore magn aliqua enim veniam quis nostrud exercitas reprehenderit voluptate sed bvelit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>
                                <h5>Eabore dolore magn aliqua enim veniam quis nostrud exercitas reprehenderit sint esse cillum dolore fugiat nulla pariatur excepteur sint.</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitm sed do eiusmod tempor incididunt labore ets magna aliquatenim minim veniam quis nostrud exercitation ullamco laboris nisut aliquip ex ea commod Duis aute irure dolorn reprehenderit voluptate velit esse. Excepteur sint uda occaecat cupidatat non pro sunt culpa qui officia deserunt mollit anim id est laborum sed utm pers piciatis unde omnis iste dolor nat ipsum diu enimery sed ipsum voluptatem.</p>
                                <h3>How to become a top conference speaker?</h3>
                                <p>Magna aliquatenim minim veniam quis nostrud <span>exercitation ullamco laboris nisut</span> aliquip exa commod Duis aute irure dolorn reprehenderit voluptate velit es. Excepteur sint uda occaecat cupidatat non proid sunt culpa qui officia deserunt mollit anim id est laborum sed utms.</p>
                            </div>
                            <div class="two-column">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image-box"><img src="/public/assets/images/news/news-21.jpg" alt=""></figure>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image-box"><img src="/public/assets/images/news/news-22.jpg" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                <p>Nostrud exercitation ullamco laboris nisut aliquip ex ea commod consequat. Duis aute irure dolorn prehes tate velit esse. Excepteur sint uda occaecat cupidatat non proident, como sunt culpa qui officia deserunt est laborum sed utms labore et dolore magna ipsum aliqua.</p>
                                <blockquote>
                                    <h5>Fugiat nulla pariatur excepteur sint occaecat cupidatat non proident euntin culp qui officia deserunt mollit anim idm esta laborum sed perspiciatis.</h5>
                                    <span>Tim H. Berton</span>
                                </blockquote>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitm sed do eiusmod tempor incididunt ut labore magna aliquatenim minim veniam quis nostrud exercitation ullamco laboris nisut aliquip ex ea commod Duis aute irure dolorn reprehenderit voluptate velit esse.</p>
                            </div>
                        </div>
                        <div class="post-share-option clearfix">
                            <ul class="post-tags pull-left clearfix">
                                <li><a href="blog-details.html">Finance</a></li>
                                <li><a href="blog-details.html">Business</a></li>
                                <li><a href="blog-details.html">Event</a></li>
                            </ul>
                            <ul class="post-share pull-right clearfix">
                                <li class="share">
                                    <a href="blog-details.html"><i class="fas fa-share-alt"></i></a>
                                    <ul class="social-links">
                                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-vimeo-v"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-linkedin-in"></i></a></li>
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

                                <div class="comment">
                                    @foreach ($comments as $comment)
                                    <figure class="thumb-box">
                                        <img src="/public/assets/images/news/comment-1.jpg" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <div class="name pull-left">
                                                <h5>Admin</h5>
                                            </div>
                                            <div class="info pull-right">
                                                <span>{{ $comment->date }}</span>
                                                <a href="#comment-section"><i class="fas fa-share"></i>Reply</a>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                    @if ($comment->reply)
                                    <hr>
                                    <div class="comment-inner mt-3 ml-5">
                                        <div class="text">
                                            <p>{{ $comment->reply }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                        <div class="comments-form-area" id="comment-section">
                            <div class="group-title">
                                <h2>Post a Reply</h2>
                            </div>
                            <form action="{{ route('blog-comment-store') }}" method="post" class="comment-form default-form">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Comment *"></textarea>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="name" placeholder="Name *" required>
                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                        @csrf
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email *" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="website" placeholder="Website">
                                    </div>
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
                        <div class="sidebar-widget sidebar-search">
                            <form action="https://azim.commonsupport.com/Fionca/blog-classic.html" method="post" class="search-form">
                                <div class="form-group">
                                    <input type="search" name="search-field" placeholder="Search" required="">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        @if($categories)
                        <div class="sidebar-widget sidebar-categories">
                            <div class="widget-title">
                                <h3>Categories</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="categories-list clearfix">
                                    @foreach ($categories as $category)
                                    <li><a href="{{ route('blog-cat-list', $category->id) }}">{{ $category->name }}<span>({{ $category->blog_count }})</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        @if($recent_blogs)
                        <div class="sidebar-widget sidebar-post">
                            <div class="widget-title">
                                <h3>Recent Blogs</h3>
                            </div>
                            <div class="widget-content">
                                @foreach($recent_blogs as $recent_blog)
                                <div class="post">
                                    <figure class="post-thumb"><a href="{{ route('blog-detail', $blog->id) }}"><img src="{{ $recent_blog->thumb_image }}" alt=""></a></figure>
                                    <h6><a href="{{ route('blog-detail', $blog->id) }}">{{ $recent_blog->title }}</a></h6>
                                    <div class="post-date"><i class="far fa-calendar-alt"></i>{{ $recent_blog->blog_date }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @if(false)
                        <div class="sidebar-widget sidebar-gallery">
                            <div class="widget-title">
                                <h3>Image Gallery</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="image-list clearfix">
                                    <li><a href="/public/assets/images/news/gallery-1.jpg" class="lightbox-image" data-fancybox="gallery"><img src="/public/assets/images/news/gallery-1.jpg" alt=""></a></li>
                                    <li><a href="/public/assets/images/news/gallery-2.jpg" class="lightbox-image" data-fancybox="gallery"><img src="/public/assets/images/news/gallery-2.jpg" alt=""></a></li>
                                    <li><a href="/public/assets/images/news/gallery-3.jpg" class="lightbox-image" data-fancybox="gallery"><img src="/public/assets/images/news/gallery-3.jpg" alt=""></a></li>
                                    <li><a href="/public/assets/images/news/gallery-4.jpg" class="lightbox-image" data-fancybox="gallery"><img src="/public/assets/images/news/gallery-4.jpg" alt=""></a></li>
                                    <li><a href="/public/assets/images/news/gallery-5.jpg" class="lightbox-image" data-fancybox="gallery"><img src="/public/assets/images/news/gallery-5.jpg" alt=""></a></li>
                                    <li><a href="/public/assets/images/news/gallery-6.jpg" class="lightbox-image" data-fancybox="gallery"><img src="/public/assets/images/news/gallery-6.jpg" alt=""></a></li>
                                    <li><a href="/public/assets/images/news/gallery-7.jpg" class="lightbox-image" data-fancybox="gallery"><img src="/public/assets/images/news/gallery-7.jpg" alt=""></a></li>
                                    <li><a href="/public/assets/images/news/gallery-8.jpg" class="lightbox-image" data-fancybox="gallery"><img src="/public/assets/images/news/gallery-8.jpg" alt=""></a></li>
                                    <li><a href="/public/assets/images/news/gallery-9.jpg" class="lightbox-image" data-fancybox="gallery"><img src="/public/assets/images/news/gallery-9.jpg" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget sidebar-tags">
                            <div class="widget-title">
                                <h3>Popular Tags</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="tags-list clearfix">
                                    <li><a href="blog-classic.html">Conference</a></li>
                                    <li><a href="blog-classic.html">Business</a></li>
                                    <li><a href="blog-classic.html">Event</a></li>
                                    <li><a href="blog-classic.html">Web Development</a></li>
                                    <li><a href="blog-classic.html">Speakers</a></li>
                                    <li><a href="blog-classic.html">Technology</a></li>
                                    <li><a href="blog-classic.html">Digital</a></li>
                                    <li><a href="blog-classic.html">Marketing</a></li>
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container end -->



   @endsection   