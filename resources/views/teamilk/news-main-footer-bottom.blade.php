<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div class="tdc-footer-wrap ">
	<div class="td-footer-wrapper td-footer-container td-container-wrap td-footer-template-2 td_stretch_container">
		<div class="td-container">
			<div class="td-pb-row">
				<div class="td-pb-span12"></div>
			</div>
			<div class="td-pb-row">
				<div class="td-pb-span4">
					<div class="td-footer-info">
						@foreach($rs_logo_footer as $row)
							<div class="footer-logo-wrap"><a href="{{ url('/') }}"><img src="{{ asset($row['urlfile']) }}" alt="" title=""></a></div>
							{!! $row['description'] !!}
						@endforeach
						{{-- <div class="footer-text-wrap">Newspaper is your news, entertainment, music fashion website. We provide you with the latest breaking news and videos straight 	from the entertainment industry.<div class="footer-email-wrap">Contact us: <a href="mailto:contact@yoursite.com">contact@yoursite.com</a>
						</div>
						</div>
						<div class="footer-social-wrap td-social-style-2">
							<span class="td-social-icon-wrap"><a target="_blank" href="#" title="Facebook"><i class="td-icon-font td-icon-facebook"></i></a></span>
							<span class="td-social-icon-wrap"><a target="_blank" href="#" title="Instagram"><i class="td-icon-font td-icon-instagram"></i></a></span>
							<span class="td-social-icon-wrap"><a target="_blank" href="#" title="Twitter"><i class="td-icon-font td-icon-twitter"></i></a></span>
							<span class="td-social-icon-wrap"><a target="_blank" href="#" title="Youtube"><i class="td-icon-font td-icon-youtube"></i></a></span>
						</div> --}}
					</div> 
				</div>
				<div class="td-pb-span4">
					<div class="td_block_wrap td_block_7 tdi_43_ad5 td-pb-border-top td_block_template_9 td-column-1 td_block_padding" data-td-block-uid="tdi_43_ad5">
						<div class="td-block-title-wrap">
							<h4 class="td-block-title"><span class="td-pulldown-size">NỔI BẬT</span></h4>
						</div>
						<div id="tdi_43_ad5" class="td_block_inner">
							@foreach($rs_listpostpular as $row)
							<div class="td-block-span12">
								<div class="td_module_6 td_module_wrap td-animation-stack">
									<div class="td-module-thumb">
										<a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" class="td-image-wrap " title="{{ $row['namepro'] }}"><img width="100" height="70" class="entry-thumb" src="{{ asset( $row['urlfile'] ) }}" alt="" title="{{ $row['namepro'] }}"></a>
									</div>
									<div class="item-details">
										<h3 class="entry-title td-module-title"><a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" title="{{ $row['namepro'] }}">{{ $row['namepro'] }}</a></h3> 
										<div class="td-module-meta-info">
											<a href="{{ url('/') }}/{{ $row['slug'] }}" class="td-post-category">Tìm hiểu</a> <span class="td-post-date"><time class="entry-date updated td-module-date">{{ $row['namecat'] }}</time></span> 
										</div>
									</div>
								</div>
							</div> 
							@endforeach

						</div>
					</div>  
				</div>
				<div class="td-pb-span4">
					<div class="td_block_wrap td_block_popular_categories tdi_44_8a8 widget widget_categories td-pb-border-top td_block_template_9" data-td-block-uid="tdi_44_8a8">
						<div class="td-block-title-wrap">
							<h4 class="td-block-title"><span class="td-pulldown-size">Chuyên mục</span></h4>
						</div>
						<?php
					    if(isset($rs_menu2)){
					    	HelperController::menu_category($rs_menu2, 0, '',0,'td-pb-padding-side','',1);
					    } ?>
						
					</div> 
				</div>
			</div>
		</div>
	</div>

	<div class="td-sub-footer-container td-container-wrap td_stretch_container">
		<div class="td-container">
			<div class="td-pb-row">
				<div class="td-pb-span td-sub-footer-menu">
					<div class="menu-other-container">
						<?php
					    if(isset($rs_menu3)){
					    	HelperController::menu_category($rs_menu3, 0, '',0,'td-subfooter-menu','',0);
					    } ?>
					</div> 
				</div>
			<div class="td-pb-span td-sub-footer-copy">
			© Copyright - dauthatlung.net </div>
			</div>
		</div>
	</div>
</div>