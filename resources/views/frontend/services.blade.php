@extends('frontend.layouts.main')


@section('main.container')


      <section class="page-title centred" style="background-image: url(assets/images/background/page-title-2.jpg);">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Services</h1>
                <ul class="bread-crumb clearfix">
                     <li><a href="{{asset('/')}}">Home</a></li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </section>

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
         @endsection