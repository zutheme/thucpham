<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('dashboard/production/images/favicon.png')); ?>">
        <title>Dasboard</title>
         <!-- Bootstrap -->
         
        <link href="<?php echo e(asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo e(asset('gentelella/vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo e(asset('gentelella/vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
       
        <!-- iCheck -->
        <link href="<?php echo e(asset('gentelella/vendors/iCheck/skins/flat/green.css')); ?>" rel="stylesheet">

        <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.4.2.5')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('dashboard/production/css/custom-home.css?v=0.0.5.3')); ?>" rel="stylesheet">
         
         
        
        
       
        <?php echo $__env->yieldContent('other_styles'); ?>
    </head>

    <body class="nav-md">  

    <div class="container body">

      <div class="main_container">

        <div class="col-md-3 left_col">

          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">

              <a href="<?php echo e(url('/admin')); ?>" class="site_title"><i class="fa fa-paw"></i> <span>Dashboard</span></a>

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
                <a href="<?php echo e(url('/admin/profile/')); ?>/<?php echo e(Auth::id()); ?>"><img src="<?php echo e(asset($url_avatar)); ?>" alt="..." class="img-circle profile_img"></a>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                 <?php if(Auth::check()): ?>
                    <h2><a href="<?php echo e(url('/admin/profile/')); ?>/<?php echo e(Auth::id()); ?>"><?php echo e(Auth::user()->name); ?></a></h2> 
                <?php endif; ?>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />

            <!-- sidebar menu -->

            <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

        <?php echo $__env->make('admin.topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
        <!-- /top navigation -->
         <!-- page content -->
        <div class="right_col" role="main"> 
             <?php echo $__env->yieldContent('content'); ?>
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
    <p><img class="loading" style=" position: absolute;top: 11%;left: 11%;display: block;width: 200px; height: 200px;margin-left: auto;margin-right: auto;" src="<?php echo e(asset('dashboard/production/images/processing.gif')); ?>"></p>
    <p class="result"></p>
  </div>
</div>
      <script type="text/javascript">
        var url_home = '<?php echo e(url('/')); ?>';
      </script>


      <!-- jQuery -->
      <script src="<?php echo e(asset('gentelella/vendors/jquery/dist/jquery.min.js')); ?>"></script>
      <!-- Bootstrap -->
      <script src="<?php echo e(asset('gentelella/vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script> 
      <script src="<?php echo e(asset('gentelella/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
  
      <!-- FastClick -->
      <script src="<?php echo e(asset('gentelella/vendors/fastclick/lib/fastclick.js')); ?>"></script>
      <!-- NProgress -->
      <script src="<?php echo e(asset('gentelella/vendors/nprogress/nprogress.js')); ?>"></script>

      <!-- iCheck -->
      <script src="<?php echo e(asset('gentelella/vendors/iCheck/icheck.min.js')); ?>"></script>
      <script src="<?php echo e(asset('dashboard/production/js/currency.js?v=0.0.4')); ?>"></script>
     
        <?php echo $__env->yieldContent('other_scripts'); ?>
    </body>
</html><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>