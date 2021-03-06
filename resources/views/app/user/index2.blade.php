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

  

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="http://localhost/shopping/public/Images/logo.jpg" width="70px" height="70px" alt="Khushal Shopping Mall" style="margin-left: 80px;border-radius:100px;">
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
            <a href="{{ route('ShowAllProducts') }}" class="nav-link">
             &nbsp;&nbsp; <i class="fas fa-sitemap"></i>&nbsp;&nbsp;
              <p>
                    Products
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="{{ route('MyPendingOrder') }}" class="nav-link">
              &nbsp;&nbsp;&nbsp;<i class="fas fa-recycle"></i>&nbsp;&nbsp;
              <p>
                    All Pending Orders
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="{{ route('MyDeliveredOrder') }}" class="nav-link">
              &nbsp;&nbsp;&nbsp;<i class="fas fa-truck"></i>&nbsp;&nbsp;
              <p>
                    All Delivered Orders
              </p>
            </a>
          </li>


          <li class="nav-item">
              <a href="{{ route('UpdateProfile') }}" class="nav-link">
                &nbsp;&nbsp;&nbsp;<i class="fas fa-id-badge"></i>&nbsp;&nbsp;
                <p>Update Profile</p>
              </a>
          </li>


          <li class="nav-item">
                <a href="{{ route('AllDeliveredOrder') }}" class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  &nbsp;&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;
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
        	   @yield('mainsection')
  </div>

  

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>


			
</body>
</html>
