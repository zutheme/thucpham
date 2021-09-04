<div class="modal-media-form">
  <div class="modal-media">
    <!-- Modal content -->
    <div class="modal-content-media">
      <span class="close">&times;</span>
      	<form class="frm-media">
		  <div class="input-group-media">
			<a href="javascript:void(0);" onclick="performClickByClass(this);"><i class="fa fa-photo"></i>&nbsp;&nbsp;Chọn tập tin&nbsp;&nbsp;</a>
			<input onchange="changefile(event,this);" type="file" style="display: none;" name="file_attach[]" class="file file_attach" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.zip,.rar" />
			<label class="namefile"></label>
            <p><canvas id="my_canvas_media" class="my_canvas" width="500px" height="500px"></canvas></p>
		  </div>
		  <div class="input-group-media area-btn"><a class="btn btn-default btn-insert-picture">Chèn vào bài viết</a></div>
		  <div class="input-group-media">
		  	<p><img class="loading" style="display:none;width:30px;" src="{{ asset('dashboard/production/images/loader.gif') }}"></p>
		  	<span class="result"></span>  	
		  </div>	 
		</form>	  	
    </div>
  </div>
</div>
<div class="modal-cross-form">
  <div class="modal-cross">
    <!-- Modal content -->
    <div class="modal-content-cross">
      <span class="close">&times;</span>
      	<form class="frm-cross form-horizontal form-label-left" method="post" action="{{ action('Admin\PostsController@crossproduct',$idproduct) }}">
      	  {{ csrf_field() }}
		  <div class="cross-product">
		  	  <div class="form-group" style="display: none;">
		  	  	<div class="col-sm-12">
			  	  	<select class="form-control cus-drop" name="cross_sel_idposttype" required >
		                    	<option value="">Chọn kiểu post</option>
		                    	@foreach($posttypes as $row)
		                    		<option value="{{ $row['idposttype'] }}" {{ $row['nametype'] == 'product' ? 'selected="selected"' : '' }}>{{ $row['nametype'] }}</option>
								@endforeach        
		             </select>
		        </div>
		  	  </div>
		  	  <div class="row">
		  	   <div class="form-group">
		            <label class="col-sm-12 lbleft">Tên sản phẩm:</label>
		            <div class="col-sm-12">
		              <input type="text" name="cross_namepro" class="form-control" value="" />
		            </div>
		      </div>
		  	  <div class="form-group">
	            <label class="col-sm-12 lbleft">Mô tả:</label>
	            <div class="col-sm-12">
	              <textarea rows="2" name="cross_description" class="form-control" placeholder=""></textarea>
	            </div>
	          </div>       	  
	      	  <div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình đại diện:</label>
	            <div class="col-md-9 col-sm-9 col-xs-12">
	              <input type="text" name="cross_id_thumbnail" class="form-controls" value="" />
	            </div>
	          </div>
	      	   </div>
	      	   <div class="row">
			  	  {{-- <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá nhập hàng:</label>
		            <div class="col-md-9 col-sm-9 col-xs-12">
		              <input type="hidden" name="price_import" class="form-controls" value="0" />
		            </div>
		          </div>  --}}
	          
		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá bán:</label>
		            <div class="col-md-9 col-sm-9 col-xs-12">
		              <input type="text" name="price" class="form-controls" value="" />
		            </div>
		          </div>
		          {{-- <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12">Số lượng:</label>
		            <div class="col-md-9 col-sm-9 col-xs-12">
		              <input type="hidden" name="amount" class="form-controls" value=""/>
		            </div>
		          </div> --}}
	          	</div>
	          </div>
	          <div class="form-group">
	          	<button type="submit" class="btn btn-primary btn-submit-cross">Xác nhận</button>
	          </div> 
		</form>	  	
    </div>
  </div>
</div>
<div class="modal-cate-form">
  <div class="modal-cate">
    <!-- Modal content -->
    <div class="modal-content-cate">
      <span class="close" onclick="close_cate();">&times;</span>
      	{{-- <form class="frm-cate" method="post" action="{{ action('Admin\ProductsController@makenewcrosstype',$idproduct) }}"> --}}
      	<form class="frm-cate" method="post" action="{{ action('Admin\PostsController@makenewcrosstype',$idproduct) }}">
      		{{ csrf_field() }}
			<div class="form-group row">
			    <label class="col-sm-12 col-form-label" for="sel_idcategory">Chuyên mục chính<span class="text-danger">*</span></label>
			    <div class="col-sm-12">
			        <select class="form-control cus-drop" name="sel_idcat_main_edit" required>
			        	<option value="0">--Tất cả--</option>
			        	@foreach($categories as $row)
			        		 <option value="{{ $row['idcategory'] }}">{{ $row['namecat'] }}</option>
						@endforeach        
			        </select>
			    </div>
			</div>
			<div class="form-group row">
	        	<div class="col-lg-12">
	        		<div class="select_dynamic_edit">
		            	@if(isset($str))
		            		{!! $str !!}
		            	@endif
	            	</div>
	            </div>
	        </div>
	        <div class="form-group row">
	        	<div class="col-lg-12">
	        	<a class="btn btn-primary btn-search" href="javascript:void(0);">Tìm sản phẩm <i class="fa fa-search" aria-hidden="true"></i></a>
	        	<img class="loading" style="display:none;width:100%;height: auto;" src="{{ asset('dashboard/production/images/searching.gif') }}">
	        	</div>
	        </div>
	        <div class="form-group row">
	        	<div class="col-lg-12 result">
	        		<ul class="list-check-result"></ul>
	        	</div>
	        </div>
	        <div class="form-group row">
	        	<label class="control-label col-md-4 col-sm-6 col-xs-12">Giá sale:</label>
			     <div class="col-md-8 col-sm-6 col-xs-12">
	        		<input type="text" name="new_cross_price" required>
	        	</div>
	        </div>
	        <div class="form-group row">
	        	<label class="control-label col-md-4 col-sm-6 col-xs-12" required>Số lượng sale:</label>
			     <div class="col-md-8 col-sm-6 col-xs-12">
	        		<input type="text" name="new_cross_quality_sale">
	        	</div>
	        </div>
	        <div class="form-group row">
	          	  <label class="control-label col-md-4 col-sm-6 col-xs-12" required>Kiểu liên quan:</label>
		          <div class="col-md-8 col-sm-6 col-xs-12">
			          <select class="sel-cross" name="new_id_type_cross" required>
			          	<option value="0">-----</option>
			          	@foreach($sel_cross_type as $option)
			          	<option value="{{ $option['idcrosstype'] }}">{{ $option['namecross']}}</option>
			          	@endforeach
			          </select>
			      </div>	
	        </div>
	         <div class="form-group row">
	         	<div class="col-lg-12">
	        		<a class="btn btn-primary btn-create-new-relative" href="javascript:void(0)">Tạo liên quan mới</a>
	        	</div>
	         </div>
		</form>  	
    </div>
  </div>
</div>