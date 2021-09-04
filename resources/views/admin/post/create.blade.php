@extends('admin.general')

@section('other_styles')
   <!-- Custom Theme Style -->
    <link href="{{ asset('dashboard/production/css/custom.css?v=0.9.4') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    
    <style>
		.ck-editor__editable_inline {
		    min-height: 100px;
		    width: 100%;
	}
	</style> 
@stop
@section('content')
<div class="row">
	<div class="col-md-12 col-xs-12">
		<?php 
			$idposttype = app('request')->input('idposttype');
			$idparent = app('request')->input('idparent'); 
			$idcrosstype = app('request')->input('idcrosstype'); 
			if(!isset($idposttype)){
				$idposttype = $_idposttype;
			}
		?>	
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
	</div>
</div>

<div class="row">
	@if($idposttype == 10)
		@include('admin.post.create-product')
	@elseif($idposttype == 3)
		@include('admin.post.create-post')
	@elseif($idposttype == 22)
		@include('admin.post.create-survey')
	@elseif($idposttype == 4)
		@include('admin.post.create-phone')
	@elseif($idposttype == 5)
		@include('admin.post.create-phone')
	@elseif($idposttype == 6)
		@include('admin.post.create-phone')
	@elseif($idposttype == 7)
		@include('admin.post.create-phone')
	@elseif($idposttype == 26)
		@include('admin.post.create-tag')
	@elseif($idposttype == 28)
		@include('admin.post.create-order')
	@else
		@include('admin.post.create-another-type')
	@endif
</div>
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
            <p><canvas id="my_canvas_media" class="my_canvas" width="0px" height="0px"></canvas></p>
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

@stop
@section('other_scripts')
	<script> var _idproduct = 0;
		var _url_thumbnail='';</script>
	@if(isset($_namecattype))
		<script>
			var _posttype = '{{ $_namecattype }}';
		</script>
	@else
		<script>
			var _posttype = 'post';
		</script>
	@endif
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>  --}}
	<script src="{{ asset('gentelella/vendors/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap-datetimepicker -->    
    
	
	 <!-- Bootstrap -->
   {{--  <script src="{{ asset('gentelella/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>  --}}
    
    <!-- morris.js -->
    <script src="{{ asset('gentelella/vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/morris.js/morris.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('gentelella/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('gentelella/build/js/custom.min.js') }}"></script>

    <script src="{{ asset('dashboard/production/js/process_images/capture_image.js?v=0.3.1') }}"></script>
  	{{-- <script src="{{ asset('dashboard/production/editor/editor.js?v=0.0.1') }}"></script> --}}
  	{{-- <script src="{{ asset('dashboard/production/js/edit_post.js?v=0.1.1') }}"></script> --}}
  	{{-- <script src="{{ asset('dashboard/production/js/edit_muti_select.js?v=0.1.9') }}"></script> --}}
  		
  	{{-- <script src="{{ asset('dashboard/production/js/process_images/image_product.js.js?v=0.0.2') }}"></script> --}}
  	
    {{--  <script src="{{ asset('dashboard/production/js/cross_product.js?v=0.0.5') }}"></script> --}}
    <script> var _ckeditor_route_upload = '{{ route('ckeditor.upload') }}';</script>;
	<script src="{{ asset('editor-build/build/ckeditor.js') }}"></script>
	<script src="{{ asset('editor-build/ckeditor-interactive/js/classic-editor5.js?v=0.0.9') }}"></script>
	<script src="{{ asset('gentelella/production/js/library.js?v=0.4.8') }}"></script>
	<!-- jQuery Tags Input -->
	<script src="{{ asset('gentelella/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
	<script src="{{ asset('dashboard/production/js/uploadmultifile.js?v=0.8.9') }}"></script>
	<script src="{{ asset('dashboard/production/js/media-galerry.js?v=0.7.9') }}"></script>
	<script src="{{ asset('dashboard/production/js/filter_create_category.js?v=0.2.7') }}"></script> 
	<script src="{{ asset('public/js/library.js?v=0.4.6') }}"></script>
    <script src="{{ asset('dashboard/production/js/edit_update_category.js?v=0.0.8.7') }}"></script> 
    <script src="{{ asset('dashboard/production/js/interactive/select_category_tag.js?v=0.0.0.7') }}"></script>
     
@stop