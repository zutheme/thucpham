<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div id="tdi_19_06e" class="tdc-row">
	<div class="vc_row tdi_20_296 td-ss-row wpb_row td-pb-row">
		<div class="vc_column tdi_22_66a  wpb_column vc_column_container tdc-column td-pb-span8">
			<div class="wpb_wrapper">
				<div class="clearfix"></div>
					<div class="td_block_wrap td_block_22 tdi_23_fe8 td_with_ajax_pagination td-pb-border-top td_block_template_9 td-column-2" data-td-block-uid="tdi_23_fe8">
						<div class="td-block-title-wrap"><h4 class="td-block-title"><span class="td-pulldown-size">Được xem nhiều</span></h4></div>
						<div id="tdi_23_fe8" class="td_block_inner td-column-2 td-opacity-read">
							@foreach ($rs_listpostpular as $row) 
							<!--item-->
							<div class="td_module_17 td_module_wrap td-animation-stack">
								<div class="meta-info-container">
									<h3 class="entry-title td-module-title"><a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" title="{{ $row['namepro'] }}">{{ $row['namepro'] }}</a></h3>
									<div class="td-module-image">
										<div class="td-module-thumb"><a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" class="td-image-wrap " title="{{ $row['namepro'] }}"><img width="696" height="385" class="entry-thumb" src="{{ asset( $row['urlfile'] ) }}" alt="" title="{{ $row['namepro'] }}"></a></div> 
										<div class="td-module-meta-holder">
											<div class="td-left-meta">
												<span class="td-post-author-name"><a href="{{ url('/') }}/{{ $row['slugcate'] }}">{{ $row['namecat'] }}</a> </span>  </div>
												<span class="td-module-comments"><a href="#">{{ $row['count'] }}</a></span> </div>
											<div class="td-category-corner">
												{{-- <a href="category/fitness/outdoors/index.html" class="td-post-category">Outdoors</a> --}} 
											</div>
									</div>
									<div class="td-excerpt">
									<?php
									$content = $row['description'];
									echo HelperController::get_the_excerpt_max(200, $content); ?>
									</div>
									<div class="td-read-more">
									<a href="{{ url('/') }}/{{ $row['slug'] }}">Đọc thêm<i class="td-icon-menu-right"></i></a>
									</div>
								</div>
							</div>
							<!--end item-->
							@endforeach
						</div>
						
					</div> 
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="vc_column tdi_25_6d3  wpb_column vc_column_container tdc-column td-pb-span4">
			<div class="wpb_wrapper">
			<!-- <div class="wpb_wrapper" style="width: 324px; position: absolute; top: 413px; bottom: auto; z-index: 1;"> -->
				<div class="clearfix"></div>
				<div class="td_block_wrap td_block_22 tdi_26_695 td_with_ajax_pagination td-pb-border-top td_block_template_9 td-column-1" data-td-block-uid="tdi_26_695">
					<div class="td-block-title-wrap"><h4 class="td-block-title"><span class="td-pulldown-size">Phương pháp điều trị</span></h4>
					</div>
					<div id="tdi_26_695" class="td_block_inner td-column-1 td-opacity-read">
						@foreach ($rs_pp as $row) 
						<!--item -->
						<div class="td_module_17 td_module_wrap td-animation-stack">
							<div class="meta-info-container">
								<h3 class="entry-title td-module-title"><a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" title="{{ $row['namepro'] }}">{{ $row['namepro'] }}</a></h3>
								<div class="td-module-image">
									<div class="td-module-thumb"><a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" class="td-image-wrap " title="1{{ $row['namepro'] }}"><img width="696" height="385" class="entry-thumb" src="{{ asset( $row['urlfile'] ) }}" alt="" title="{{ $row['namepro'] }}"></a>
									</div> 
									<div class="td-module-meta-holder">
										<div class="td-left-meta">
											<span class="td-post-author-name"><a href="{{ url('/') }}/{{ $row['slugcate'] }}">{{ $row['namecat'] }}</a></span> 
										</div>
										<span class="td-module-comments"><a href="#">{{ $row['count'] }}</a></span> 
									</div>
									{{-- <div class="td-category-corner">
										<a href="category/fitness/outdoors/index.html" class="td-post-category">Outdoors</a> 
									</div> --}}
								</div>
								<div class="td-excerpt">
								<?php
									$content = $row['description'];
									echo HelperController::get_the_excerpt_max(200, $content); 
									?> 
								</div>
								<div class="td-read-more">
									<a href="{{ url('/') }}/{{ $row['slug'] }}">Tìm hiểu<i class="td-icon-menu-right"></i></a>
								</div>
							</div>
						</div>
						<!--end item -->
						@endforeach
					</div>
					{{-- <div class="td-load-more-wrap"><a href="#" class="td_ajax_load_more td_ajax_load_more_js" id="next-page-tdi_26_695" data-td_block_id="tdi_26_695">Load more<i class="td-icon-font td-icon-menu-down"></i></a>
					</div> --}}
				</div> 
				<div class="clearfix"></div>
				</div>
		</div>
	</div>
</div>