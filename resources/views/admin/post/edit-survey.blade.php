<form class="frm_edit_post" method="post" action="{{ action('Admin\PostsController@update',$idproduct) }}" enctype="multipart/form-data" style="width:100%">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="PATCH">
	<input type="hidden" name="idimp" value="{{ $product[0]['idimp'] }}">
	<div class="col-md-9 col-xs-12">
	<div class="form-group">
		<input type="hidden" name="title" class="form-control"  value="{{ $product[0]['namepro'] }}" />
		<div class="col-md-12">
			@if(\Session::has('success'))
			<div class="alert alert-success">
				<p>{{ \Session::get('success') }}</p>
			</div>
		@endif
			<input type="text" name="phone" class="form-control"  value="{{ $product[0]['phone'] }}" disabled />
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
      	<div class="col-md-12 text-left">
			 <span class="interactive">
			    <ul class="icon">
			      @foreach($sel_cross_type as $row)
			      	<li><a href="{{ action('Admin\PostsController@create',['idposttype' => $row['idposttype'], 'idparent' => $idproduct,'idcrosstype' => 6]) }}" class="btn btn-default btn-create-new">{!! $row['icon'] !!}&nbsp;{{ $row['nametype'] }}</a></li>
				  @endforeach 
			    </ul>
			  </span>
		</div>	
	</div>
	<div class="form-group">
      	<div class="col-md-12">
      		{{-- <div class="ln_solid"></div> --}}
      		@include('admin.post.timeline')
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
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="sel_idstatustype">Kho dữ liệu  <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <select class="form-control cus-drop" name="sel_id_store" required >
                	<option value="">Chuyển kho dữ liệu</option>
                	@foreach($rs_store as $row)
                		 <option value="{{ $row['idcategory'] }}" {{ $row['idcategory'] == $product[0]['idstore'] ? 'selected="selected"' : '' }}>{{ $row['namecat'] }}</option>
					@endforeach        
                </select>
            </div>
        </div>
        <!--profile-->
        @include('admin.post.edit-survey-client')
		<!--end profile-->
		@include('admin.post.edit-survey-tag')
        <div class="form-group text-right">
			<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Xác nhận" />
		</div>
	 </div> 
</form>
