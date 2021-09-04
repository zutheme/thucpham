<?php use \App\Http\Controllers\Helper\HelperController; ?>
<?php $curent_idcategory = 0 ;
	$title ='';
	$_template ='archive';
	$curent_slug = Request::segment(1);
	if(isset($_idcategory)) { $curent_idcategory = $_idcategory; }
	if(isset($rs_cat_product)) {
	 	$title = HelperController::Getrootcate($rs_cat_product,$curent_idcategory,'',0); 
	}
	$curent_posttype = Request::segment(3); 
?> 
@extends('teamilk.master', ['title' => $title,'template'=>$_template ], compact('rs_you_foot','rs_feature','rs_listpostpular','rs_lpro','_idcategory','rs_cat_product','iduser','rs_menu2','rs_menu3','rs_menu1','rs_banner_right','rs_tuvan','rs_logo_footer','rs_logo_header','iduser'))
@section('other_styles')
{{-- <link href="{{ asset('assets-tea/css/custom-product.css?v=0.7.4') }}" rel="stylesheet" type="text/css"> --}}

@stop

@section('content')

	@if(isset($rs_lpro))
		 @if(isset($rs_lpro[0]['_commit']))
		   @if($rs_lpro[0]['_commit'] > 0 and isset($rs_lpro[0]['nametype']))
				@if($rs_lpro[0]['nametype']=='product')
					@include('teamilk.product.layout-product')
				@elseif($rs_lpro[0]['nametype']=='post')
					@include('teamilk.product.layout-post')
				@elseif($rs_lpro[0]['nametype']=='video')
					@include('teamilk.product.layout-video')
				@else
					@include('teamilk.product.layout-post')
				@endif
			@else
				@include('teamilk.product.no-post')
			@endif
		@else
			@include('teamilk.product.no-permit')
			{{-- <h4>Contact administator</h4> --}}
		@endif	
	@else
		@include('teamilk.product.no-post')
		{{-- <h4>Chưa có dữ liệu</h4> --}}
	@endif

@stop

@section('other_scripts')
    <script src="{{ asset('assets-tea/js/custom-post.js?v=0.0.7') }}" type="text/javascript"></script>
@stop