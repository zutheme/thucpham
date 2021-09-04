<div class="modal-cart-form">
  <div class="modal-cart">
    <!-- Modal content -->
    <div class="modal-content-cart">
      <span class="close">&times;</span>
      	<form class="frm-cart">
      		<div class="area-process">
      		<a href="javascript:void(0)"><img class="processing" style="display:none;width:100%;" src="{{ asset('dashboard/production/images/spinner.gif') }}"></a></div>
      		<div class="note" style="display: none;">
	      		<div class="col-sm-12">
			  		<h3>Sản phẩm đã thêm vào giỏ hàng</h3>
			  	</div>
				<div class="row">
					<div class="col-sm-6 text-center">
						<a href="{{ url('/') }}" class="btn btn-default btn-cart-continue">Tiếp tục mua hàng</a>
					</div>
					<div class="col-sm-6 text-center">
						<a href="{{ url('/cart/shopcart') }}" class="btn btn-default btn-view-cart">Xem giỏ hàng</a>
					</div>
				</div>
			 </div>
		</form>	  	
    </div>
  </div>
</div>