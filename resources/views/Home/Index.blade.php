@extends('Layouts.App')


@section('Content')
    
<br>
<br>
<br>
<br>
@if (session('error'))
<p style="color: red;">{{session('error')}}</p>
@endif

<!--Start Home slider-->
<div class="slideshow slideshow-wrapper pb-section">
    <div class="home-slideshow">
        <div class="slide slideshow--medium">
            <div class="blur-up lazyload">
                <img class="blur-up lazyload" data-src="{{asset('FrontEnd/assets/images/parallax-banners/cosmetic-parallax.jpg')}}" src="{{asset('FrontEnd/assets/images/parallax-banners/cosmetic-parallax.jpg')}}" alt="Belle Best Selling" title="Belle Best Selling" />
                <div class="slideshow__text-wrap slideshow__overlay classic middle">
                    <div class="slideshow__text-content middle">
                        <div class="wrap-caption center">
                            <h2 class="h1 mega-title slideshow__title">Belle Best Selling</h2>
                            <span class="mega-subtitle slideshow__subtitle">Unique products by the world's top  designer</span>
                            <a href="#">
                                <span class="btn">Explore now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Home slider-->

<!--Featured Product-->
<div class="product-rows section pb-0">
    <div class="container-fluid">
        <div class="grid-products grid-products-hover-btn">
            <div class="row">

                @foreach ($products as $product)
                    
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 item grid-view-item style2">
                    <div class="grid-view_image">
                        <!-- start product image -->
                        <a href="/product/{{$product->slug}}/{{$product->id}}" class="grid-view-item__link">
                            <!-- image -->
                            <img 
                            class="grid-view-item__image primary blur-up lazyload"
                            @if ($product->image == null)
                            data-src="https://static.vecteezy.com/system/resources/thumbnails/022/059/000/small_2x/no-image-available-icon-vector.jpg" 
                            src="https://static.vecteezy.com/system/resources/thumbnails/022/059/000/small_2x/no-image-available-icon-vector.jpg" 
                            
                            @else
                            data-src="{{asset('/storage/'.$product->image)}}" 
                            src="{{asset('/storage/'.$product->image)}}" 
                                
                            @endif 
                            alt="image" title="product">
                            <!-- End image -->
                            <!-- Hover image -->

                            <img 
                            class="grid-view-item__image hover blur-up lazyload" 
                            @if ($product->image == null)

                            data-src="https://static.vecteezy.com/system/resources/thumbnails/022/059/000/small_2x/no-image-available-icon-vector.jpg" 
                            src="https://static.vecteezy.com/system/resources/thumbnails/022/059/000/small_2x/no-image-available-icon-vector.jpg" 
                            
                            @else

                            data-src="{{asset('/storage/'.$product->image)}}" 
                            src="{{asset('/storage/'.$product->image)}}"

                            @endif 

                            alt="image" title="product">

                            <!-- End hover image -->

                            <!-- product label -->
                            <div class="product-labels rounded">

                                @if ($product->original_price == $product->sale_price)
                                <span class="lbl pr-label1">new</span>
                                    
                                @else

                                @php
                                $discount = (($product->original_price - $product->sale_price) / $product->original_price) * 100;
                                @endphp

                                <span class="lbl on-sale">{{round($discount)}}%</span> 
                                <span class="lbl on-sale">Sale</span>
                                    
                                @endif

                            
                            </div>
                            <!-- End product label -->
                        </a>
                        <!-- end product image -->
                        <!--start product details -->
                        <div class="product-details hoverDetails text-center mobile">
                            <!-- product name -->
                            <div class="product-name">
                                <a href="/product/{{$product->slug}}/{{$product->id}}">{{$product->name}}</a>
                            </div>
                            <!-- End product name -->
                            <!-- product price -->
                            <div class="product-price">
                                @if ($product->original_price == $product->sale_price)
                                <span class="price">${{round($product->original_price,2)}}</span>
                                @else
                                <span class="old-price">${{round($product->original_price,2)}}</span>
                                <span class="price">${{round($product->sale_price,2)}}</span>
                                @endif

                            </div>
                            <!-- End product price -->
                            
                            <!-- product button -->
                            <div class="button-set">
                                <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                    <i class="icon anm anm-search-plus-r"></i>
                                </a>
                                <!-- Start product button -->
                                <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                    <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i class="icon anm anm-bag-l"></i></button>
                                </form>
                                <div class="wishlist-btn">
                                    <a class="wishlist add-to-wishlist" href="wishlist.html">
                                        <i class="icon anm anm-heart-l"></i>
                                    </a>
                                </div>
                                <div class="compare-btn">
                                    <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                        <i class="icon anm anm-random-r"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- end product button -->
                        </div>
                        <!-- End product details -->
                    </div>
                </div>

                @endforeach

            </div>
        </div>
   </div>
</div>	
<!--End Featured Product-->

<!--Collection Box slider-->
{{-- <div class="collection-box collection-box-style1 section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-header text-center">
                    <h2 class="h2">Most Trending Collection</h2>
                    <p>collection from world's top fashion designer</p>
                </div>
            </div>
        </div>
        
        <div class="row">

            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                <div class="collection-grid-item">
                    <a href="collection-page.html" class="collection-grid-item__link">
                        <img data-src="assets/images/collection/collection1.jpg" src="assets/images/collection/collection1.jpg" alt="Hot" class="blur-up lazyload"/>
                        <div class="collection-grid-item__title-wrapper">
                            <h3 class="collection-grid-item__title btn btn--secondary no-border">Hot</h3>
                        </div>
                    </a>
                </div>
            </div>
           
        </div>
    </div>
</div> --}}
<!--End Collection Box slider-->

<!--Store Feature-->
<div class="store-feature section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="display-table store-info">
                    <li class="display-table-cell">
                        <i class="icon anm anm-repeat-alt"></i>
                        <h5>Free Shipping &amp; Return</h5>
                        <span class="sub-text">Free shipping on all US orders</span>
                    </li>
                      <li class="display-table-cell">
                        <i class="icon anm anm-money-bill-ar"></i>
                        <h5>Money Guarantee</h5>
                        <span class="sub-text">30 days money back guarantee</span>
                      </li>
                      <li class="display-table-cell">
                        <i class="icon anm anm-thumbs-up-l"></i>
                        <h5>Online Support</h5>
                        <span class="sub-text">We support online 24/7 on day</span>
                    </li>
                      <li class="display-table-cell">
                        <i class="icon anm anm-check-sql"></i>
                        <h5>Secure Payments</h5>
                        <span class="sub-text">All payment are Secured and trusted.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--End Store Feature-->

 <!--Latest Blog-->
 <div class="latest-blog section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-header text-center">
                      <h2 class="h2">Latest From our Blog</h2>
                    <p>blog Checkout our blog &amp; the latest in style and offers as they happen</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="wrap-blog">
                    <a href="blog-left-sidebar.html" class="article__grid-image">
                          <img src="assets/images/blog/post-img1.jpg" alt="It's all about how you wear" title="It's all about how you wear" class="blur-up lazyloaded"/>
                    </a>
                    <div class="article__grid-meta article__grid-meta--has-image">
                        <div class="wrap-blog-inner">
                            <h2 class="h3 article__title">
                              <a href="blog-left-sidebar.html">It's all about how you wear</a>
                            </h2>
                            <span class="article__date">May 02, 2017</span>
                            <div class="rte article__grid-excerpt">
                                I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account...
                            </div>
                            <ul class="list--inline article__meta-buttons">
                                <li><a href="blog-article.html">Read more</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="wrap-blog">
                    <a href="blog-left-sidebar.html" class="article__grid-image">
                          <img src="assets/images/blog/post-img2.jpg" alt="27 Days of Spring Fashion Recap" title="27 Days of Spring Fashion Recap" class="blur-up lazyloaded"/>
                    </a>
                    <div class="article__grid-meta article__grid-meta--has-image">
                        <div class="wrap-blog-inner">
                            <h2 class="h3 article__title">
                              <a href="blog-right-sidebar.html">27 Days of Spring Fashion Recap</a>
                            </h2>
                            <span class="article__date">May 02, 2017</span>
                            <div class="rte article__grid-excerpt">
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab...
                            </div>
                            <ul class="list--inline article__meta-buttons">
                                <li><a href="blog-article.html">Read more</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Latest Blog-->
@endsection