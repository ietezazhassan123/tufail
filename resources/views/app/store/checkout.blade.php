<!DOCTYPE html>
<html lang="en">
  <head>
			    <meta charset="utf-8">
			    <title>shopping</title>
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
<body class="well">








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
	<p><br> <strong> Support (24/7) :  03151995019 </strong><br><br></p>
	<a href="{{ route('View_Cart') }}"><span class="btn btn-mini"> <span class="icon-shopping-cart"></span></span></a>
	</div>
</div>
</header>



<!--
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
-->


	<div class="row">
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="{{ route('UserPanel') }}">Home</a> <span class="divider">/</span></li>
		<li><a href="{{ route('View_Cart') }}">Cart</a> <span class="divider">/</span></li>
		<li class="active">Check Out</li>
    </ul>
	<div class="well well-small">
		
	<hr class="soften"/>	

	   <form class="bs-docs-example form-horizontal" id="placeorder" method="post">
	   	   <!-- 
            <div class="control-group">
              <label class="control-label" >Name</label>
              <div class="controls">
                   <input type="text" class="span6" value="{{ Auth::user()->name }}" name="name" id="form_attr_name">
                   <span class="text-left" id="name" role="alert" style="color:red;margin-top:-15px;"></span>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label" >Email</label>
              <div class="controls">
                <input type="text"  class="span6" value="{{ Auth::user()->email }}" name="email" id="form_attr_email">
                <span class="text-left" id="email" role="alert" style="color:red;margin-top:-15px;"></span>
              </div>
            </div>
          -->


            <div class="control-group">
              <label class="control-label" >Mobile Number</label>
              <div class="controls">
                <input type="text" class="span6" name="mobileno" id="form_attr_mobileno">
                <span class="text-left" id="mobileno" role="alert" style="color:red;margin-top:-15px;"></span>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" >City</label>
              <div class="controls">
                <input type="text" class="span6" name="city" id="form_attr_city">
		        <span class="text-left" id="city" role="alert" style="color:red;margin-top:-15px;"></span>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label" >Address</label>
              <div class="controls">
                   <textarea class="span6" name="address" rows="4" id="form_attr_address"></textarea>
		           <span class="text-left" id="address" role="alert" style="color:red;margin-top:-15px;"></span>
              </div>
            </div>


            <div class="control-group">
              <span class="span2"></span>
              <button class="btn btn-md btn-success span3" type="submit">Place Order</button>
            </div>
        </form>

		
		
				
	<button onclick="window.history.back();" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </button>
</div>
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














    <script src="{{ asset('/public/ecom_template/js/jquery.js') }}"></script>
	<script src="{{ asset('/public/ecom_template/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/public/ecom_template/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('/public/ecom_template/js/jquery.scrollTo-1.4.3.1-min.js') }}"></script>
    <script src="{{ asset('/public/ecom_template/js/shop.js') }}"></script>


    <script type="text/javascript">
    	   $(document).ready(function(){
                  
                     $('#placeorder').on('submit',function(e){
                              e.preventDefault();
                              axios.post('PlaceOrder',$('#placeorder').serialize())
                              .then((response)=>{
                                        if(response.data.success) 
                                        {
                                        	    Swal.fire(
													  'Order Placed!',
													  'Thanks Your Order Successfully Placed!',
													  'success'
												);

												window.location = "Orders";
                                        }
                              })
                              .catch((errors) => {
	                                    $('.form-group > span').addClass('d-none');
		                                $('.form-control').removeClass('is-invalid');

		                                $.each(errors.response.data.errors, function(key, value){
										       $('.error_messages').empty();
										});

		                            	$.each(errors.response.data.errors, function(key, value){
										       $('#form_attr_'+key).after('<span class="error_messages" role="alert" style="color:red;" id="error_'+key+'"><strong>'+value+'</strong>');
										});
	                           });
                     });

    	   });
    </script>
  </body>
</html>