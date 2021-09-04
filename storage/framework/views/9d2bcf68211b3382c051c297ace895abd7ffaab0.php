

<?php $__env->startSection('other_styles'); ?>
   <link href="<?php echo e(asset('assets-tea/css/custom-product.css?v=0.8.6')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
<div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
	<div class="container">
		<div class="c-page-title c-pull-left">
			<h3 class="c-font-uppercase c-font-sbold">Thông tin đặt hàng</h3>
			<h4 class="">Vui lòng xem lại chi tiết đơn hàng</h4>
			<?php if(isset($str_qr)): ?>
				
			<?php endif; ?>
		</div>
		<ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
			
								
		</ul>
	</div>
</div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
<?php if(isset($rs_orderproduct)): ?>
<!-- BEGIN: PAGE CONTENT -->
<div class="c-content-box c-size-lg c-overflow-hide c-bg-white">
	<div class="container">
		<div class="c-shop-order-complete-1 c-content-bar-1 c-align-left c-bordered c-theme-border c-shadow">
			<div class="c-content-title-1">
				<h3 class="c-center c-font-uppercase c-font-bold">Đặt dịch vụ thành công</h3>
				<div class="c-line-center c-theme-bg"></div>
			</div>
			<div class="c-theme-bg">
				<p class="c-message c-center c-font-white c-font-20 c-font-sbold">
					<i class="fa fa-check"></i> Cảm ơn bạn tin tưởng sản phẩm của chúng tôi.
				</p>
			</div>
			<!-- BEGIN: ORDER SUMMARY -->
			<div class="row c-order-summary c-center">
				<ul class="c-list-inline list-inline">
					<li>
						<h3>Mã đơn hàng</h3>
						<p><?php echo e($rs_orderproduct[0]['idnumberorder']); ?></p>
					</li>
					<li>
						<h3>Ngày đặt</h3>
						<p><?php echo e($rs_orderproduct[0]['created_at']); ?></p>
					</li>
					<li>
						<h3>Tổng số tiền</h3>
						<p><span class="currency"><?php echo e($rs_orderproduct[0]['ordertotal']); ?></span> <span class="vnd"></span></p>
					</li>
					<li>
						<h3>Phương thức thanh toán</h3>
						<p>Chuyển khoản</p>
					</li>
				</ul>
			</div>
			<!-- END: ORDER SUMMARY -->
			
			<!-- END: BANK DETAILS -->
			<!-- BEGIN: ORDER DETAILS -->
			<div class="c-order-details">
				<div class="c-border-bottom hidden-sm hidden-xs">
					<div class="row">
						<div class="col-md-3">
							<h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">Sản phẩm</h3>
						</div>
						<div class="col-md-5">
							<h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">Mô tả</h3>
						</div>
						<div class="col-md-2">
							<h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">Đơn giá</h3>
						</div>
						<div class="col-md-2">
							<h3 class="c-font-uppercase c-font-16 c-font-grey-2 c-font-bold">Tổng cộng</h3>
						</div>
					</div>
				</div>
				<!-- BEGIN: PRODUCT ITEM ROW -->
	<?php if(isset($rs_orderproduct)) {
		$unit_price = 0;
		$subtotal = 0;
	}?>
	<?php if(isset($rs_orderproduct)): ?>
		<?php $__currentLoopData = $rs_orderproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if( $row['parentidorder'] == 0 ): ?>
				<?php $idorderparent = $row['idorder'];
					$totalitem = $row['price']*$row['amount'];
					$subtotal = $subtotal + $totalitem;
				?>
				<!-- BEGIN: PRODUCT ITEM ROW -->
				<div class="c-border-bottom c-row-item">
					<div class="row">
						<div class="col-md-3 col-sm-12 c-image">
							<div class="c-content-overlay">
								<div class="c-overlay-wrapper">
									<div class="c-overlay-content">
										<a href="<?php echo e(action('teamilk\ProductController@show',$row['idproduct'])); ?>" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Tìm hiểu</a>
									</div>
								</div>
								<div class="c-bg-img-top-center c-overlay-object" data-height="height">
									<img width="100%" class="img-responsive" src="<?php echo e(asset($row['urlfile'])); ?>">
								</div>
							</div>
						</div>
						<div class="col-md-5 col-sm-8">
							<ul class="c-list list-unstyled">
								<li class="c-margin-b-25"><a href="<?php echo e(action('teamilk\ProductController@show',$row['idproduct'])); ?>" class="c-font-bold c-font-22 c-theme-link"><?php echo e($row['namepro']); ?></a></li>
								<li><?php echo e($row['short_desc']); ?></li>
								<li>Số lượng: x <?php echo e($row['amount']); ?></li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2">
							<p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">Đơn giá</p>
							<p class="c-font-sbold c-font-uppercase c-font-18"><span class="currency"><?php echo e($row['price']); ?></span><span class="vnd"></span></p>
						</div>
						<div class="col-md-2 col-sm-2">
							<p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">Tổng</p>
							<p class="c-font-sbold c-font-18"><span class="currency"><?php echo e($totalitem); ?></span><span class="vnd"></p>
						</div>
					</div>
				</div>
				<!-- END: PRODUCT ITEM ROW -->
				<?php $__currentLoopData = $rs_orderproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($item['parentidorder'] == $idorderparent ): ?>
					<?php 
					$totalitem = $item['price']*$item['amount'];
					$subtotal = $subtotal + $totalitem;
					?>
					<!-- BEGIN: PRODUCT ITEM ROW -->
				<div class="c-border-bottom c-row-item">
					<div class="row">
						<div class="col-md-3 col-sm-12 c-image">
							<div class="c-content-overlay">
								<div class="c-overlay-wrapper">
									<div class="c-overlay-content">
										<a href="<?php echo e(action('teamilk\ProductController@show',$item['idproduct'])); ?>" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Tìm hiểu</a>
									</div>
								</div>
								<div class="c-bg-img-top-center c-overlay-object" data-height="height">
									<img width="100%" class="img-responsive" src="<?php echo e(asset($item['urlfile'])); ?>">
								</div>
							</div>
						</div>
						<div class="col-md-5 col-sm-8">
							<ul class="c-list list-unstyled">
								<li class="c-margin-b-25"><a href="<?php echo e(action('teamilk\ProductController@show',$item['idproduct'])); ?>" class="c-font-bold c-font-22 c-theme-link"><?php echo e($item['namepro']); ?></a></li>
								<li><?php echo e($item['short_desc']); ?></li>
								<li>Số lượng: x <?php echo e($item['amount']); ?>(buổi)</li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2">
							<p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">Đơn giá</p>
							<p class="c-font-sbold c-font-uppercase c-font-18"><span class="currency"><?php echo e($item['price']); ?></span><span class="vnd"></span></p>
						</div>
						<div class="col-md-2 col-sm-2">
							<p class="visible-xs-block c-theme-font c-font-uppercase c-font-bold">Tổng</p>
							<p class="c-font-sbold c-font-18"><span class="currency"><?php echo e($totalitem); ?></span><span class="vnd"></p>
						</div>
					</div>
				</div>
				<!-- END: PRODUCT ITEM ROW -->	
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
				<!-- END: PRODUCT ITEM ROW -->	
				<div class="c-row-item c-row-total c-right">
					<ul class="c-list list-unstyled">
						
						<li>
							<h3 class="c-font-regular c-font-22">Tổng cộng : &nbsp;
								<span class="c-font-dark c-font-bold c-font-22"><span class="currency"><?php echo e($subtotal); ?></span><span class="vnd"></span></span>
							</h3>
						</li>
					</ul>
				</div>
			</div>
			<!-- END: ORDER DETAILS -->
			<!-- BEGIN: CUSTOMER DETAILS -->
			<?php if(isset($rs_customer)) {

			}?>
			<div class="c-customer-details row" data-auto-height="true">
				<div class="col-md-6 col-sm-6 c-margin-t-20">
					<div data-height="height">
						<h3 class=" c-margin-b-20 c-font-uppercase c-font-22 c-font-bold">Thông tin khách hàng</h3>
						<ul class="list-unstyled">
							<li>Họ tên: <?php echo e($rs_customer[0]['lastname']); ?> <?php echo e($rs_customer[0]['middlename']); ?> <?php echo e($rs_customer[0]['firstname']); ?></li>
							<li>Điện thoại: <?php echo e($rs_customer[0]['mobile']); ?></li>
							<li>Email: <a href="mailto:<?php echo e($rs_customer[0]['email']); ?>" class="c-theme-color"><?php echo e($rs_customer[0]['email']); ?></a></li>
							
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 c-margin-t-20">
					<div data-height="height">
						<h3 class=" c-margin-b-20 c-font-uppercase c-font-22 c-font-bold">Địa chỉ</h3>
						<ul class="list-unstyled">
							<li>
								<?php echo e($rs_customer[0]['address']); ?>

							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- END: CUSTOMER DETAILS -->
		</div>
	</div>
</div>  
<!-- END: PAGE CONTENT -->
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('other_scripts'); ?>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('teamilk.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/teamilk/addcart/checkout-complete.blade.php ENDPATH**/ ?>