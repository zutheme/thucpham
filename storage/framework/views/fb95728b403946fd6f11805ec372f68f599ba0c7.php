<div class="form-group row">
  <label class="col-lg-12 col-form-label" for="sel_idcategory">Chuyên mục tag<span class="text-danger">*</span></label>
  <div class="col-lg-12">
	  <select class="form-control cus-drop" name="sel_idcat_main_tag" required>
		<option value="0">--Tất cả--</option>
		<?php $__currentLoopData = $rs_catetags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		   <option value="<?php echo e($row['idcategory']); ?>"><?php echo e($row['namecat']); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
	  </select>
  </div>
</div>
 <div class="form-group row">
	<div class="col-lg-12">
	  <div class="select_dynamic_tag">
		  <?php if(isset($str_tag)): ?>
			<?php echo $str; ?>

		  <?php endif; ?>
		</div>
	  </div>
  </div>     
  <div class="form-group row">
	<label class="col-lg-12 col-form-label">Chọn Thẻ</label>
	<div class="col-lg-12">
	  <div class="tagclound"></div>
	</div>
  </div>

<div class="form-group row">
	<label class="control-label col-md-12 col-sm-12 ">Thẻ tag</label>
	<div class="col-md-12 col-sm-12 ">
		<div class="tags">
			<?php $__currentLoopData = $rs_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<span class="tag"><span><?php echo e($row->nametag); ?>&nbsp;&nbsp;</span><a onclick="removingtag(this)" idtag=<?php echo e($row->idtag); ?> idproduct=<?php echo e($idparent); ?> href="javascript:void(0);">x</a></span>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</div><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/post/edit-survey-tag.blade.php ENDPATH**/ ?>