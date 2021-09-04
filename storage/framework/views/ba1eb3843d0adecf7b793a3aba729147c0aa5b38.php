

<?php $__env->startSection('other_styles'); ?>
   <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.8.5')); ?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('gentelella/build/css/custom.min.css')); ?>" rel="stylesheet">
    
    <style>
		.ck-editor__editable_inline {
		    min-height: 200px;
		    width: 100%;
	}
	</style> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12 col-xs-12">
		<?php 
			$idposttype = app('request')->input('idposttype');
			
			
			?>
			
		<?php if(count($errors) > 0): ?>
		<div class="alert alert-danger">
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>

		</div>
		<?php endif; ?>
		<?php if(\Session::has('success')): ?>
			<div class="alert alert-success">
				<p><?php echo e(\Session::get('success')); ?></p>
			</div>
		<?php endif; ?>
	</div>
</div>

<div class="row">
	
		<?php echo $__env->make('admin.tag.create-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('other_scripts'); ?>
	<script> var _idproduct = 0;
		var _url_thumbnail='';</script>
	<?php if(isset($_namecattype)): ?>
		<script>
			var _posttype = '<?php echo e($_namecattype); ?>';
		</script>
	<?php else: ?>
		<script>
			var _posttype = 'post';
		</script>
	<?php endif; ?>
	
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
	<script src="<?php echo e(asset('editor-build/ckeditor-interactive/js/classic-editor5.js?v=0.0.9')); ?>"></script>
	<script src="<?php echo e(asset('public/js/library.js?v=0.4.6')); ?>"></script>
	<!-- jQuery Tags Input -->
	<script src="<?php echo e(asset('gentelella/vendors/jquery.tagsinput/src/jquery.tagsinput.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/tag/create.blade.php ENDPATH**/ ?>