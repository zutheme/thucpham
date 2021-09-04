<?php use \App\Http\Controllers\Helper\HelperController; ?>
@include('teamilk.news-category-header')
<div class="td-main-content-wrap td-container-wrap">
	<div class="td-container">
		<div class="td-pb-row">
			<div class="td-pb-span8 td-main-content">
				<div class="td-ss-main-content td_block_template_9">
					@if(isset($rs_lpro))
						@foreach($rs_lpro as $row)
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
					<?php $countpage = $rs_lpro[0]['count_page']; ?>
						@if($countpage > 1)
						<?php $curent_page = Request::segment(3); 
							if(empty($curent_page)) $curent_page =1; ?>
						<div class="page-nav td-pb-padding-side">
							@for($i=1; $i < ($countpage + 1); $i++)
							<?php  $curent_class = ($curent_page == $i) ? '<span class="current">'.$i.'</span>':''; ?>
								@if (isset($curent_class) and !empty($curent_class))
									{!! $curent_class !!}
								@elseif($i == $countpage)
									<a href="{{ url('/') }}/{{ $curent_slug }}/page/{{ $i }}" class="last" title="{{ $countpage }}">{{ $countpage }}</a><a href="#"><i class="td-icon-menu-right"></i></a><span class="pages">Page {{ $curent_page }} of {{ $countpage }}</span><div class="clearfix"></div>
								@else
									<a class="page" title="{{ $i }}" href="{{ url('/') }}/{{ $curent_slug }}/page/{{ $i }}">{{ $i }}</a>
								@endif
							@endfor
							
						</div>
						@endif
						{{-- <div class="page-nav td-pb-padding-side">
							<span class="current">1</span><a href="#" class="page" title="2">2</a><a href="#" class="page" title="3">3</a><span class="extend">...</span><a href="#" class="last" title="9">9</a><a href="#"><i class="td-icon-menu-right"></i></a><span class="pages">Page 1 of 9</span>
							<div class="clearfix"></div>
						</div> --}}
					@endif	

				</div>
			</div>
			<div class="td-pb-span4 td-main-sidebar">
				@include('teamilk.news-details-sidebar')
			</div>
		</div>
	</div>
</div>
