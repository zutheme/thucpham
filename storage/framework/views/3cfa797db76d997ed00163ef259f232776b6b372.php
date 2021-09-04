<!DOCTYPE html>
<html lang="en">
<head>
   <?php use \App\Http\Controllers\Helper\HelperController; 
     $menu_primary = new HelperController(); 
	$title = 'Blog'; $seo_desc = 'Blog';$url_thumbnail = ''; $keyword =''; $author =''; $short_desc = ''; $template = ''; $_namecattype = 'post'; ?>
  <?php if(isset($product) and $product[0]['_commit'] > 0): ?>
    <?php 
      $template = $product[0]['template']; 
      $_commit = $product[0]['_commit']; 
      $idproduct = $product[0]['idproduct'];  
      $title = $product[0]['namepro']; 
      $url_thumbnail = $product[0]['url_thumbnail'];
      $seo_desc = $product[0]['seo_desc'];
      $short_desc = $product[0]['short_desc'];
      $_namecattype = $product[0]['nametype'];
      if(isset($short_desc) && !empty($short_desc)){
          $short_desc = HelperController::get_the_excerpt_max(200, $short_desc);
      }else{
          $excerpt = $product[0]['description'];
          $short_desc = HelperController::get_the_excerpt_max(200, $excerpt);
      }
      $author = $product[0]['author'];
      $keyword = $product[0]['keyword'];
    ?>
  <?php endif; ?>
  <meta charset="utf-8">

  <title><?php echo e($title); ?></title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">



  <meta content="width=device-width, initial-scale=1.0" name="viewport">



  <meta http-equiv="Content-type" content="text/html; charset=utf-8">

  <meta name=”robots” content=”noindex,nofollow”>

  

  

  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

  <!--meta -->

  <meta name="description" content="<?php echo e($short_desc); ?>"/>

  <meta name="keywords" content="<?php echo e($keyword); ?>"/>

  <meta name="copyright" content="<?php echo e(config('app.name')); ?>">

  <meta name="author" content="<?php echo e($author); ?>"/>

  <meta name="application-name" content="<?php echo $__env->yieldContent('title', config('app.name')); ?>">

  <!--GEO Tags-->

  

  <!--Facebook Tags-->
  <meta property="og:site_name" content="<?php echo e(config('app.name')); ?>">

  <meta property="og:type" content="article"/>

  <meta property="og:url" content="<?php echo e(request()->fullUrl()); ?>"/>

  <meta property="og:title" content="<?php echo e($title); ?>"/>

  <meta property="og:description" content="<?php echo e($short_desc); ?>"/>

  <meta property="og:image" content="<?php echo e(asset($url_thumbnail)); ?>"/>

  
  <meta property="fb:app_id" content="128078052234955" /> 
  <meta property="og:locale" content="en_UK"/>

  <!--Twitter Tags-->

  <meta name="twitter:card" content="summary"/>

  <meta name="twitter:site" content="<?php echo e('@' . config('app.name')); ?>"/>

  <meta name="twitter:title" content="<?php echo e($title); ?>"/>

  <meta name="twitter:description" content="<?php echo e($seo_desc); ?>"/>

  <meta name="twitter:image" content="<?php echo e(asset($url_thumbnail)); ?>"/>

  <script>
        WebFontConfig = {
            google: { families: [ 'Poppins:300,400,500,600,700,800', 'Playball:400' ] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
            wf.src = '<?php echo e(asset('public/riode/js/webfont.js')); ?>';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/riode/vendor/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/riode/vendor/animate/animate.min.css')); ?>">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/riode/vendor/magnific-popup/magnific-popup.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/riode/vendor/owl-carousel/owl.carousel.min.css')); ?>">

    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/riode/css/demo-food.min.css')); ?>">
	
	<link href="<?php echo e(asset('public/css/main-style.css?v=0.3.8.0')); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo e(asset('public/css/custom-product.css?v=0.3.8.0')); ?>" rel="stylesheet" type="text/css">
   <?php echo $__env->yieldContent('other_styles'); ?>

</head>
<body class="riode-rounded-skin">
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
<div class="page-wrapper">
        <h1 class="d-none">Riode - Responsive eCommerce HTML Template</h1>
        <header class="header">
            <?php echo $__env->make('teamilk.riode.header-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('teamilk.riode.header-middle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('teamilk.riode.header-bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </header>
        <!-- End Header -->
		
				<!-- BEGIN: PAGE CONTENT -->
				<?php echo $__env->yieldContent('content'); ?>
				<!-- END: PAGE CONTENT -->
			
		<!-- End of Main -->
       <?php echo $__env->make('teamilk.riode.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    </div>
    <!-- Sticky Footer -->
    <?php echo $__env->make('teamilk.riode.sticky', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <!-- Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>
	<?php echo $__env->make('teamilk.riode.menu-mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('teamilk.riode.popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('teamilk.modal-cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript">var url_home = '<?php echo e(url('/')); ?>';</script>
<!-- Plugins JS File -->
    <script src="<?php echo e(asset('public/riode/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/riode/vendor/parallax/parallax.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/riode/vendor/imagesloaded/imagesloaded.pkgd.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/riode/vendor/elevatezoom/jquery.elevatezoom.min.js')); ?>"></script>
    <!-- <script src="<?php echo e(asset('public/riode/vendor/magnific-popup/jquery.magnific-popup.min.js')); ?>"></script>-->
    <script src="<?php echo e(asset('public/riode/vendor/owl-carousel/owl.carousel.min.js')); ?>"></script>
    <!-- Main JS File -->
    <script src="<?php echo e(asset('public/riode/js/main.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/riode/js/custom-product.js?v=1.7.1.0')); ?>"></script>
	<script src="<?php echo e(asset('public/riode/js/format-price.js?v=0.0.4')); ?>"></script>
    <?php echo $__env->yieldContent('other_scripts'); ?>
    </body>
</html>



<?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/teamilk/master.blade.php ENDPATH**/ ?>