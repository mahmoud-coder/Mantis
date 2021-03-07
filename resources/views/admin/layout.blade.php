<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{!! url('/css/font-awesome-all.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="{!! mix('/css/sb-admin-2.css') !!}" rel="stylesheet">
  <style>
    .card{
      margin:30px 0;
    }
.custom-checkbox > input{
    display: none;
}
.custom-checkbox > .checkbox-body{
    width: 40px;
    height: 24px;
    background-color:lightgray;
    border-radius: 12px;
    border:gray 1px solid;
    position: relative;
    cursor: pointer;
}
.custom-checkbox > input:checked + .checkbox-body{
    background-color: blue;
}
.custom-checkbox > input + .checkbox-body::before{
    content: '';
    display: block;
    width:21px;
    height:21px;
    background-color: white;
    border-radius: 50%;
    top:1px; 
    left:0;
    position: absolute;
    transition: 0.3s;
}
.custom-checkbox > input:checked + .checkbox-body::before{
    left:17px;
}

.rdo{
    width:100px;
    height:60px;
    margin:0 15px;
    cursor:pointer;
  }
  .rdo svg{
    user-select: none;
  }
  .rdo input{display:none}
  .rdo input+.rdo-body{
    border:2px solid lightgray;
  }
  .rdo input+.rdo-body:hover{
    border:2px solid gray;
  }
  .rdo input:checked+.rdo-body{
    border:2px solid #3F4FA2;
  }
  .rdo input:checked+.rdo-body .svg-txt{
    fill: #3f4fa2;
  }
  </style>
  @yield('styles')
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{!! route('home') !!}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-apple-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ $site_title }}</div>
      </a>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item @if($active_page == 'site-option') active @endif">
        <a class="nav-link" href="{!! route('admin') !!}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Site Option</span></a>
      </li>
      <li class="nav-item @if($active_page == 'all-products') active @endif">
        <a class="nav-link" href="{!! route('admin.products') !!}"><i class="fas fa-fw fa-columns"></i> <span>All Products</span></a>
      </li>
      <li class="nav-item @if($active_page == 'add-product') active @endif">
        <a class="nav-link" href="{!! route('admin.add.product') !!}"><i class="fas fa-fw fa-leaf"></i> <span>New Product</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Site Pages
      </div>

      <li class="nav-item @if($active_page == 'home-page') active @endif">
        <a class="nav-link" href="{{route('admin.pages.home')}}"><i class="fas fa-file-alt"></i><span>Home Page</span></a>
      </li>
      <li class="nav-item @if($active_page == 'products-page') active @endif">
        <a class="nav-link" href="{{route('admin.pages.products')}}"><i class="fas fa-file-alt"></i><span>Products Page</span></a>
      </li>

      
      <hr class="sidebar-divider">
      <li class="nav-item @if($active_page == 'update') active @endif">
        <a class="nav-link" href="{!! route('admin.update') !!}"><i class="fas fa-sync-alt"></i> <span>Update</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{!! route('logout') !!}" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        @yield('page_content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; {{$site_title}} 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <script src="{!! url('/js/jquery.min.js') !!}"></script>
  <script src="{!! url('/js/bootstrap.bundle.min.js') !!}"></script>
  <script src="{!! url('/js/jquery.easing.min.js') !!}"></script>
  <script src="{!! url('/js/sb-admin-2.min.js') !!}"></script>
  <script>
  function showImg(input,imgID){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          var img = document.getElementById(imgID);
          img.src=e.target.result;
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
  </script>
@yield('scripts')
</body>
</html>
