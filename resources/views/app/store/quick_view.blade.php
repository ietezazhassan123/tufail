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

  </head>
<body>



<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span8">
	<h1>
	<span>
         Khushal Shopping Mall
    </span> 
	</h1>
	</div>
	<div class="span4">
	</div>
	<div class="span4 alignR">
	<p><br> <strong> Support (24/7) : 0315-1995019 </strong><br><br></p>
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
		 
		  <div class="nav-collapse">
			<form action="#" class="navbar-search pull-left">
			  <input type="text" placeholder="Search" class="search-query span11">
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

<div class="row">
<div id="sidebar" class="span3">


	  <div class="well well-small alert alert-warning cntr">
		  <h2>50% Discount</h2>
		  <p> 
			 only valid for online order. <br><br><a class="defaultBtn" href="#">Click here </a>
		  </p>
	  </div>
			
</div>
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li><a href="products.html">Products</a> <span class="divider">/</span></li>
    <li class="active">Back</li>
    </ul>	
	<div class="well well-small">
	<div class="row-fluid">
			<div class="span5">
			<div id="myCarousel" class="carousel slide cntr">
                <div class="carousel-inner">

	                  <input type="hidden" name="product_id" id="product_id" value="{{ $Product->id }}">
	                

	                  <?php $imageNo=0;?>

	                  @foreach($Product->product_images as $single_image)
                            @if($imageNo==0)
		                        <div class="item active">
				                      <img src="http://localhost/shopping/public/Images/Products/{{ $single_image->image_path }}" alt="" style="width:100%">
				                </div>
				                <?php  $imageNo++; ?>
			                @else
		                        <div class="item">
				                      <img src="http://localhost/shopping/public/Images/Products/{{ $single_image->image_path }}" alt="" style="width:100%">
				                </div>
			                @endif
	                  @endforeach

                 
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
            </div>
			</div>
			<div class="span7">
				<h3>{{ $Product->name }}</h3>
				<hr class="soft"/>
				
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span>${{ $Product->price }}</span></label>
					<div class="controls">
					    <input type="number" class="span6" value="1" id="product_qty" min="1">
					</div>
				  </div>
				
				  <p>
				  	  {{ $Product->description }}
				  <p>
				  <button  class="shopBtn" id="add_to_cart"><span class=" icon-shopping-cart"></span> Add to cart</button>
				</form>
			</div>
			</div>
				<hr class="softn clr"/>


            <div id="myTabContent" class="tab-content tabWrapper">
            <div class="tab-pane fade active in" id="home">
			  <h4>Product Information</h4>
                <table class="table table-striped">
						<tbody>
								<tr class="techSpecRow">
									<td class="techSpecTD1">Category:</td>
									<td class="techSpecTD2">Black</td>
								</tr>

								<tr class="techSpecRow">
									<td class="techSpecTD1">Sub Category:</td>
									<td class="techSpecTD2">Black</td>
								</tr>

						</tbody>
				</table>

                <!--
				    <p>{{ $Product->description }}</p>
			    -->

			</div>
	</div>
	
			

</div>
</div>
</div> <!-- Body wrapper -->


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