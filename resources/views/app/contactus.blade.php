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
           <style type="text/css">
                body {
                    background: url('http://localhost/shopping/public/ecom_template/white_leather.png');
                    repeat 0 0;
                }
           </style>
  </head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
  	<div class="topNav">
  		<div class="container">
  			<div class="alignR">
  				<div class="pull-left socialNw">
  					<a href="#"><span class="icon-twitter"></span></a>
  					<a href="#"><span class="icon-facebook"></span></a>
  					<a href="#"><span class="icon-youtube"></span></a>
  					<a href="#"><span class="icon-tumblr"></span></a>
  				</div>

          <a href="{{ route('mainpage') }}"> <span class="icon-home"></span> Home</a>
          <a href="{{ route('login') }}"><span class="icon-user"></span> Login</a>
          <a href="{{ route('register') }}"><span class="icon-edit"></span> Register </a>
          <a href="{{ route('Aboutus') }}"><span class="icon-list"></span>  About Us</a>
          <a class="active" href="{{ route('Contactus') }}"><span class="icon-envelope"></span> Contact us</a>


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
  	</h1>
  	</div>


    <div class="span4">

  	</div>


    <div class="span4 alignR">
  	     <p><br> <strong> Support (24/7) :  0344-9900965 </strong><br><br></p>
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


  			<ul class="nav pull-right">
          <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
              <div class="dropdown-menu">
              <form action="{{ route('login') }}" method="post" class="form-horizontal loginFrm">
                  @csrf
                  <div class="control-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="control-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                         @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                         @enderror
                  </div>
                  <div class="control-group">
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
	<hr class="soften">
	<div class="well well-small">
	<h1>Visit us</h1>
	<hr class="soften"/>
	<div class="row-fluid">
		<div class="span8 relative">
		<iframe style="width:100%; height:350px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/place/Khushal+Khan+Khattak+University/@33.1250352,71.1137003,17z/data=!3m1!4b1!4m5!3m4!1s0x38d87ea3e2d2a54f:0xaeda9e2577159032!8m2!3d33.1250307!4d71.115889"></iframe>

		<div class="absoluteBlk">
		<div class="well wellsmall">
		<h4>Contact Details</h4>
		<h5>
			2601 Mission St.<br/>
			Khushal Khan KHattak University KARAK<br/><br/>

			info@mysite.com<br/>
			﻿Tel 0344-9900965<br/>
			Fax  0344-9900965<br/>
			web : wwwmysitedomain.com
		</h5>
		</div>
		</div>
		</div>

		<div class="span4">
		<h4>Email Us</h4>
		<form class="form-horizontal">
        <fieldset>
          <div class="control-group">

              <input type="text" placeholder="name" class="input-xlarge"/>

          </div>
		   <div class="control-group">

              <input type="text" placeholder="email" class="input-xlarge"/>

          </div>
		   <div class="control-group">

              <input type="text" placeholder="subject" class="input-xlarge"/>

          </div>
          <div class="control-group">
              <textarea rows="3" id="textarea" class="input-xlarge"></textarea>

          </div>

            <button class="shopBtn" type="submit">Send email</button>

        </fieldset>
      </form>
		</div>
	</div>


</div>



<!--
Footer
-->
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

<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>



<script src="{{ asset('/public/ecom_template/js/jquery.js') }}"></script>
<script src="{{ asset('/public/ecom_template/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/public/ecom_template/js/jquery.easing-1.3.min.js') }}"></script>
<script src="{{ asset('/public/ecom_template/js/jquery.scrollTo-1.4.3.1-min.js') }}"></script>
<script src="{{ asset('/public/ecom_template/js/shop.js') }}"></script>
  </body>
</html>
