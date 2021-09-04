<section id="technologies" class="gallery-home container-video1">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 text-center section-title-wrapper"> 
				<h2 class="section_header">Cơ sở vật chất hiện đại bậc nhất</h2>
				<span class="title-separator separator-border theme-color-bg"></span>
				<div class="desc">
					<p class="topmargin_40">Phòng khám Ticmedi là sự pha trộn giữa spa nghỉ dưỡng và phòng điều trị, do vậy phong cách thiết kế vô cùng tinh tế và sang trọng, cho khách hàng cảm nhận như đi nghỉ dưỡng hơn là điều trị bệnh xương khớp..</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="row row-flex">
					<div class="col-lg-12 col-sm-12">
						<?php $count = 1; $_order =''; ?>
						 @foreach ($rs_gallery_left as $row)
						 	<?php //if($count % 5 == 0 || $count == 1) $_order =''; else $_order = $count; ?>
							<article class="art">
								<img class="img" src="{{ asset( $row['urlfile'] ) }}">
								<div class="area-play"><a class="btn-play" idyoutube="0" href="javascript:void(0)"><span class="play-animation"><img src="{{ asset('public/icons/play-icon-3.png') }}"></span>GIỚI THIỆU VỀ</br><span class="tic">TICMEDI</span></a></div>
							</article>
			             <?php $count++; ?>
			             @endforeach 
					</div>
				</div>
			</div>
			<div class="col-md-8 col-lg-8 pictures-left">
				<div class="row row-flex">
					<?php $count = 1; $_order =''; ?>
						 @foreach ($rs_gallery_home as $row)
						 	<?php //if($count % 5 == 0 || $count == 1) $_order =''; else $_order = $count; ?>
						 	<div class="col-lg-6 col-sm-6 item">
								<article class="picture">
									<img class="img" src="{{ asset( $row['urlfile'] ) }}">
								</article>
							</div>
			             <?php $count++; ?>
			             @endforeach 
					
				</div>
			</div>
		</div>
	</div>
</section>