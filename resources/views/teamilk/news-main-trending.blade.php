<div id="tdi_9_362" class="tdc-row">
	<div class="vc_row tdi_10_25d  wpb_row td-pb-row">
		<div class="vc_column tdi_12_ad6  wpb_column vc_column_container tdc-column td-pb-span12">
			<div class="wpb_wrapper">
				<div class="td_block_wrap td_block_trending_now tdi_13_996 td-pb-border-top td_block_template_9" data-td-block-uid="tdi_13_996">
					<div class="td_block_inner">
						<div class="td-trending-now-wrapper" id="tdi_13_996" data-start="">
							<div class="td-trending-now-title">Tin nhanh</div>
								<div class="td-trending-now-display-area">
									 @foreach ($rs_Lstbyposttype as $row)
									 	<div class="td_module_trending_now td-trending-now-post-0 td-trending-now-post">
											<h3 class="entry-title td-module-title">
												<a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" title="{{ $row['namepro'] }}">{{ $row['namepro'] }}</a>
											</h3>
											</div>
		                                @endforeach
								</div>
							<div class="td-next-prev-wrap"><a href="#" class="td_ajax-prev-pagex td-trending-now-nav-left" data-block-id="tdi_13_996" data-moving="left" data-control-start=""><i class="td-icon-menu-left"></i></a><a href="#" class="td_ajax-next-pagex td-trending-now-nav-right" data-block-id="tdi_13_996" data-moving="right" data-control-start=""><i class="td-icon-menu-right"></i></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>