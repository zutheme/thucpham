<section class="products-wrapper container pt-2 mt-10 pb-4 mb-4 appear-animate">
	<div class="tab tab-nav-simple tab-nav-center">
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" href="#best-sellers">Bán tốt</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#new-arrivals">Cập nhật mới</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#featured">Nổi bật</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="best-sellers">
				<div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-2" data-owl-options="{
					'items': 4,
					'nav': false,
					'dots': false,
					'margin': 20,
					'loop': false,
					'responsive': {
						'0': {
							'items': 2
						},
						'768': {
							'items': 3
						},
						'992': {
							'items': 4
						}
					}
				}">
			@if(isset($rs_latestproduct))
				@foreach($rs_latestproduct as $row)
				<div class="product product-with-qty text-center">
						<figure class="product-media">
							<a href="{{ url('/') }}/{{ $row['slug'] }}">
								<img src="{{ asset( $row['urlfile'] ) }} " alt="product" width="300" height="338">
								<img src="{{ asset( $row['urlfile'] ) }} " alt="product" width="300" height="338">
							</a>
							<div class="product-action-vertical">
								<a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
								<a href="#" class="btn-product-icon btn-compare" title="Add to Compare"><i class="d-icon-compare"></i></a>
							</div>
							<div class="product-label-group">
							{{-- <label class="product-label label-sale">10% off</label> --}}
							</div>
						</figure>
						<div class="product-details">
							<h3 class="product-name">
								<a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a>
							</h3>
							<div class="product-price">
								<ins class="new-price"><span class="currency">{{ $row['price'] }}</span><span class="vnd"></span></ins>
									
							</div>
							<div class="ratings-container">
								<div class="ratings-full">
									<span class="ratings" style="width:100%"></span>
									<span class="tooltiptext tooltip-top"></span>
								</div>
								
							</div>
							<div class="product-action">
								<div class="product-quantity">
									<button class="quantity-minus d-icon-minus"></button>
									<input class="quantity form-control" type="number" min="1" max="1000000">
									<button class="quantity-plus d-icon-plus"></button>
								</div>
								<a href="#" idproduct="{{ $row['idproduct'] }}" onclick="addcart(this);"  class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
							</div>
						</div>
					</div>
				
				@endforeach
			@endif
					
				
				</div>
			</div>
			<div class="tab-pane" id="new-arrivals">
				<div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-2" data-owl-options="{
					'items': 4,
					'nav': false,
					'dots': false,
					'margin': 20,
					'loop': false,
					'responsive': {
						'0': {
							'items': 2
						},
						'768': {
							'items': 3
						},
						'992': {
							'items': 4
						}
					}
				}">
					@if(isset($rs_latestproduct))
				@foreach($rs_latestproduct as $row)
				<div class="product product-with-qty text-center">
						<figure class="product-media">
							<a href="{{ url('/') }}/{{ $row['slug'] }}">
								<img src="{{ asset( $row['urlfile'] ) }} " alt="product" width="300" height="338">
								<img src="{{ asset( $row['urlfile'] ) }} " alt="product" width="300" height="338">
							</a>
							<div class="product-action-vertical">
								<a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
								<a href="#" class="btn-product-icon btn-compare" title="Add to Compare"><i class="d-icon-compare"></i></a>
							</div>
							<div class="product-label-group">
							{{--<label class="product-label label-sale">10% off</label>--}}
							</div>
						</figure>
						<div class="product-details">
							<h3 class="product-name">
								<a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a>
							</h3>
							<div class="product-price">
								<ins class="new-price">{{ $row['price'] }}</ins>
									{{-- <del class="old-price">$10.00</del> --}}
							</div>
							<div class="ratings-container">
								<div class="ratings-full">
									<span class="ratings" style="width:100%"></span>
									<span class="tooltiptext tooltip-top"></span>
								</div>
								{{--<a href="product.html" class="rating-reviews">( 6 reviews )</a>--}}
							</div>
							<div class="product-action">
								<div class="product-quantity">
									<button class="quantity-minus d-icon-minus"></button>
									<input class="quantity form-control" type="number" min="1" max="1000000">
									<button class="quantity-plus d-icon-plus"></button>
								</div>
								<a href="#" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
							</div>
						</div>
					</div>
				
				@endforeach
			@endif
				
				</div>
			</div>
			<div class="tab-pane" id="featured">
				<div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-2" data-owl-options="{
					'items': 4,
					'nav': false,
					'dots': false,
					'margin': 20,
					'loop': false,
					'responsive': {
						'0': {
							'items': 2
						},
						'768': {
							'items': 3
						},
						'992': {
							'items': 4
						}
					}
				}">
					@if(isset($rs_latestproduct))
				@foreach($rs_latestproduct as $row)
				<div class="product product-with-qty text-center">
						<figure class="product-media">
							<a href="{{ url('/') }}/{{ $row['slug'] }}">
								<img src="{{ asset( $row['urlfile'] ) }} " alt="product" width="300" height="338">
								<img src="{{ asset( $row['urlfile'] ) }} " alt="product" width="300" height="338">
							</a>
							<div class="product-action-vertical">
								<a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i class="d-icon-heart"></i></a>
								<a href="#" class="btn-product-icon btn-compare" title="Add to Compare"><i class="d-icon-compare"></i></a>
							</div>
							<div class="product-label-group">
								<label class="product-label label-sale">10% off</label>
							</div>
						</figure>
						<div class="product-details">
							<h3 class="product-name">
								<a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a>
							</h3>
							<div class="product-price">
								<ins class="new-price">{{ $row['price'] }}</ins>
									{{-- <del class="old-price">$10.00</del> --}}
							</div>
							<div class="ratings-container">
								<div class="ratings-full">
									<span class="ratings" style="width:100%"></span>
									<span class="tooltiptext tooltip-top"></span>
								</div>
								{{--<a href="product.html" class="rating-reviews">( 6 reviews )</a>--}}
							</div>
							<div class="product-action">
								<div class="product-quantity">
									<button class="quantity-minus d-icon-minus"></button>
									<input class="quantity form-control" type="number" min="1" max="1000000">
									<button class="quantity-plus d-icon-plus"></button>
								</div>
								<a href="#" class="btn-product btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i><span>Add to cart</span></a>
							</div>
						</div>
					</div>
				
				@endforeach
			@endif
				
				</div>
			</div>
		</div>
	</div>
</section>