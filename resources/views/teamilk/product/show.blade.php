<?php use \App\Http\Controllers\Helper\HelperController; ?>
@if(isset($product))
	<?php $_posttype = $product[0]['nametype']; 
		  $_template = $product[0]['template'];
	?>
@endif
@extends('teamilk.master', compact('rs_latestproduct','rs_menu1','rs_menu2','rs_menu3','rs_logo_footer','product'))
@section('other_styles')
  
@stop
@section('content')
@if(isset($product) and $product[0]['_commit'] > 0)
	@if ($_posttype=='product')
			@include('teamilk.product.show-product')
	@elseif ($_posttype=='post')
			@include('teamilk.product.show-post')
	@elseif ($_posttype=='page')
		@if(isset($_template))
			<?php $template = 'teamilk.product.template.'.$product[0]['template']; ?>
				@if(\View::exists($template))
					@include($template)
				@else
					@include('teamilk.product.page')
				@endif
		@else
			@include('teamilk.product.page')
		@endif
	@elseif ($_posttype == 'video')
		@include('teamilk.product.show-video')
	@else
		@include('teamilk.product.show-post')
	@endif
@else
	@include('teamilk.product.no-post')
@endif

@stop
@section('other_scripts')
   
	
@stop
