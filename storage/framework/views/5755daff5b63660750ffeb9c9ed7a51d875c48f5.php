

<?php $__env->startSection('other_styles'); ?>
   <!-- Datatables -->
      <link href="<?php echo e(asset('dashboard/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('dashboard/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('dashboard/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('dashboard/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('dashboard/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')); ?>" rel="stylesheet">
    
     <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('dashboard/build/css/custom.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/production/css/custom.css?v=0.1.2')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <div class="row">
   	<div class="x_content">
	        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div align="right">
						<a class="btn btn-default btn-primary" href="<?php echo e(URL::route('admin.supplier.create')); ?>">Thêm mới</a>
					</div>
                  <div class="x_title">
                     <?php if($message = Session::get('success')): ?>
			        	<h2 class="card-subtitle"><?php echo e($message); ?></h2>
					<?php endif; ?>               
                  </div>
                  <div class="x_content">
                   <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
	                    <tr>
                          <th>ID</th>
                          <th>Mã NCC</th>
                          <th>Kí hiệu NCC</th>
                          <th>Tên NCC</th>
                          <th>address</th>
                          <th>idcountry</th>
                          <th>idprovince</th>
                          <th>idcitytown</th>
                          <th>iddistrict</th>
                          <th>idward</th>
                          <th>phone</th>
                          <th>website</th>
                          <th>fax</th>
                          <th>email</th>
                          <th>-</th>
                          <th>-</th>
                      </tr>
	                </thead>
	                <tfoot>
	                    <tr>
                          <th>ID</th>
	                        <th>Mã NCC</th>
                          <th>Kí hiệu NCC</th>
                          <th>Tên NCC</th>
                          <th>address</th>
                          <th>idcountry</th>
                          <th>idprovince</th>
                          <th>idcitytown</th>
                          <th>iddistrict</th>
                          <th>idward</th>
                          <th>phone</th>
                          <th>website</th>
                          <th>fax</th>
                          <th>email</th>
                          <th>-</th>
                          <th>-</th>
	                    </tr>
	                </tfoot>
	                <tbody>
              	    <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($row['idsupp']); ?></td>
                      <td><?php echo e($row['idsupplier']); ?></td>
                      <td><?php echo e($row['sku_supplier']); ?></td>
                      <td><?php echo e($row['name_supp']); ?></td>
                      <td><?php echo e($row['address']); ?></td>
                      <td><?php echo e($row['idcountry']); ?></td>
                      <td><?php echo e($row['idprovince']); ?></td>
                      <td><?php echo e($row['idcitytown']); ?></td>
                      <td><?php echo e($row['iddistrict']); ?></td>
                      <td><?php echo e($row['idward']); ?></td> 
                      <td><?php echo e($row['phone']); ?></td> 
                      <td><?php echo e($row['website']); ?></td>
                      <td><?php echo e($row['fax']); ?></td> 
                      <td><?php echo e($row['email']); ?></td>           
                      <td class="btn-control"><a class="btn btn-primary btn-edit" href="<?php echo e(action('Admin\SupplierControler@edit',$row['idsupp'])); ?>"><i class="fa fa-edit"></i></a></td>
                      <td class="btn-control">
                           <form method="post" class="delete_form" action="<?php echo e(action('Admin\SupplierControler@destroy', $row['idsupp'])); ?>">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="btn btn-danger btn-delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                           </form>
                      </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
	                </tbody>
                </table>
              </div>
            </div>
          </div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('other_scripts'); ?>
  
   <!-- Datatables -->
    <script src="<?php echo e(asset('dashboard/vendors/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendors/datatables.net-buttons/js/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendors/jszip/dist/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendors/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendors/pdfmake/build/vfs_fonts.js')); ?>"></script>
      <!-- Custom Theme Scripts -->
    
    <script src="<?php echo e(asset('dashboard/build/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/production/js/custom.js?v=0.0.2')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/supplier/index.blade.php ENDPATH**/ ?>