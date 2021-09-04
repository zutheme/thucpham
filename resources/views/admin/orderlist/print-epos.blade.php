<?php $title ='epos'; 
$user = Auth::user();
$date = Carbon\Carbon::now();
//$dt = $mytime->toDateTimeString();

?>
@extends('admin.general',compact('title'))
@section('other_styles')
	<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Datatables -->
    <link href="{{ asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('gentelella/build/css/epos.css?v=0.4.1') }}" rel="stylesheet">
@stop

@section('content')
<?php if(isset($rs_orderproduct)) {
    $unit_price = 0;
    $subtotal = 0;
  } ?>            
  <div id="invoice-POS">
    
    <div id="top">
	{{--<div class="logo" style="text-align:center;margin-top:0px;"><img width="100px" height="auto" src="{{ asset('images/logo/logo-alyfast.-200.png') }}"/></div>--}}
      <div class="address"> 
        <p style="font-size: 0.7em !important;color: #000;line-height: 1.2em;"> 
            Địa chỉ   : T3.A16.07, Masteri Thảo Điền, Thủ Đức, TP Hồ Chí Minh</br>
            Email     : allysfast@gmail.com</br>
            Điện thoại:0931639913</br>
        </p>
      </div>
    </div>
    
    <center id="mid">
      <div class="info">
        <p style="font-size:0.9em;font-weight:400;">HÓA ĐƠN BÁN HÀNG</p>
        <table>
			<tr class="service">
				<td>
					<tr>
						<td style="font-size:0.7em;font-weight:300;" class="tableitem"><p>Ngày bán: {{ $date->day.'/'.$date->month.'/'.$date->year  }}</p></td>
						<td style="font-size:0.7em;font-weight:300;" class="tableitem"><p>Quầy: 123</p></td>
					<tr>
				</td>
				<td>
					<tr>
						<td style="font-size:0.7em;font-weight:300;" class="tableitem"><p>Hóa đơn: {{ $ordernumber }}</p></td>
						<td style="font-size:0.7em;font-weight:300;" class="tableitem"><p>NVBH: {{ $user->name }}</p></td>
					</tr>
				</td>
			</tr>
		</table>
      </div>
    </center><!--End Invoice Mid-->
    
    <div id="bot">

		<div id="table">
			<table width='100%'>
				<tr class="service" width='100%'>
					<td style="border-bottom:1px dotted #000;font-size:0.7em;font-weight:300;" width='40%' class="tableitem"><p>Mặt hàng</p></td>
					<td style="border-bottom:1px dotted #000;font-size:0.7em;font-weight:300;" width='25%' class="tableitem"><p>Đơn giá</p></td>
					<td style="border-bottom:1px dotted #000;text-align:center;font-size:0.7em;font-weight:300;" width='10%' class="tableitem"><p>SL</p></td>
					<td style="border-bottom:1px dotted #000;font-size:0.7em;font-weight:300;" width='25%' class="tableitem"><p>T.Tiền</p></td>
				</tr>
				@if(isset($rs_orderproduct))
				  @foreach($rs_orderproduct as $row)
						<?php $unitprice_quality = $row['price']*$row['amount'] ; ?>
						<tr class="service" width='100%'>
							<td style="font-size:0.7em;font-weight:300;" width='40%' class="tableitem"><p class="itemtext">{{ $row['namepro'] }}</p></td>
							<td style="font-size:0.7em;font-weight:300;" width='25%' class="tableitem"><p class="itemtext"><span class="currency">{{ $row['price'] }}</span><span class="vnd"></span></p></td>
							<td style="text-align:center;font-size:0.7em;font-weight:300;" width='10%' class="tableitem" style="text-align:center;"><p class="itemtext">{{ $row['amount'] }}</p></td>
							<td style="font-size:0.7em;font-weight:300;" width='25%' class="tableitem"><p class="itemtext"><span class="currency">{{ $unitprice_quality }}</span><span class="vnd"></span></p></td>
						</tr>
					  <?php $subtotal = $subtotal + $unitprice_quality;  ?>
					@endforeach
					<tr id="service" class="service" width='100%'>
						<td style="border-top:1px dotted #000;font-size:0.7em;font-weight:300;" colspan="3">TỔNG TIỀN.TT</td>
						<td style="border-top:1px dotted #000;font-size:0.7em;font-weight:300;" class="tableitem"><p class="itemtext"><span class="currency">{{ $subtotal }}</span><span class="vnd"></span></p></td>
					</tr>
				@endif
			</table>
		</div><!--End Table-->
		<div style="width:100%;text-align:left;font-size:0.7em;font-weight:300;">
			<p class="legal">Thông tin khách hàng</p>
			<div style="text-align:left">
				@foreach($rs_customerorder as $customer)
						@if($customer['cus'] == 1)
						<p>Họ tên: {{ $customer['lastname'] }} {{ $customer['middlename'] }} {{$customer['firstname']}}</p>
						<p>Điện thoại: {{ $customer['mobile'] }}</p>
						<p>Địa chỉ: {{ $customer['address'].','.$customer['nameward'].','.$customer['namedist'].','.$customer['namecitytown'].','.$customer['nameprovince'].','.$customer['namecountry'] }}</p>
						@endif
					  @endforeach  
			</div>
		</div>
		<div id="legalcopy" style="border-top:1px dotted #ddd; text-align:center;font-size:0.7em;font-weight:300;">
			<p class="legal">Cảm ơn quý khách và hẹn gặp lại</p>
		</div>
		<div style="border-top:1px dotted #ddd;font-size:0.7em;font-weight:300;text-align:center;text-align:left;">
			<p>STK: 210915151072036</p>
			<p>NH:  EXIMBANK</p>
			<p>CTK: NGUYEN THI VE</p>
		</div>

	</div><!--End InvoiceBot-->
  </div><!--End Invoice-->

  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
		<p><a onclick="printDiv('invoice-POS')" class="btn btn-default btn-primary" href="javascript:void(0)">IN EPOS</a></p>
  </div>

@stop

@section('other_scripts')
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
    
    <script src="{{ asset('gentelella/build/js/custom-init.js?v=0.1.9.5') }}"></script> 
	 <script src="{{ asset('gentelella/build/js/print.js?v=0.3.9') }}"></script>
@stop