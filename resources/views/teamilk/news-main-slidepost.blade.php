<div id="tdi_14_839" class="tdc-row">
	<div class="vc_row tdi_15_33e  wpb_row td-pb-row">
		<div class="vc_column tdi_17_013  wpb_column vc_column_container tdc-column td-pb-span12">
			<div class="wpb_wrapper">
				<div class="td_block_wrap td_block_big_grid_fl_4 tdi_18_256 td-grid-style-4 td-hover-1 td-big-grids-fl td-big-grids-scroll td-big-grids-margin td-pb-border-top td_block_template_9" data-td-block-uid="tdi_18_256">
					<div id="tdi_18_256" class="td_block_inner">
						<div class="td-big-grid-wrapper td-posts-4">
							<?php $count = 0; ?>
							 @foreach ($rs_Lstbyposttype as $row)
							 	@if($count == 0)
							 		<div class="td_module_mx21 td_module_wrap td-animation-stack td-big-grid-post-0 td-big-grid-post td-mx-17">
										<div class="td-module-image">
											<div class="td-module-thumb"><a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" class="td-image-wrap " title="{{ $row['namepro'] }}"><span class="entry-thumb td-thumb-css " style="background-image: url({{ asset( $row['urlfile'] ) }})"></span></a></div> 
										</div>
										<div class="td-meta-info-container">
											<div class="td-meta-align">
												<div class="td-big-grid-meta">
													<a href="{{ url('/') }}/{{ $row['slugcate'] }}" class="td-post-category">{{ $row['namecat'] }}</a> 
													<h3 class="entry-title td-module-title"><a href="{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" title="{{ $row['namepro'] }}">{{ $row['namepro'] }}</a></h3> 
												</div>
											</div>
										</div>
									</div>
									<div class="td-big-grid-scroll">
							 	@else
							 		<div class="td_module_mx21 td_module_wrap td-animation-stack td-big-grid-post-1 td-big-grid-post td-mx-17">
										<div class="td-module-image">
											<div class="td-module-thumb"><a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" class="td-image-wrap " title="{{ $row['namepro'] }}"><span class="entry-thumb td-thumb-css " style="background-image: url({{ asset( $row['urlfile'] ) }})"></span></a></div> 
										</div>
										<div class="td-meta-info-container">
											<div class="td-meta-align">
												<div class="td-big-grid-meta">
													<a href="{{ url('/') }}/{{ $row['slugcate'] }}" class="td-post-category">{{ $row['namecat'] }}</a> 
													<h3 class="entry-title td-module-title"><a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" title="{{ $row['namepro'] }}">{{ $row['namepro'] }}</a></h3> 
												</div>
											</div>
										</div>
									</div>
									@endif
                                    <?php $count++; ?>
                                 
                                @endforeach
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>