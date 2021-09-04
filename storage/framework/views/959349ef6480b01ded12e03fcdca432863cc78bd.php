
<form class="frm_create_post" method="post" action="<?php echo e(action('Admin\PostsController@store',['idparent' => $idparent,'idcrosstype' => $idcrosstype])); ?>" enctype="multipart/form-data">
	<?php echo e(csrf_field()); ?>

	<div class="col-md-9 col-xs-12">
	<div class="form-group">
		<?php if(isset($idparent)): ?>
			<a class="btn btn-default" href="<?php echo e(action('Admin\PostsController@edit',$idparent)); ?>">&nbsp;<i class="fa fa-angle-double-left"></i>&nbsp;Về sản phẩm chính</a>
		<?php endif; ?>
	</div>
	<div class="form-group">
		<input type="text" name="title" class="form-control" placeholder="Chủ đề" required />
	</div>
	
	<div class="form-group">
      <div class="x_panel">         
        <div class="x_content">
          <div id="alerts"></div>         
           <textarea id="editor" name="body"></textarea>
        </div>
      </div>
	</div>
	 
      <div class="form-group short_desc">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả vắn tắt</label>
        <div class="col-md-12">
          <textarea id="shorteditor" name="short_desc" class="form-control" rows="3" cols="50" placeholder=""></textarea>
        </div>
      </div>
	<div class="form-group"> 
		<div class="col-lg-12">                
			<ul class="multi-file">
				<li class="item0">	
		     		<a href="javascript:void(0);" onclick="performClickByClass(this);">Đính kèm&nbsp;&nbsp;<i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp;&nbsp;</a>
					<input onchange="changefile(event,this);" type="file" style="display: none;" name="file_attach[]" class="file file_attach" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.zip,.rar" />
					<label class="namefile"></label>
                    <p><canvas class="my_canvas" width="0px" height="0px"></canvas></p>
                    <p><span class="btn bnt-default btn-trash" style="display: none;" onclick="trash('item0');"><i class="fa fa-trash" aria-hidden="true"></i></span></p>
				</li>
			</ul>
			<p><input type="button" style="display: none" class="btn btn-default btn-more-file" name="btn-more-file" value="Thêm file" /></p>
		</div>
	</div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Keyword:</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" name="keyword" class="form-control" />
        </div>
      </div>
	   <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã SKU phân loại:</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" name="sku_category" class="form-controls" />
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã SKU sản phẩm:</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" name="sku_product" class="form-controls" />
        </div>
      </div>
	  <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá nhập hàng:</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" name="price_import" class="form-controls" />
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Số lượng nhập:</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" name="amount" class="form-controls" />
        </div>
      </div> 
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá bán:</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" name="price" class="form-controls" />
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Số lượng sale:</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <input type="text" name="quality_sale" class="form-controls" />
        </div>
      </div> 
      <?php if($idcrosstype==1 or $idcrosstype==2): ?>
          <div class="form-group">
          	 <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá theo:</label>
          	<div class="col-md-9 col-sm-9 col-xs-12">
		          <select name="sel_cross">
		          	<option value="0">-----</option>
		          	<?php $__currentLoopData = $sel_cross_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		          	<option value="<?php echo e($option['idcrosstype']); ?>" <?php echo e($option['idcrosstype'] == $idcrosstype ? 'selected="selected"' : ''); ?>><?php echo e($option['namecross']); ?></option>
		          	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		          </select>
	      		</div>
	      </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá sale:</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" name="price_sale" class="form-controls" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Số lượng sale:</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" name="quality_sale" class="form-controls" />
            </div>
          </div>
		<?php endif; ?>
      	<div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kích thước</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-controls" name="idsize">
          	<option value="0">Chọn kích thước</option>
          	<?php if(isset($size)): ?>
              	<?php $__currentLoopData = $size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            		<option value="<?php echo e($row['idsize']); ?>"><?php echo e($row['value']); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?> 
          </select>
         </div>
      	</div>
      	<div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Màu sắc</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select class="form-controls" name="idcolor">
          	<option value="0">Chọn màu</option>
          	<?php if(isset($color)): ?>
              	<?php $__currentLoopData = $color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            		<option value="<?php echo e($row['idcolor']); ?>"><?php echo e($row['value']); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?> 
          </select>
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
                		<option value="<?php echo e($row['idposttype']); ?>" <?php echo e($row['nametype'] == 'product' ? 'selected="selected"' : ''); ?>><?php echo e($row['nametype']); ?></option>
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
		<!--<?php echo $__env->make('admin.post.create-survey-category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->
        <div class="form-group frm-image thumbnails">
            <p><a href="javascript:void(0)" onclick="performClick('file1');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh đại diện</a>
            <input style="display:none" type="file" name="thumbnail" class="file" id="file1" accept="image/*"/></p>
            <p><canvas id="my_canvas_id1" width="0px" height="0px"></canvas></p>
            
		    </div>
         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">template:</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" name="template" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nổi bật:</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="number" name="feature" class="form-control" />
            </div>
          </div>	
        <div class="form-group text-center">
    			<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Xác nhận" />
    		</div>
	 </div>
	 
</form>
<?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/post/create-product.blade.php ENDPATH**/ ?>