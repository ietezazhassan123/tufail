<!DOCTYPE html>
<html lang="en">
<head>
				  <meta charset="utf-8">
				  <meta name="viewport" content="width=device-width, initial-scale=1">
				  <meta name="csrf-token" content="{{ csrf_token() }}">
				  <title>Ecommerce</title>

				  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
				  <link rel="stylesheet" href="{{ asset('/public/plugins/fontawesome-free/css/all.min.css') }}">
				  <link rel="stylesheet" href="{{ asset('/public/dist/css/adminlte.min.css') }}">
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js" integrity="sha512-DZqqY3PiOvTP9HkjIWgjO6ouCbq+dxqWoJZ/Q+zPYNHmlnI2dQnbJ5bxAHpAMw+LXRm4D72EIRXzvcHQtE8/VQ==" crossorigin="anonymous"></script>
          <script src="{{ asset('/public/plugins/jquery/jquery.min.js') }}"></script>
				  <script src="{{ asset('/public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
				  <script src="{{ asset('/public/dist/js/adminlte.min.js') }}"></script>
				  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous"></script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

  

    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="Khushal Shopping Mall" class="brand-image img-circle elevation-3" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
              @if(Auth::user()->image != null)
                   <img src="http://localhost/shopping/public/Images/profiles/{{ Auth::user()->image }}" width="50px" class="img-circle elevation-2" alt="User Image">
              @else
                   <img src="http://localhost/shopping/public/Images/no_dp.png"  width="50px" class="img-circle elevation-2" alt="User Image">
              @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

     

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
              <li class="nav-item">
                <a href="{{ route('Category.create') }}" class="nav-link">
                  &nbsp;&nbsp;<i class="far fa-plus-square"></i> &nbsp;&nbsp;
                  <p>New Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Category.index') }}" class="nav-link">
                  &nbsp;&nbsp;<i class="fas fa-border-all"></i>&nbsp;&nbsp;
                  <p>All Categories</p>
                </a>
              </li>








              <li class="nav-item">
                <a href="{{ route('SubCategory.create') }}" class="nav-link">
                  &nbsp;&nbsp;<i class="far fa-plus-square"></i>&nbsp;&nbsp;
                  <p>New Sub Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('SubCategory.index') }}" class="nav-link">
                  &nbsp;&nbsp;<i class="fas fa-border-all"></i>&nbsp;&nbsp;
                  <p>All Sub Categories</p>
                </a>
              </li>
            







   
              <li class="nav-item">
                <a href="{{ route('Product.create') }}" class="nav-link">
                  &nbsp;&nbsp;<i class="far fa-plus-square"></i>&nbsp;&nbsp;
                  <p>New Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Product.index') }}" class="nav-link">
                  &nbsp;&nbsp;<i class="fas fa-border-all"></i>&nbsp;&nbsp;
                  <p>All Products</p>
                </a>
              </li>
           



         
              <li class="nav-item">
                <a href="{{ route('AllOrders') }}" class="nav-link">
                  &nbsp;&nbsp;<i class="fas fa-recycle"></i>&nbsp;&nbsp;
                  <p>Pending Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('AllDeliveredOrder') }}" class="nav-link">
                  &nbsp;&nbsp;<i class="fas fa-truck"></i>&nbsp;&nbsp;
                  <p>Delivered Orders</p>
                </a>
              </li>


              <li class="nav-item">
                  <a href="{{ route('UpdateProfile') }}" class="nav-link">
                    &nbsp;&nbsp;<i class="fas fa-id-badge"></i>&nbsp;&nbsp;
                    <p>Update Profile</p>
                  </a>
              </li>



              <li class="nav-item">
                <a href="{{ route('AllDeliveredOrder') }}" class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  &nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;
                  <p>Logout</p>
                </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                  </form>
              </li>




        </ul>
      </nav>
    </div>
  </aside>



  <div class="content-wrapper">


<section class="content pt-5">

      @if($message = Session::get('success'))
                <div class="row offset-md-2">
            <div class="col-md-8 alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
            </div>
          </div>
      @endif 

      
      <div class="container-fluid">
        <div class="row">
      
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ App\Category::count() }}</h3>
                <p>Main Categories</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('Category.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ App\SubCategory::count() }}</h3>
                <p>Sub Categories</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('SubCategory.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ App\Product::count() }}</h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('Product.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ App\UserOrder::where('status','pending')->count() }}</h3>

                <p>Pending Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('AllOrders') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ App\UserOrder::where('status','!=','pending')->count() }}</h3>

                <p>Shipped Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('AllDeliveredOrder') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ App\UserOrder::where('status','Received')->count() }}</h3>

                <p>Received Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('AllDeliveredOrder') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ App\User::where('role','User')->count() }}</h3>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <p  class="small-box-footer"> -- </p>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>




  

  <footer class="main-footer">
            
  </footer>
</div>


			
</body>
</html>
