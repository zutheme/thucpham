<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div class="tdc-header-wrap ">
	<div class="td-header-wrap td-header-style-11 ">
		<div class="td-header-top-menu-full td-container-wrap td_stretch_container">
			<div class="td-container td-header-row td-header-top-menu">
				<div class="top-bar-style-1">
					<div class="td-header-sp-top-menu">
					 <div class="td-weather-top-widget" id="td_top_weather_uid">
						<i class="td-icons broken-clouds-n"></i>
						<div class="td-weather-now" data-block-uid="td_top_weather_uid">
						<span class="td-big-degrees">11.9</span>
						<span class="td-weather-unit">C</span>
						</div>
						<div class="td-weather-header">
						<div class="td-weather-city">London</div>
						</div>
					</div>
					<ul class="top-header-menu td_ul_login sf-js-enabled">
						<li class="menu-item">
							 @if (Auth::check())
	                        <a class="td-login-modal-js menu-item" data-effect="mpf-td-login-effect" href="{{ url('/profile') }}/{{ Auth::id() }}">{{ Auth::user()->name }}</a><span class="td-sp-ico-login td_sp_login_ico_style"></span> 
	                        @else
	                       <a class="td-login-modal-js menu-item" href="#login-form" data-effect="mpf-td-login-effect">Sign in / Join</a><span class="td-sp-ico-login td_sp_login_ico_style"></span>
	                        @endif
							
						</li>
					</ul>
					</div>
					<div class="td-header-sp-top-widget">
						<span class="td-social-icon-wrap">
							<a target="_blank" href="#" title="Facebook"><i class="td-icon-font td-icon-facebook"></i></a>
						</span>
						<span class="td-social-icon-wrap">
							<a target="_blank" href="#" title="Instagram">
								<i class="td-icon-font td-icon-instagram"></i>
							</a>
						</span>
						<span class="td-social-icon-wrap">
							<a target="_blank" href="#" title="Twitter">
								<i class="td-icon-font td-icon-twitter"></i>
							</a>
						</span>
						<span class="td-social-icon-wrap">
							<a target="_blank" href="#" title="Youtube">
								<i class="td-icon-font td-icon-youtube"></i>
							</a>
						</span>
					</div> 
				</div>

				<div id="login-form" class="white-popup-block mfp-hide mfp-with-anim">
					<div class="td-login-wrap">
						<a href="#" class="td-back-button"><i class="td-icon-modal-back"></i></a>
						<div id="td-login-div" class="td-login-form-div td-display-block">
							<div class="td-login-panel-title">Sign in</div>
							<div class="td-login-panel-descr">Welcome! Log into your account</div>
							<div class="td_display_err"></div>
							<div class="td-login-inputs">
								<input class="td-login-input" type="text" name="login_email" id="login_email" value="" required=""><label>your username</label></div>
								<div class="td-login-inputs"><input class="td-login-input" type="password" name="login_pass" id="login_pass" value="" required=""><label>your password</label></div>
								<input type="button" name="login_button" id="login_button" class="wpb_button btn td-login-button" value="Login">
								<div class="td-login-info-text"><a href="#" id="forgot-pass-link">Forgot your password? Get help</a></div>
						</div>
						<div id="td-forgot-pass-div" class="td-login-form-div td-display-none">
							<div class="td-login-panel-title">Password recovery</div>
							<div class="td-login-panel-descr">Recover your password</div>
							<div class="td_display_err"></div>
							<div class="td-login-inputs"><input class="td-login-input" type="text" name="forgot_email" id="forgot_email" value="" required=""><label>your email</label></div>
							<input type="button" name="forgot_button" id="forgot_button" class="wpb_button btn td-login-button" value="Send My Password">
							<div class="td-login-info-text">A password will be e-mailed to you.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="td-header-menu-wrap-full td-container-wrap td_stretch_container">
			<div class="td-header-menu-wrap td-header-gradient ">
					<div class="td-container td-header-row td-header-main-menu">
							<div id="td-header-menu" role="navigation">
								<div id="td-top-mobile-toggle"><a href="#"><i class="td-icon-font td-icon-mobile"></i></a></div>
									<div class="td-main-menu-logo td-logo-in-header">
										<a class="td-mobile-logo td-sticky-disable" href="index.html"><img src="public/newspaper/wp-content/uploads/2016/01/logo-o.png" alt=""></a>
										<a class="td-header-logo td-sticky-disable" href="index.html"><img src="public/newspaper/wp-content/uploads/2016/01/logo-h.png" alt=""></a>
									</div>
									<div class="menu-main-container">
										<?php
									    if(isset($rs_menu1)){
									    	HelperController::menu_primary($rs_menu1, 0, '',0,'sf-menu sf-js-enabled','');
									    } ?>
									</div>

									<div class="header-search-wrap">
										<div class="td-search-btns-wrap">
											<a id="td-header-search-button" href="#" role="button" class="dropdown-toggle " data-toggle="dropdown"><i class="td-icon-search"></i></a>
											<a id="td-header-search-button-mob" href="#" class="dropdown-toggle " data-toggle="dropdown"><i class="td-icon-search"></i></a>
										</div>
										<div class="td-drop-down-search" aria-labelledby="td-header-search-button">
											<form method="get" class="td-search-form" action="">
												<div role="search" class="td-head-form-search-wrap">
													<input id="td-header-search" type="text" value="" name="s" autocomplete="off"><input class="wpb_button wpb_btn-inverse btn" type="submit" id="td-header-search-top" value="Search">
												</div>
											</form>
											<div id="td-aj-search"></div>
										</div>
									</div>
							</div>
					</div>
			</div>
			<div class="td-banner-wrap-full td-logo-wrap-full td-logo-mobile-loaded td-container-wrap td_stretch_container">
				<div class="td-header-sp-logo">
					<h1 class="td-logo"><a class="td-main-logo" href="{{ url('/') }}">
						<img src="public/newspaper/wp-content/uploads/2016/01/logo-h.png" alt="">
						<span class="td-visual-hidden">Newspaper Health Blog Demo</span></a>
					</h1> 
				</div>
			</div>
		</div>
	</div>
</div>