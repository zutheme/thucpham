<div class="form-group row">
	<label class="col-lg-12 col-form-label" for="sel_idcategory">Chuyên mục chính<span class="text-danger">*</span></label>
	<div class="col-lg-12">
		<select class="form-control cus-drop" name="sel_idcat_main_cate" required>
			<option value="0">--Tất cả--</option>
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				 <option value="<?php echo e($row['idcategory']); ?>"><?php echo e($row['namecat']); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
		</select>
	</div>
</div>
<div class="form-group row">
	<div class="col-lg-12">
		<div class="select_dynamic_cate">
			<?php if(isset($str)): ?>
				<?php echo $str; ?>

			<?php endif; ?>
		</div>
	</div>
</div>
<?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/post/create-survey-category.blade.php ENDPATH**/ ?>