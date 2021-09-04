	<?php 
	$_idposttype = app('request')->input('idposttype');
	$_idparent = app('request')->input('idparent'); 
	$_idcrosstype = app('request')->input('idcrosstype');
	echo $_idposttype.', '.$_idparent.', '.$_idcrosstype. ', '.$idproduct."<br>";
	//echo $idposttype.', '.$idparent.', '.$idcrosstype. ', '.$idproduct."<br>";
	?>
	<div class="row">
	<div class="col-md-12 col-xs-12">
		{{-- <h2>Chỉnh sửa</h2> --}}
		@if(\Session::has('errors'))
			<div class="alert alert-success">
				{{ $errors }}
			</div>
		@endif
		@if(\Session::has('getlist'))
			<div class="alert alert-success">
				<p>{!! \Session::get('getlist') !!}</p>
			</div>
		@endif
	</div>
</div>
<form class="frm_edit_post" method="post" action="{{ action('Admin\PostsController@update', [$idproduct,'idposttype'=>$_idposttype,'idparent'=>$_idparent,'idcrosstype'=>$_idcrosstype]) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="PATCH">
	<input type="hidden" name="idimp" value="{{ $product[0]['idimp'] }}">
	
	<div class="col-md-9 col-xs-12">
	<div class="form-group">
		<div class="col-md-12"><label>Nội dung cuộc gọi</label></div>
	</div>
	
	<div class="form-group">
		<div class="col-md-12">
			<input type="hidden" name="title" class="form-control"  value="{{ $product[0]['namepro'] }}" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<input type="hidden" name="slug" class="form-control" value="{{ $product[0]['slug'] }}" >
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
        	<textarea id="editor" name="body">{{ $product[0]['description'] }}</textarea>
        </div>
	</div>
	<div class="form-group">
		<div class="ln_solid"></div>
      	
      	<div class="col-md-12">
          	<div class="cross-product">
	         	@foreach($sel_cross_byidproduct as $row)	         		  
	     			<?php var_dump($row); ?>
			  	@endforeach
			</div>
		</div>
	</div>
     
	</div>
	<div class="col-md-3 col-xs-12">
		<div class="form-group row">
            <label class="col-lg-4 col-form-label" for="sel_idposttype">Kiểu post <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <select class="form-control cus-drop" name="sel_idposttype" required >
                	<option value="">Chọn kiểu post</option>
                	@foreach($posttypes as $row)
                		<option value="{{ $row['idposttype'] }}" {{ $row['idposttype'] == $_id_post_type ? 'selected="selected"' : '' }}>{{ $row['nametype'] }}</option>
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
                		 <option value="{{ $row['id_status_type'] }}" {{ $row['id_status_type'] == $product[0]['id_status_type'] ? 'selected="selected"' : '' }}>{{ $row['name_status_type'] }}</option>
					@endforeach        
                </select>
            </div>
        </div>

        <script>var _url_thumbnail = '{{ asset($product[0]['url_thumbnail']) }}';</script>
        {{-- <div class="form-group frm-image thumbnails">
            <p><a href="javascript:void(0)" onclick="performClick('file1');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh đại diện</a>
            <input style="display:none" type="file" name="thumbnail" class="file" id="file1" accept="image/*"/></p>
            <p><canvas id="canvas_thumbnail" width="0px" height="0px"></canvas></p>
		</div> --}}	
        <div class="form-group text-right">
			<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Xác nhận" />
		</div>
	 </div> 
</form>
