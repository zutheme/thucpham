@extends('admin.general')
@section('other_styles')
 

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
<script type="text/javascript">

  var _start_date_sl = '<?php echo $_start_date_sl; ?>';

  var _end_date_sl = '<?php echo $_end_date_sl; ?>';

</script>
@include('admin.report.chart')
  
@stop

@section('other_scripts')
    <script src="{{ asset('gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('gentelella/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('gentelella/vendors/gauge.js/dist/gauge.min.js') }}"></script>

    <!-- iCheck -->
    <script src="{{ asset('gentelella/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('gentelella/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('gentelella/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('gentelella/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('gentelella/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('gentelella/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('gentelella/build/js/custom.min.js') }}"></script> 
@stop