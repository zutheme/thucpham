<!DOCTYPE html>

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!-->

<html lang="en">

<!--<![endif]-->

<!-- BEGIN HEAD -->

<head>
  <?php $_title = 'Blog'; 
        $seo_desc = 'Blog';
        $url_thumbnail = '';
        $keyword =''; $author =''; ?>
  <meta charset="utf-8">
  @if(isset($title))
    <?php $_title = $title; ?>
  @endif
  <title>{{ $_title }}</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name=”robots” content=”noindex,nofollow”>
  {{-- <meta name="google-site-verification" content="unAEA_gNRAYrganImLxKkrZ12ZOVPLj3V6NwHUEjLxc" /> --}}
  {{-- <meta name="google-site-verification" content="_sSXEPkgb9AbXB-31tZJlGUzfMZXwqOUIKTvGr8_mIw" /> --}}
  
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!--meta -->
  <meta name="description" content="{{ $seo_desc }}"/>
  <meta name="keywords" content="{{ $keyword }}"/>
  <meta name="copyright" content="{{ config('app.name') }}">
  <meta name="author" content="{{ $author }}"/>
  <meta name="application-name" content="@yield('title', config('app.name'))">
  <!--GEO Tags-->
  {{-- <meta name="DC.title" content="Allysfast"/>
  <meta name="geo.region" content="GB-HMF"/>
  <meta name="geo.placename" content="Ho Chi Minh city"/>
  <meta name="geo.position" content="10.789305022725957;106.72047902614904"/>
  <meta name="ICBM" content="10.789305022725957, 106.72047902614904"/>  --}}
  <!--Facebook Tags-->
  <meta property="og:site_name" content="{{ config('app.name') }}">
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="{{ request()->fullUrl() }}"/>
  <meta property="og:title" content="{{ $_title }}"/>
  <meta property="og:description" content="{{ $seo_desc }}"/>
  <meta property="og:image" content="{{ request()->root() }}/{{ $url_thumbnail }}"/>
  <meta property="article:author" content="https://www.facebook.com/Allysfast/"/>
  <meta property="og:locale" content="en_UK"/>
  <!--Twitter Tags-->
  <meta name="twitter:card" content="summary"/>
  <meta name="twitter:site" content="{{ '@' . config('app.name') }}"/>
  <meta name="twitter:title" content="{{ $_title }}"/>
  <meta name="twitter:description" content="{{ $seo_desc }}"/>
  <meta name="twitter:image" content="{{ request()->root() }}/{{ $url_thumbnail }}"/>
  <!--end meta-->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->

  <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>

  <link href="{{ asset('public/assets-tea/assets/plugins/socicon/socicon.css') }}" rel="stylesheet" type="text/css">

  <link href="{{ asset('public/assets-tea/assets/plugins/bootstrap-social/bootstrap-social.css') }}" rel="stylesheet" type="text/css">   

  <link href="{{ asset('public/assets-tea/assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
 
  <link href="{{ asset('public/assets-tea/assets/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css">

  <link href="{{ asset('public/assets-tea/assets/plugins/animate/animate.min.css') }}" rel="stylesheet" type="text/css">

  <link href="{{ asset('public/assets-tea/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

  <!-- END GLOBAL MANDATORY STYLES -->
      <!-- BEGIN: BASE PLUGINS  -->

      <link href="{{ asset('public/assets-tea/assets/plugins/revo-slider/css/settings.css') }}" rel="stylesheet" type="text/css">

      <link href="{{ asset('public/assets-tea/assets/plugins/revo-slider/css/layers.css') }}" rel="stylesheet" type="text/css">

      <link href="{{ asset('public/assets-tea/assets/plugins/revo-slider/css/navigation.css') }}" rel="stylesheet" type="text/css">

      <link href="{{ asset('public/assets-tea/assets/plugins/cubeportfolio/css/cubeportfolio.min.css') }}" rel="stylesheet" type="text/css">

      <link href="{{ asset('public/assets-tea/assets/plugins/owl-carousel/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css">

      <link href="{{ asset('public/assets-tea/assets/plugins/fancybox/jquery.fancybox.css') }}" rel="stylesheet" type="text/css">

      <link href="{{ asset('public/assets-tea/assets/plugins/slider-for-bootstrap/css/slider.css') }}" rel="stylesheet" type="text/css">

        <!-- END: BASE PLUGINS -->
    <!-- BEGIN THEME STYLES -->

  <link href="{{ asset('public/assets-tea/assets/demos/default/css/plugins.css') }}" rel="stylesheet" type="text/css">

  <link href="{{ asset('public/assets-tea/assets/demos/default/css/components.css?v=0.1.3') }}" id="style_components" rel="stylesheet" type="text/css">

  <link href="{{ asset('public/assets-tea/assets/demos/default/css/themes/default.css') }}" rel="stylesheet" id="style_theme" type="text/css">

  <link href="{{ asset('public/assets-tea/css/main-style.css?v=0.3.9.7') }}" rel="stylesheet" type="text/css">

 
  <!-- END THEME STYLES -->

  <link rel="shortcut icon" href="{{ asset('public/assets-tea/images/logo/icon-web.jpg') }}">

 {{--  <link rel="shortcut icon" href="favicon.ico"> --}}
  <script src="{{ asset('public/assets-tea/assets/plugins/jquery.min.js') }}" type="text/javascript"></script>

  <script src="{{ asset('public/assets-tea/assets/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>

  <script src="{{ asset('public/assets-tea/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
  {{--  <script src="{{ asset('public/js/reload.js?v=0.1.3') }}" type="text/javascript"></script> --}}
   @yield('other_styles')

</head>

{{-- <body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-fullscreen"> --}}

<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
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
       //$url_avartar_sex = ($sel_sex == 0) ? 'dashboard/production/images/avatar/avatar-female.jpg' : 'dashboard/production/images/avatar/avatar-male.jpg';
       //$url_avatar = isset($url_avatar) ? $url_avatar : $url_avartar_sex; 
		
     } ?>
  <?php 
        //$str_session = session()->get('orderhistory');
        //if(!isset($str_session)||empty($str_session)){
             //$str_item = '{"idorder":0,"idcrosstype":0,"parent":0,"idparentcross":0,"input_quality":0,"idproduct":0,"inp_session":0,"trash":0}';
             //session()->put('orderhistory', $str_item);
        //}
  ?>
 
 {{--  @if(isset($template) and $template =='home')
      @include('teamilk.header-search')
  @else --}}
      @include('teamilk.header')
 {{--  @endif --}}
  

  @include('teamilk.modal')

<!-- BEGIN: PAGE CONTAINER -->

<div class="c-layout-page">

<!-- BEGIN: PAGE CONTENT -->

{{-- @include('teamilk.home') --}}

 @yield('content')

<!-- END: PAGE CONTENT -->

</div>

<!-- END: PAGE CONTAINER -->

 @include('teamilk.footer1')

  <!-- BEGIN: LAYOUT/FOOTERS/GO2TOP -->

<div class="c-layout-go2top">

  <i class="icon-arrow-up"></i>

</div>
<div class="call-phone">
  <div class="call-animation">
  <a href="tel:0965858568"><img class="img-circle" src="{{ asset('assets-tea/images/icon-call1.png') }}" alt="" /></a>
  <span class="text-number">
    <a href="tel:0965858568">0965.85.85.68</a>
  </span>
  </div>
</div>

<script type="text/javascript">

  var url_home = '{{ url('/') }}';

</script>

<!-- END: LAYOUT/FOOTERS/GO2TOP -->

  <!-- BEGIN: LAYOUT/BASE/BOTTOM -->

    <!-- BEGIN: CORE PLUGINS -->

  <!--[if lt IE 9]>

  <script src="../../assets/global/plugins/excanvas.min.js"></script> 

  <![endif]-->

  

  <script src="{{ asset('public/assets-tea/assets/plugins/jquery.easing.min.js') }}" type="text/javascript"></script>

  <script src="{{ asset('public/assets-tea/assets/plugins/reveal-animate/wow.js') }}" type="text/javascript"></script>

  <script src="{{ asset('public/assets-tea/assets/demos/default/js/scripts/reveal-animate/reveal-animate.js') }}" type="text/javascript"></script>

  <!-- END: CORE PLUGINS -->

      <!-- BEGIN: LAYOUT PLUGINS -->

      <script src="{{ asset('public/assets-tea/assets/plugins/revo-slider/js/jquery.themepunch.tools.min.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/revo-slider/js/jquery.themepunch.revolution.min.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/revo-slider/js/extensions/revolution.extension.slideanims.min.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/revo-slider/js/extensions/revolution.extension.layeranimation.min.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/revo-slider/js/extensions/revolution.extension.navigation.min.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/revo-slider/js/extensions/revolution.extension.video.min.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/revo-slider/js/extensions/revolution.extension.parallax.min.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/owl-carousel/owl.carousel.min.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/fancybox/jquery.fancybox.pack.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/smooth-scroll/jquery.smooth-scroll.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/typed/typed.min.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/slider-for-bootstrap/js/bootstrap-slider.js') }}" type="text/javascript"></script>

      <script src="{{ asset('public/assets-tea/assets/plugins/js-cookie/js.cookie.js') }}" type="text/javascript"></script>

        <!-- END: LAYOUT PLUGINS -->

  

      <!-- BEGIN: THEME SCRIPTS -->

      <script src="{{ asset('assets-tea/assets/base/js/components.js?v=0.1.1') }}" type="text/javascript"></script>

      <script src="{{ asset('assets-tea/assets/base/js/components-shop.js?v=0.0.1') }}" type="text/javascript"></script>

      <script src="{{ asset('assets-tea/assets/base/js/app.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets-tea/assets/base/js/init-app.js?v=0.0.2') }}" type="text/javascript"></script>

      <!-- END: PAGE SCRIPTS -->
      <!-- BEGIN: PAGE SCRIPTS -->

        <script src="{{ asset('public/assets-tea/assets/plugins/isotope/isotope.pkgd.min.js') }}" type="text/javascript"></script>

        <script src="/public/assets-tea/assets/plugins/isotope/imagesloaded.pkgd.min.js?v=0.0.2" type="text/javascript"></script>

        <script src="{{ asset('public/assets-tea/assets/plugins/isotope/packery-mode.pkgd.min.js?v=0.0.1') }}" type="text/javascript"></script>

        <script src="{{ asset('public/assets-tea/assets/demos/default/js/scripts/pages/isotope-grid.js') }}" type="text/javascript"></script>

      <!-- END: PAGE SCRIPTS -->
      

     <script src="{{ asset('public/assets-tea/js/custom.js?v=0.4.1') }}" type="text/javascript"></script>

    <script src="{{ asset('public/assets-tea/js/menu.js?v=0.0.7') }}" type="text/javascript"></script> 
      <script src="{{ asset('public/assets-tea/js/slider.js?v=0.1.0') }}" type="text/javascript"></script>
     <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat" attribution=setup_tool theme_color="#67b868" page_id="101142244850688" greeting_dialog_display="hide" logged_in_greeting="Chào anh/chị, Anh chị cần allysfast hỗ trợ như thế nào a!" logged_out_greeting="Chào anh/chị, Anh chị cần allysfast hỗ trợ như thế nào a!"
        ></div>
      <script src="{{ asset('public/assets-tea/js/widget_chat.js?v=0.2.8') }}" type="text/javascript"></script>
	  <!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-XLTEZDR7TB"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'G-XLTEZDR7TB');
		</script>
    @yield('other_scripts')

    </body>

</html>

