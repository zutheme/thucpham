<section class="ls section_offset_teasers section_padding_top_10 section_padding_bottom_10 slider">
	<div class="container">
		<div class="row">
		 <div class="owl-carousel" data-nav="true" data-responsive-lg="4">
		 	<?php $count = 1; $_order =''; ?>
			 @foreach ($rs_services as $row)
			 	<?php if($count % 5 == 0 || $count == 1) {
			 		$_order ='';
			 		$count = 1;
			 	}else $_order = $count; ?>
			 	<div class="item main_bg_color{{ $_order }} rounded">
					<div class="teaser top_offset_icon main_bg_color{{ $_order }} rounded text-center">
						<div class="teaser_icon size_small round main_bg_color{{ $_order }}"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
					</div>
					<div class="picture">
						<a href="{{ url('/') }}/{{ $row['slug'] }}"><img src="{{ asset( $row['urlfile'] ) }}" alt=""></a>
					</div>
					<div class="title">
						<h4 class="topmargin_0"> <a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a> </h4>
					</div>
				</div>
             <?php $count++; ?>
             @endforeach 
			</div>
		</div>
	</div>
</section>