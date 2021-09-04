<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard/production/images/favicon.png') }}">
        <title>Dasboard</title>
         <!-- Bootstrap -->
         {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
        <link href="{{ asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset('gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ asset('gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
       
        <!-- iCheck -->
        <link href="{{ asset('gentelella/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

        <link href="{{ asset('dashboard/production/css/custom.css?v=0.4.2.5') }}" rel="stylesheet">
        <link href="{{ asset('dashboard/production/css/custom-home.css?v=0.0.5.3') }}" rel="stylesheet">
         {{-- <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/decoupled-document/ckeditor.js"></script> --}}
         {{-- <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script> --}}
        {{--  <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script> --}}
        
       
        @yield('other_styles')
    </head>

    <body class="nav-md">  

    <div class="container body">

      <div class="main_container">

        <div class="col-md-3 left_col">

          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">

              <a href="{{ url('/admin')}}" class="site_title"><i class="fa fa-paw"></i> <span>Dashboard</span></a>

            </div>

            <div class="clearfix"></div>
            <?php $str_profile = session()->get('profile'); 
              $profile = json_decode($str_profile, true); 
              if(isset($profile)) {
              $sel_sex = 0;
              $url_avatar = "";
              foreach($profile as $row) {
                  $idprofile = $row["idprofile"];
                  $firstname = $row["firstname"];
                  $lastname = $row['lastname'];
                  $middlename = $row['middlename'];
                  $idsex = $row['idsex'];
                  $birthday = $row['birthday'];
                  $address = $row['address'];
                  $mobile = $row['mobile'];
                  $email = $row['email'];
                  $url_avatar = $row['url_avatar'];
                  $idcountry = $row['idcountry'];
                  $idprovince = $row['idprovince'];
                  $idcitytown = $row['idcitytown'];
                  $iddistrict = $row['iddistrict'];
                  $idward = $row['idward'];
               }
               $url_avartar_sex = ($sel_sex == 0) ? 'dashboard/production/images/avatar/avatar-female.jpg' : 'dashboard/production/images/avatar/avatar-male.jpg';
               $url_avatar = (strlen($url_avatar) > 0) ? $url_avatar : $url_avartar_sex;
             } ?>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <a href="{{ url('/admin/profile/')}}/{{ Auth::id() }}"><img src="{{ asset($url_avatar) }}" alt="..." class="img-circle profile_img"></a>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                 @if (Auth::check())
                    <h2><a href="{{ url('/admin/profile/')}}/{{ Auth::id() }}">{{ Auth::user()->name }}</a></h2> 
                @endif
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />

            <!-- sidebar menu -->

            @include('admin.sidebar')

            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->

            <div class="sidebar-footer hidden-small">

              <a data-toggle="tooltip" data-placement="top" title="Settings">

                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>

              </a>

              <a data-toggle="tooltip" data-placement="top" title="FullScreen">

                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>

              </a>

              <a data-toggle="tooltip" data-placement="top" title="Lock">

                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>

              </a>

              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">

                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>

              </a>

            </div>

            <!-- /menu footer buttons -->

          </div>

        </div>



        <!-- top navigation -->

        @include('admin.topnav');
        <!-- /top navigation -->
         <!-- page content -->
        <div class="right_col" role="main"> 
             @yield('content')
       </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            All rights reserved by <a href="https://ticmedi.com">ticmedi</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
<div class="htz-popup-processing" style="display: none; position: fixed; z-index: 1010;left: 0;top: 0%;width: 100%; height: 100%; overflow: auto;background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4); ">
  <div class="processing" style="position:relative;background-color: rgba(255,255,255,0.1);width: 250px;height: 250px;margin-top:15%; margin-left: auto;margin-right: auto;text-align: center;">
    <p><img class="loading" style=" position: absolute;top: 11%;left: 11%;display: block;width: 200px; height: 200px;margin-left: auto;margin-right: auto;" src="{{ asset('dashboard/production/images/processing.gif') }}"></p>
    <p class="result"></p>
  </div>
</div>
      <script type="text/javascript">
        var url_home = '{{ url('/') }}';
      </script>


      <!-- jQuery -->
      <script src="{{ asset('gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
      <!-- Bootstrap -->
      <script src="{{ asset('gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script> 
      <script src="{{ asset('gentelella/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  
      <!-- FastClick -->
      <script src="{{ asset('gentelella/vendors/fastclick/lib/fastclick.js') }}"></script>
      <!-- NProgress -->
      <script src="{{ asset('gentelella/vendors/nprogress/nprogress.js') }}"></script>

      <!-- iCheck -->
      <script src="{{ asset('gentelella/vendors/iCheck/icheck.min.js') }}"></script>
      <script src="{{ asset('dashboard/production/js/currency.js?v=0.0.4') }}"></script>
     
        @yield('other_scripts')
    </body>
</html>