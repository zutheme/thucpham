@extends('admin.general')
@section('other_styles')
     <!-- Custom Theme Style -->
    <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/production/css/custom.css?v=0.1.2') }}" rel="stylesheet">
@stop
<?php $_namecattype = Request::segment(4);
$_namecattype = isset($_namecattype) ? Request::segment(4) : 'product'; ?>
@section('content')
<div class="row">
	<div class="col-sm-6">
		<h2>Thêm mới</h2>
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<form class="frm_create_category" method="post" action="{{ url('admin/category/storeby/'.$_namecattype) }}">
			{{ csrf_field() }}
			<div class="form-group row">
				<label class="col-lg-4 col-form-label" for="parent">Tên chuyên mục <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="namecat" class="form-control" placeholder="Tên chuyên mục">
				</div>
			</div>
			
			<div class="form-group row">
                <label class="col-lg-4 col-form-label" for="sel_idparent">Chuyên mục <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control cus-drop" name="sel_idparent">
                    	<option value="0">Thuộc chuyên mục</option>
                    	@foreach($categories as $row)
                    		 <option value="{{ $row['idcategory'] }}">{{ $row['namecat'] }}</option>
						@endforeach        
                    </select>
                </div>
            </div>
			<div class="form-group row">
                <label class="col-lg-4 col-form-label" for="sel_idcattype">Kiểu chuyên mục <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control cus-drop" name="sel_idcattype">
                    	<option value="">Kiểu chuyên mục</option>
                    	@foreach($categorytypes as $row)
                    		 <option value="{{ $row['idcattype'] }}" {{ $row['catnametype'] == $_namecattype ? 'selected="selected"' : '' }}>{{ $row['catnametype'] }}</option>
						@endforeach        
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="sel_idstoretype">Thuộc kiểu post <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control cus-drop" name="sel_idstoretype">
                    	<option value="0">Kiểu post</option>
                    	@foreach($rs_store as $row)
                    		 <option value="{{ $row['idcattype'] }}" {{ $row['catnametype'] == $_namecattype ? 'selected="selected"' : '' }}>{{ $row['catnametype'] }}</option>
						@endforeach        
                    </select>
                </div>
            </div>
            <div class="form-group row">
				<label class="col-lg-4 col-form-label" for="parent">URL <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="url" class="form-control" placeholder="URL">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-lg-4 col-form-label" for="parent">Route <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="pathroute" class="form-control" placeholder="Route">
				</div>
			</div>
			<div class="form-group frm-image thumbnails">
                    <p><a href="javascript:void(0)" onclick="performClick('file1');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh đại diện</a>
                    <input style="display:none" type="file" name="thumbnail" class="file" id="file1" accept="image/*"/></p>
                    <p><canvas id="my_canvas_id1" width="0px" height="0px"></canvas></p>
                    {{-- <p><input class="data_url" type="hidden" name="file_canvas1" value=""></p> --}}
			</div>
			<div class="form-group row">
				<label class="col-lg-4 col-form-label" for="sel_idcattype">ID Group <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="idgroup" class="form-control" value="">
				</div>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Xác nhận" />
			</div>
			
		</form>
	</div>
</div>
@stop
@section('other_scripts')
    {{-- <script src="{{ asset('dashboard/build/js/custom.min.js') }}"></script> --}}
    <script src="{{ asset('gentelella/build/js/custom.js') }}"></script>
    <script src="{{ asset('dashboard/production/js/custom.js?v=0.0.2') }}"></script>
    <script src="{{ asset('dashboard/production/js/uploadmultifile.js?v=0.8.9') }}"></script>
    <script src="{{ asset('dashboard/production/js/process_images/capture_image.js?v=0.3.1') }}"></script>
@stop