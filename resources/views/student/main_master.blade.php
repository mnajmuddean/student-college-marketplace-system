<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- index-431:41-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/logo/ujscms-logo.png')}}"> 
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="{{ asset('/frontend/css/material-design-iconic-font.min.css')  }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('/frontend/css/font-awesome.min.css') }}">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="{{ asset('/frontend/css/fontawesome-stars.css')    }}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{ asset('/frontend/css/meanmenu.css') }}">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="{{ asset('/frontend/css/owl.carousel.min.css') }}">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="{{ asset('/frontend/css/slick.css')    }}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{ asset('/frontend/css/animate.css')  }}">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="{{ asset('/frontend/css/jquery-ui.min.css')}}">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="{{ asset('/frontend/css/venobox.css')  }}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{ asset('/frontend/css/nice-select.css')  }}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{ asset('/frontend/css/magnific-popup.css')   }}">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap.min.css')    }}">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="{{ asset('/frontend/css/helper.css')   }}">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{ asset('/frontend/style.css')    }}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('/frontend/css/responsive.css')   }}">
        <!-- Bootstrap icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <!-- Modernizr js -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('/frontend/js/vendor/modernizr-2.8.3.min.js')}} "></script> 
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            
            @include('student.body.header')
            <!-- Header Area End Here -->
            <!-- Begin Slider With Banner Area -->
            @yield('content')
            <!-- Group Featured Product Area End Here -->
            <!-- Begin Footer Area -->
             @include('student.body.footer')
            <!-- Quick View | Modal Area End Here -->
        </div>
        <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="{{ asset('/frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <!-- Popper js -->
        <script src="{{ asset('/frontend/js/vendor/popper.min.js')}}"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="{{ asset('/frontend/js/bootstrap.min.js')}}"></script>
        <!-- Ajax Mail js -->
        <script src="{{ asset('/frontend/js/ajax-mail.js')}}"></script>
        <!-- Meanmenu js -->
        <script src="{{ asset('/frontend/js/jquery.meanmenu.min.js')}}"></script>
        <!-- Wow.min js -->
        <script src="{{ asset('/frontend/js/wow.min.js')}}"></script>
        <!-- Slick Carousel js -->
        <script src="{{ asset('/frontend/js/slick.min.js')}}"></script>
        <!-- Owl Carousel-2 js -->
        <script src="{{ asset('/frontend/js/owl.carousel.min.js')}}"></script>
        <!-- Magnific popup js -->
        <script src="{{ asset('/frontend/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Isotope js -->
        <script src="{{ asset('/frontend/js/isotope.pkgd.min.js')}}"></script>
        <!-- Imagesloaded js -->
        <script src="{{ asset('/frontend/js/imagesloaded.pkgd.min.js')}}"></script>
        <!-- Mixitup js -->
        <script src="{{ asset('/frontend/js/jquery.mixitup.min.js')}}"></script>
        <!-- Countdown -->
        <script src="{{ asset('/frontend/js/jquery.countdown.min.js')}}"></script>
        <!-- Counterup -->
        <script src="{{ asset('/frontend/js/jquery.counterup.min.js')}}"></script>
        <!-- Waypoints -->
        <script src="{{ asset('/frontend/js/waypoints.min.js')}}"></script>
        <!-- Barrating -->
        <script src="{{ asset('/frontend/js/jquery.barrating.min.js')}}"></script>
        <!-- Jquery-ui -->
        <script src="{{ asset('/frontend/js/jquery-ui.min.js')}}"></script>
        <!-- Venobox -->
        <script src="{{ asset('/frontend/js/venobox.min.js')}}"></script>
        <!-- Nice Select js -->
        <script src="{{ asset('/frontend/js/jquery.nice-select.min.js')}}"></script>
        <!-- ScrollUp js -->
        <script src="{{ asset('/frontend/js/scrollUp.min.js')}}"></script>
        <!-- Main/Activator js -->
        <script src="{{ asset('/frontend/js/main.js')}}"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
    @if(Session::has('message'))
    var type = "{{  Session::get('alert-type','info') }}"
    switch(type){
        case 'info' :
        toastr.info(" {{  Session::get('message') }}");
        break;

        case 'success' : 
        toastr.success(" {{  Session::get('message') }}");
        break;

        case 'warning' :
        toastr.warning(" {{  Session::get('message') }}");
        break;

        case 'error' :
        toastr.error(" {{  Session::get('message') }}");
        break;
    }
    @endif
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 800px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-4">
            <div class="card" style="width: 16rem;">
  <img src="..." class="card-img-top" alt="..." style="height: 270px; width: 260px;" id="pImage">
</div>
            </div>
            <div class="col-lg-4">
            <ul class="list-group">
  <li class="list-group-item">Product Price: RM <strong id="pPrice"></strong></li>
  <li class="list-group-item">Product Code: <strong id="pCode"></strong></li>
  <li class="list-group-item">Category: <strong id="pCategory"></strong></li>
  <li class="list-group-item">Products Availability: <span class="badge badge-pill badge-success" id="available" style="background: green; color:white"></span> <span class="badge badge-pill badge-danger" id="unavailable" style="background: red; color:white"></span></li>
</ul>
            </div>
            <div class="col-lg-4">
            <div class="form-group">
                                        <label>Quantity</label>
                                                
                                                    <input type="number" class="form-control" id="quantity" value="1" min="1">
                                                    
                                                
            </div>
            </div>
        </div>
      </div>
      
      <div class="modal-footer">
        <input type="hidden" id="productID">
        <button type="submit" class="btn btn-primary"  onclick="addToCart()">Add To Cart</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
// Start Product View with Modal 
function productView(id){
    // alert(id)
    $.ajax({
        type: 'GET',
        url: '/product/view/modal/'+id,
        dataType:'json',
        success:function(data){
            // console.log(data)

            $('#pname').text(data.product.productName);
            $('#pPrice').text(data.product.productPrice);
            $('#pCode').text(data.product.productCode);
            $('#pCategory').text(data.product.category.categoryName);
            $('#pQty').text(data.product.productQty);
            $('#pImage').attr('src','/'+data.product.productThumbnail);
            $('#productID').val(id);
            $('#quantity').val(1);
            
            if(data.product.productQty > 0 ){
                $('#available').text('');
                $('#unavailable').text('');
                $('#available').text('available');
            }else{
                $('#available').text('');
                $('#unavailable').text('');
                $('#unavailable').text('unavailable');
            }
        
        }
    })
 
}

function addToCart(){
    var productName = $('#pname').text();
    var productID = $('#productID').val();
    var quantity = $('#quantity').val();

    $.ajax({
        type: "POST",
        dataType: 'json',
        data:{
            quantity:quantity,
            productName: productName
        },
        url: "/cart/data/store/"+productID,
        success:function(data){
            miniCart()
            $('#closeModal').click();
            console.log(data)
            const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
        }
    })
}
</script>


<script type="text/javascript">
    function miniCart(){
        $.ajax({
            type: 'GET',
            url : '/product/minicart',
            dataType: 'json',
            success: function(response){
                
                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);
                var miniCart = ""
                $.each(response.carts, function(key,value){
                    miniCart += `<li>                   
                                                                <ul class="minicart-product-list">
                                                                    <li>
                                                                        
                                                                        <img src="/${value.options.image}" style="width:30%;height:30%"alt="">
                                                                       
                                                                        <div class="minicart-product-details">
                                                                        <h6><a href="single-product.html">${value.name}</a></h6>
                                                                         <span> RM ${value.price} * ${value.qty}</span>
                                                                        </div>
                                                                        <button type="submit" id="${value.rowId}" style="height:20%" onclick="miniCartRemove(this.id)"><i class="fa fa-close"></i></button> </div>
                                                                    </li>
                                                                </ul>
                                                    </li>`
                });

                                        
                                            
                                            
                                     
                
                $('#miniCart').html(miniCart);
            }
        })
    }

    miniCart();

    function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/minicart/product-remove/'+rowId,
            dataType:'json',
            success:function(data){
            miniCart();
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }

</script>

<script stype="text/javascript">

    function addWishlist(productID){
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/addWishlist/"+productID,


            success:function(data){

                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }

            }
        })
    }

</script>

<script type="text/javascript">
    function wishlist(){
        $.ajax({
            type: 'GET',
            url : '/user/getwishlist',
            dataType: 'json',
            success: function(response){
                
                var rows = ""
                $.each(response, function(key,value){
                    rows += `<tr>
                                                <td class="li-product-remove"><button type="submit" id="${value.wishlistID}" onclick="wishlistRemove(this.id)"><i class="fa fa-close"></i></button> </div></td>
                                                <td class="li-product-thumbnail"><a href="#"><img src="/${value.product.productThumbnail}" alt="" style="width:200px; height:200px;"></a></td>
                                                <td class="li-product-name"><a href="#">${value.product.productName}</a></td>
                                                <td class="li-product-price"><span class="amount">${value.product.productPrice}</span></td>
                                                <td class="li-product-stock-status"><span class="in-stock">in stock</span></td>
                                                <td class="li-product-add-cart"><a data-toggle="modal" data-target="#exampleModal" id="${value.productID}" onclick="productView(this.id)">Add to cart</a></td>
                                </tr>`
                });
                
                $('#wishlist').html(rows);
            }
        })
    }

    wishlist();
    </script>

<script>
function wishlistRemove(wishlistID){
        $.ajax({
            type: 'GET',
            url: '/user/wishlist/remove/'+wishlistID,
            dataType:'json',
            success:function(data){
            wishlist();
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }

</script>

<script type="text/javascript">
    function cart(){
        $.ajax({
            type: 'GET',
            url : '/user/getcart',
            dataType: 'json',
            success: function(response){
                
                var rows = ""
                $.each(response.carts, function(key,value){
                    rows += `<tr>
                                                <td class="li-product-remove"><button type="submit" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-close"></i></button> </div></td>
                                                <td class="li-product-thumbnail"><a href="#"><img src="/${value.options.image}" alt="" style="width:200px; height:200px;"></a></td>
                                                <td class="li-product-name"><a href="#">${value.name}</a></td>
                                                <td class="li-product-price"><span class="amount">RM ${value.price}</span></td>
                                                <td class="li-product-stock-status"><span class="in-stock">in stock</span></td>
                                                <td>
                                                    <button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button> 
                                                    <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;" >  
                                                    <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button>                                  
                                                </td>
                                                <td class="li-product-stock-status"> <span> RM ${value.subtotal}</span></td>
                                               
                                                <td class="li-product-add-cart"><a data-toggle="modal" data-target="#exampleModal" id="${value.productID}" onclick="productView(this.id)">Add to cart</a></td>
                                </tr>`
                });
                
                $('#cart').html(rows);
            }
        })
    }

    cart();
    </script>

<script>
function cartRemove(id){
        $.ajax({
            type: 'GET',
            url: '/user/cart/remove/'+id,
            dataType:'json',
            success:function(data){
            
            cart();
            miniCart();
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }

    function cartIncrement(rowId){
        $.ajax({
            type:'GET',
            url: "/cart-increment/"+rowId,
            dataType:'json',
            success:function(data){
                cart();
                miniCart();
            }
        });
    }

</script>
    </body>

<!-- index-431:47-->
</html>
