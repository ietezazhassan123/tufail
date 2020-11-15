<!DOCTYPE html>
<html lang="en">
      <head>
              <meta charset="utf-8">
              <title>Ecommerce</title>
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta name="description" content="">
              <meta name="author" content="">
              <link href="{{ asset('/public/ecom_template/css/bootstrap.css') }}" rel="stylesheet"/>
              <link href="{{ asset('/public/ecom_template/style.css') }}" rel="stylesheet"/>
              <link href="{{ asset('/public/ecom_template/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
              <link rel="shortcut icon" href="{{ asset('/public/ecom_template/ico/favicon.ico') }}">

               <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js" integrity="sha512-DZqqY3PiOvTP9HkjIWgjO6ouCbq+dxqWoJZ/Q+zPYNHmlnI2dQnbJ5bxAHpAMw+LXRm4D72EIRXzvcHQtE8/VQ==" crossorigin="anonymous"></script>
               <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous"></script>
               <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      </head>
<body>
<!-- 
    Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="topNav">
        <div class="container">
            <div class="alignR">
                <div class="pull-left socialNw">
                    <a href=""><span class="icon-twitter"></span></a>
                    <a href=""><span class="icon-facebook"></span></a>
                    <a href=""><span class="icon-youtube"></span></a>
                    <a href=""><span class="icon-tumblr"></span></a>
                </div>
                <a class="active" href=""> <span class="icon-home"></span> Home</a> 
                <a href="{{ route('login') }}"><span class="icon-user"></span> Login</a> 
                <a href="{{ route('register') }}"><span class="icon-edit"></span> Register </a> 
                <a href=""><span class="icon-envelope"></span> Contact us</a>
            </div>
        </div>
    </div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
    <div class="span4">
    <h1>
    <span>
         Khushal Shopping Mall
    </span> 
    </a>
    </h1>
    </div>
    <div class="span4">
    <div class="offerNoteWrapper">
  
    </div>
    </div>
    <div class="span4 alignR">
    <p><br> <strong> Support (24/7) :  03151995019 </strong><br><br></p>
    <a href="{{ route('View_Cart') }}"><span class="btn btn-mini"> <span class="icon-shopping-cart"></span></span></a>
    </div>
</div>
</header>

<!--
Navigation Bar Section 
-->
<div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="nav-collapse">
            <form action="#" class="navbar-search pull-left">
              <input type="text" placeholder="Search" class="search-query span10">
            </form>
            <ul class="nav pull-right">
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
                <div class="dropdown-menu">
                <form class="form-horizontal loginFrm">
                  <div class="control-group">
                    <input type="text" class="span2" id="inputEmail" placeholder="Email">
                  </div>
                  <div class="control-group">
                    <input type="password" class="span2" id="inputPassword" placeholder="Password">
                  </div>
                  <div class="control-group">
                    <label class="checkbox">
                    <input type="checkbox"> Remember me
                    </label>
                    <button type="submit" class="shopBtn btn-block">Sign in</button>
                  </div>
                </form>
                </div>
            </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
<!-- 
Body Section 
-->
    <div class="row">
<div id="sidebar" class="span3">
<div class="well well-small">
    <ul class="nav nav-list">
        @foreach($Categories as $Category)
        <li><a href=""><span class="icon-chevron-right"></span>{{ $Category->name }}</a></li>
        @endforeach
        <li style="border:0"> &nbsp;</li>
    </ul>
</div>

            
            <a class="shopBtn btn-block" href="">Customer Satisfaction<br><small>is our Top most Priority</small></a>
            <br>
            <br>
            
            <ul class="nav nav-list promowrapper">
                 @foreach($ProductsSide as $Product1)
                    <li>
                      <div class="thumbnail">
                        <a class="zoomTool" href="{{ route('ProductQuickView',['id'=>$Product1->id]) }}"  title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                        <img src="http://localhost/shopping/public/Images/Products/{{ $Product1->product_images->first()->image_path }}" alt="bootstrap ecommerce templates">
                        <div class="caption">
                          <h4><button class="shopBtn add_to_cart"   data-pid="{{ $Product1->id }}">Add to Cart</button> <span class="pull-right">${{ $Product1->price }}</span></h4>
                        </div>
                      </div>
                    </li>
                  @endforeach
            
          </ul>

    </div>
    <div class="span9">
        <div class="well np">
              <div id="myCarousel" class="carousel slide homCar">
                  <div class="carousel-inner">
                    <div class="item">
                      <img style="width:100%" src="{{ asset('/public/ecom_template/img/bootstrap_free-ecommerce.png') }}" alt="bootstrap ecommerce templates">
                      <div class="carousel-caption">
                            <p><span>Very clean simple to use</span></p>
                      </div>
                    </div>

                    <div class="item">
                      <img style="width:100%" src="{{ asset('/public/ecom_template/img/carousel1.png') }}" alt="bootstrap ecommerce templates">
                      <div class="carousel-caption">
                            <p><span>Highly Google seo friendly</span></p>
                      </div>
                    </div>

                    <div class="item active">
                      <img style="width:100%" src="{{ asset('/public/ecom_template/img/carousel3.png') }}" alt="bootstrap ecommerce templates">
                      <div class="carousel-caption">
                            <p><span>Very easy to integrate and expand.</span></p>
                      </div>
                    </div>

                    <div class="item">
                      <img style="width:100%" src="{{ asset('/public/ecom_template/img/bootstrap-templates.png') }}" alt="bootstrap templates">
                      <div class="carousel-caption">
                            <p><span>Compitable to many more opensource cart</span></p>
                      </div>
                    </div>

                  </div>
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
             </div>
      </div>




      <ul class="thumbnails">
      
            @foreach($Products as $Product)
              <li class="span3">
                <div class="thumbnail">
                <a href="product_details.html" class="overlay"></a>
                <a class="zoomTool" href="{{ route('ProductQuickView',['id'=>$Product->id]) }}" title="View Detail"><span class="icon-search"></span> QUICK VIEW</a>
                <img src="http://localhost/shopping/public/Images/Products/{{ $Product->product_images->first()->image_path }}" alt="">
                <div class="caption cntr">
                  <p>{{ $Product->name }}</p>
                  <p><strong> ${{ $Product->price }}</strong></p>
                  <h4><button class="shopBtn add_to_cart"   data-pid="{{ $Product1->id }}"  title="add to cart"> Add to cart </button></h4>
                  <br class="clr">
                </div>
                </div>
              </li>
           @endforeach
      
    </ul>
  </div>
    </div>



 

       


     




<footer class="footer">
<div class="row-fluid">
<div class="span2">
<h5>Your Account</h5>
<a href="#">YOUR ACCOUNT</a><br>
<a href="#">PERSONAL INFORMATION</a><br>
<a href="#">ADDRESSES</a><br>
<a href="#">DISCOUNT</a><br>
<a href="#">ORDER HISTORY</a><br>
 </div>
<div class="span2">
<h5>Iinformation</h5>
<a href="contact.html">CONTACT</a><br>
<a href="#">SITEMAP</a><br>
<a href="#">LEGAL NOTICE</a><br>
<a href="#">TERMS AND CONDITIONS</a><br>
<a href="#">ABOUT US</a><br>
 </div>
<div class="span2">
<h5>Our Offer</h5>
<a href="#">NEW PRODUCTS</a> <br>
<a href="#">TOP SELLERS</a><br>
<a href="#">SPECIALS</a><br>
<a href="#">MANUFACTURERS</a><br>
<a href="#">SUPPLIERS</a> <br/>
 </div>
 <div class="span6">
<h5>The standard chunk of Lorem</h5>
The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for
 those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et 
 Malorum" by Cicero are also reproduced in their exact original form, 
accompanied by English versions from the 1914 translation by H. Rackham.
 </div>
 </div>
</footer>
</div><!-- /container -->

<div class="copyright">
<div class="container">
   
    <span>Copyright &copy; 2020<br> Ecommerce</span>
</div>
</div>
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
          <script src="{{ asset('/public/ecom_template/js/jquery.js') }}"></script>
          <script src="{{ asset('/public/ecom_template/js/bootstrap.min.js') }}"></script>
          <script src="{{ asset('/public/ecom_template/js/jquery.easing-1.3.min.js') }}"></script>
          <script src="{{ asset('/public/ecom_template/js/jquery.scrollTo-1.4.3.1-min.js') }}"></script>
          <script src="{{ asset('/public/ecom_template/js/shop.js') }}"></script>
          <script type="text/javascript">
           $(document).ready(function(){
                         $('body').on('click','.add_to_cart',function(){
                                               let product_id = $(this).data('pid');
                                               axios.get('Add_to_cart/'+product_id+'/'+1)
                                                     .then((response)=>{
                                                                        if(response.data.success)
                                                                        {
                                                                              const Toast = Swal.mixin({
                                                                                  toast: true,
                                                                                  position: 'top-end',
                                                                                  showConfirmButton: false,
                                                                                  timer: 3000,
                                                                                  timerProgressBar: true,
                                                                                  didOpen: (toast) => {
                                                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                                                  }
                                                                              })

                                                                              Toast.fire({
                                                                                  icon: 'success',
                                                                                  title: 'Product Added to Cart'
                                                                              })
                                                                        }
                                                     }); 
                                              });
                         });
        </script>
  </body>
</html>