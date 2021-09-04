<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div class="td-category-header td-container-wrap">
	<div class="td-container">
		<div class="td-crumb-container">
			{{-- <form method="post" class="td-search-form" action="{{ url('/') }}/search">
				@csrf
				<div role="search" class="td-head-form-search-wrap">
					<input id="td-header-search" type="text" value="" name="keyword" autocomplete="off" required ><input class="wpb_button wpb_btn-inverse btn" type="submit" id="td-header-search-top" value="Search">
				</div>
			</form> --}}
		</div>
		<div class="td-category-title-holder">
			{{-- <h1 class="entry-title td-page-title"></h1> --}}
		</div> 
	</div>
</div>
<div class="td-main-content-wrap td-container-wrap">
	<div class="td-container">
		<div class="td-pb-row">
			<div class="td-pb-span8 td-main-content">
				<div class="td-ss-main-content td_block_template_9">
					
							<div class="td_module_17 td_module_wrap td-animation-stack">
									<div class="meta-info-container">
										<h3 class="entry-title td-module-title">Chưa có dữ liệu</h3>
										<div class="td-excerpt">
										 	<form method="post" class="td-search-form" action="{{ url('/search/s/page/1') }}">
												@csrf
												<div role="search" class="td-head-form-search-wrap">
													<input id="td-header-search" type="text" value="" name="keyword" autocomplete="off" required ><input class="wpb_button wpb_btn-inverse btn" type="submit" id="td-header-search-top" value="Search">
												</div>
											</form>
										</div>
										
									</div>
							</div>
				</div>
			</div>
			<div class="td-pb-span4 td-main-sidebar">
				@include('teamilk.news-details-sidebar')
			</div>
		</div>
	</div>
</div>
