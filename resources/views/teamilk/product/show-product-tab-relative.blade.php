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
		@if(isset($rs_latestproduct))
				@foreach($rs_latestproduct as $row)
				<div class="product shadow-media">
				<figure class="product-media">
					<a href="{{ url('/') }}/{{ $row['slug'] }}">
						<img src="{{ asset( $row['urlfile'] ) }}" alt="product" width="280" height="315">
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
						<a href="{{ url('/') }}/{{ $row['slug'] }}">Clothing</a>
					</div>
					<h3 class="product-name">
						<a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a>
					</h3>
					<div class="product-price">
						<span class="price">{{ $row['price'] }}</span>
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
	
				@endforeach
			@endif
	</div>
</section>