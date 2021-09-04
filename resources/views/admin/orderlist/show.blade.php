<?php $title ='order'; ?>
@extends('admin.general',compact('title'))
@section('other_styles')

   <!-- Datatables -->

         <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Datatables -->
    <link href="{{ asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

      <!-- Custom Theme Style -->

      <link href="{{ asset('dashboard/build/css/custom.min.css') }}" rel="stylesheet">

      <link href="{{ asset('dashboard/production/css/custom.css?v=0.4.2') }}" rel="stylesheet">

      <!-- bootstrap-daterangepicker -->

      <link href="{{ asset('dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

      <!-- bootstrap-datetimepicker -->

      <link href="{{ asset('dashboard/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">

@stop

@section('content')
<?php if(isset($rs_orderproduct)) {
    $unit_price = 0;
    $subtotal = 0;
  } ?>
   <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">
                    @if(isset($_idstore))
                      {{ $_idstore }}
                    @endif
                    @if(isset($sel_idstore))
                      {{ $sel_idstore }}
                    @endif
                     @if($message = Session::get('error'))
                          <h2 class="card-subtitle">{{ $message }}</h2>
                     @endif
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        {{-- <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>  --}}      
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">

                      <thead>
                         <tr>
                              <td>Stt</td>
                              <td>Tên sản phẩm</td>   
                              <td>Đơn giá</td>
                              <td>Số Lượng</td>
                              <td>Thành giá</td>         
                           </tr>    
                       </thead>                    
                          <tbody>
							 
							<?php 
							$c_order = count($rs_orderproduct);
							$order = 1; ?>
                            @if(isset($rs_orderproduct))
                              @foreach($rs_orderproduct as $row)
                                    <?php $parentidorder = $row['idorder']; ?>
                                    <tr>                     
                                      <td width="10px" style="text-align: center;">{{ $order }}</td>
                                      <td><a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a></td>
                                      <td style="text-align: right;"><span class="currency">{{ $row['price'] }}</span><span class="vnd"></span></td>
                                      <td style="text-align: right;">{{ $row['amount'] }}</td>
                                      <?php $unitprice_quality = $row['price']*$row['amount'] ; ?>
                                      <td style="text-align: right;"><span class="currency">{{ $unitprice_quality }}</span><span class="vnd"></span></td>
                                         
                                    </tr>
                                  <?php $subtotal = $subtotal + $unitprice_quality; $order++;  ?>
                              @endforeach
                        	@endif
						@if($order > $c_order)
							 <tr>
							  <td></td>
							  <td></td>
							  <td></td>
							  <td style="text-align: left;">Tổng</td>
							  <td style="text-align: right;"><span class="currency">{{ $subtotal }}</span><span class="vnd"></span></td>
							      
						   </tr>
							<tr>
							  <td></td>
							  <td></td>
							  <td></td>
							  <td style="text-align: left;">Phí vận chuyển</td>
							  <td style="text-align: right;"><span class="currency">0000</span><span class="vnd"></span></td>
							      
						   </tr>
							<tr>
							  <td></td>
							  <td></td>
							  <td></td>
							  <td style="text-align: left;">Tổng cộng</td>
							  <td style="text-align: right;"><span class="currency">{{ $subtotal }}</span><span class="vnd"></span></td>
							  
							</tr>
						@endif
						@foreach($rs_customerorder as $customer)
						@if($customer['cus'] == 1)
						<tr><td>Thông tin khách hàng</td><td></td><td></td><td></td><td></td></tr>
						 <tr>
							<td>Họ tên:</td><td>{{ $customer['lastname'] }} {{ $customer['middlename'] }} {{$customer['firstname']}}</td><td></td><td></td><td></td>
						  </tr>
						  <tr>                
							<td>Điện thoại:</td><td>{{ $customer['mobile'] }}</td><td></td><td></td><td></td>
						  </tr>
						  <tr>
							<td>Địa chỉ:</td><td>{{ $customer['address'].','.$customer['nameward'].','.$customer['namedist'].','.$customer['namecitytown'].','.$customer['nameprovince'].','.$customer['namecountry'] }}</td>
							<td></td><td></td><td></td>
						  </tr>
						@endif
						@if($customer['cus'] > 1 and $customer['idrecipent'] > 0)
						<tr><td>Thông tin người nhận</td></tr>
						 <tr>
							<td>Họ tên:</td><td>{{ $customer['lastname'] }} {{ $customer['middlename'] }} {{$customer['firstname']}}</td>
							<td></td><td></td><td></td>
						  </tr>
						  <tr>                
							<td>Điện thoại:</td><td>{{ $customer['mobile'] }}</td>
							<td></td><td></td><td></td>
						  </tr>
						  <tr>
							<td>Địa chỉ:</td><td>{{ $customer['address'].','.$customer['nameward'].','.$customer['namedist'].','.$customer['namecitytown'].','.$customer['nameprovince'].','.$customer['namecountry'] }}</td>
							<td></td><td></td><td></td>
						  </tr>
						@endif
					  @endforeach  	
						</tbody>
                      <tfoot>
                       
                      </tfoot>
					  
                  </table>
				 
          </div>
			 <div class="col-md-12 col-sm-12 col-xs-12 text-center">
				<p><a class="btn btn-default btn-primary" href="{{  url('admin/orderlist/epos/'.$ordernumber.'/'.$_idstore) }}">IN EPOS</a></p>
			 </div>
        </div>
      </div>

</div>



@stop



@section('other_scripts')

   <script type="text/javascript">
      var _start_date_sl = '';
      var _end_date_sl = '';
      var _posttype ='product';
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
    
    <script src="{{ asset('gentelella/build/js/custom-init.js?v=0.2.0.1') }}"></script> 

@stop