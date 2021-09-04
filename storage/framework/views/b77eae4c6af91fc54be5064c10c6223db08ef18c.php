			<form class="frm_edit_post" method="post" action="<?php echo e(action('Admin\PostsController@update',$idproduct)); ?>" onsubmit="return readytextarea()" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>

			<input type="hidden" name="_method" value="PATCH">
			<input type="hidden" name="idimp" value="<?php echo e($product[0]['idimp']); ?>">
			<div class="col-md-9 col-xs-12">
			
			<div class="form-group">
				<input type="text" name="title" class="form-control" placeholder="Chủ đề" required value="<?php echo e($product[0]['namepro']); ?>" />
			</div>
			<div class="form-group">
				<input type="text" name="slug" class="form-control" placeholder="Slug" value="<?php echo e($product[0]['slug']); ?>">
			</div>
			<div class="form-group">
              <div class="x_panel">         
                <div class="x_content">
                  <div id="alerts"></div>   
                         
                   <textarea id="editor" name="body"><?php echo e($product[0]['description']); ?></textarea>
                </div>
              </div>
			</div>
			 
	          <div class="form-group short_desc">
	            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mô tả vắn tắt</label>
	            <div class="col-md-12">
	              <textarea id="shorteditor" name="short_desc" class="form-control" rows="3" cols="50" placeholder="Mô tả vắn tắt"><?php echo e($product[0]['short_desc']); ?></textarea>
	              
	            </div>
	          </div>

	           <div class="ln_solid"></div>
			<div class="form-group"> 
				<div class="col-lg-12">
					<?php if(isset($gallery)): ?> 
						<script>
					    var item ='';
					    var list_gallery = [];
					    //console.log(list_gallery);
						</script> 
						<ul class="multi-file">
							<?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li class="item<?php echo e($row['idfile']); ?>">
								<input class="producthasfile" type="hidden" name="edit-gallery[]" value="0">	
					     		<a href="javascript:void(0);" onclick="performClickByClass(this);">Chỉnh sửa&nbsp;&nbsp;<i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp;&nbsp;</a>
								<input onchange="editfile(event,this,'<?php echo e($row['idproducthasfile']); ?>');" type="file" style="display: none;" name="file_attach[]" class="file file_attach" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf,.zip,.rar" />
								<label class="namefile"></label>
			                    <p><canvas class="my_canvas gallery" width="0px" height="0px"></canvas></p>
			                    <script> 
			                    	var item = '<?php echo e(asset($row['urlfile'])); ?>';
			                    	if(item) {
			                    		list_gallery.push(item); 
			                    	}
			                    </script>
			                    <p><a href="javascript:void(0);" class="btn bnt-default btn-trash" style="display: block;" onclick="trash_item('item<?php echo e($row['idfile']); ?>','<?php echo e($row['idproducthasfile']); ?>');"><i class="fa fa-trash" aria-hidden="true"></i></a></p>
			                    <p><img class="loading-trash" style="display:none;width:30px;" src="<?php echo e(asset('dashboard/production/images/loader.gif')); ?>"></p>
							</li>
							 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					<?php endif; ?>
					<p><input type="button" style="display: block" class="btn btn-default btn-more-file" name="btn-more-file" value="Thêm file" /></p>
					 <div class="ln_solid"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				   <div class="form-group row">
					<label class="col-md-3 control-label">Mã SKU phân loại:</label>
					<div class="col-md-9">
					  <input type="text" name="sku_category" class="form-controls" value="<?php echo e($product[0]['sku_category']); ?>" />
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-md-3 control-label">Mã SKU sản phẩm:</label>
					<div class="col-md-9">
					  <input type="text" name="sku_product" class="form-controls" value="<?php echo e($product[0]['sku_product']); ?>" />
					</div>
				  </div>	
				   <div class="form-group row">
					<label class="col-md-3 control-label">Giá nhập hàng:</label>
					<div class="col-md-9">
					  <input type="text" name="price_import" class="form-controls" value="<?php echo e($product[0]['price_import']); ?>" />
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-md-3 control-label">Số lượng:</label>
					<div class="col-md-9">
					  <input type="text" name="amount" class="form-controls" value="<?php echo e($product[0]['amount']); ?>"/>
					</div>
				  </div> 
				  
				  <div class="form-group row">
					<label class="col-md-3 control-label">Giá bán:</label>
					<div class="col-md-9">
					  <input type="text" name="price" class="form-controls" value="<?php echo e($product[0]['price']); ?>" />
					</div>
				  </div>
					
				  <div class="form-group row">
					<label class="col-md-3 control-label">Số lượng sale:</label>
					<div class="col-md-9">
					  <input type="text" name="quality_sale" class="form-controls" value="<?php echo e($product[0]['quality_sale']); ?>" />
					</div>
				  </div>
				   <div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Link:</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						  <input type="text" name="link" class="form-controls" value="<?php echo e($product[0]['link']); ?>" />
						</div>
					</div>
				   <div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Feature:</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						  <input type="number" name="feature" class="form-controls" value="<?php echo e($product[0]['feature']); ?>" />
						</div>
				   </div>
				</div>			  
		  </div>
		  
              <!--end policy-->
              <!--product relative with another product-->
               <?php $__currentLoopData = $rs_sel_impbyidpro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php $class = ($item['idimp']==$idimpcross) ? "fade-row":"visable-row"; ?>
               		<div class="ln_solid"></div>
	            	<div class="row <?php echo $class; ?>">
					 <div class="col-sm-6 col-xs-6">	
				   	  <input type="hidden" name="l_cross_idimp[]" value="<?php echo e($item['idimp']); ?>">
				   	  <input class="cross_id_status_type" type="hidden" name="l_cross_id_status_type[]" value="<?php echo e($item['id_status_type']); ?>"> 
			          <div class="form-group">
			          	  <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá theo:</label>
				          <div class="col-md-9 col-sm-9 col-xs-12">
					          <select name="l_cross_selidtype[]">
					          	<option value="0">-----</option>
					          	<?php $__currentLoopData = $sel_cross_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					          	<option value="<?php echo e($option['idcrosstype']); ?>" <?php echo e($option['idcrosstype'] == $item['idcrosstype'] ? 'selected="selected"' : ''); ?>><?php echo e($option['namecross']); ?></option>
					          	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					          </select>
					      </div>
			      	  </div>
			          <div class="form-group">
			            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá sale:</label>
			            <div class="col-md-9 col-sm-9 col-xs-12">
			              <input type="text" name="l_cross_price[]" class="form-controls" value="<?php echo e($item['price']); ?>" />
			            </div>
			          </div>
			          <div class="form-group">
			            <label class="control-label col-md-3 col-sm-3 col-xs-12">Số lượng sale:</label>
			            <div class="col-md-9 col-sm-9 col-xs-12">
			              <input type="text" name="l_cross_quality_sale[]" class="form-controls" value="<?php echo e($item['quality_sale']); ?>" />
			            </div>
			          </div>
			          <div class="row">
			          	<a class="btn btn-default btn-apply-date" href="javascript:void(0);" onclick="showdate(this);">Áp dụng ngày</a>
			          	<div class="apply-date" style="display:none">
			              <div class="col-md-12 col-sm-6 col-xs-12">
			              	<div class="form-group">
			              	   <label class="control-label col-md-3 col-sm-3 col-xs-12">Từ ngày:</label>
		                       <div class="col-md-8 col-sm-9 col-xs-12 input-group sel-control myDatepicker1">
		                            <input type="text" class="form-control _start_date" name="l_cross_start_date[]" required value="<?php echo e($item['fromdate']); ?>">
		                            <span class="input-group-addon">
		                               <span class="glyphicon glyphicon-calendar"></span>
		                            </span>
		                        </div>
		                    </div>
			              </div>
			              <div class="col-md-12 col-sm-6 col-xs-12">
			              	<div class="form-group">
			              	 <label class="control-label col-md-4 col-sm-3 col-xs-12">Đến ngày:</label>
		                      <div class="col-md-8 col-sm-9 col-xs-12 input-group sel-control myDatepicker2">
		                        <input type="text" class="form-control _end_date" name="l_cross_end_date[]" required value="<?php echo e($item['todate']); ?>">
		                        <span class="input-group-addon">
		                           <span class="glyphicon glyphicon-calendar"></span>
		                        </span>
		                        </div>
		                    </div>
			              </div>
			            </div>
		             </div>
		             <div class="form-group">
				          	<a class="remove-product-belong" href="javascript:void(0)" onclick="remove(this)"><i class="fa fa-trash"></i>&nbsp;Xóa</a>
				      	  </div>
			      	</div>
			          <?php if($item['idparentcross'] > 0 && $item['idparentcross'] != $idproduct): ?>
			           <div class="col-sm-6 col-xs-6">
			          	<div class="form-group">         	
			          	<figure>
						  <img class="thumb" src="<?php echo e(asset($item['urlfile'])); ?>" alt="" style="width:100%">
						  <figcaption><a href="<?php echo e(action('Admin\ProductsController@edit',$item['idparentcross'])); ?>" class="name-product"><?php echo e($item['namepro']); ?></a>
						  	
						  </figcaption>
						</figure>
		          		
		      	  		</div>
		      	  		</div>	      	  		
		      	  		<?php endif; ?> 
	              </div>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <!--end another product -->
              	<!--extend atribute-->
              <div class="ln_solid"></div>
              	<h5 class="tip">Sản phẩm liên quan</h5>
	          	<div class="cross-product">
		         <?php $__currentLoopData = $sel_cross_byidproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	         		  
		          <div class="row">
		          	<div class="col-sm-9">
		          		<div class="form-group">
		          			<label><?php echo e($row['namepro']); ?></label>
		          		</div>
		          		<input type="hidden" name="l_cross_idimp[]" value="<?php echo e($row['idimp']); ?>">
      					<input class="cross_id_status_type" type="hidden" name="l_cross_id_status_type[]" value="<?php echo e($row['id_status_type']); ?>"> 
			          	<div class="form-group">
			          	  <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá theo:</label>
				          <div class="col-md-9 col-sm-9 col-xs-12">
					          <select name="l_cross_selidtype[]">
					          	<option value="0">-----</option>
					          	<?php $__currentLoopData = $sel_cross_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					          	<option value="<?php echo e($option['idcrosstype']); ?>" <?php echo e($option['idcrosstype'] == $row['idcrosstype'] ? 'selected="selected"' : ''); ?>><?php echo e($option['namecross']); ?></option>
					          	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					          </select>
					      </div>
			      	  	</div>	       		
		                 <div class="form-group">
				            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá sale:</label>
				            <div class="col-md-9 col-sm-9 col-xs-12">
				              <input type="text" name="l_cross_price[]" class="form-controls" value="<?php echo e($row['price']); ?>" />
				            </div>
				          </div>
				          <div class="form-group">
				            <label class="control-label col-md-3 col-sm-3 col-xs-12">Số lượng sale:</label>
				            <div class="col-md-9 col-sm-9 col-xs-12">
				              <input type="text" name="l_cross_quality_sale[]" class="form-controls" value="<?php echo e($row['quality_sale']); ?>" />
				            </div>
				          </div>
				      	  <div class="row">
				      	  	<a class="btn btn-default btn-apply-date" href="javascript:void(0);" onclick="showdate(this);">Áp dụng ngày</a>
			          		<div class="apply-date" style="display:none">
					              <div class="col-md-6 col-sm-6 col-xs-12">
					              	<div class="form-group">
					              	   <label class="control-label col-md-4 col-sm-3 col-xs-12">Từ ngày:</label>
				                       <div class="col-md-8 col-sm-9 col-xs-12 input-group sel-control myDatepicker1">
				                            <input type="text" class="form-control _start_date" name="l_cross_start_date[]" required value="<?php echo e($row['fromdate']); ?>">
				                            <span class="input-group-addon">
				                               <span class="glyphicon glyphicon-calendar"></span>
				                            </span>
				                        </div>
				                    </div>
					              </div>
					              <div class="col-md-6 col-sm-6 col-xs-12">
					              	<div class="form-group">
					              	 <label class="control-label col-md-4 col-sm-3 col-xs-12">Đến ngày:</label>
				                      <div class="col-md-8 col-sm-9 col-xs-12 input-group sel-control myDatepicker2">
				                        <input type="text" class="form-control _end_date" name="l_cross_end_date[]" required  value="<?php echo e($row['todate']); ?>">
				                        <span class="input-group-addon">
				                           <span class="glyphicon glyphicon-calendar"></span>
				                        </span>
				                        </div>
				                    </div>
					              </div>
					            </div>
				           </div>
				           <div class="form-group">
				          	<a href="<?php echo e(action('Admin\ProductsController@edit',[$row['idproduct'],'idimpcross' => $row['idimp']])); ?>" class="info-number">Chỉnh sửa <i class="fa fa-pencil-square"></i></a>&nbsp;&nbsp;<a class="remove-product-belong" href="javascript:void(0)" onclick="remove(this)"><i class="fa fa-trash"></i>&nbsp;Xóa</a>
				      	  </div>
				    </div>
				    <div class="col-sm-3 text-center">
				    	<?php $thumbnail = $row['urlfile']; 
				    	if(!$thumbnail) { $thumbnail = $no_thumbnail; } ?>
				    	<a href="<?php echo e(action('Admin\ProductsController@edit',$row['idproduct'])); ?>"><img class="thumb-cross" src="<?php echo e(asset($thumbnail)); ?>" /></a>
				    </div>
				</div>
				<div class="ln_solid"></div>		
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				  <!--promotion policy-->
              <div class="ln_solid"></div>
              <div class="row">
              	<div class="form-group">
					 <a class="btn btn-default btn-apply-promo" href="javascript:void(0)" onclick="apply_promo(this)">Áp dụng khuyến mãi</a>
			    </div>
              	<div class="promo" style="display: none;">
					 <div class="col-sm-12 col-xs-12">
					 <div class="form-group">
				          	  <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá theo:</label>
					          <div class="col-md-9 col-sm-9 col-xs-12">
						          <select name="sel_type_promo">
						          	<option value="0">-----</option>
						          	<?php $__currentLoopData = $sel_cross_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						          	<option value="<?php echo e($option['idcrosstype']); ?>" <?php echo e($option['idcrosstype'] == 4 ? 'selected="selected"' : ''); ?>><?php echo e($option['namecross']); ?></option>
						          	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						          </select>
						      </div>
				      	  </div>				       
			          <div class="form-group">
			            <label class="control-label col-md-3 col-sm-3 col-xs-12">Giá bán:</label>
			            <div class="col-md-9 col-sm-9 col-xs-12">
			              <input type="text" name="price_promo" class="form-controls" value="0" />
			            </div>
			          </div>
			          <div class="form-group">
			            <label class="control-label col-md-3 col-sm-3 col-xs-12">Số lượng sale:</label>
			            <div class="col-md-9 col-sm-9 col-xs-12">
			              <input type="text" name="quality_promo" class="form-controls" value="0" />
			            </div>
			          </div>
		              </div>
		              <div class="row">
		              <div class="col-md-6 col-sm-6 col-xs-12">
		              	<div class="form-group">
		              	   <label class="control-label col-md-4 col-sm-3 col-xs-12">Từ ngày:</label>
	                       <div class="col-md-8 col-sm-9 col-xs-12 input-group sel-control myDatepicker1">
	                            <input type="text" class="form-control _start_date" name="_start_date">
	                            <span class="input-group-addon">
	                               <span class="glyphicon glyphicon-calendar"></span>
	                            </span>
	                        </div>
	                    </div>
		              </div>
		              <div class="col-md-6 col-sm-6 col-xs-12">
		              	<div class="form-group">
		              	 <label class="control-label col-md-4 col-sm-3 col-xs-12">Đến ngày:</label>
	                      <div class="col-md-8 col-sm-9 col-xs-12 input-group sel-control myDatepicker2">
	                        <input type="text" class="form-control _end_date" name="_end_date">
	                        <span class="input-group-addon">
	                           <span class="glyphicon glyphicon-calendar"></span>
	                        </span>
	                        </div>
	                    </div>
		              </div>
		             </div>
	              </div>   
              </div>
				<a class="btn btn-primary edit-product-belong" href="javascript:void(0)" onclick="cate_products(this);"><i class="fa fa-edit"></i>&nbsp;Tạo mới quan hệ với sp khác</a>&nbsp;
				<span class="dropup">
				    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Tạo sp mới quan hệ với sp hiện tại
				    <span class="caret"></span></button>
				    <ul class="dropdown-menu">
				      <?php $__currentLoopData = $sel_cross_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                		<li><a href="<?php echo e(action('Admin\ProductsController@create',['idparent' => $idproduct,'idcrosstype' => $row['idcrosstype']] )); ?>" class="btn btn-default btn-create-new"><?php echo e($row['namecross']); ?></a></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
				    </ul>
				  </span>

					
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
	                    		 <option value="<?php echo e($row['id_status_type']); ?>" <?php echo e($row['id_status_type'] == $product[0]['id_status_type'] ? 'selected="selected"' : ''); ?>><?php echo e($row['name_status_type']); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
	                    </select>
	                </div>
	            </div>
				<div class="form-group row">
	                <label class="col-lg-12 col-form-label" for="sel_idcategory">Chuyên mục chính<span class="text-danger">*</span></label>
	                <div class="col-lg-12">
	                    <select class="form-control cus-drop" name="sel_idcat_main" required>
	                    	<option value="0">--Tất cả--</option>
	                    	<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                    		 <option value="<?php echo e($row['idcategory']); ?>"><?php echo e($row['namecat']); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
	                    </select>
	                </div>
	            </div>
	            <div class="form-group row">
	            	<div class="col-lg-12">
	            		<div class="select_dynamic">
			            	<?php if(isset($str)): ?>
			            		<?php echo $str; ?>

			            	<?php endif; ?>
		            	</div>
		            </div>
	            </div>
	            <script>var _url_thumbnail = '<?php echo e(asset($product[0]['url_thumbnail'])); ?>';</script>
	            <div class="form-group frm-image thumbnails">
                    <p><a href="javascript:void(0)" onclick="performClick('file1');"><i class="fa fa-camera-retro" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Ảnh đại diện</a>
                    <input style="display:none" type="file" name="thumbnail" class="file" id="file1" accept="image/*"/></p>
                    <p><canvas id="canvas_thumbnail" width="0px" height="0px"></canvas></p>
				</div>	
	            <div class="form-group text-right">
					<input type="submit" class="btn btn-default btn-submit" name="btn-submit" value="Xác nhận" />
				</div>
			 </div> 
		</form>
		<?php echo $__env->make('admin.post.popup-relative', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/post/edit-product.blade.php ENDPATH**/ ?>