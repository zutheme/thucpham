<section class="pt-3 mt-10">
	<h2 class="title justify-content-center">Related Products</h2>

	<div class="owl-carousel owl-theme owl-nav-full row cols-2 cols-md-3 cols-lg-4" data-owl-options="{
		'items': 5,
		'nav': false,
		'loop': false,
		'dots': true,
		'margin': 20,
		'responsive': {
			'0': {
				'items': 2
			},
			'768': {
				'items': 3
			},
			'992': {
				'items': 4,
				'dots': false,
				'nav': true
			}
		}
	}">
		<?php if(isset($rs_latestproduct)): ?>
				<?php $__currentLoopData = $rs_latestproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="product shadow-media">
				<figure class="product-media">
					<a href="<?php echo e(url('/')); ?>/<?php echo e($row['slug']); ?>">
						<img src="<?php echo e(asset( $row['urlfile'] )); ?>" alt="product" width="280" height="315">
					</a>
					<div class="product-label-group">
						<label class="product-label label-new">new</label>
					</div>
					<div class="product-action-vertical">
						<a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a>
						<a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
					</div>
					<div class="product-action">
						<a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>
					</div>
				</figure>
				<div class="product-details">
					<div class="product-cat">
						<a href="<?php echo e(url('/')); ?>/<?php echo e($row['slug']); ?>">Clothing</a>
					</div>
					<h3 class="product-name">
						<a href="<?php echo e(url('/')); ?>/<?php echo e($row['slug']); ?>"><?php echo e($row['namepro']); ?></a>
					</h3>
					<div class="product-price">
						<span class="price"><?php echo e($row['price']); ?></span>
					</div>
					<div class="ratings-container">
						<div class="ratings-full">
							<span class="ratings" style="width:100%"></span>
							<span class="tooltiptext tooltip-top"></span>
						</div>
						<a href="#" class="rating-reviews">( <span class="review-count">12</span>
							reviews
							)</a>
					</div>
				</div>
			</div>
	
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
	</div>
</section><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/teamilk/product/show-product-tab-relative.blade.php ENDPATH**/ ?>