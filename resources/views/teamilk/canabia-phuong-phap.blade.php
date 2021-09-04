<?php use \App\Http\Controllers\Helper\HelperController; ?>
<section class="method-home">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 text-center section-title-wrapper"> 
				<h2 class="section_header">Phương pháp điều trị</h2>
				<span class="title-separator separator-border theme-color-bg"></span>
				<div class="desc"><p class="topmargin_40">Ticmedi sử dụng phác đồ công phu ứng dụng công nghệ cao vào điều trị xương khớp dựa trên nguyên lý điều trị của tây y kết hợp thêm các phương pháp đông y, yoga trị liệu và liệu pháp tinh thần..</p></div>
			</div>
			<div class="owl-carousel" data-nav="false" data-dots="true" data-responsive-lg="4" data-responsive-md="4" data-responsive-sm="2">
					<?php $count = 1; $_order =''; ?>
						 @foreach ($rs_phuongphap as $row)
						 	<?php if($count % 5 == 0 || $count == 1) $_order =''; else $_order = $count; ?>
						 	<article class="post vertical-item content-padding rounded overflow_hidden loop-color">
								<div class="item-media entry-thumbnail"> <img class="cover" src="{{ asset( $row['urlfile'] ) }}" alt=""> </div>
								<div class="item-content">
									<header class="entry-header"><span><?php if($count < 10) echo '0'.$count.'.'; else echo $count.'.'; ?></span>
										<h4 class="entry-title renderer"> <a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a> </h4>
									</header>
									<div class="entry-content content-3lines-ellipsis">
										<?php $content = $row['description']; ?>
										<p><?php echo HelperController::get_the_excerpt_max(200, $content); ?></p>
									</div>
								</div>
							</article>
			             <?php $count++; ?>
			             @endforeach 
				</div>
		</div>
	</div>
</section>