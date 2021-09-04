<form class="frm_edit_post" method="post" action="<?php echo e(action('Admin\PostsController@update',$idproduct)); ?>" enctype="multipart/form-data" style="width:100%">
	<?php echo e(csrf_field()); ?>

	<input type="hidden" name="_method" value="PATCH">
	<input type="hidden" name="idimp" value="<?php echo e($product[0]['idimp']); ?>">
	<div class="col-md-9 col-xs-12">
	<div class="form-group">
		<input type="hidden" name="title" class="form-control"  value="<?php echo e($product[0]['namepro']); ?>" />
		<div class="col-md-12">
			<?php if(\Session::has('success')): ?>
			<div class="alert alert-success">
				<p><?php echo e(\Session::get('success')); ?></p>
			</div>
		<?php endif; ?>
			<input type="text" name="phone" class="form-control"  value="<?php echo e($product[0]['phone']); ?>" disabled />
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<input type="hidden" name="slug" class="form-control" value="<?php echo e($product[0]['slug']); ?>" >
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
        	<textarea id="editor" name="body"><?php echo e($product[0]['description']); ?></textarea>
        </div>
	</div>
	<div class="form-group">
      	<div class="col-md-12 text-left">
			 <span class="interactive">
			    <ul class="icon">
			      <?php $__currentLoopData = $sel_cross_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			      	<li><a href="<?php echo e(action('Admin\PostsController@create',['idposttype' => $row['idposttype'], 'idparent' => $idproduct,'idcrosstype' => 6])); ?>" class="btn btn-default btn-create-new"><?php echo $row['icon']; ?>&nbsp;<?php echo e($row['nametype']); ?></a></li>
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
			    </ul>
			  </span>
		</div>	
	</div>
	<div class="form-group">
      	<div class="col-md-12">
      		
      		<?php echo $__env->make('admin.post.timeline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	</div>
     
	</div>
	<div class="col-md-3 col-xs-12">
		<div class="form-group row">
            <label class="col-lg-4 col-form-label" for="sel_idposttype">Kiểu post <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <select class="form-control cus-drop" name="sel_idposttype" required >
                	<option value="">Chọn kiểu post</option>
                	<?php $__currentLoopData = $posttypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<option value="<?php echo e($row['idposttype']); ?>" <?php echo e($row['idposttype'] == $_id_post_type ? 'selected="selected"' : ''); ?>><?php echo e($row['nametype']); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="sel_idstatustype">Trạng thái <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <select class="form-control cus-drop" name="sel_idstatustype" required >
                	<option value="">Chọn trạng thái</option>
                	<?php $__currentLoopData = $statustypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		 <option value="<?php echo e($row['id_status_type']); ?>" <?php echo e($row['id_status_type'] == $product[0]['id_status_type'] ? 'selected="selected"' : ''); ?>><?php echo e($row['name_status_type']); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="sel_idstatustype">Kho dữ liệu  <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <select class="form-control cus-drop" name="sel_id_store" required >
                	<option value="">Chuyển kho dữ liệu</option>
                	<?php $__currentLoopData = $rs_store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		 <option value="<?php echo e($row['idcategory']); ?>" <?php echo e($row['idcategory'] == $product[0]['idstore'] ? 'selected="selected"' : ''); ?>><?php echo e($row['namecat']); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                </select>
            </div>
        </div>
        <!--profile-->
        <?php echo $__env->make('admin.post.edit-survey-client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!--end profile-->
		<?php echo $__env->make('admin.post.edit-survey-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="form-group text-right">
			<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Xác nhận" />
		</div>
	 </div> 
</form>
<?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/post/edit-survey.blade.php ENDPATH**/ ?>