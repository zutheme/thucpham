
<?php $__env->startSection('other_styles'); ?>
      <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Datatables -->
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Custom Theme Style -->
   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php 
      //$posttype = Request::segment(3);
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
  <?php if($posttype=='post'): ?>
    <?php echo $__env->make('admin.post.index-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
   <?php elseif($posttype=='product'): ?>
    <?php echo $__env->make('admin.post.index-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php elseif($posttype=='survey'): ?>
     <?php echo $__env->make('admin.post.index-survey', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php elseif($posttype=='consultant'): ?>
     <?php echo $__env->make('admin.post.index-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
   <?php elseif($posttype=='phone'): ?>
    <?php echo $__env->make('admin.post.index-custom-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php elseif($posttype=='sms'): ?>
     <?php echo $__env->make('admin.post.index-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php elseif($posttype=='email'): ?>
     <?php echo $__env->make('admin.post.index-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php elseif($posttype=='booking'): ?>
     <?php echo $__env->make('admin.post.index-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($posttype=='order'): ?>
     <?php echo $__env->make('admin.post.index-order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php elseif($posttype=='tag'): ?>
     <?php echo $__env->make('admin.post.index-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php elseif($posttype=='custom'): ?>
	   <?php echo $__env->make('admin.post.index-custom-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php else: ?>
     <?php echo $__env->make('admin.post.index-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('other_scripts'); ?>
    <script type="text/javascript">
      var _start_date_sl = '<?php echo $_start_date_sl; ?>';
      var _end_date_sl = '<?php echo $_end_date_sl; ?>';
      var _posttype ='<?php echo e($posttype); ?>';
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
    
    <script src="<?php echo e(asset('gentelella/build/js/custom-init.js?v=0.1.9.4')); ?>"></script> 
    <script src="<?php echo e(asset('gentelella/vendors/jquery.tagsinput/src/jquery.tagsinput.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/filter_select_category.js?v=0.2.8')); ?>"></script> 
	<script src="<?php echo e(asset('public/js/library.js?v=0.4.6')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/edit_update_category.js?v=0.0.8.9')); ?>"></script> 
    <script src="<?php echo e(asset('dashboard/production/js/interactive/select_category_tag.js?v=0.0.0.7')); ?>"></script>
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/post/index.blade.php ENDPATH**/ ?>