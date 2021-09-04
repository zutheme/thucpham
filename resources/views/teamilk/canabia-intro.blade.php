<section class="intro_section page_mainslider ds light_md_bg_color all-scr-cover">
	<div class="flexslider" data-dots="true" data-nav="true">
		<ul class="slides">
			<?php $count = 0; ?>
			 @foreach ($rs_Lstbyposttype as $row)
					<li>
						<div class="slide-image-wrap">
							<div class="rounded-container"><img src="{{ asset( $row['urlfile'] ) }}" alt=""> </div>
						</div>
						<div class="container">
							<div class="row">
								<div class="col-sm-12 text-center">
									<div class="slide_description_wrapper">
										<div class="slide_description">
											{{-- <div class="intro-layer" data-animation="fadeInUp">
												<p class="semibold text-uppercase grey"> {{ $row['namepro'] }} </p>
											</div>
											<div class="intro-layer" data-animation="fadeInUp">
												<h2>Recreational &amp; Medical Marijuana...</h2>
											</div> --}}
											{{-- <div class="intro-layer" data-animation="fadeInUp">
												<div class="slide_buttons"> <a href="{{ url('/') }}/{{ $row['slug'] }}" class="theme_button color4 min_width_button">Xem thêm</a> </div>
											</div> --}}
										</div>
									</div>
								</div>	
							</div>
						</div>
					</li>
			 	
                    <?php $count++; ?>
                 
                @endforeach
			
		</ul>
	</div>
<!-- eof flexslider -->
</section>