<!-- BEGIN: PAGE CONTENT -->

	<!-- BEGIN: CONTENT/SHOPS/SHOP-RESULT-FILTER-1 -->

	<!--<div class="c-shop-result-filter-1 clearfix form-inline">-->

		

		

	<!--</div>-->

	<!-- END: CONTENT/SHOPS/SHOP-RESULT-FILTER-1 -->

<div class="c-margin-t-20"></div>

<!-- BEGIN: CONTENT/SHOPS/SHOP-2-7 -->

<div class="c-bs-grid-small-space">
	<?php if(isset($rs_lpro)): ?>
	<?php $count = 0; ?>
	<?php $__currentLoopData = $rs_lpro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if($count%4 == 0): ?> <div class="row"> <?php endif; ?>	
			<div class="col-md-3 col-sm-6 col-xs-6 c-margin-b-20">

				<div class="c-content-product-2 c-bg-white c-border">

					<div class="c-content-overlay">

						<?php if(isset($row['old_price']) and $row['old_price'] > $row['price']): ?>

						<div class="c-label c-bg-red c-font-uppercase c-font-white c-font-13 c-font-bold">Khuyến mãi</div> <?php endif; ?>

						<div class="c-overlay-wrapper">

							<div class="c-overlay-content">

								<a href="<?php echo e(url('/')); ?>/<?php echo e($row['slug']); ?>" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Khám phá</a>

							</div>

						</div>

						<div class="c-bg-img-center-contain c-overlay-object" data-height="height" style="height: 230px; background-image: url(<?php echo e(asset($row['urlfile'])); ?>)"></div>

					</div>

					<div class="c-info">

						<p class="c-title render c-font-16 c-font-slim"><?php echo e($row['namepro']); ?></p>

						<p class="c-price c-font-14 c-font-slim"><span class="currency"><?php echo e($row['price']); ?></span><span class="vnd"></span> &nbsp; <?php if(isset($row['old_price']) and $row['old_price'] > $row['price']): ?>

							<span class="c-font-14 c-font-line-through c-font-red"><span class="currency"><?php echo e($row['old_price']); ?></span><span class="vnd"></span></span> <?php endif; ?>

						</p>

					</div>

					<div class="btn-group btn-group-justified" role="group">

						<div class="btn-group c-border-top" role="group">
							
							<a href="<?php echo e(url('/')); ?>/<?php echo e($row['slug']); ?>" class="btn btn-sm c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product">Xem thêm</a>

						</div>

						<div class="btn-group c-border-left c-border-top" role="group">

							<a href="<?php echo e(url('/')); ?>/<?php echo e($row['slug']); ?>" class="btn btn-sm c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product">Mua</a>

						</div>

					</div>

				</div>

			</div>

		<?php $count++; ?>

		<?php if($count%4 == 0): ?> </div> <?php endif; ?> 

		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	

	<?php endif; ?>	

</div><!-- END: CONTENT/SHOPS/SHOP-2-7 -->
<div class="c-margin-t-20"></div><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/teamilk/product/layout-product.blade.php ENDPATH**/ ?>