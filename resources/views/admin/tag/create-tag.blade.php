<form class="frm_create_post" method="post" action="{{ action('Admin\TagController@store') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-9 col-xs-12">
				<div class="control-group row">
					<label class="control-label col-md-12 col-sm-12 ">Thẻ tag</label>
					<div class="col-md-12 col-sm-12 ">
						<input id="tags_1" type="text" name="tag" class="tags form-control" value="" />
						<div id="suggestions-container" style="position: relative; float: left; width: 500px; margin: 10px;"></div>
					</div>
				</div>
		        
	          </div>
			<div class="col-md-3 col-xs-12">
				<div class="form-group row">
	                <label class="col-lg-4 col-form-label" for="sel_idposttype">Kiểu post <span class="text-danger">*</span></label>
	                <div class="col-lg-8">
	                   {{--  <select class="form-control cus-drop" name="sel_idposttype" required >
	                    	<option value="">Chọn kiểu post</option>
	                    	@foreach($posttypes as $row)
	                    		<option value="{{ $row['idposttype'] }}" {{ $row['idposttype'] == $idposttype ? 'selected="selected"' : 3 }}>{{ $row['nametype'] }}</option>
							@endforeach        
	                    </select> --}}
	                </div>
	            </div>
	            <div class="form-group row">
	                <label class="col-lg-4 col-form-label" for="sel_idstatustype">Trạng thái <span class="text-danger">*</span></label>
	                <div class="col-lg-8">
	                    <select class="form-control cus-drop" name="sel_idstatustype" required >
	                    	<option value="">Chọn trạng thái</option>
	                    	@foreach($statustypes as $row)
	                    		 <option value="{{ $row['id_status_type'] }}">{{ $row['name_status_type'] }}</option>
							@endforeach        
	                    </select>
	                </div>
	            </div>
				<div class="form-group row">
	                <label class="col-lg-12 col-form-label" for="sel_idcategory">Chuyên mục chính<span class="text-danger">*</span></label>
	                <div class="col-lg-12">
	                    <select class="form-control cus-drop" name="sel_idcat_main" required>
	                    	<option value="0">--Tất cả--</option>
	                    	@foreach($categories as $row)
	                    		 <option value="{{ $row['idcategory'] }}">{{ $row['namecat'] }}</option>
							@endforeach        
	                    </select>
	                </div>
	            </div>
	            <div class="form-group row">
	            	<div class="col-lg-12">
	            		<div class="select_dynamic">
			            	@if(isset($str))
			            		{!! $str !!}
			            	@endif
		            	</div>
		            </div>
	            </div>
	            
	           
	            <div class="form-group text-right">
					<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Xác nhận" />
				</div>
			 </div>
			 
		</form>
	