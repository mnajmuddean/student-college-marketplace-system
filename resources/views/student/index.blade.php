@extends('student.main_master')
@section('content')

@section('title')
Home - UiTM Jasin Student College Marketplace System
@endsection

<div class="slider-with-banner">
                <div class="container">
                    <div class="row">
                        <!-- Begin Category Menu Area -->
                        <div class="col-lg-3">
                            <!--Category Menu Start-->
                            <div class="category-menu">
                                <div class="category-heading">
                                    <h2 class="categories-toggle"><span>categories</span></h2>
                                </div>
                                <div id="cate-toggle" class="category-menu-list">
                                    <ul>
                                        @foreach(   $categories as $category)
                                        <li><a href="{{ url('category/details/'.$category->categoryID)  }}"><i class="icon {{ $category->categoryImage}}"></i> {{  $category->categoryName}}</a></li>
                                        @endforeach
                                       
                                        
                                    </ul>
                                </div>
                            </div>
                            <!--Category Menu End-->
                        </div>
                        <!-- Category Menu Area End Here -->
                        <!-- Begin Slider Area -->
                        <div class="col-lg-9">
                            <div class="slider-area pt-sm-30 pt-xs-30">
                                <div class="slider-active owl-carousel">
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide align-center-left animation-style-02 bg-4">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            
                                            <img src="{{ asset('/frontend/images/slider/slider1.jpg')}}" alt="Li's Product Image">
                                        </div>
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide align-center-left animation-style-01 bg-5">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            
                                            <img src="{{ asset('/frontend/images/slider/slider2.jpg')}}" alt="Li's Product Image">
                                        </div>
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                    <!-- Begin Single Slide Area -->
                                    <div class="single-slide align-center-left animation-style-02 bg-6">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            
                                            <img src="{{ asset('/frontend/images/slider/slider3.jpeg')}}" alt="Li's Product Image">
                                        </div>
                                    </div>
                                    <!-- Single Slide Area End Here -->
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Slider Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Slider With Category Menu Area End Here -->
            <!-- Begin Li's Static Banner Area -->
            
            <!-- Li's Static Banner Area End Here -->
            <!-- Static Top Area End Here -->
            <!-- product-area start -->
            <div class="product-area pt-55 pb-25 pt-xs-50 mt-70">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New Arrival</span></a></li>
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                @foreach($products as $product)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                       
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ url('product/details/'.$product->productID)  }}">
                                                    <img src="{{ asset($product->productThumbnail)}}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">{{ $product['category']['categoryName'] }} </a>
                                                        </h5>
                                                        
                                                    </div>
                                                    <h4><a class="product_name" href="{{ url('product/details/'.$product->productID)  }}">{{ $product->productName}}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">RM {{  $product->productPrice}}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a data-toggle="modal" data-target="#exampleModal" id="{{ $product->productID }}" onclick="productView(this.id)">Add to cart</a></li>
                                                        <li><a class="links-details" id="{{ $product->productID }}" onclick="addWishlist(this.id)"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a class="quick-view"  alt="Report Item" href="{{ route('product.report' , $product->productID)}}"><i class="bi bi-exclamation-triangle"></i></a></li>
                                                    </ul>
                                                </div>

                                               
                                            </div>
                                        </div>
                                       
                                        <!-- single-product-wrap end -->
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product-area end -->
            <!-- Begin Li's Static Banner Area -->
            
            <!-- Li's Static Banner Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Men's Fashion</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                @php
                                    use App\Models\Product;
                                    $productsMen = Product::where('categoryID', '31')->get();
                                    @endphp
                                @foreach($productsMen as $product)
                                <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                       
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ url('product/details/'.$product->productID)  }}">
                                                    <img src="{{ asset($product->productThumbnail)}}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">{{ $product['category']['categoryName'] }} </a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="{{ url('product/details/'.$product->productID)  }}">{{ $product->productName}}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">RM {{  $product->productPrice}}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a data-toggle="modal" data-target="#exampleModal" id="{{ $product->productID }}" onclick="productView(this.id)">Add to cart</a></li>
                                                        <li><a class="links-details" id="{{ $product->productID }}" onclick="addWishlist(this.id)"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>

                                               
                                            </div>
                                        </div>
                                       
                                        <!-- single-product-wrap end -->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>

            
            <!-- Li's Laptop Product Area End Here -->
            <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Women's Fashion</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                @php
                                   
                                    $productsWomen = Product::where('categoryID', '32')->get();
                                    @endphp
                                @foreach($productsWomen as $product)
                                <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                       
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ url('product/details/'.$product->productID)  }}">
                                                    <img src="{{ asset($product->productThumbnail)}}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">{{ $product['category']['categoryName'] }} </a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="{{ url('product/details/'.$product->productID)  }}">{{ $product->productName}}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">RM {{  $product->productPrice}}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a data-toggle="modal" data-target="#exampleModal" id="{{ $product->productID }}" onclick="productView(this.id)">Add to cart</a></li>
                                                        <li><a class="links-details" id="{{ $product->productID }}" onclick="addWishlist(this.id)"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>

                                               
                                            </div>
                                        </div>
                                       
                                        <!-- single-product-wrap end -->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>

            <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Food and Snacks</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                @php
                                   
                                    $productsFood = Product::where('categoryID', '33')->get();
                                    @endphp
                                @foreach($productsFood as $product)
                                <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                       
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ url('product/details/'.$product->productID)  }}">
                                                    <img src="{{ asset($product->productThumbnail)}}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">{{ $product['category']['categoryName'] }} </a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="{{ url('product/details/'.$product->productID)  }}">{{ $product->productName}}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">RM {{  $product->productPrice}}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a data-toggle="modal" data-target="#exampleModal" id="{{ $product->productID }}" onclick="productView(this.id)">Add to cart</a></li>
                                                        <li><a class="links-details" id="{{ $product->productID }}" onclick="addWishlist(this.id)"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>

                                               
                                            </div>
                                        </div>
                                       
                                        <!-- single-product-wrap end -->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
            <!-- Begin Li's TV & Audio Product Area -->
            <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Stationeries</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                @php
                                 
                                    $productsStationeries = Product::where('categoryID', '34')->get();
                                    @endphp
                                @foreach($productsStationeries as $product)
                                <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                       
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ url('product/details/'.$product->productID)  }}">
                                                    <img src="{{ asset($product->productThumbnail)}}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">{{ $product['category']['categoryName'] }} </a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="{{ url('product/details/'.$product->productID)  }}">{{ $product->productName}}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">RM {{  $product->productPrice}}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a data-toggle="modal" data-target="#exampleModal" id="{{ $product->productID }}" onclick="productView(this.id)">Add to cart</a></li>
                                                        <li><a class="links-details" id="{{ $product->productID }}" onclick="addWishlist(this.id)"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>

                                               
                                            </div>
                                        </div>
                                       
                                        <!-- single-product-wrap end -->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
            
            <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Sports and Outdoors</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                @php
                                   
                                    $productsSports = Product::where('categoryID', '36')->get();
                                    @endphp
                                @foreach($productsSports as $product)
                                <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                       
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ url('product/details/'.$product->productID)  }}">
                                                    <img src="{{ asset($product->productThumbnail)}}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">{{ $product['category']['categoryName'] }} </a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="{{ url('product/details/'.$product->productID)  }}">{{ $product->productName}}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">RM {{  $product->productPrice}}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a data-toggle="modal" data-target="#exampleModal" id="{{ $product->productID }}" onclick="productView(this.id)">Add to cart</a></li>
                                                        <li><a class="links-details" id="{{ $product->productID }}" onclick="addWishlist(this.id)"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>

                                               
                                            </div>
                                        </div>
                                       
                                        <!-- single-product-wrap end -->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>

            
            <!-- Li's TV & Audio Product Area End Here -->
            <!-- Begin Li's Static Home Area -->
            
            <!-- Li's Static Home Area End Here -->
            <!-- Begin Group Featured Product Area -->
@endsection