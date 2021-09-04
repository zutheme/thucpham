<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div class="td-scroll-up"><i class="td-icon-menu-up"></i></div>
<div class="td-menu-background"></div>
<div id="td-mobile-nav">
        <div class="td-mobile-container">
            <div class="td-menu-socials-wrap">
                <div class="td-menu-socials">
                    <span class="td-social-icon-wrap">
                        <a target="_blank" href="https://www.facebook.com/TickMedical" title="Facebook"><i class="td-icon-font td-icon-facebook"></i></a>
                    </span>
                    <span class="td-social-icon-wrap">
                        <a target="_blank" href="https://www.youtube.com/channel/UCq54D5mU4z2ZgNRI89kEIpQ" title="Youtube"><i class="td-icon-font td-icon-youtube"></i></a>
                    </span>
                    <span class="td-social-icon-wrap">
                        <a target="_blank" href="https://www.facebook.com/groups/congdongdieutrixuongkhop" title="Groups"><i class="td-icon-font td-icon-instagram"></i></a>
                    </span>
                    <span class="td-social-icon-wrap">
                        <a target="_blank" href="https://zalo.me/4222044563931562361" title="Zalo"><i class="td-icon-font td-icon-twitter"></i></a>
                    </span>  
                </div>
                <div class="td-mobile-close">
                    <a href="#"><i class="td-icon-close-mobile"></i></a>
                </div>
            </div>
            <div class="td-menu-login-section">
                <div class="td-guest-wrap">
                    <div class="td-menu-login"><a id="login-link-mob">Sign in</a></div>
                </div>
            </div>

            <div class="td-mobile-content">
                <div class="menu-main-container">
                    <?php
                        if(isset($rs_menu1)){
                            HelperController::menu_mobile($rs_menu1, 0, '',0,'td-mobile-main-menu','',0);
                        } ?>
                </div> 
            </div>
        </div>

        <div id="login-form-mobile" class="td-register-section">
            <div id="td-login-mob" class="td-login-animation td-login-hide-mob">

                <div class="td-login-close">
                    <a href="#" class="td-back-button"><i class="td-icon-read-down"></i></a>
                    <div class="td-login-title">Sign in</div>

                    <div class="td-mobile-close">
                    <a href="#"><i class="td-icon-close-mobile"></i></a>
                    </div>
                </div>
                <div class="td-login-form-wrap">
                    <div class="td-login-panel-title"><span>Welcome!</span>Log into your account</div>
                    <div class="td_display_err"></div>
                    <div class="td-login-inputs"><input class="td-login-input" type="text" name="login_email" id="login_email-mob" value="" required=""><label>your username</label></div>
                    <div class="td-login-inputs"><input class="td-login-input" type="password" name="login_pass" id="login_pass-mob" value="" required=""><label>your password</label></div>
                    <input type="button" name="login_button" id="login_button-mob" class="td-login-button" value="LOG IN">
                    <div class="td-login-info-text">
                    <a href="#" id="forgot-pass-link-mob">Forgot your password?</a>
                    </div>
                    <div class="td-login-register-link">
                    </div>
                </div>
            </div>
            <div id="td-forgot-pass-mob" class="td-login-animation td-login-hide-mob">
                <div class="td-forgot-pass-close">
                    <a href="#" class="td-back-button"><i class="td-icon-read-down"></i></a>
                    <div class="td-login-title">Password recovery</div>
                </div>
                <div class="td-login-form-wrap">
                    <div class="td-login-panel-title">Recover your password</div>
                    <div class="td_display_err"></div>
                    <div class="td-login-inputs"><input class="td-login-input" type="text" name="forgot_email" id="forgot_email-mob" value="" required=""><label>your email</label></div>
                    <input type="button" name="forgot_button" id="forgot_button-mob" class="td-login-button" value="Send My Pass">
                </div>
            </div>
        </div>
</div> 
<div class="td-search-background"></div>
<div class="td-search-wrap-mob">
    <div class="td-drop-down-search">
        <form method="get" class="td-search-form" action="#">

            <div class="td-search-close">
            <a href="#"><i class="td-icon-close-mobile"></i></a>
            </div>
            <div role="search" class="td-search-input">
            <span>Search</span>
            <input id="td-header-search-mob" type="text" value="" name="s" autocomplete="off">
            </div>
        </form>
        <div id="td-aj-search-mob" class="td-ajax-search-flex"></div>
    </div>
</div>