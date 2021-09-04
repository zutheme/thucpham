	<?php 
	$_idposttype = app('request')->input('idposttype');
	$_idparent = app('request')->input('idparent'); 
	$_idcrosstype = app('request')->input('idcrosstype');
	//echo $idposttype.', '.$idparent.', '.$idcrosstype. ', '.$idproduct."<br>";
	?>
<div class="row">
	<div class="col-md-12 col-xs-12">
		
		<?php if(\Session::has('success')): ?>
			<div class="alert alert-success">
				<?php echo e($success); ?>

			</div>
		<?php endif; ?>
	</div>
</div>
<form class="frm_edit_post" method="post" action="<?php echo e(action('Admin\PostsController@update', [$idproduct,'idposttype'=>$_idposttype,'idparent'=>$_idparent,'idcrosstype'=>$_idcrosstype])); ?>" enctype="multipart/form-data">
	<?php echo e(csrf_field()); ?>

	<input type="hidden" name="_method" value="PATCH">
	<input type="hidden" name="idimp" value="<?php echo e($product[0]['idimp']); ?>">
	
	<div class="col-md-9 col-xs-12">
	<div class="form-group">
		<div class="col-md-12"><label>Nội dung cuộc gọi</label></div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<?php if(isset($idparent)): ?>
				<a class="btn btn-default" href="<?php echo e(action('Admin\PostsController@edit',$idparent)); ?>">&nbsp;<i class="fa fa-angle-double-left"></i>&nbsp;Về post chính</a>
			<?php endif; ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<input type="hidden" name="title" class="form-control"  value="<?php echo e($product[0]['namepro']); ?>" />
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
	 <!--profile-->
		<?php if(isset($product)): ?> 
			<?php if(isset($product[0]['idclient'])&& $product[0]['idclient'] > 0): ?>
				<?php echo $__env->make('admin.post.create-survey-client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php else: ?>
				<?php echo $__env->make('admin.post.create-survey-new-client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php endif; ?>
		<?php else: ?>
			<?php echo $__env->make('admin.post.create-survey-new-client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php endif; ?>
        <!--end profile-->
	<div class="form-group">
		<div class="ln_solid"></div>
      	
      	<div class="col-md-12">
          	<div class="cross-product">
	         	<?php $__currentLoopData = $sel_cross_byidproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	         		  
	     			<?php var_dump($row); ?>
			  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
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
                <select class="form-control cus-drop" name="sel_idstatustype">
                	<option value="">Chọn trạng thái</option>
                	<?php $__currentLoopData = $statustypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		 <option value="<?php echo e($row['id_status_type']); ?>" <?php echo e($row['id_status_type'] == $product[0]['id_status_type'] ? 'selected="selected"' : ''); ?>><?php echo e($row['name_status_type']); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                </select>
            </div>
        </div>
		<div class="form-group row">
            <label class="col-lg-4 col-form-label">Trạng thái xử lý <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <select class="form-control cus-drop" name="sel_statusprocess" required >
                	<option value="0">Trạng thái xử lý</option>
                	<?php $__currentLoopData = $rs_status_process; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		 <option value="<?php echo e($row['id_status_type']); ?>" <?php echo e($row['id_status_type'] == $product[0]['idstatusprocess'] ? 'selected="selected"' : ''); ?>><?php echo e($row['name_status_type']); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                </select>
            </div>
        </div>
		<?php echo $__env->make('admin.post.edit-survey-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <script>var _url_thumbnail = '<?php echo e(asset($product[0]['url_thumbnail'])); ?>';</script>
        	
        <div class="form-group text-right">
			<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Xác nhận" />
		</div>
	 </div> 
</form>
<?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/post/edit-phone.blade.php ENDPATH**/ ?>