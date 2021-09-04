<?php $title ='order'; ?>

<?php $__env->startSection('other_styles'); ?>

   <!-- Datatables -->

         <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Datatables -->
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')); ?>" rel="stylesheet">

      <!-- Custom Theme Style -->

      <link href="<?php echo e(asset('dashboard/build/css/custom.min.css')); ?>" rel="stylesheet">

      <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.4.2')); ?>" rel="stylesheet">

      <!-- bootstrap-daterangepicker -->

      <link href="<?php echo e(asset('dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet">

      <!-- bootstrap-datetimepicker -->

      <link href="<?php echo e(asset('dashboard/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(isset($rs_orderproduct)) {
    $unit_price = 0;
    $subtotal = 0;
  } ?>
   <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">
                    <?php if(isset($_idstore)): ?>
                      <?php echo e($_idstore); ?>

                    <?php endif; ?>
                    <?php if(isset($sel_idstore)): ?>
                      <?php echo e($sel_idstore); ?>

                    <?php endif; ?>
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
                            <?php if(isset($rs_orderproduct)): ?>
                              <?php $__currentLoopData = $rs_orderproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $parentidorder = $row['idorder']; ?>
                                    <tr>                     
                                      <td width="10px" style="text-align: center;"><?php echo e($order); ?></td>
                                      <td><a href="<?php echo e(url('/')); ?>/<?php echo e($row['slug']); ?>"><?php echo e($row['namepro']); ?></a></td>
                                      <td style="text-align: right;"><span class="currency"><?php echo e($row['price']); ?></span><span class="vnd"></span></td>
                                      <td style="text-align: right;"><?php echo e($row['amount']); ?></td>
                                      <?php $unitprice_quality = $row['price']*$row['amount'] ; ?>
                                      <td style="text-align: right;"><span class="currency"><?php echo e($unitprice_quality); ?></span><span class="vnd"></span></td>
                                         
                                    </tr>
                                  <?php $subtotal = $subtotal + $unitprice_quality; $order++;  ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        	<?php endif; ?>
						<?php if($order > $c_order): ?>
							 <tr>
							  <td></td>
							  <td></td>
							  <td></td>
							  <td style="text-align: left;">Tổng</td>
							  <td style="text-align: right;"><span class="currency"><?php echo e($subtotal); ?></span><span class="vnd"></span></td>
							      
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
							  <td style="text-align: right;"><span class="currency"><?php echo e($subtotal); ?></span><span class="vnd"></span></td>
							  
							</tr>
						<?php endif; ?>
						<?php $__currentLoopData = $rs_customerorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($customer['cus'] == 1): ?>
						<tr><td>Thông tin khách hàng</td><td></td><td></td><td></td><td></td></tr>
						 <tr>
							<td>Họ tên:</td><td><?php echo e($customer['lastname']); ?> <?php echo e($customer['middlename']); ?> <?php echo e($customer['firstname']); ?></td><td></td><td></td><td></td>
						  </tr>
						  <tr>                
							<td>Điện thoại:</td><td><?php echo e($customer['mobile']); ?></td><td></td><td></td><td></td>
						  </tr>
						  <tr>
							<td>Địa chỉ:</td><td><?php echo e($customer['address'].','.$customer['nameward'].','.$customer['namedist'].','.$customer['namecitytown'].','.$customer['nameprovince'].','.$customer['namecountry']); ?></td>
							<td></td><td></td><td></td>
						  </tr>
						<?php endif; ?>
						<?php if($customer['cus'] > 1 and $customer['idrecipent'] > 0): ?>
						<tr><td>Thông tin người nhận</td></tr>
						 <tr>
							<td>Họ tên:</td><td><?php echo e($customer['lastname']); ?> <?php echo e($customer['middlename']); ?> <?php echo e($customer['firstname']); ?></td>
							<td></td><td></td><td></td>
						  </tr>
						  <tr>                
							<td>Điện thoại:</td><td><?php echo e($customer['mobile']); ?></td>
							<td></td><td></td><td></td>
						  </tr>
						  <tr>
							<td>Địa chỉ:</td><td><?php echo e($customer['address'].','.$customer['nameward'].','.$customer['namedist'].','.$customer['namecitytown'].','.$customer['nameprovince'].','.$customer['namecountry']); ?></td>
							<td></td><td></td><td></td>
						  </tr>
						<?php endif; ?>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  	
						</tbody>
                      <tfoot>
                       
                      </tfoot>
					  
                  </table>
				 
          </div>
			 <div class="col-md-12 col-sm-12 col-xs-12 text-center">
				<p><a class="btn btn-default btn-primary" href="<?php echo e(url('admin/orderlist/epos/'.$ordernumber.'/'.$_idstore)); ?>">IN EPOS</a></p>
			 </div>
        </div>
      </div>

</div>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('other_scripts'); ?>

   <script type="text/javascript">
      var _start_date_sl = '';
      var _end_date_sl = '';
      var _posttype ='product';
    </script>
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
    
    <script src="<?php echo e(asset('gentelella/build/js/custom-init.js?v=0.2.0.1')); ?>"></script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.general',compact('title'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/orderlist/show.blade.php ENDPATH**/ ?>