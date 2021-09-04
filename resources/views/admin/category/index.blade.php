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
@stop
<?php 
$_namecattype = Request::segment(3);
$_namecattype = isset($_namecattype) ? Request::segment(3) : 'product'; ?>
<script type="text/javascript">
	var namecat = '{{ $_namecattype }}';
</script>
@section('content')
   <div class="row">
	<div class="col-sm-9">
	<div class="card">
	    <div class="card-body">
	        <h4 class="card-title">Chuyên mục</h4>
	        @if(isset($_namecattype))
	        	<h6 class="card-subtitle">{{ $_namecattype }}</h6>
			@endif
			<div align="right">
				<a class="btn btn-default btn-primary" href="{{ url('/admin/category/createby/'.$_namecattype)}}">Thêm mới</a>
			</div>
	       {{--  <div class="table-responsive m-t-40"> --}}
	            {{-- <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%"> --}}
	        <div class="x_content">
	            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> 
	                <thead>
	                    <tr>
	                    	<th>-</th>
	                        <th>Tên chuyên mục</th>
							<th>Thuộc</th>
							<th>Kiểu chuyên mục</th>
							<th>slug</th>
							<th>URL</th>
							<th>image</th>
							<th>idgroup</th>
							<th>storetype</th>
							<th>-</th>
	                    </tr>
	                </thead>
	                <tfoot>
	                    <tr>
	                    	<th>-</th>
	                        <th>Tên chuyên mục</th>
							<th>Thuộc</th>
							<th>Kiểu chuyên mục</th>
							<th>slug</th>
							<th>URL</th>
							<th>image</th>
							<th>idgroup</th>
							<th>storetype</th>		
							<th>-</th>
	                    </tr>
	                </tfoot>
	                <tbody>
	                @if(isset($categories))
	                	@foreach($categories as $row)
							<tr>
								<td><a href="{{ action('Admin\CategoryController@editbycatetype',[$row['idcategory'],$row['idcattype'] ] ) }}" class="btn btn-default btn-create-new"><i class="fa fa-edit"></i></a></td>
								<td>{{ $row['namecat'] }}</td>
								<td>{{ $row['parent'] }}</td>
								<td>{{ $row['catnametype'] }}</td>
								<td>{{ $row['slug'] }}</td>
								<td>{{ $row['url'] }}</td>
								<td>{{ $row['url_image'] }}</td>
								<td>{{ $row['idgroup'] }}</td>
								<td>{{ $row['storetype'] }}</td>					
								<td class="btn-control">
								     <form method="post" class="delete_form" action="{{action('Admin\CategoryController@destroy', $row['idcategory'])}}">
								      {{csrf_field()}}
								      <input type="hidden" name="_method" value="DELETE" />
								      <button type="submit" class="btn btn-danger btn-delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
								     </form>
								</td>
							</tr>
							@endforeach
					@endif                
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
	</div>
	<div class="col-sm-3">
		<div class="card">
		    <div class="card-body">
		    	<div class="list-cate">
	               	<div class="form-group row">
		                <label class="col-lg-12 col-form-label" for="sel_idcategory">Chuyên mục chính<span class="text-danger">*</span></label>
		                <div class="col-lg-12">
		                    <select class="form-control cus-drop" name="sel_idcat_main" required>
		                    	<option value="0">--Tất cả--</option>
		                    	@foreach($parent_cate as $row)
		                    		 <option value="{{ $row['idcategory'] }}">{{ $row['namecat'] }}</option>
								@endforeach        
		                    </select>
		                </div>
		            </div>
		            <div class="form-group row">
		            	<div class="col-lg-12">
		            		<div class="select_dynamic">
				            	@if(isset($str))
				            		{!! $str !!}
				            	@endif
			            	</div>
			            </div>
		            </div>
            	</div> 
		    </div>
		</div>
	</div>
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
    <script src="{{ asset('gentelella/build/js/custom-build.js?v=0.1.3') }}"></script> 
    {{-- <script src="{{ asset('gentelella/production/js/custom.js?v=0.0.2') }}"></script> --}}
    <script src="{{ asset('gentelella/production/js/muti_select_category.js?v=0.0.6') }}"></script>
@stop