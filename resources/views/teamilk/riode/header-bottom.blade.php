<?php use \App\Http\Controllers\Helper\HelperController; 
     $menu_primary = new HelperController(); 
?>
<div class="header-bottom sticky-header fix-top sticky-content d-lg-show">
	<div class="container">
		<div class="header-left">
			<nav class="main-nav">
				 <?php
					if(isset($rs_menu1)){
					   $menu_primary->menu_primary($rs_menu1, 0, 0,  0, 'menu', '');
					} ?>
			</nav>
		</div>
		<div class="header-right">
			<a href="#"><i class="d-icon-map"></i>Track Order</a>
			<a href="#" class="ml-6"><i class="d-icon-card"></i>Daily Deals</a>
		</div>
	</div>
</div>