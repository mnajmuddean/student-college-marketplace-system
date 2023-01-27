

<header class="li-header-4">
                <!-- Begin Header Top Area -->
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Top Left Area -->
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <li><span>UPK UiTM Jasin:</span><a href="#"> (+606) 264 5000</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <!-- Begin Setting Area -->
                                        <li>
                                            <div class="ht-setting-trigger"><span>Setting</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                     @auth
                                                    <li><a href="{{  route('login')  }}">My Account</a></li>    
                                                    <li><a href="{{ route('student.logout')}}   ">Log Out</a></li>
                                                    @else 

                                                    <a href="{{  route('login')  }}" class="text-white active">Login/Register</a></li>

                                                    @endauth

                                                    <li><a href="{{ route('wishlist')}}">Wishlist</a></li>
                                                    <li><a href="{{ route('cart')}}">My Cart</a></li>
                                                    
                                                   
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Setting Area End Here -->
                                        <!-- Begin Currency Area -->
                                        
                                        <!-- Currency Area End Here -->
                                        <!-- Begin Language Area -->
                                       

                                        

                                        @auth
                                        <a href="{{  route('chatify')  }}" class="text-white active pxhp-2 pr-3">Chat</a></li>
                                        
                                        <a href="{{  route('login')  }}" class="text-white active pxhp-2">My Profile</a></li>
                                        

                                        @else 
                                        <a href="{{  route('login')  }}" class="text-white active">Login/Register</a></li>

                                        @endauth

                                        
                                        <!-- Language Area End Here -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Top Area End Here -->
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="{{ url('/')}}">
                                        <img src="{{ asset('logo/ujscms-logo.png')}}" alt="" style="width : 50%; height : 50%">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            @php
                            use App\Models\Category;
                            $categories = Category::orderBy('categoryName','ASC')->get();
                            @endphp

                           
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                                <!-- Begin Header Middle Searchbox Area -->
                                <form action="#" class="hm-searchbox">
                                    <select class="nice-select select-search-category">
                                        @foreach(   $categories as $category)
                                        <option value="{{ url('category/details/'.$category->categoryID)  }}"><i class="icon {{ $category->categoryImage}}"></i> {{  $category->categoryName}}</option>
                                        @endforeach                        
                                    </select>
                                    <input type="text" placeholder="Enter your search key ...">
                                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                                <!-- Header Middle Searchbox Area End Here -->
                                <!-- Begin Header Middle Right Area -->
                                <div class="header-middle-right">
                                    <ul class="hm-menu">
                                        <!-- Begin Header Middle Wishlist Area -->
                                        <li class="hm-wishlist">
                                            <a href="{{ route('wishlist')}}">
                                                <span class="cart-item-count wishlist-item-count"></span>
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </li>
                                        <!-- Header Middle Wishlist Area End Here -->
                                        <!-- Begin Header Mini Cart Area -->
                                        <li class="hm-minicart">
                                            <div class="hm-minicart-trigger">
                                                <span class="item-icon"></span>RM
                                                <span class="item-text" id="cartSubTotal">
                                                    <span class="cart-item-count" id="cartQty"></span>
                                                </span>
                                            </div>
                                            <span></span>
                                            <div class="minicart">
                                                
                                                    <div id="miniCart">
                                                        
                                                    </div>
                                                
                                                <p class="minicart-total" >SUBTOTAL: <span>RM <span id="cartSubTotal"></span></p>
                                                <div class="minicart-button">
                                                    <a href="{{ route('cart')}}" class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                                        <span>View Full Cart</span>
                                                    </a>
                                                    <a href="checkout.html" class="li-button li-button-fullwidth li-button-sm">
                                                        <span>Checkout</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Header Mini Cart Area End Here -->
                                    </ul>
                                </div>
                                <!-- Header Middle Right Area End Here -->
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
                <div class="header-bottom header-sticky d-none d-lg-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area mobile-menu-area-4 d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>