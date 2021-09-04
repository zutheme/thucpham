<?php if(isset($rs_latest_id)): ?>
	<?php $latestedid = (int)$rs_latest_id[0]['idproduct'];  
          $latestedid =  'p-'.$latestedid; ?>
<?php endif; ?>
<?php $str_profile = session()->get('profile');
      $sip = 561;
      $profile = json_decode($str_profile, true); 
      if(isset($profile)) {
          foreach($profile as $row) {
              $sip = $row['sip'];
           }
    } ?>
<form class="frm_create_post" method="post" action="<?php echo e(action('Admin\PostsController@store',['idparent' => $idparent,'idcrosstype' => $idcrosstype])); ?>" enctype="multipart/form-data" style="width: 100%">
	<?php echo e(csrf_field()); ?>

	<div class="col-md-9 col-xs-12">
		<div class="form-group">
			<?php if(isset($idparent) and $idparent > 0): ?>
				<a class="btn btn-default" href="<?php echo e(action('Admin\PostsController@edit',$idparent)); ?>">&nbsp;<i class="fa fa-angle-double-left"></i>&nbsp;Về sản phẩm chính</a>
                <?php if(isset($parent_tilte)): ?>
				<a class="btn btn-default btn-icon btn-create-new btn-phone" sip = "<?php echo e($sip); ?>" phone = "<?php echo e($parent_tilte); ?>" idposttype = "<?php echo e($idcrosstype); ?>" idparent = "<?php echo e($idparent); ?>" idcrosstype = "6"  href="javascript:void(0)"><i class="fa fa-phone-square"></i>&nbsp;<?php echo e($parent_tilte); ?></a>
                <?php endif; ?>
			<?php endif; ?>
		</div>
		<div class="form-group">
			<input type="hidden" name="title" class="form-control" value="<?php echo e($latestedid); ?>" required />
		</div>
		<div class="form-group" style="display: none;"> 
              <textarea id="editor" name="body" value="<?php echo e($latestedid); ?>"></textarea>
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
    </div>
	<div class="col-md-3 col-xs-12">
		<div class="form-group row">
            <label class="col-lg-4 col-form-label" for="sel_idposttype">Kiểu post <span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <select class="form-control cus-drop" name="sel_idposttype" required >
                	<option value="">Chọn kiểu post</option>
                	<?php $__currentLoopData = $posttypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<option value="<?php echo e($row['idposttype']); ?>" <?php echo e($row['idposttype'] == $idposttype ? 'selected="selected"' : 3); ?>><?php echo e($row['nametype']); ?></option>
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
                		 <option value="<?php echo e($row['id_status_type']); ?>"><?php echo e($row['name_status_type']); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                </select>
            </div>
        </div>
		<?php echo $__env->make('admin.post.create-survey-category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="form-group row frm-image thumbnails">
        	<div class="col-lg-12">
                <p><a href="javascript:void(0)" onclick="performClick('file1');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh đại diện</a>
                <input style="display:none" type="file" name="thumbnail" class="file" id="file1" accept="image/*"/></p>
                <p><canvas id="my_canvas_id1" width="0px" height="0px"></canvas></p>
            </div>
    		</div>	
        <div class="form-group row text-right">
        	<div class="col-lg-12">
				<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Xác nhận" />
			</div>
		</div>
	 </div>
	 
</form>
	<?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/post/create-survey.blade.php ENDPATH**/ ?>