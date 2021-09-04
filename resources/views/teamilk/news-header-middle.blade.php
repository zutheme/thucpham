<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div class="td-header-menu-wrap-full td-container-wrap td_stretch_container">
	<div class="td-header-menu-wrap td-header-gradient ">
		<div class="td-container td-header-row td-header-main-menu">
			<div id="td-header-menu" role="navigation">
				<div id="td-top-mobile-toggle"><a href="#"><i class="td-icon-font td-icon-mobile"></i></a></div>
				    <div class="td-main-menu-logo td-logo-in-header">
				    	@foreach($rs_logo_header as $row)
						<a class="td-mobile-logo td-sticky-disable" href="{{ url('/') }}"><img src="{{ asset($row['urlfile']) }}" alt=""></a>
					    <a class="td-header-logo td-sticky-disable" href="{{ url('/') }}"><img src="{{ asset($row['urlfile']) }}" alt=""></a>
						@endforeach
				    </div>
					<div class="menu-main-container">
						<?php
					    if(isset($rs_menu1)){
					    	HelperController::menu_primary($rs_menu1, 0, '',0,'sf-menu sf-js-enabled','');
					    } ?>
					</div>
			</div>
			<div class="header-search-wrap">
				<div class="td-search-btns-wrap">
					<a id="td-header-search-button" href="#" role="button" class="dropdown-toggle " data-toggle="dropdown"><i class="td-icon-search"></i></a>
					<a id="td-header-search-button-mob" href="#" class="dropdown-toggle " data-toggle="dropdown"><i class="td-icon-search"></i></a>
				</div>
				<div class="td-drop-down-search" aria-labelledby="td-header-search-button">
					<form method="post" class="td-search-form" action="{{ url('/search/s/page/1') }}">
						@csrf
						<div role="search" class="td-head-form-search-wrap">
							<input id="td-header-search" type="text" value="" name="keyword" autocomplete="off" required ><input class="wpb_button wpb_btn-inverse btn" type="submit" id="td-header-search-top" value="Search">
						</div>
					</form>
					<div id="td-aj-search"></div>
				</div>
			</div>
		</div>
	</div>
</div>