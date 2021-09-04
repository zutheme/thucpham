@extends('admin.general')
@section('other_styles')
      <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Datatables -->
    <link href="{{ asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
   {{--  <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet"> --}}
@stop
@section('content')
<?php 
      //$posttype = Request::segment(3);
      $_start_date_sl = session()->get('start_date');
      $_end_date_sl = session()->get('end_date');
      $_idcategory_sl = session()->get('idcategory');
      $_id_post_type_sl = session()->get('id_post_type');
      $_id_status_type_sl = session()->get('id_status_type');
      $_id_store = session()->get('idstore');
      $_namecattype = isset($_namecattype) ? $_namecattype : 'post';
      $id_post_type = isset($id_post_type) ? $id_post_type : 3;
      $posttype = isset($posttype) ? $posttype : 'post';
      $_idcategory = isset($_idcategory_sl) ? $_idcategory_sl : Request::segment(4);
      $_id_post_type = isset($_id_post_type_sl) ? $_id_post_type_sl : Request::segment(5);
      $_id_status_type = isset($_id_status_type_sl) ? $_id_status_type_sl : Request::segment(6);
      //$_sel_receive = $lists['_sel_receive'];
      $_namecattype = $posttype; 
?>
  @if($posttype=='post')
    @include('admin.post.index-post') 
   @elseif($posttype=='product')
    @include('admin.post.index-product')
   @elseif($posttype=='survey')
     @include('admin.post.index-survey')
   @elseif($posttype=='consultant')
     @include('admin.post.index-phone') 
   @elseif($posttype=='phone')
    @include('admin.post.index-custom-phone')
   @elseif($posttype=='sms')
     @include('admin.post.index-phone')
   @elseif($posttype=='email')
     @include('admin.post.index-phone')
   @elseif($posttype=='booking')
     @include('admin.post.index-phone')
    @elseif($posttype=='order')
     @include('admin.post.index-order')
   @elseif($posttype=='tag')
     @include('admin.post.index-tag')
   @elseif($posttype=='custom')
	   @include('admin.post.index-custom-post')
   @else
     @include('admin.post.index-post')
   @endif
@stop

@section('other_scripts')
    <script type="text/javascript">
      var _start_date_sl = '<?php echo $_start_date_sl; ?>';
      var _end_date_sl = '<?php echo $_end_date_sl; ?>';
      var _posttype ='{{ $posttype }}';
    </script>
    <!-- Datatables -->
    <script src="{{ asset('gentelella/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('gentelella/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="{{ asset('gentelella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    
    <script src="{{ asset('gentelella/build/js/custom-init.js?v=0.1.9.4') }}"></script> 
    <script src="{{ asset('gentelella/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
    <script src="{{ asset('dashboard/production/js/filter_select_category.js?v=0.2.8') }}"></script> 
	<script src="{{ asset('public/js/library.js?v=0.4.6') }}"></script>
    <script src="{{ asset('dashboard/production/js/edit_update_category.js?v=0.0.8.9') }}"></script> 
    <script src="{{ asset('dashboard/production/js/interactive/select_category_tag.js?v=0.0.0.7') }}"></script>
      
@stop