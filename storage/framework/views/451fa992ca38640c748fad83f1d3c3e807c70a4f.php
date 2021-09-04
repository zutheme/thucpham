

<?php $__env->startSection('other_styles'); ?>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Datatables -->
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')); ?>" rel="stylesheet">

      <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.3.7')); ?>" rel="stylesheet">

      <!-- bootstrap-daterangepicker -->

      <link href="<?php echo e(asset('dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet">

      <!-- bootstrap-datetimepicker -->

      <link href="<?php echo e(asset('dashboard/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



  <?php 
      //$list_selected = json_decode($list_selected, true); 
       //session()->forget('order_start_date');
        //session()->forget('order_end_date');
      $_start_date_sl = session()->get('order_start_date');
      $_end_date_sl = session()->get('order_end_date');
     // $_idcategory_sl = session()->get('idcategory');
      //$_id_post_type_sl = session()->get('id_post_type');
      $_id_status_type_sl = session()->get('order_id_status_type');
      $_id_store = Request::segment(3);

      $_idcategory = isset($_idcategory_sl) ? $_idcategory_sl : Request::segment(4);
      $_id_post_type = isset($_id_post_type_sl) ? $_id_post_type_sl : Request::segment(5);
      $_id_status_type = isset($_id_status_type_sl) ? $_id_status_type_sl : Request::segment(6);
      //$_sel_receive = $list_selected['_sel_receive'];
?>

<script type="text/javascript">
  var _start_date_sl = '<?php echo $_start_date_sl; ?>';
  var _end_date_sl = '<?php echo $_end_date_sl; ?>';
</script>
   <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">                   
                    
                     <?php if($message = Session::get('error')): ?>
                          <h2 class="card-subtitle"><?php echo e($message); ?></h2>
                     <?php endif; ?>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                      <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                              
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_title">

                   <form method="post" action="<?php echo e(url('admin/orderlist/')); ?>/<?php echo e($_id_store); ?>">

                   

                      <?php echo e(csrf_field()); ?>


                      <input type="hidden" name="filter" value="1">

                      <input type="hidden" name="sel_id_status_type" value="<?php echo e($_id_status_type); ?>">

                      <div class="col-sm-2">

                        <div class="form-group">

                            <div class="input-group sel-control" id="myDatepicker1">

                                <input type="text" class="form-control _start_date" name="_start_date">

                                <span class="input-group-addon">

                                   <span class="glyphicon glyphicon-calendar"></span>

                                </span>

                            </div>

                        </div>

                      </div>

                      <div class="col-sm-2">

                        <div class="form-group">

                            <div class="input-group sel-control" id="myDatepicker2">

                                <input type="text" class="form-control _end_date" name="_end_date">

                                <span class="input-group-addon">

                                   <span class="glyphicon glyphicon-calendar"></span>

                                </span>

                            </div>

                        </div>

                      </div>

                      <div class="col-sm-2">

                        <div class="form-group">

                            <?php if(isset($post_types)): ?>

                              <select class="form-control sel-control" name="sel_id_post_type" required="true">

                                <option value="0" <?php echo e($_id_post_type_sl == 0 ? 'selected="selected"' : ''); ?>>Tất cả</option>

                                <?php $__currentLoopData = $post_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                  <option value="<?php echo e($row['idposttype']); ?>" <?php echo e($row['idposttype'] == $_id_post_type_sl ? 'selected="selected"' : ''); ?>><?php echo e($row['nametype']); ?></option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              </select> 

                            <?php endif; ?>

                        </div>

                      </div> 

                      <div class="col-sm-2 text-center">
                        <div class="form-group">
                          <p></p>
                              <label>Tất cả:</label> 
                        </div>
                      </div>   

                      <div class="col-sm-2 text-center">
                        
                      </div>
                       <div class="col-sm-2 text-right">
                          <input type="submit" class="btn btn-default btn-filter-date" name="filter-date" value="Áp dụng" />
                        </div>
                    </form>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30"></p>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>Mã đơn hàng</th>
                              <th>Ngày đặt</th>
                              <th>Tổng đơn hàng</th>
                              <th>Họ tên</th>
                              <th>Điện thoại</th>
                              <th>Địa chỉ</th>
                              <th>Q-Huyện</th>
                              <th>TP-TT</th>
                              <th>Tỉnh</th>
                              <th>Trạng thái</th>
                              <th>-</th>    
                           </tr>
                       </thead>
                       <tfoot>
                            <tr>
                              <th>Mã đơn hàng</th>
                              <th>Ngày đặt</th>
                              <th>Tổng đơn hàng</th>
                              <th>Họ tên</th>
                              <th>Điện thoại</th>
                              <th>Địa chỉ</th>
                              <th>Q-Huyện</th>
                              <th>TP-TT</th>
                              <th>Tỉnh</th>
                              <th>Trạng thái</th>
                              <th>-</th>    
                           </tr>
                           </tr>
                      </tfoot>
                          <tbody>
                            <?php $__currentLoopData = $rs_orderlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>                     
                              <td><a href="<?php echo e(url('/admin/orderlist/show/')); ?>/<?php echo e($row['idnumberorder']); ?>"><?php echo e($row['idnumberorder']); ?></a></td>
                              <td><?php echo e($row['created_at']); ?></td>
                              <td><span class="currency"><?php echo e($row['itemtotal']); ?></span><span class="vnd"></span></td>
                              <td><?php echo $row['lastname']; ?> <?php echo $row['firstname']; ?></td>
                              <td><?php echo $row['mobile']; ?></td>
                              <td><?php echo $row['address']; ?></td>
                              <td><?php echo $row['namedist']; ?></td> 
                              <td><?php echo $row['namecitytown']; ?></td>
                              <td><?php echo $row['nameprovince']; ?></td>                
                              <td><?php echo $row['id_status_type']; ?></td>
                              <td><a href="<?php echo e(url('/admin/orderlist/show/')); ?>/<?php echo e($row['idnumberorder']); ?>/<?php echo e($_idstore); ?>"><span class="fa fa-search-plus"></span></a></td>     
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
                      </tbody>
                  </table>
          </div>

        </div>

      </div>

</div>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('other_scripts'); ?>

    <!-- Datatables -->
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/jszip/dist/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/pdfmake/build/vfs_fonts.js')); ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo e(asset('gentelella/vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo e(asset('gentelella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <!-- Custom Theme Scripts -->
    <!-- <script src="<?php echo e(asset('gentelella/build/js/custom.min.js')); ?>"></script>  -->
    <script src="<?php echo e(asset('gentelella/build/js/custom-build.js?v=0.1.3')); ?>"></script> 
    

    <script src="<?php echo e(asset('dashboard/production/js/customer.js?v=0.6.4')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/orderlist/index.blade.php ENDPATH**/ ?>