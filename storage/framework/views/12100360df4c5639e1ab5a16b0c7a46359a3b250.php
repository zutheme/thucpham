

<?php $__env->startSection('other_styles'); ?>
     <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.8.5')); ?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('gentelella/build/css/custom.min.css')); ?>" rel="stylesheet">
    <style>
		.ck-editor__editable_inline {
		    min-height: 100px;
		    margin-bottom: 15px;
	}
	</style>  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php 	$idimpcross = app('request')->input('idimpcross'); 
		$no_thumbnail = 'dashboard/production/images/no_photo.jpg';
		//$idposttype = Request::segment(6);
		$idposttype = isset($_id_post_type) ? $_id_post_type : 3;
		$_posttype = isset($_posttype) ? $_posttype : 'post';
		?>
<div class="row">
	<?php if(isset($_posttype) && $_posttype == 'product' || $idposttype == 10): ?>
		<?php echo $__env->make('admin.post.edit-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'post'): ?>
		<?php echo $__env->make('admin.post.edit-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'survey'): ?>
		<?php echo $__env->make('admin.post.edit-survey', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'phone'): ?>
		<?php echo $__env->make('admin.post.edit-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'sms'): ?>
		<?php echo $__env->make('admin.post.edit-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'email'): ?>
		<?php echo $__env->make('admin.post.edit-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'booking'): ?>
		<?php echo $__env->make('admin.post.edit-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'consultant'): ?>
		<?php echo $__env->make('admin.post.edit-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($_posttype == 'order'): ?>
		<?php echo $__env->make('admin.post.edit-order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php else: ?>
		<?php echo $__env->make('admin.post.edit-another-type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('other_scripts'); ?>
 	<script>
 		 var _start_date_sl = '';
  		var _end_date_sl = '';
		var _idproduct = '<?php echo e($idproduct); ?>';
		var _posttype = '<?php echo e($_posttype); ?>';
	</script>
	
	<script src="<?php echo e(asset('gentelella/vendors/moment/min/moment.min.js')); ?>"></script>
	<script src="<?php echo e(asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- bootstrap-datetimepicker -->    
    
	
	 <!-- Bootstrap -->
   
    
    <!-- morris.js -->
    <script src="<?php echo e(asset('gentelella/vendors/raphael/raphael.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/morris.js/morris.min.js')); ?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo e(asset('gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo e(asset('gentelella/vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo e(asset('gentelella/build/js/custom.min.js')); ?>"></script>

    <script src="<?php echo e(asset('dashboard/production/js/process_images/capture_image.js?v=0.3.1')); ?>"></script>
  	
  	
  	
  		
  	
  	
    
    <script> var _ckeditor_route_upload = '<?php echo e(route('ckeditor.upload')); ?>';</script>;
	<script src="<?php echo e(asset('editor-build/build/ckeditor.js')); ?>"></script>
	<script src="<?php echo e(asset('editor-build/ckeditor-interactive/js/classic-editor5.js?v=0.1.0')); ?>"></script>
	<!-- jQuery Tags Input -->
	<script src="<?php echo e(asset('gentelella/vendors/jquery.tagsinput/src/jquery.tagsinput.js')); ?>"></script>
	<script src="<?php echo e(asset('public/js/library.js?v=0.4.6')); ?>"></script>
	<script src="<?php echo e(asset('dashboard/production/js/uploadmultifile.js?v=0.8.9')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/media-galerry.js?v=0.7.9')); ?>"></script>

    <script src="<?php echo e(asset('dashboard/production/js/filter_create_category.js?v=0.2.7')); ?>"></script> 
	<script src="<?php echo e(asset('public/js/library.js?v=0.4.6')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/edit_update_category.js?v=0.0.8.7')); ?>"></script> 
    <script src="<?php echo e(asset('dashboard/production/js/interactive/select_category_tag.js?v=0.0.0.7')); ?>"></script>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/post/edit.blade.php ENDPATH**/ ?>