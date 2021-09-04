<?php 
//use \App\Http\Controllers\Helper\HelperController;
$title = ''; $url_thumbnail = '';$short_desc ='';  
 $_posttype = 'product'; $_template = ''; $_commit = 0; ?>
@if(isset($product) and $product[0]['_commit'] > 0)
	<?php $_posttype = $product[0]['nametype']; 
		$_template = $product[0]['template']; 
		$_commit = $product[0]['_commit']; 
		$idproduct = $product[0]['idproduct'];  
		//HelperController::update_view($idproduct);
?>
@endif
@if(isset($product))
	<?php $title = $product[0]['namepro']; 
		$url_thumbnail = $product[0]['url_thumbnail'];
		$seo_desc = $product[0]['seo_desc'];
		$author = $product[0]['author'];
		$keyword = $product[0]['keyword'];
	?>		
@endif 
@extends('teamilk.master', ['author' => $author,'title' => $title,'url_thumbnail'=>$url_thumbnail,'seo_desc'=>$seo_desc,'keyword'=>$keyword, 'template'=>$_template ], compact('rs_you_foot','rs_listpostpular','rs_menu1','rs_menu2','rs_menu3'))
@section('other_styles')
  
@stop
@section('content')
<?php
	$curent_idcategory = 0;
	if(isset($cate_selected)){
		$curent_idcategory = $cate_selected[0]['idcategory'];
	}
    function breadcrumb($categories, $curent_idcategory = 0, $char = 0, $depth = 0) {
        $cate_child = array();
        $cate_last =  array();
        foreach ($categories as $key => $item) {
            if($item['idcategory'] == $curent_idcategory) {
            	$cate_child[] = $item;
            	unset($categories[$key]);
            	if( $item['idparent'] > 0) {
	                	$char++;$depth++;
	                	breadcrumb($categories, $item['idparent'], $char, $depth); 
	            }
            }
        }               
        if($cate_child){ 
        	foreach ($cate_child as $key => $item) {
        		//echo '<li><a href="'.url('/').'/listproductbyidcate/'.$item['idcategory'].'">'.$item['namecat'].'</a></li>';
        		echo '<li><a href="'.url('/').'/'.$item['slug'].'">'.$item['namecat'].'</a>';		
        	}
        }       
    } ?>
<div class="td-container td-pb-article-list">
		<div class="td-pb-row">
<!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
	@if($_template != 'home')
		<div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
			<div class="container">
				<div class="c-page-title c-pull-left">
					@if($_commit > 0)
					<h1 class="c-font-uppercase c-font-sbold">{{ $product[0]['namepro'] }}</h1>
					@else
						<h4 class="">Not permit</h4> 
					@endif
				</div>
				@if($_commit > 0)
				<ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
					<?php breadcrumb($rs_cat_product, $curent_idcategory, '',0); ?>
				</ul>
				@endif 
			</div>
		</div>
	@endif
<!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
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
@else
	@include('teamilk.product.show-post')
@endif

<!-- END: CONTENT/SHOPS/SHOP-2-2 -->
 	</div>
</div>
<!-- END: PAGE CONTENT -->

<div class="modal-cart-form">
  <div class="modal-cart">
    <!-- Modal content -->
    <div class="modal-content-cart">
      <span class="close">&times;</span>
      	<form class="frm-cart">
      		<div class="area-process">
      			<a href="javascript:void(0)"><img class="processing" style="display:none;width:100%;" src="{{ asset('dashboard/production/images/spinner.gif') }}"></a>
      		</div>
      		<div class="note" style="display: none;">
	      		<div class="col-sm-12">
			  		<h3>Sản phẩm đã thêm vào giỏ hàng</h3>
			  	</div>
			  	<div class="col-sm-6 text-center">
			  		<a href="{{ url('/') }}" class="btn btn-default btn-cart-continue">Tiếp tục mua hàng</a>
			  	</div>
			  	<div class="col-sm-6 text-center">
			  		<a href="{{ url('/cart/shopcart') }}" class="btn btn-default btn-view-cart">Xem giỏ hàng</a>
			  	</div>
			 </div>
		</form>	  	
    </div>
  </div>
</div>

@stop
@section('other_scripts')
    <!-- BEGIN: PAGE SCRIPTS -->
	<script src="{{ asset('assets-tea/assets/plugins/zoom-master/jquery.zoom.min.js') }}" type="text/javascript"></script>
	<!-- END: PAGE SCRIPTS -->
	<script src="{{ asset('assets-tea/js/custom-product.js?v=1.6.9') }}" type="text/javascript"></script>
@stop
