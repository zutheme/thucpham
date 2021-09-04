<?php use \App\Http\Controllers\Helper\HelperController; 
	$title ='';
	$template ='search';
	$curent_slug = Request::segment(1);
	if(isset($errors)){
		echo $errors;
	}
?> 
 @extends('teamilk.master', compact('title','template','rs_you_foot','rs_feature','rs_listpostpular','rs_lpro','rs_cat_product','iduser','rs_menu2','rs_menu3','rs_menu1','rs_banner_right','rs_tuvan','rs_logo_footer','iduser','_patterm','rs_logo_header'))
@section('other_styles')
{{-- <link href="{{ asset('assets-tea/css/custom-product.css?v=0.7.4') }}" rel="stylesheet" type="text/css"> --}}
@stop
@section('content')
	@if(isset($rs_lpro))
		@if(isset($_posttype) && $_posttype =='video')
			@include('teamilk.product.layout-search-video')
		@else
			@include('teamilk.product.layout-search')
		@endif
	@else
		<h4>Chưa có dữ liệu</h4>
	@endif
@stop
@section('other_scripts')
   {{--  <script src="{{ asset('assets-tea/js/custom-post.js?v=0.0.7') }}" type="text/javascript"></script> --}}
@stop