<h2>Chỉnh sửa</h2>
<form class="frm_edit_post" method="post" action="{{ action('Admin\PostsController@update',$idproduct) }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PATCH">
		<input type="hidden" name="idimp" value="{{ $product[0]['idimp'] }}">
		<div class="col-md-9 col-xs-12">
		<div class="form-group">
			<input type="text" name="title" class="form-control" placeholder="Chủ đề" required value="{{ $product[0]['namepro'] }}" />
		</div>
		<div class="form-group">
			<input type="text" name="slug" class="form-control" placeholder="Slug" value="{{ $product[0]['slug'] }}">
		</div>
		<div class="form-group">
          <div class="x_panel">         
            <div class="x_content">
              <div id="alerts"></div>
               <input type="hidden" name="render" value="{{ $product[0]['description'] }}" />         
               <textarea id="editor" name="body">{{ $product[0]['description'] }}</textarea>
            </div>
          </div>
		</div>
		 
          <div class="form-group short_desc">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả vắn tắt</label>
            <div class="col-md-12">
              <textarea id="shorteditor" name="short_desc" class="form-control" rows="3" cols="50" placeholder="Mô tả vắn tắt">{{ $product[0]['short_desc'] }}</textarea>
            </div>
          </div>
        <div class="ln_solid"></div>
		<div class="form-group"> 
			<div class="col-lg-12">
				@if(isset($gallery)) 
					<script>
				    var item ='';
				    var list_gallery = [];
					</script> 
					<ul class="multi-file">
						@foreach($gallery as $row)
						<li class="item{{ $row['idfile'] }}">
							<input class="producthasfile" type="hidden" name="edit-gallery[]" value="0">	
				     		<a href="javascript:void(0);" onclick="performClickByClass(this);">Chỉnh sửa&nbsp;&nbsp;<i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp;&nbsp;</a>
							<input onchange="editfile(event,this,'{{ $row['idproducthasfile'] }}');" type="file" style="display: none;" name="file_attach[]" class="file file_attach" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.zip,.rar" />
							<label class="namefile"></label>
		                    <p><canvas class="my_canvas gallery" width="0px" height="0px"></canvas></p>
		                    <script> 
		                    	var item = '{{ asset($row['urlfile']) }}';
		                    	if(item) {
		                    		list_gallery.push(item); 
		                    	}
		                    </script>
		                    <p><a href="javascript:void(0);" class="btn bnt-default btn-trash" style="display: block;" onclick="trash_item('item{{ $row['idfile'] }}','{{ $row['idproducthasfile'] }}');"><i class="fa fa-trash" aria-hidden="true"></i></a></p>
		                    <p><img class="loading-trash" style="display:none;width:30px;" src="{{ asset('dashboard/production/images/loader.gif') }}"></p>
						</li>
						 @endforeach
					</ul>
				@endif
				<p><input type="button" style="display: block" class="btn btn-default btn-more-file" name="btn-more-file" value="Thêm file" /></p>
				 <div class="ln_solid"></div>
			</div>
		</div>
			<div class="ln_solid"></div>
	        <label class="control-label col-md-3 col-sm-3 col-xs-12">Link:</label>
	        <div class="col-md-9 col-sm-9 col-xs-12">
	          <input type="text" name="link" class="form-control" value="{{ $product[0]['link'] }}" />
	        </div>
        	<div class="form-group">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Feature:</label>
	            <div class="col-md-9 col-sm-9 col-xs-12">
	              <input type="number" name="feature" class="form-controls" value="{{ $product[0]['feature'] }}" />
	            </div>
	          </div>
	          
          <!--product relative with another product-->
           @foreach($rs_sel_impbyidpro as $item)
           <?php $class = ($item['idimp']==$idimpcross) ? "fade-row":"visable-row"; ?>
           		<div class="ln_solid"></div>
            	<div class="row <?php echo $class; ?>">
				 <div class="col-sm-6 col-xs-6">	
			   	  <input type="hidden" name="l_cross_idimp[]" value="{{ $item['idimp'] }}">
			   	  <input class="cross_id_status_type" type="hidden" name="l_cross_id_status_type[]" value="{{ $item['id_status_type'] }}"> 
		          <div class="form-group">
		          	  <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá theo:</label>
			          <div class="col-md-9 col-sm-9 col-xs-12">
				          <select name="l_cross_selidtype[]">
				          	<option value="0">-----</option>
				          	@foreach($sel_cross_type as $option)
				          	<option value="{{ $option['idcrosstype'] }}" {{ $option['idcrosstype'] == $item['idcrosstype'] ? 'selected="selected"' : '' }}>{{ $option['namecross']}}</option>
				          	@endforeach
				          </select>
				      </div>
		      	  </div>
	             <div class="form-group">
			          	<a class="remove-product-belong" href="javascript:void(0)" onclick="remove(this)"><i class="fa fa-trash"></i>&nbsp;Xóa</a>
			      	  </div>
		      	</div>
		          @if($item['idparentcross'] > 0 && $item['idparentcross'] != $idproduct)
		           <div class="col-sm-6 col-xs-6">
		          	<div class="form-group">         	
		          	<figure>
					  <img class="thumb" src="{{ asset($item['urlfile']) }}" alt="" style="width:100%">
					  <figcaption><a href="{{ action('Admin\PostsController@edit',$item['idparentcross']) }}" class="name-product">{{ $item['namepro'] }}</a>
					  	{{-- <p>{{ $item['short_desc'] }}</p> --}}
					  </figcaption>
					</figure>
	          		
	      	  		</div>
	      	  		</div>	      	  		
	      	  		@endif 
              </div>

          @endforeach
          <!--end another product -->
          	<!--extend atribute-->
          <div class="ln_solid"></div>
          	<h5 class="tip">Sản phẩm liên quan</h5>
          	<div class="cross-product">
	         @foreach($sel_cross_byidproduct as $row)	         		  
	          <div class="row">
	          	<div class="col-sm-9">
	          		<div class="form-group">
	          			<label>{{ $row['namepro'] }}</label>
	          		</div>
	          		<input type="hidden" name="l_cross_idimp[]" value="{{ $row['idimp'] }}">
  					<input class="cross_id_status_type" type="hidden" name="l_cross_id_status_type[]" value="{{ $row['id_status_type'] }}"> 
		          	<div class="form-group">
		          	  <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá theo:</label>
			          <div class="col-md-9 col-sm-9 col-xs-12">
				          <select name="l_cross_selidtype[]">
				          	<option value="0">-----</option>
				          	@foreach($sel_cross_type as $option)
				          	<option value="{{ $option['idcrosstype'] }}" {{ $option['idcrosstype'] == $row['idcrosstype'] ? 'selected="selected"' : '' }}>{{ $option['namecross']}}</option>
				          	@endforeach
				          </select>
				      </div>
		      	  	</div>	       		
	                 <div class="form-group">
			            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá sale:</label>
			            <div class="col-md-9 col-sm-9 col-xs-12">
			              <input type="text" name="l_cross_price[]" class="form-controls" value="{{ $row['price'] }}" />
			            </div>
			          </div>
			          <div class="form-group">
			            <label class="control-label col-md-3 col-sm-3 col-xs-12">Số lượng sale:</label>
			            <div class="col-md-9 col-sm-9 col-xs-12">
			              <input type="text" name="l_cross_quality_sale[]" class="form-controls" value="{{ $row['quality_sale'] }}" />
			            </div>
			          </div>
			      	  <div class="row">
			      	  	<a class="btn btn-default btn-apply-date" href="javascript:void(0);" onclick="showdate(this);">Áp dụng ngày</a>
		          		<div class="apply-date" style="display:none">
				              <div class="col-md-6 col-sm-6 col-xs-12">
				              	<div class="form-group">
				              	   <label class="control-label col-md-4 col-sm-3 col-xs-12">Từ ngày:</label>
			                       <div class="col-md-8 col-sm-9 col-xs-12 input-group sel-control myDatepicker1">
			                            <input type="text" class="form-control _start_date" name="l_cross_start_date[]" value="{{ $row['fromdate'] }}">
			                            <span class="input-group-addon">
			                               <span class="glyphicon glyphicon-calendar"></span>
			                            </span>
			                        </div>
			                    </div>
				              </div>
				              <div class="col-md-6 col-sm-6 col-xs-12">
				              	<div class="form-group">
				              	 <label class="control-label col-md-4 col-sm-3 col-xs-12">Đến ngày:</label>
			                      <div class="col-md-8 col-sm-9 col-xs-12 input-group sel-control myDatepicker2">
			                        <input type="text" class="form-control _end_date" name="l_cross_end_date[]" value="{{ $row['todate'] }}">
			                        <span class="input-group-addon">
			                           <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
			                        </div>
			                    </div>
				              </div>
				            </div>
			           </div>
			           <div class="form-group">
			          	<a href="{{ action('Admin\ProductsController@edit',[$row['idproduct'],'idimpcross' => $row['idimp']]) }}" class="info-number">Chỉnh sửa <i class="fa fa-pencil-square"></i></a>&nbsp;&nbsp;<a class="remove-product-belong" href="javascript:void(0)" onclick="remove(this)"><i class="fa fa-trash"></i>&nbsp;Xóa</a>
			      	  </div>
			    </div>
			    <div class="col-sm-3 text-center">
			    	<?php $thumbnail = $row['urlfile']; 
			    	if(!$thumbnail) { $thumbnail = $no_thumbnail; } ?>
			    	<a href="{{ action('Admin\ProductsController@edit',$row['idproduct']) }}"><img class="thumb-cross" src="{{ asset($thumbnail) }}" /></a>
			    </div>
			</div>
			<div class="ln_solid"></div>		
			  @endforeach
			</div>
			<a class="btn btn-primary edit-product-belong" href="javascript:void(0)" onclick="cate_products(this);"><i class="fa fa-edit"></i>&nbsp;Tạo mới quan hệ với sp khác</a>&nbsp;
			<span class="dropup">
			    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Tạo sp mới quan hệ với sp hiện tại
			    <span class="caret"></span></button>
			    <ul class="dropdown-menu">
			      @foreach($sel_cross_type as $row)
                		<li><a href="{{ action('Admin\ProductsController@create',['idparent' => $idproduct,'idcrosstype' => $row['idcrosstype']] ) }}" class="btn btn-default btn-create-new">{{ $row['namecross'] }}</a></li>
					@endforeach 
			    </ul>
			  </span>
			 
			
		</div>
		<div class="col-md-3 col-xs-12">
			<div class="form-group row">
                <label class="col-lg-4 col-form-label" for="sel_idposttype">Kiểu post <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control cus-drop" name="sel_idposttype" required >
                    	<option value="">Chọn kiểu post</option>
                    	@foreach($posttypes as $row)
                    		<option value="{{ $row['idposttype'] }}" {{ $row['idposttype'] == $idposttype ? 'selected="selected"' : '' }}>{{ $row['nametype'] }}</option>
						@endforeach        
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="sel_idstatustype">Trạng thái <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control cus-drop" name="sel_idstatustype" required >
                    	<option value="">Chọn trạng thái</option>
                    	@foreach($statustypes as $row)
                    		 <option value="{{ $row['id_status_type'] }}" {{ $row['id_status_type'] == $product[0]['idstatus_type'] ? 'selected="selected"' : '' }}>{{ $row['name_status_type'] }}</option>
						@endforeach        
                    </select>
                </div>
            </div>
			@include('admin.post.create-survey-category')
            <script>var _url_thumbnail = '{{ asset($product[0]['url_thumbnail']) }}';</script>
            <div class="form-group frm-image thumbnails">
                <p><a href="javascript:void(0)" onclick="performClick('file1');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh đại diện</a>
                <input style="display:none" type="file" name="thumbnail" class="file" id="file1" accept="image/*"/></p>
                <p><canvas id="canvas_thumbnail" width="0px" height="0px"></canvas></p>
			</div>	
            <div class="form-group text-right">
				<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Xác nhận" />
			</div>
		 </div> 
	</form>
	@include('admin.post.popup-relative')