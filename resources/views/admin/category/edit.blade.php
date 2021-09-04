@extends('admin.general')

@section('other_styles')
      <!-- Custom Theme Style -->
    <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/production/css/custom.css?v=0.1.2') }}" rel="stylesheet">
@stop
@section('content')

<?php if(isset($selected)) {
      foreach($selected as $row) {
          $selected_idcat = $row['idcategory'];
			$name_cat =   $row['namecat'] ;
			$selected_idparent = $row['idparent'];
			$name_cat_parent =   $row['parent'];
			$selected_idcattype =  $row['idcattype'];
			$catnametype = $row['catnametype'];
       }
}
$idcattype = Request::segment(5); 
//$idcattype = app('request')->input('idcattype');
?>
<div class="row">
	<div class="col-sm-6">
		<h2>Chỉnh sửa</h2>
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		@if(\Session::has('success'))
			<div class="alert alert-success">
				<p>{{ \Session::get('success') }}</p>
			</div>
		@endif
		<form class="frm_create_category" method="post" action="{{ action('Admin\CategoryController@update',$_idcategory) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PATCH">
			<div class="form-group row">
				<label class="col-lg-4 col-form-label" for="sel_idcattype">Tên chuyên mục <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="namecat" class="form-control" value="{{$categorybyid->namecat}}">
				</div>
			</div>
			<div class="form-group row">
                <label class="col-lg-4 col-form-label" for="sel_idcattype">Kiểu chuyên mục <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control type-category" name="sel_idcattype">
                    	<option value="">Kiểu chuyên mục</option>
                    	@foreach($categorytypes as $row)
                    		<option value="{{ $row['idcattype'] }}" {{ $row['idcattype'] == $idcattype ? 'selected="selected"' : '' }}>{{ $row['catnametype'] }}</option>
						@endforeach        
                    </select>
                </div>
            </div>
			<div class="form-group row">
                <label class="col-lg-4 col-form-label" for="sel_idparent">Chuyên mục <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <select class="form-control catebyidcatetype" name="sel_idparent">
                    	<option value="">Thuộc chuyên mục</option>
                    	@if(isset($parent_cate))
	                    	@foreach($parent_cate as $row)
	                    		 <option value="{{ $row['idcategory'] }}" {{ $row['idcategory'] == $selected_idparent ? 'selected="selected"' : '' }}>{{ $row['namecat'] }}</option>
							@endforeach
						@endif        
                    </select>
                </div>
            </div>
            <div class="form-group row">
            	<label class="col-lg-4 col-form-label" for="sel_idcattype">Route <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="pathroute" class="form-control" value="{{$categorybyid->pathroute}}">
				</div>
			</div>
			<div class="form-group row">
            	<label class="col-lg-4 col-form-label" for="sel_idcattype">URL <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="url" class="form-control" value="{{$categorybyid->url}}">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-lg-4 col-form-label" for="sel_idcattype">ID Group <span class="text-danger">*</span></label>
                <div class="col-lg-8">
					<input type="text" name="idgroup" class="form-control" value="{{$categorybyid->idgroup}}">
				</div>
			</div>
			
            <div class="form-group frm-image thumbnails">
                <p><a href="javascript:void(0)" onclick="performClick('file1');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh đại diện</a>
                <input style="display:none" type="file" name="thumbnail" class="file" id="file1" accept="image/*"/></p>
                <p><canvas id="canvas_thumbnail" width="0px" height="0px"></canvas></p>
			</div>	
			<div class="form-group">
				<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Cập nhật" />
			</div>
		</form>
		
	</div>
</div>

@stop
@section('other_scripts')
	<script>var _url_thumbnail = '{{ asset($categorybyid->url_image) }}';</script>
    <script src="{{ asset('gentelella/build/js/custom.js') }}"></script>
    <script src="{{ asset('dashboard/production/js/uploadmultifile.js?v=0.8.9') }}"></script>
    <script src="{{ asset('dashboard/production/js/process_images/capture_image.js?v=0.3.1') }}"></script>
    <script src="{{ asset('dashboard/production/js/category.js?v=1.2.3')}}"></script>   
@stop
