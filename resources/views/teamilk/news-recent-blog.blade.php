<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div class="td-pb-span8 td-main-content" role="main">
	<div class="td-ss-main-content td_block_template_9">
		<div class="clearfix"></div>
		<div class="td-block-title-wrap">
			<h4 class="td-block-title"><span class="td-pulldown-size">Tin chuyên gia</span></h4>
		</div>
		@foreach ($rs_chuyengia as $row)
		<div class="td_module_17 td_module_wrap td-animation-stack">
			<div class="meta-info-container">
				<h3 class="entry-title td-module-title">
					<a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" title="{{ $row['namepro'] }}">{{ $row['namepro'] }}</a>
				</h3>
				<div class="td-module-image">
				<div class="td-module-thumb">
					<a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" class="td-image-wrap " title="{{ $row['namepro'] }}">
						<img width="696" height="385" class="entry-thumb" src="{{ asset( $row['urlfile'] ) }}" alt="" title="{{ $row['namepro'] }}">
					</a>
				</div> 
				<div class="td-module-meta-holder">
					<div class="td-left-meta">
						<span class="td-post-author-name"><a href="{{ url('/') }}/{{ $row['slugcate'] }}">{{ $row['namecat'] }}</a></span>  
					</div>
					<span class="td-module-comments"><a href="#">{{ $row['count'] }}</a></span> 
				</div>
				{{-- <div class="td-category-corner">
					<a href="{{ url('/') }}/{{ $row['slugcate'] }}" class="td-post-category">{{ $row['namecat'] }}</a> 
				</div> --}}
				</div>
				<div class="td-excerpt">
				<?php $content = $row['description'];
				 echo HelperController::get_the_excerpt_max(200, $content); ?> 
				</div>
				<div class="td-read-more">
					<a href="{{ url('/') }}/{{ $row['slug'] }}">Đọc thêm<i class="td-icon-menu-right"></i></a>
				</div>
			</div>
		</div>
		@endforeach
		{{-- 
		<div class="page-nav td-pb-padding-side">
			<span class="current">1</span>
			<a href="page/2/index.html" class="page" title="2">2</a>
			<a href="page/3/index.html" class="page" title="3">3</a>
			<span class="extend">...</span>
			<a href="page/9/index.html" class="last" title="9">9</a>
			<a href="page/2/index.html"><i class="td-icon-menu-right"></i></a>
			<span class="pages">Page 1 of 9</span><div class="clearfix"></div>
		</div>  --}}
		<div class="clearfix"></div>
	</div>
</div>