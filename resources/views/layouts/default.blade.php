<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>MLI</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('assets/site/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('assets/site/dist/css/adminlte.min.css')}}">
</head>
<style type="text/css">
    .alert-success
      {
        color:#fff;
        background-color:#28a745;
        border-color:#23923d; 
        width:40%; 
        font-size: 16px; 
        text-align:center;
      }
    .alert-danger
      {
        color:#fff;
        background-color:#dc3545;
        border-color:#d32535; 
        width:40%;
      }
    .alert
      { 
        padding:8px !important;
      }
    td {
      text-align: center;

    }
    .testimonial_text{
      overflow-wrap: break-word;
      white-space: pre-wrap;
    }
    .testimonial_title{
      overflow-wrap: break-word;
      white-space: pre-wrap;
    }
    .card{
      width:60%;
    }
    p{
      font-size: 13px;
    }
    .col-sm-12 {
      max-width: 930px;
    }
    .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
     
        padding-left: 50px !important;
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          @guest
              @if (Route::has('login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
              @endif

          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
      </ul>
    </nav>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo --><br>
    <center> <span><img src="{{asset('assets/site/dist/img/favicon.png')}}" alt="MLI Logo" width="35%"></span></center>
      <!-- Sidebar -->
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <br>
            <li class="nav-item">
              <a href="{{ route('users.index') }}" class="nav-link">
                <i class="nav-icon far fa-list-alt"></i>
                <p style="font-size: 19px;">
                  User
                  <span class="badge badge-info right"></span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('testimonial.index') }}" class="nav-link">
                <i class="nav-icon far fa-comment"></i>
                <p style="font-size: 19px;">
                Testimonial
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('slider.index') }}" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p style="font-size: 19px;">
                Slider
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('banner.index') }}" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p style="font-size: 19px;">
                Banner
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('announcement.index') }}" class="nav-link">
                <i class="nav-icon fas fa-bullhorn"></i>
                <p style="font-size: 19px;">
                Announcement
                </p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="{{ route('forms.index') }}" class="nav-link">
                <i class="nav-icon fas fa-upload"></i>
                <p style="font-size: 19px;">
                Upload Files
                </p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="{{ route('forms.index') }}" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p style="font-size: 19px;">
                  Forms
                </p>
              </a>
            </li>
          
        </ul>
        </nav>
      </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
          </div>
        </div>
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
              @yield('content')
          </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>
<!-- ./wrapper -->
<script src="{{asset('assets/site/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/site/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/site/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/site/dist/js/adminlte.js')}}"></script>
  @yield('scripts')
</body>
</html>
