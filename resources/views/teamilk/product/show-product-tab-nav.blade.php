<div class="tab tab-nav-simple product-tabs mb-4">
	<ul class="nav nav-tabs justify-content-center" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" href="#product-tab-description">Description</a>
		</li>
		
		<li class="nav-item">
			<a class="nav-link" href="#product-tab-reviews">Reviews (2)</a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active in" id="product-tab-description">
			<div class="row mt-6">
				<div class="col-md-6">
					{!! $product[0]['short_desc'] !!}
				</div>
				
			</div>
		</div>
		
		<div class="tab-pane " id="product-tab-reviews">
			<div class="comments pt-2 pb-10 border-no">
				<ul>
					<li>
						<div class="comment">
							<figure class="comment-media">
								<a href="#">
									<img src="images\blog\comments\1.jpg" alt="avatar">
								</a>
							</figure>
							<div class="comment-body">
								<div class="comment-rating ratings-container mb-0">
									<div class="ratings-full">
										<span class="ratings" style="width:80%"></span>
										<span class="tooltiptext tooltip-top">4.00</span>
									</div>
								</div>
								<div class="comment-user">
									<span class="comment-date text-body">September 22, 2020 at 9:42
										pm</span>
									<h4><a href="#">John Doe</a></h4>
								</div>

								<div class="comment-content">
									<p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
										libero sodales leo,
										eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo.
										Suspendisse potenti.
										Sed egestas, ante et vulputate volutpat, eros pede semper
										est, vitae luctus metus libero eu augue.</p>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="comment">
							<figure class="comment-media">
								<a href="#">
									<img src="images\blog\comments\2.jpg" alt="avatar">
								</a>
							</figure>

							<div class="comment-body">
								<div class="comment-rating ratings-container mb-0">
									<div class="ratings-full">
										<span class="ratings" style="width:80%"></span>
										<span class="tooltiptext tooltip-top">4.00</span>
									</div>
								</div>
								<div class="comment-user">
									<span class="comment-date text-body">September 22, 2020 at 9:42
										pm</span>
									<h4><a href="#">John Doe</a></h4>
								</div>

								<div class="comment-content">
									<p>Sed pretium, ligula sollicitudin laoreet viverra, tortor
										libero sodales leo, eget blandit nunc tortor eu nibh. Nullam
										mollis.
										Ut justo. Suspendisse potenti. Sed egestas, ante et
										vulputate volutpat,
										eros pede semper est, vitae luctus metus libero eu augue.
										Morbi purus libero,
										faucibus adipiscing, commodo quis, avida id, est. Sed
										lectus. Praesent elementum
										hendrerit tortor. Sed semper lorem at felis. Vestibulum
										volutpat.</p>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<!-- End Comments -->
			<div class="reply">
				<div class="title-wrapper text-left">
					<h3 class="title title-simple text-left text-normal">Add a Review</h3>
					<p>Your email address will not be published. Required fields are marked *</p>
				</div>
				<div class="rating-form">
					<label for="rating" class="text-dark">Your rating * </label>
					<span class="rating-stars selected">
						<a class="star-1" href="#">1</a>
						<a class="star-2" href="#">2</a>
						<a class="star-3" href="#">3</a>
						<a class="star-4 active" href="#">4</a>
						<a class="star-5" href="#">5</a>
					</span>

					<select name="rating" id="rating" required="" style="display: none;">
						<option value="">Rate…
						<option value="5">Perfect
						<option value="4">Good
						<option value="3">Average
						<option value="2">Not that bad
						<option value="1">Very poor
					</select>
				</div>
				<form action="#">
					<textarea id="reply-message" cols="30" rows="6" class="form-control mb-4" placeholder="Comment *" required=""></textarea>
					<div class="row">
						<div class="col-md-6 mb-5">
							<input type="text" class="form-control" id="reply-name" name="reply-name" placeholder="Name *" required="">
						</div>
						<div class="col-md-6 mb-5">
							<input type="email" class="form-control" id="reply-email" name="reply-email" placeholder="Email *" required="">
						</div>
					</div>
					<div class="form-checkbox mb-4">
						<input type="checkbox" class="custom-checkbox" id="signin-remember" name="signin-remember">
						<label class="form-control-label" for="signin-remember">
							Save my name, email, and website in this browser for the next time I
							comment.
						</label>
					</div>
					<button type="submit" class="btn btn-primary btn-rounded">Submit<i class="d-icon-arrow-right"></i></button>
				</form>
			</div>
			<!-- End Reply -->
		</div>
	</div>
</div>