@if(isset($rs_latest_id))
	<?php $latestedid = (int)$rs_latest_id[0]['idproduct'];  
          $latestedid =  'p-'.$latestedid; ?>
@endif
<?php $str_profile = session()->get('profile');
      $sip = 561;
      $profile = json_decode($str_profile, true); 
      if(isset($profile)) {
          foreach($profile as $row) {
              $sip = $row['sip'];
           }
    } ?>
<form class="frm_create_post" method="post" action="{{ action('Admin\PostsController@store',['idparent' => $idparent,'idcrosstype' => $idcrosstype]) }}" enctype="multipart/form-data" style="width: 100%">
	{{ csrf_field() }}
	<div class="col-md-9 col-xs-12">
		<div class="form-group">
			@if(isset($idparent))
				<a class="btn btn-default" href="{{ action('Admin\PostsController@edit',$idparent) }}">&nbsp;<i class="fa fa-angle-double-left"></i>&nbsp;Về sản phẩm chính</a>
                @if(isset($parent_tilte))
				<a class="btn btn-default btn-icon btn-create-new btn-phone" sip = "{{ $sip }}" phone = "{{ $parent_tilte }}" idposttype = "{{ $idcrosstype }}" idparent = "{{ $idparent }}" idcrosstype = "6"  href="javascript:void(0)"><i class="fa fa-phone-square"></i>&nbsp;{{ $parent_tilte }}</a>
                @endif
			@endif
		</div>
		<div class="form-group">
			<input type="hidden" name="title" class="form-control" value="{{ $latestedid }}" required />
		</div>
		<div class="form-group"> 
              <textarea id="editor" name="body"></textarea>
		</div>
		<!--profile-->
		@if(isset($product)) 
			@if(isset($product[0]['idclient'])&& $product[0]['idclient'] > 0)
				@include('admin.post.create-survey-client')
			@else
				@include('admin.post.create-survey-new-client')
			@endif
		@else
			@include('admin.post.create-survey-new-client')
		@endif
        <!--end profile-->
      </div>
	<div class="col-md-3 col-xs-12">
		<div class="form-group row">
            <label class="col-lg-4 col-form-label" for="sel_idposttype">Kiểu post <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <select class="form-control cus-drop" name="sel_idposttype" required >
                	<option value="">Chọn kiểu post</option>
                	@foreach($posttypes as $row)
                		<option value="{{ $row['idposttype'] }}" {{ $row['idposttype'] == $idposttype ? 'selected="selected"' : 3 }}>{{ $row['nametype'] }}</option>
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
                		 <option value="{{ $row['id_status_type'] }}">{{ $row['name_status_type'] }}</option>
					@endforeach        
                </select>
            </div>
        </div>
		<div class="form-group row">
            <label class="col-lg-4 col-form-label" for="sel_idstatustype">Trạng thái xử lý <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <select class="form-control cus-drop" name="sel_statusprocess" required >
                	<option value="">Trạng thái xử lý</option>
                	@foreach($rs_status_process as $row)
                		 <option value="{{ $row['id_status_type'] }}" >{{ $row['name_status_type'] }}</option>
					@endforeach        
                </select>
            </div>
        </div>
		@include('admin.post.edit-survey-tag') 
        <div class="form-group row frm-image thumbnails">
        	<div class="col-lg-12">
                <p><a href="javascript:void(0)" onclick="performClick('file1');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh đại diện</a>
                <input style="display:none" type="file" name="thumbnail" class="file" id="file1" accept="image/*"/></p>
                <p><canvas id="my_canvas_id1" width="0px" height="0px"></canvas></p>
            </div>
    		</div>	
        <div class="form-group row text-right">
        	<div class="col-lg-12">
				<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Xác nhận" />
			</div>
		</div>
	 </div>
	 
</form>
	