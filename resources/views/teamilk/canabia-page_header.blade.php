<?php use \App\Http\Controllers\Helper\HelperController; ?>
<header class="page_header header_white toggler_right">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 display_table">
				<div class="header_left_logo display_table_cell">
					@foreach($rs_logo_header as $row)
					    <a href="{{ url('/') }}" class="logo custom">
		            	<img src="{{ asset($row['urlfile']) }}" alt="">
			            	{{-- <span class="logo_text">
			               	 TICMEDI
			                <small>Vì sức khỏe của bạn</small>
			            	</span> --}}
		        		</a> 
					@endforeach
				 	
		    	</div>
				<div class="header_mainmenu display_table_cell text-left">
					<!-- main nav start -->
					<nav class="mainmenu_wrapper">
						<?php
					    if(isset($rs_menu1)){
					    	HelperController::menu_primary($rs_menu1, 0, '',0,'mainmenu nav sf-menu','');
					    } ?>
					</nav>
					<!-- eof main nav -->
					<!-- header toggler --><span class="toggle_menu"><span></span></span>
				</div>
			</div>
		</div>
	</div>
</header>