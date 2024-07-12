 
 @extends('frontend.layouts.main')


@section('main.container')
 
 <!-- banner-section -->
 <section class="banner-section style-two">
        <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
            <div class="slide-item">
                <div class="image-layer" style="background-image:url(public/assets/images/banner/banner-4.jpg)"></div>
                <div class="auto-container">
                    <div class="content-box">
                        
                        <h1>
Business Advisory Services</h1>
                        
                       
                    </div>  
                </div>
            </div>
            
            <div class="slide-item">
                <div class="image-layer" style="background-image:url(public/assets/images/banner/banner-5.jpg)"></div>
                <div class="auto-container">
                    <div class="content-box ">
                        <h1>Risk Advisory</h1>
                       
                    </div>
                </div>
            </div>
            
            <div class="slide-item">
                <div class="image-layer" style="background-image:url(public/assets/images/banner/banner-6.jpg)"></div>
                <div class="auto-container">
                    <div class="content-box">
                        <h1>
Internal Audit</h1>
                        
                    </div>  
                </div>
            </div>
            
            
             <div class="slide-item">
                <div class="image-layer" style="background-image:url(public/assets/images/banner/banner-7.jpg)"></div>
                <div class="auto-container">
                    <div class="content-box">
                        <h1>Accounting Services</h1>
                       
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- our-mission -->
    <section class="our-mission bg-color-1">
        <div class="pattern-layer" style="background-image: url(public/assets/images/shape/shape-6.png);"></div>
        <div class="auto-container">
            <div class="row clearfix">
               
                <div class="col-lg-6 col-md-12 col-sm-12 video-column">
                    <div id="video_block_one">
                        <div class="video-inner ratio ratio-16x9">
                         <iframe width="560" height="315" src="https://www.youtube.com/embed/jBXwDBNYrV4?si=HRkE4HrYR1uYxiel" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                
                 <div class="col-lg-6 col-md-12 col-sm-12 content-column mission-box">
                    <div id="content_block_four">
                        <div class="content-box">
                            <div class="tabs-box">
                                <div class="tab-btn-box">
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <li class="tab-btn active-btn" data-tab="#tab-1">Vision</li>
                                        <li class="tab-btn" data-tab="#tab-2">Mission</li>
                                        <li class="tab-btn" data-tab="#tab-3">Strategy</li>
                                    </ul>
                                </div>
                                <div class="tabs-content">
                                    <div class="tab active-tab" id="tab-1">
                                        <div class="content-inner">
                                            
                                            <p>We aim to be a leading force in driving sustainable business success by delivering innovative solutions in internal audit, risk management, and business consultancy. Our vision is built on a commitment to excellence, integrity, and client satisfaction, contributing to the long-term resilience and growth of our clients.

</p>
                                            
                                        </div>
                                    </div>
                                    <div class="tab" id="tab-2">
                                        <div class="content-inner">
                                           
                                            <p>Our mission is to enhance organizational excellence through objective internal audit, risk management, and business management consultancy. We are dedicated to providing insightful assessments that optimize governance, risk, and compliance, fostering a culture of continuous improvement..</p>
                                            
                                        </div>
                                    </div>
                                    <div class="tab" id="tab-3">
                                        <div class="content-inner">
                                            
                                            <p>Our strategy involves leveraging expertise to provide comprehensive internal audit, risk management, and consultancy services. We prioritize staying informed on industry trends, regulations, and emerging risks, tailoring solutions to meet unique organizational needs. Through advanced methodologies, technology, and a client-centric approach, we position ourselves as trusted partners in guiding organizations to success.</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our-mission end -->


    <!-- service-section -->
    <section class="service-section">
        <div class="auto-container">
            <div class="title-box">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 title-column">
                        <div class="sec-title right">
                            
                            <h2>Services </h2>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="inner-content">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <h4><a href="{{asset('/businesssdvisoryservices')}}">Business Advisory Services</a></h4>
                                <div class="inner">
                                    <div class="icon-box"><i class="flaticon-rocket"></i></div>
                                    <p>Unlock the potential of your NBFC with our targeted Business Advisory Services. </p>
                                    <a href="{{asset('/businesssdvisoryservices')}}"><i class="fas fa-arrow-right"></i><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <h4><a href="{{asset('/riskddvisory')}}">Risk Advisory</a></h4>
                                <div class="inner">
                                    <div class="icon-box"><i class="flaticon-innovation-1"></i></div>
                                    <p>Within our risk consulting services, we assume the responsibility of overseeing
                                    your entire risk 
                                    
                                    </p>
                                    <a href="{{asset('/riskddvisory')}}"><i class="fas fa-arrow-right"></i><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box" style="border-bottom: none;">
                                <h4><a href="{{asset('/internalaudit')}}">Internal Audit</a></h4>
                                <div class="inner">
                                    <div class="icon-box"><i class="flaticon-presentation"></i></div>
                                    <p>
Internal Audit
Some businesses mistakenly think audits are necessary only when mandated by law, like  </p>
                                    <a href="{{asset('/internalaudit')}}"><i class="fas fa-arrow-right"></i><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <h4><a href="{{asset('/accountingservices')}}">Accounting Services</a></h4>
                                <div class="inner">
                                    <div class="icon-box"><i class="flaticon-target"></i></div>
                                    <p>Navigating the competitive landscape of small business ownership presents a myriad of challenges. </p>
                                    <a href="{{asset('/accountingservices')}}"><i class="fas fa-arrow-right"></i><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- service-section end -->


      <!-- working-style-two -->
      <section class="working-style-two">
        <div class="auto-container">
            <div class="sec-title style-four right">
               
                <h2>Follow Working Steps</h2>
             
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 working-block">
                    <div class="working-block-two">
                        <div class="inner-box">
                            <div class="border-box" style="background-image: url(public/assets/images/icons/border-1.png);"></div>
                            <div class="icon-box"><i class="flaticon-employee-2"></i></div>
                            <h3><a href="index-5.html">Our Consultation</a></h3>
                            <p>Our Consultation service offers expert financial guidance and advice.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 working-block">
                    <div class="working-block-two">
                        <div class="inner-box">
                            <div class="border-box" style="background-image: url(public/assets/images/icons/border-2.png);"></div>
                            <div class="icon-box"><i class="flaticon-target"></i></div>
                            <h3><a href="index-5.html">Perfect Solutions</a></h3>
                            <p>Delivering precise and comprehensive solutions for all types of accounting services for your needs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 working-block">
                    <div class="working-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="flaticon-increase"></i></div>
                            <h3><a href="index-5.html">Business Growth</a></h3>
                            <p>Services drive Business Growth by providing strategic financial insights and compliance expertise.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- working-style-two -->


  
    <!-- clients-section -->
    <section class="clients-section">
        <div class="auto-container">
            
            <div class="sec-title style-four right">
               
                <h2 style="text-align: center;
    margin-bottom: 43px"> Project Associates</h2>
             
            </div>
            <div class="clients-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                <figure class="client-logo"><a href="index.html"><img src="public/assets/images/clients/clients-1.png" alt=""></a></figure>
                <figure class="client-logo"><a href="index.html"><img src="public/assets/images/clients/clients-2.png" alt=""></a></figure>
                <figure class="client-logo"><a href="index.html"><img src="public/assets/images/clients/clients-3.png" alt=""></a></figure>
                <figure class="client-logo"><a href="index.html"><img src="public/assets/images/clients/clients-4.png" alt=""></a></figure>
                <figure class="client-logo"><a href="index.html"><img src="public/assets/images/clients/clients-5.png" alt=""></a></figure>
                
                   <figure class="client-logo"><a href="index.html"><img src="public/assets/images/clients/clients-6.png" alt=""></a></figure>
                   
                      <figure class="client-logo"><a href="index.html"><img src="public/assets/images/clients/clients-7.png" alt=""></a></figure>
                      
                      
                      <figure class="client-logo"><a href="index.html"><img src="public/assets/images/clients/clients-8.png" alt=""></a></figure>
            </div>
        </div>
    </section>
    <!-- clients-section end -->
    
    
    
    <!-- world-cyber -->
    
    
    <section class="world-cyber bg-color-1">
        
       
        <div class="pattern-layer" style="background-image: url(public/assets/images/shape/shape-2.png);"></div>
        <div class="auto-container">
            <div class="sec-title centred">
                
                <h2>ProFinance Services  operating Globally</h2>
            </div>
            <div class="office-location">
                <div class="location-area">
                    <div class="location-box">
                        <div class="address-box">
                            <figure class="icon-box"><img src="public/assets/images/icons/icon-2.png" alt=""></figure>
                            <p>Serve you to reach best profits and goals.</p>
                        </div>
                    </div>
                    <div class="location-box">
                        <div class="address-box">
                            <figure class="icon-box"><img src="public/assets/images/icons/icon-2.png" alt=""></figure>
                            <p>Serve you to reach best profits and goals.</p>
                        </div>
                    </div>
                    <div class="location-box">
                        <div class="address-box">
                            <figure class="icon-box"><img src="public/assets/images/icons/icon-2.png" alt=""></figure>
                            <p>Serve you to reach best profits and goals.</p>
                        </div>
                    </div>
                    <div class="location-box">
                        <div class="address-box">
                            <figure class="icon-box"><img src="public/assets/images/icons/icon-2.png" alt=""></figure>
                            <p>Serve you to reach best profits and goals.</p>
                        </div>
                    </div>
                    <div class="location-box">
                        <div class="address-box">
                            <figure class="icon-box"><img src="public/assets/images/icons/icon-2.png" alt=""></figure>
                            <p>Serve you to reach best profits and goals.</p>
                        </div>
                    </div>
                    <div class="location-box">
                        <div class="address-box">
                            <figure class="icon-box"><img src="public/assets/images/icons/icon-2.png" alt=""></figure>
                            <p>Serve you to reach best profits and goals.</p>
                        </div>
                    </div>
                    <div class="location-box">
                        <div class="address-box">
                            <figure class="icon-box"><img src="public/assets/images/icons/icon-2.png" alt=""></figure>
                            <p>Serve you to reach best profits and goals.</p>
                        </div>
                    </div>
                    <div class="location-box">
                        <div class="address-box">
                            <figure class="icon-box"><img src="public/assets/images/icons/icon-2.png" alt=""></figure>
                            <p>Serve you to reach best profits and goals.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- world-cyber end -->


    @endsection        