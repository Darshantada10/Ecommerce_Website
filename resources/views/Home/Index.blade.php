@extends('Layouts.App')


@section('Content')
    
<br>
<br>
<br>
<br>
@if (session('error'))
<p style="color: red;">{{session('error')}}</p>
@endif
{{-- 
<div class="section imgBanners">
    <div class="imgBnrOuter">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 pl-0 image-banner-1">
                    <div class="inner topleft">
                        <a href="{{$HeroSection[0]['url']}}">	
                               <img src="{{asset($HeroSection[0]['image'])}}" alt="200+ NEW ARRIVALS" title="200+ NEW ARRIVALS" class="blur-up lazyload" />
                            <div class="ttl">
                                <h3>{{$HeroSection[0]['heading']}}</h3>{{$HeroSection[0]['text']}}<b> Explore Now </b><i class="anm anm-long-arrow-right"></i>
                            </div>
                        </a>
                     </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 pr-0 image-banner-2">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 image-banner-3">
                            <div class="inner topleft">
                                <a href="{{$HeroSection[1]['url']}}">	
                                    <img src="{{asset($HeroSection[1]['image'])}}" alt="DINNER TABLE" title="DINNER TABLE" class="blur-up lazyload" />
                                    <div class="ttl">
                                        <h5>{{$HeroSection[1]['heading']}}</h5> <b>Explore Now </b><i class="anm anm-long-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="inner topleft">
                                <a href="{{$HeroSection[2]['url']}}">	
                                    <img src="{{asset($HeroSection[2]['image'])}}" alt="PENDANT LIGHT" title="PENDANT LIGHT" class="blur-up lazyload" />
                                    <div class="ttl">
                                        <h5>{{$HeroSection[2]['heading']}}</h5> <b>Explore Now </b><i class="anm anm-long-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <div class="inner topleft">
                                <a href="{{$HeroSection[3]['url']}}">	
                                    <img src="{{asset($HeroSection[3]['image'])}}" alt="200+ NEW ARRIVALS" title="200+ NEW ARRIVALS" class="blur-up lazyload" />
                                    <div class="ttl">
                                        <h5> {{$HeroSection[3]['heading']}}</h5> {{$HeroSection[3]['text']}} <b>Explore Now </b><i class="anm anm-long-arrow-right"></i>
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

@if ($HeroSection[4]['image'])

<div class="section imgBanners">
    <div class="container-fluid">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <a href="{{$HeroSection[4]['url']}}">
                <img src="{{asset($HeroSection[4]['image'])}}" alt="Save Big On Popular Designs" title="Save Big On Popular Designs" class="blur-up lazyload" />
            </a>
        </div>
    </div>
</div>  
  
@endif --}}



{{-- @foreach ($HeroSection as $item)
    
    @if ($item->size == 'Full')
    <div class="section imgBanners">
        <div class="container-fluid">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <a href="{{$item['url']}}">
                    <img src="{{asset($item['image'])}}" alt="Save Big On Popular Designs" title="Save Big On Popular Designs" class="blur-up lazyload" />
                </a>
            </div>
        </div>
    </div>
    @elseif ($item->size == 'Half')
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 pl-0 image-banner-1">
        <div class="inner topleft">
            <a href="{{$HeroSection[0]['url']}}">	
                   <img src="{{asset($HeroSection[0]['image'])}}" alt="200+ NEW ARRIVALS" title="200+ NEW ARRIVALS" class="blur-up lazyload" />
                <div class="ttl">
                    <h3>{{$HeroSection[0]['heading']}}</h3>{{$HeroSection[0]['text']}}<b> Explore Now </b><i class="anm anm-long-arrow-right"></i>
                </div>
            </a>
         </div>
    </div>
    @elseif($item->size == 'Semi')
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 pr-0 image-banner-2">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 image-banner-3">
                            <div class="inner topleft">
                                <a href="{{$HeroSection[1]['url']}}">	
                                    <img src="{{asset($HeroSection[1]['image'])}}" alt="DINNER TABLE" title="DINNER TABLE" class="blur-up lazyload" />
                                    <div class="ttl">
                                        <h5>{{$HeroSection[1]['heading']}}</h5> <b>Explore Now </b><i class="anm anm-long-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="inner topleft">
                                <a href="{{$HeroSection[2]['url']}}">	
                                    <img src="{{asset($HeroSection[2]['image'])}}" alt="PENDANT LIGHT" title="PENDANT LIGHT" class="blur-up lazyload" />
                                    <div class="ttl">
                                        <h5>{{$HeroSection[2]['heading']}}</h5> <b>Explore Now </b><i class="anm anm-long-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>   
                    </div>
    @endif --}}


{{-- @endforeach --}}

@endsection