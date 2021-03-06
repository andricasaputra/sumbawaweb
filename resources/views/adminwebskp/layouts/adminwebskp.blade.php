<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | @yield('title', 'Panel Web Sumbawa')</title>

    <link rel="icon" type="image/png" href="{{asset('img/favicon-32x32.png')}}" sizes="32x32">

    <!-- Bootstrap -->
    <link href="{{asset('adminwebskp/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('adminwebskp/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('adminwebskp/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{asset('adminwebskp/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet"/>

    <!-- Datatables -->
    <link href="{{asset('adminwebskp/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminwebskp/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('adminwebskp/build/css/custom.min.css')}}" rel="stylesheet">

    @yield('custom-link')

    <style type="text/css">
        .alert-success:nth-of-type(1), .alert-danger:nth-of-type(1){
            margin-top: 5%;
        }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
        @include('adminwebskp.inc.navbar')
        
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              @include('adminwebskp.inc.message')
              @yield('content')
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy; {{date('Y')}} | Stasiun Karatina Pertanian Kelas I Sumbawa Besar
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('adminwebskp/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('adminwebskp/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('adminwebskp/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('adminwebskp/vendors/nprogress/nprogress.js')}}"></script>
    <!-- jQuery custom content scroller -->
    <script src="{{asset('adminwebskp/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{asset('adminwebskp/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adminwebskp/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <!-- Ck Editor -->
    <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{asset('adminwebskp/build/js/custom.min.js')}}"></script>
    <script src="{{asset('adminwebskp/build/js/mywebadmin.js')}}"></script>

    @yield('scripts')

    @yield('chart-scripts')

  </body>
</html>