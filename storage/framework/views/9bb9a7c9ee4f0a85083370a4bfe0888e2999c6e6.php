
<?php $__env->startSection('other_styles'); ?>
    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Datatables -->
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php 
      $posttype = 'tag';
      $_start_date_sl = session()->get('start_date');
      $_end_date_sl = session()->get('end_date');
      $_idcategory_sl = session()->get('idcategory');
      $_id_post_type_sl = session()->get('id_post_type');
      $_id_status_type_sl = session()->get('id_status_type');
      $_id_store = session()->get('idstore');
      $_namecattype = isset($_namecattype) ? $_namecattype : 'post';
      $id_post_type = isset($id_post_type) ? $id_post_type : 3;
      $posttype = isset($posttype) ? $posttype : 'post';
      $_idcategory = isset($_idcategory_sl) ? $_idcategory_sl : Request::segment(4);
      $_id_post_type = isset($_id_post_type_sl) ? $_id_post_type_sl : Request::segment(5);
      $_id_status_type = isset($_id_status_type_sl) ? $_id_status_type_sl : Request::segment(6);
      //$_sel_receive = $lists['_sel_receive'];
      $_namecattype = $posttype; 
?>

    <?php echo $__env->make('admin.tag.index-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('other_scripts'); ?>
    <script type="text/javascript">

      var _start_date_sl = '<?php echo $_start_date_sl; ?>';

      var _end_date_sl = '<?php echo $_end_date_sl; ?>';

    </script>
    <!-- Datatables -->
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/jszip/dist/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/pdfmake/build/vfs_fonts.js')); ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo e(asset('gentelella/vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo e(asset('gentelella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <!-- Custom Theme Scripts -->
    <!-- <script src="<?php echo e(asset('gentelella/build/js/custom.min.js')); ?>"></script>  -->
    <script src="<?php echo e(asset('gentelella/build/js/custom-build.js?v=0.1.3')); ?>"></script> 
     
    
    
    <script src="<?php echo e(asset('dashboard/production/js/filter_select_category.js?v=0.2.2')); ?>"></script> 
    <script src="<?php echo e(asset('public/js/library.js?v=0.4.6')); ?>"></script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/tag/index.blade.php ENDPATH**/ ?>