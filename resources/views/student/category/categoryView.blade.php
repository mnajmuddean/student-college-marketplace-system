@extends('student.main_master')
@section('content')

@section('title')
{{  $categories->categoryName}} - Category
@endsection

<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{ url('/')}}">Home</a></li>
                            <li class="active">Shop Left Sidebar</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Li's Content Wraper Area -->
            <div class="content-wraper pt-60 pb-60 pt-sm-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-1 order-lg-2">
                            <!-- Begin Li's Banner Area -->
                            <!-- <div class="single-banner shop-page-banner">
                                <a href="#"> 
                                    <img src="{{ asset('/frontend/images/bg-banner/2.jpg')}} " alt="Li's Static Banner">
                                </a>
                            </div> -->
                            <!-- Li's Banner Area End Here -->
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar mt-30">
                                <div class="shop-bar-inner">
                                    <div class="product-view-mode">
                                        <!-- shop-item-filter-list start -->
                                        <ul class="nav shop-item-filter-list" role="tablist">
                                            <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                            <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                        </ul>
                                        <!-- shop-item-filter-list end -->
                                    </div>
                                    
                                </div>
                                <!-- product-select-box start -->
                                <div class="product-select-box">
                                    
                                </div>
                                <!-- product-select-box end -->
                            </div>
                            <!-- shop-top-bar end -->
                            <!-- shop-products-wrapper start -->
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">
                                                @foreach($products as $product)
                                                <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
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
                                                                        <a href="product-details.html">{{ $product['category']['categoryName'] }}</a>
                                                                    </h5>
                                                                    
                                                                </div>
                                                                <h4><a class="product_name" href="single-product.html">{{ $product->productName}}</a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price">RM {{ $product->productPrice}}</span>
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
                                    <div id="list-view" class="tab-pane fade product-list-view" role="tabpanel">
                                        <div class="row">
                                            <div class="col">
                                                @foreach($products as $product)
                                                <div class="row product-layout-list">
                                                    <div class="col-lg-3 col-md-5 ">
                                                        <div class="product-image">
                                                            <a href="{{ url('product/details/'.$product->productID)  }}">
                                                                <img src="{{ asset($product->productThumbnail)}}" alt="Li's Product Image">
                                                            </a>
                                                            <span class="sticker">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-7">
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                        <a href="product-details.html">{{ $product['category']['categoryName'] }}</a>
                                                                    </h5>
                                                                    
                                                                </div>
                                                                <h4><a class="product_name" href="{{ url('product/details/'.$product->productID)  }}">{{ $product->productName}}</a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price">RM {{ $product->productPrice }}</span>
                                                                </div>
                                                                <p>{{ $product->productDescription }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="shop-add-action mb-xs-30">
                                                            <ul class="add-actions-link">
                                                            <li class="add-cart active"><a data-toggle="modal" data-target="#exampleModal" id="{{ $product->productID }}" onclick="productView(this.id)">Add to cart</a></li>
                                                                    <li><a class="links-details" id="{{ $product->productID }}" onclick="addWishlist(this.id)"><i class="fa fa-heart-o"></i></a></li>
                                                                    <li><a class="quick-view"  alt="Report Item" href="{{ route('product.report' , $product->productID)}}"><i class="bi bi-exclamation-triangle"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="paginatoin-area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 pt-xs-15">
                                                <p>Showing 1-12 of 13 item(s)</p>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <ul class="pagination-box pt-xs-20 pb-xs-15">
                                                    <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                                    </li>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li>
                                                      <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                        <div class="col-lg-3 order-2 order-lg-1">
                            <!--sidebar-categores-box start  -->
                            <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                                <div class="sidebar-title">
                                @php
                                        use App\Models\Category;
                                        $categories = Category::orderBy('categoryName','ASC')->get();
                                        @endphp

                                    <h2>Category</h2>
                                </div>
                                <!-- category-sub-menu start -->
                                <div class="category-sub-menu">
                                    <ul>
                                        @foreach($categories as $category)
                                        <li class=""><a href="{{ url('category/details/'.$category->categoryID)  }}"><i class="icon {{ $category->categoryImage}}"></i> {{  $category->categoryName}}</a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                                <!-- category-sub-menu end -->
                            </div>
                            <!--sidebar-categores-box end  -->
                            <!--sidebar-categores-box start  -->
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Wraper Area End Here -->

@endsection