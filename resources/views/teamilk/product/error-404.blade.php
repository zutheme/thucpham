<?php use \App\Http\Controllers\Helper\HelperController; ?>
<?php $curent_idcategory = 0 ;
	$title ='eror 404';
	$_template ='';
	$curent_slug = Request::segment(1);
	if(isset($_idcategory)) { $curent_idcategory = $_idcategory; }
	if(isset($rs_cat_product)) {
	 	$title = HelperController::Getrootcate($rs_cat_product,$curent_idcategory,'',0); 
	}
	$curent_posttype = Request::segment(3); 
?> 
@extends('teamilk.master', ['title' => $title,'template'=>$_template ], compact('rs_you_foot','rs_menu2','rs_menu3','rs_menu1','rs_logo_footer','rs_logo_header'))

@section('other_styles')

@stop

@section('content')
 <section class="ms section_404 section_padding_top_25 section_padding_bottom_50">

	<div class="container">

		<div class="row">

			<div class="col-md-6 col-md-offset-3 text-center">

				<p class="not_found"> <span class="highlight4">404</span> </p>

				<h3>Oops, page not found!</h3>

				<p>You can search what interested:</p>

				<div class="widget widget_search">

					<form method="get" class="searchform" action="./">

						<div class="form-group"> <label class="sr-only" for="page_search">Search for:</label> <input type="text" id="page_search" value="" name="search" class="form-control" placeholder="Keyword"> </div> <button type="submit" class="theme_button color1">Search</button> </form>

				</div>

				<p> or </p>

				<p> <a href="{{ url('/') }}" class="theme_button color3 min_width_button">Back to homepage</a> </p>

			</div>

		</div>

	</div>

</section>
@stop

@section('other_scripts')

  

@stop

