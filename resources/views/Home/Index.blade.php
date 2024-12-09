@extends('Layouts.App')


@section('Content')
    
<br>
<br>
<br>
<br>
@if (session('error'))
<p style="color: red;">{{session('error')}}</p>
@endif

<div class="section imgBanners">
    <div class="imgBnrOuter">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 pl-0 image-banner-1">
                    <div class="inner topleft">
                        <a href="#">	
                               <img src="{{asset('FrontEnd/assets/images/collection/image-banner-home15-1.jpg')}}" alt="200+ NEW ARRIVALS" title="200+ NEW ARRIVALS" class="blur-up lazyload" />
                            <div class="ttl">
                                <h3>200+ NEW ARRIVALS</h3> Discover the latest designer and modern furniture and accessories from around the world. <b>Explore Now </b><i class="anm anm-long-arrow-right"></i>
                            </div>
                        </a>
                     </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 pr-0 image-banner-2">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 image-banner-3">
                            <div class="inner topleft">
                                <a href="#">	
                                    <img src="{{asset('FrontEnd/assets/images/collection/image-banner-home15-2.jpg')}}" alt="DINNER TABLE" title="DINNER TABLE" class="blur-up lazyload" />
                                    <div class="ttl">
                                        <h5>DINNER TABLE</h5> <b>Explore Now </b><i class="anm anm-long-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="inner topleft">
                                <a href="#">	
                                    <img src="{{asset('FrontEnd/assets/images/collection/image-banner-home15-3.jpg')}}" alt="PENDANT LIGHT" title="PENDANT LIGHT" class="blur-up lazyload" />
                                    <div class="ttl">
                                        <h5>PENDANT LIGHT</h5> <b>Explore Now </b><i class="anm anm-long-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <div class="inner topleft">
                                <a href="#">	
                                    <img src="{{asset('FrontEnd/assets/images/collection/image-banner-home15-4.jpg')}}" alt="200+ NEW ARRIVALS" title="200+ NEW ARRIVALS" class="blur-up lazyload" />
                                    <div class="ttl">
                                        <h5> MID-SUMMER SALE</h5> Up to 50% off <b>Explore Now </b><i class="anm anm-long-arrow-right"></i>
                                    </div>
                                </a>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section imgBanners">
    <div class="container-fluid">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <a href="#">
                <img src="{{asset('FrontEnd/assets/images/collection/image-banner-home15-5.jpg')}}" alt="Save Big On Popular Designs" title="Save Big On Popular Designs" class="blur-up lazyload" />
            </a>
        </div>
    </div>
</div>

@endsection