@extends('admin.general')

@section('other_styles')
     <!-- Custom Theme Style -->
    <link href="{{ asset('dashboard/production/css/custom.css?v=0.8.5') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    <style>
		.ck-editor__editable_inline {
		    min-height: 100px;
		    margin-bottom: 15px;
	}
	</style>  
@stop
@section('content')
<?php 	$idimpcross = app('request')->input('idimpcross'); 
		$no_thumbnail = 'dashboard/production/images/no_photo.jpg';
		//$idposttype = Request::segment(6);
		$idposttype = isset($_id_post_type) ? $_id_post_type : 3;
		$_posttype = isset($_posttype) ? $_posttype : 'post';
		?>
<div class="row">
	@if(isset($_posttype) && $_posttype == 'product' || $idposttype == 10)
		@include('admin.post.edit-product')
	@elseif($_posttype == 'post')
		@include('admin.post.edit-post')
	@elseif($_posttype == 'survey')
		@include('admin.post.edit-survey')
	@elseif($_posttype == 'phone')
		@include('admin.post.edit-phone')
	@elseif($_posttype == 'sms')
		@include('admin.post.edit-phone')
	@elseif($_posttype == 'email')
		@include('admin.post.edit-phone')
	@elseif($_posttype == 'booking')
		@include('admin.post.edit-phone')
	@elseif($_posttype == 'consultant')
		@include('admin.post.edit-phone')
	@elseif($_posttype == 'order')
		@include('admin.post.edit-order')
	@else
		@include('admin.post.edit-another-type')
	@endif
</div>

@stop
@section('other_scripts')
 	<script>
 		 var _start_date_sl = '';
  		var _end_date_sl = '';
		var _idproduct = '{{ $idproduct }}';
		var _posttype = '{{ $_posttype }}';
	</script>
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
	<script src="{{ asset('editor-build/ckeditor-interactive/js/classic-editor5.js?v=0.1.0') }}"></script>
	<!-- jQuery Tags Input -->
	<script src="{{ asset('gentelella/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
	<script src="{{ asset('public/js/library.js?v=0.4.6') }}"></script>
	<script src="{{ asset('dashboard/production/js/uploadmultifile.js?v=0.8.9') }}"></script>
    <script src="{{ asset('dashboard/production/js/media-galerry.js?v=0.7.9') }}"></script>

    <script src="{{ asset('dashboard/production/js/filter_create_category.js?v=0.2.7') }}"></script> 
	<script src="{{ asset('public/js/library.js?v=0.4.6') }}"></script>
    <script src="{{ asset('dashboard/production/js/edit_update_category.js?v=0.0.8.7') }}"></script> 
    <script src="{{ asset('dashboard/production/js/interactive/select_category_tag.js?v=0.0.0.7') }}"></script>
	
@stop