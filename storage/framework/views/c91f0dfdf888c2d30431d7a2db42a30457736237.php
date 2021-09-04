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
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('dashboard/production/images/favicon.ico')); ?>">
		
        <title>dashboard</title>
         <!-- Bootstrap -->
      <link href="<?php echo e(asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
      <!-- Font Awesome -->

      <link href="<?php echo e(asset('gentelella/vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
      <!-- NProgress -->
      <link href="<?php echo e(asset('gentelella/vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
      <!-- iCheck -->
      <link href="<?php echo e(asset('gentelella/vendors/iCheck/skins/flat/green.css')); ?>" rel="stylesheet">
    
      <!-- bootstrap-progressbar -->
      <link href="<?php echo e(asset('gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')); ?>" rel="stylesheet">
      <!-- JQVMap -->
      <link href="<?php echo e(asset('gentelella/vendors/jqvmap/dist/jqvmap.min.css')); ?>" rel="stylesheet"/>
      
       <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.4.2.6')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('dashboard/production/css/custom-home.css?v=0.0.6.1')); ?>" rel="stylesheet">
      <!-- bootstrap-daterangepicker -->
      <link href="<?php echo e(asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet">
      <!-- Custom Theme Style -->
      <link href="<?php echo e(asset('gentelella/build/css/custom.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('gentelella/build/css/main-style.css?v=0.3.8.0')); ?>" rel="stylesheet" type="text/css">
	  <link href="<?php echo e(asset('gentelella/build/css/custom-product.css?v=0.3.8.0')); ?>" rel="stylesheet" type="text/css"> 
        <?php echo $__env->yieldContent('other_styles'); ?>
    </head>
    <?php $str_profile = session()->get('profile'); 
              $profile = json_decode($str_profile, true); 
              if(isset($profile)) {
              $sel_sex = 0;
              $url_avatar = "";
              $sip = 560;
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
                  $sip = $row['sip'];
               }
               $url_avartar_sex = ($sel_sex == 0) ? 'dashboard/production/images/avatar/avatar-female.jpg' : 'dashboard/production/images/avatar/avatar-male.jpg';
               $url_avatar = (strlen($url_avatar) > 0) ? $url_avatar : $url_avartar_sex;
             } ?>
    <body class="nav-md">  

    <div id="app" class="container body">

      <div class="main_container">
        <?php echo $__env->make('admin.general-left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
        <?php echo $__env->make('admin.general-topsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
        <!-- /top navigation -->
         <!-- page content -->
        <div class="right_col" role="main"> 
             <?php echo $__env->yieldContent('content'); ?>
       </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            All rights reserved by <a href="https://ticmedi.tech">ticsoft</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        
      </div>

    </div>
	<?php echo $__env->make('admin.popup-calling', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
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
    <script src="<?php echo e(asset('gentelella/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo e(asset('gentelella/vendors/fastclick/lib/fastclick.js')); ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo e(asset('gentelella/vendors/nprogress/nprogress.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/build/js/format-price.js?v=0.0.4')); ?>"></script>
     <!--<script src="<?php echo e(asset('public/js/app.js?v=0.0.1')); ?>"></script>-->
	 <!--<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>-->
     <!--<script src="https://cdn.socket.io/4.0.1/socket.io.min.js" integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous"></script>
     <script src="<?php echo e(asset('public/js/custom-socketio.js?v=0.0.6')); ?>"></script>-->
		<?php echo $__env->yieldContent('other_scripts'); ?>
       
    </body>
</html><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/general.blade.php ENDPATH**/ ?>