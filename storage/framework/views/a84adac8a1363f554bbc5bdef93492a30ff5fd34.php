<?php use \App\Http\Controllers\Helper\HelperController; ?>
<?php $curent_idcategory = 0 ;
	$title ='';
	$_template ='archive';
	$curent_slug = Request::segment(1);
	if(isset($_idcategory)) { $curent_idcategory = $_idcategory; }
	if(isset($rs_cat_product)) {
	 	$title = HelperController::Getrootcate($rs_cat_product,$curent_idcategory,'',0); 
	}
	$curent_posttype = Request::segment(3); 
?> 

<?php $__env->startSection('other_styles'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php if(isset($rs_lpro)): ?>
		 <?php if(isset($rs_lpro[0]['_commit'])): ?>
		   <?php if($rs_lpro[0]['_commit'] > 0 and isset($rs_lpro[0]['nametype'])): ?>
				<?php if($rs_lpro[0]['nametype']=='product'): ?>
					<?php echo $__env->make('teamilk.product.layout-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php elseif($rs_lpro[0]['nametype']=='post'): ?>
					<?php echo $__env->make('teamilk.product.layout-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php elseif($rs_lpro[0]['nametype']=='video'): ?>
					<?php echo $__env->make('teamilk.product.layout-video', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php else: ?>
					<?php echo $__env->make('teamilk.product.layout-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php endif; ?>
			<?php else: ?>
				<?php echo $__env->make('teamilk.product.no-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php endif; ?>
		<?php else: ?>
			<?php echo $__env->make('teamilk.product.no-permit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
		<?php endif; ?>	
	<?php else: ?>
		<?php echo $__env->make('teamilk.product.no-post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
	<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('other_scripts'); ?>
    <script src="<?php echo e(asset('assets-tea/js/custom-post.js?v=0.0.7')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('teamilk.master', ['title' => $title,'template'=>$_template ], compact('rs_you_foot','rs_feature','rs_listpostpular','rs_lpro','_idcategory','rs_cat_product','iduser','rs_menu2','rs_menu3','rs_menu1','rs_banner_right','rs_tuvan','rs_logo_footer','rs_logo_header','iduser'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/teamilk/product/index.blade.php ENDPATH**/ ?>