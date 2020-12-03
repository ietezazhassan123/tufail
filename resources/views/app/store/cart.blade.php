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
	<p><br> <strong> Support (24/7) :  0344-9900965 </strong><br><br></p>
	<a href="{{ route('View_Cart') }}"><span class="btn btn-mini"> <span class="icon-shopping-cart"></span></span></a>
	</div>
</div>
</header>


<div class="navbar">

	<!--
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
	-->

	<button class="btn btn-sm btn-info pull-left" onclick="window.history.back();">Back</button>
	<a class="btn btn-sm btn-success pull-right" href="{{ route('CheckOut') }}">Next</a>



</div>

	<div class="row">
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="{{ route('mainpage') }}">Home</a> <span class="divider">/</span></li>
		<li class="active">Cart</li> <span class="divider">/</span></li>
		<li><a href="{{ route('CheckOut') }}">Check Out</a> <span class="divider">/</span></li>
    </ul>
	<div class="well well-small">

	<hr class="soften"/>

	<table class="table table-bordered table-condensed">
              <thead>
                    <tr>
		                  <th>Product</th>
		                  <th>Name</th>
		                  <th>Description</th>
		                  <th>Unit price</th>
		                  <th>Qty </th>
		                  <th>Total</th>
				    </tr>
              </thead>

              <?php $total = 0; ?>
              <tbody>
              	@if(Session::has('cart'))
		              	@foreach(Session::get('cart') as $key => $Product)
		                <tr>
		                  <td><img  src="http://localhost/shopping/public/Images/Products/{{ $Product['image'] }}" alt=""></td>
		                  <td>{{ $Product['name'] }}</td>
		                  <td>{{ $Product['description'] }}</td>
		                  <td>{{ $Product['price'] }}</td>
		                  <td>
							<input class="span1 product_qty" style="max-width:34px" id="qty_field_{{ $key }}" data-pid="{{ $key }}" type="number" value="{{ $Product['qty'] }}" min="1">
							<span class='text-left' id='qty_error_{{ $key }}' role='alert' style='color:red;margin-top:-15px;'></span>
						   <div class="input-append">
							<button class="btn btn-mini btn-danger remove_from_cart" id="product_removing_{{ $key }}" data-pid="{{ $key }}" ><span class="icon-remove"></span></button>
						   </div>
						</td>
		                  <td>${{ $Product['price']*$Product['qty'] }}</td>
		                </tr>
		                    <?php  $total= $total+ ($Product['price']*$Product['qty']);?>
		                @endforeach
              	@endif




				 <tr>
                  <td colspan="6" class="alignR">Total products:	</td>
                  <td class="label label-primary" id="total_price">
                  	    {{ $total }}
                  </td>
                 </tr>

				</tbody>
            </table><br/>



	<button onclick="window.history.back();" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </button>
	<a href="{{ route('CheckOut') }}" class="shopBtn btn-large pull-right">Next <span class="icon-arrow-right"></span></a>

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
                    $('#add_to_cart').on('click',function(e){
                    	     e.preventDefault();

                    	     let p_id = $("#product_id").val();
                    	     let p_qty = $("#product_qty").val();

                    	     if(p_qty == null)
                    	     {
                    	     	 p_qty = 1;
                    	     }

                             axios.get('../../../Add_to_cart/'+p_id+'/'+p_qty)
                             .then((response)=>{
                                    console.log(response);
                             });
                    });






                    $('body').on('click','.remove_from_cart',function(){
		    	   	    let product_id = $(this).data('pid');
		    	   	    let removeing_product_id = $(this).attr('id');

		                Swal.fire({
							  title: 'Are you sure to remove this Product from Cart?',
							  text: "You won't be able to revert this!",
							  icon: 'warning',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Yes, Remove it!'
						}).then((result) => {
							  if (result.isConfirmed) {

							  	       axios.get('remove_product_from_cart/'+product_id)
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
													});

													Toast.fire({
														  icon: 'success',
														  title: 'Product successfully removed from cart'
													});

		                                            $('#'+removeing_product_id).parent().parent().parent().empty();
		                                            $('#total_price').html(response.data.total);
		                                      }
							  	       })

							  }
						})
		    	   });





                   $('.product_qty').on('change ',function(){
                          let qty_value = $(this).val();
                          let product_id = $(this).data('pid');


                          axios.get('change_qty_from_cart/'+product_id+'/'+qty_value)
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
											});

											Toast.fire({
												  icon: 'success',
												  title: 'Product Added to Cart'
											});
											location.reload();
                                  }
                          });


                   });
    	   });


    </script>
  </body>
</html>
