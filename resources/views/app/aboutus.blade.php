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
<!--
	Upper Header Section
-->
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
        <a class="active" href="{{ route('Aboutus') }}"><span class="icon-list"></span>  About Us</a>
        <a href="{{ route('Contactus') }}"><span class="icon-envelope"></span> Contact us</a>


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
	<div>
		<h1>About us</h1>
	</div>
	<hr class="soften">
	<div class="row">
		<div class="span8">
		  <h6>
			I'm a paragraph. Click here to add your own text and edit me. I’m a great place for you to tell a story and let your users know a little more about you.
		  </h6>
		  <p>
			It’s easy. Just click “Edit Text” or double click me and you can start adding your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.<br>
			<br>
			This is a great space to write long text about your company and your services. You can use this space to go into a little more detail about your company. Talk about your team and what services you provide. Tell your visitors the story of how you came up with the idea for your business and what makes you different from your competitors. Make your company stand out and show your visitors who you are.
			<br><br>
			Sometimes I'm right and I can be wrong. My own beliefs are in my song. The butcher, the banker, the drummer and then, makes no difference what group I'm in. I am everyday people! Yeah. Yeah.<br>
		  </p>
		</div>
		<div class="span4">
			Monday <br/>
      Tuesday <br/>
      Wednesday <br/>
      Thursday <br/>
      Friday <br/>
      Saturday <br/>
      Sunday <br/>


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
