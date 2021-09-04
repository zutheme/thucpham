<main class="main mt-8 single-product">
	<div class="page-content mb-10 pb-6">
		<div class="container">
			<div class="product product-single row mb-8">
				<div class="col-md-6">
					<div class="product-gallery pg-vertical">
						<div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
							@if(isset($product[0]['url_thumbnail']))
								<figure class="product-image">
									<img src="{{ asset($product[0]['url_thumbnail']) }}" data-zoom-image="{{ asset($product[0]['url_thumbnail']) }}" alt="Women's Brown Leather Backpacks" width="800" height="900">
								</figure>
							@endif
						</div>
						<div class="product-thumbs-wrap">
							<div class="product-thumbs">
								@if(isset($product[0]['url_thumbnail']))
									<div class="product-thumb active">
										<img src="{{ asset($product[0]['url_thumbnail']) }}" alt="product thumbnail" width="109" height="122">
									</div>
								@endif
							
							</div>
							<button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
							<button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
						</div>
					</div>
				</div>
				<div class="col-md-6 sticky-sidebar-wrapper">
					<div class="product-details sticky-sidebar" data-sticky-options="{'minWidth': 767}">
						<div class="product-navigation">
							<ul class="breadcrumb breadcrumb-lg">
								<li><a href="{{ url('/') }}"><i class="d-icon-home"></i></a></li>
								<li><a href="#" class="active">Products</a></li>
								<li>Simple</li>
							</ul>

							<ul class="product-nav">
								<li class="product-nav-prev">
									<a href="#">
										<i class="d-icon-arrow-left"></i> Prev
										<span class="product-nav-popup">
											<img src="{{ asset($product[0]['url_thumbnail']) }}" alt="product thumbnail" width="110" height="123">
											<span class="product-name">Sed egtas Dnte Comfort</span>
										</span>
									</a>
								</li>
								<li class="product-nav-next">
									<a href="#">
										Next <i class="d-icon-arrow-right"></i>
										<span class="product-nav-popup">
											<img src="{{ asset($product[0]['url_thumbnail']) }}" alt="product thumbnail" width="110" height="123">
											<span class="product-name">Sed egtas Dnte Comfort</span>
										</span>
									</a>
								</li>
							</ul>
						</div>

						<h1 class="product-name">{{ $product[0]['namepro'] }}</h1>
						<div class="product-meta">
							SKU: <span class="product-sku">12345670</span>
							BRAND: <span class="product-brand">The Northland</span>
						</div>
						<div class="product-price"><span class="currency">{{ $product[0]['price'] }}</span><span class="vnd"></span></div>
						<div class="ratings-container">
							<div class="ratings-full">
								<span class="ratings" style="width:100%"></span>
								<span class="tooltiptext tooltip-top"></span>
							</div>
							<a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 81 reviews )</a>
						</div>
						<p class="product-short-desc">{!! $product[0]['short_desc'] !!}</p>

						<hr class="product-divider">

						<div class="product-form product-qty">
							<div class="product-form-group">
								<div class="input-group mr-2">
									<button class="quantity-minus d-icon-minus"></button>
									<input class="quantity form-control" type="number" min="1" max="1000000">
									<button class="quantity-plus d-icon-plus"></button>
								</div>
								<button idproduct="{{ $idproduct }}" onclick="addcart(this);" class="btn-product btn-cart text-normal ls-normal font-weight-semi-bold"><i class="d-icon-bag"></i>Add to
									Cart</button>
							</div>
						</div>

						<hr class="product-divider mb-3">

						<div class="product-footer">
							<div class="social-links mr-4">
								<a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
								<a href="#" class="social-link social-twitter fab fa-twitter"></a>
								<a href="#" class="social-link social-pinterest fab fa-pinterest-p"></a>
							</div>
							<span class="divider d-lg-show"></span>
							<div class="product-action">
								<a href="#" class="btn-product btn-wishlist mr-6"><i class="d-icon-heart"></i><span>Add to
										wishlist</span></a>
								<a href="#" class="btn-product btn-compare"><i class="d-icon-compare"></i>Add to
									compare</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('teamilk.product.show-product-tab-nav')
			@include('teamilk.product.show-product-tab-relative')
		</div>
	</div>
</main>