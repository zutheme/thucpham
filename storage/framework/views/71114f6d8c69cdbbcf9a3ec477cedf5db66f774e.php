

<?php $__env->startSection('other_styles'); ?>
   <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.9.4')); ?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('gentelella/build/css/custom.min.css')); ?>" rel="stylesheet">
    
    <style>
		.ck-editor__editable_inline {
		    min-height: 100px;
		    width: 100%;
	}
	</style> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-12 col-xs-12">
		<?php 
			$idposttype = app('request')->input('idposttype');
			$idparent = app('request')->input('idparent'); 
			$idcrosstype = app('request')->input('idcrosstype'); 
			if(!isset($idposttype)){
				$idposttype = $_idposttype;
			}
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
	<?php if($idposttype == 10): ?>
		<?php echo $__env->make('admin.post.create-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($idposttype == 3): ?>
		<?php echo $__env->make('admin.post.create-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($idposttype == 22): ?>
		<?php echo $__env->make('admin.post.create-survey', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($idposttype == 4): ?>
		<?php echo $__env->make('admin.post.create-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($idposttype == 5): ?>
		<?php echo $__env->make('admin.post.create-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($idposttype == 6): ?>
		<?php echo $__env->make('admin.post.create-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($idposttype == 7): ?>
		<?php echo $__env->make('admin.post.create-phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($idposttype == 26): ?>
		<?php echo $__env->make('admin.post.create-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($idposttype == 28): ?>
		<?php echo $__env->make('admin.post.create-order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php else: ?>
		<?php echo $__env->make('admin.post.create-another-type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>
</div>
<div class="modal-media-form">
  <div class="modal-media">
    <!-- Modal content -->
    <div class="modal-content-media">
      <span class="close">&times;</span>
      	<form class="frm-media">
		  <div class="input-group-media">
			<a href="javascript:void(0);" onclick="performClickByClass(this);"><i class="fa fa-photo"></i>&nbsp;&nbsp;Chọn tập tin&nbsp;&nbsp;</a>
			<input onchange="changefile(event,this);" type="file" style="display: none;" name="file_attach[]" class="file file_attach" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.zip,.rar" />
			<label class="namefile"></label>
            <p><canvas id="my_canvas_media" class="my_canvas" width="0px" height="0px"></canvas></p>
		  </div>
		  <div class="input-group-media area-btn"><a class="btn btn-default btn-insert-picture">Chèn vào bài viết</a></div>
		  <div class="input-group-media">
		  	<p><img class="loading" style="display:none;width:30px;" src="<?php echo e(asset('dashboard/production/images/loader.gif')); ?>"></p>
		  	<span class="result"></span>  	
		  </div>	 
		</form>	  	
    </div>
  </div>
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
	<script src="<?php echo e(asset('gentelella/production/js/library.js?v=0.4.8')); ?>"></script>
	<!-- jQuery Tags Input -->
	<script src="<?php echo e(asset('gentelella/vendors/jquery.tagsinput/src/jquery.tagsinput.js')); ?>"></script>
	<script src="<?php echo e(asset('dashboard/production/js/uploadmultifile.js?v=0.8.9')); ?>"></script>
	<script src="<?php echo e(asset('dashboard/production/js/media-galerry.js?v=0.7.9')); ?>"></script>
	<script src="<?php echo e(asset('dashboard/production/js/filter_create_category.js?v=0.2.7')); ?>"></script> 
	<script src="<?php echo e(asset('public/js/library.js?v=0.4.6')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/edit_update_category.js?v=0.0.8.7')); ?>"></script> 
    <script src="<?php echo e(asset('dashboard/production/js/interactive/select_category_tag.js?v=0.0.0.7')); ?>"></script>
     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/post/create.blade.php ENDPATH**/ ?>