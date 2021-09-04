 <div class="col-md-12 col-sm-12 col-xs-12">

      <div class="x_panel">

          <div class="x_title">

              <?php if(isset($errors)): ?>

                <?php echo e($errors); ?>


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

            <div class="x_title">

             
             
             <form method="post" action="<?php echo e(url('/admin/listpostbytype/'.$posttype)); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="filter" value="1">
                <input type="hidden" class="form-control _start_date" name="_start_date">
                <input type="hidden" class="form-control _end_date" name="_end_date">
                <div class="row">
                      <div class="col-md-12 col-sm-12 ">
                        <div class="dashboard_graph">
                          <div class="row x_title">
                            <div class="col-md-6">
                              <h3>Quản lý tương tác <small></small></h3>
                            </div>
                            <div class="col-md-6">
                              <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="fa fa-calendar"></i>
                                <span>December 30, 2020 - January 28, 2021</span> <b class="caret"></b>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4 text-center">
                    <div class="form-group">        
                          <select class="form-control cus-drop" name="sel_idcat_main" required>
                            <option value="0">--Tất cả--</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($row['idcategory']); ?>"><?php echo e($row['namecat']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                          </select>
                       
                        <div class="select_dynamic">
                          <?php if(isset($str)): ?>
                            <?php echo $str; ?>

                          <?php endif; ?>
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                        <?php if(isset($post_types)): ?>
                          <select class="form-control sel-control" name="sel_id_post_type" required="true">

                            <option value="0" <?php echo e($_id_post_type_sl == 0 ? 'selected="selected"' : ''); ?>>Kiểu post</option>

                            <?php $__currentLoopData = $post_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <option value="<?php echo e($row['idposttype']); ?>" <?php echo e($row['idposttype'] == $_id_post_type_sl ? 'selected="selected"' : ''); ?>><?php echo e($row['nametype']); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          </select> 

                        <?php endif; ?>
                     
                    </div>
                  </div> 
                  <div class="col-sm-2 text-center">
                    <div class="form-group">
                        <?php if(isset($statustypes)): ?>
                          <select class="form-control sel-control" name="sel_id_status" required="true">

                            <option value="0" <?php echo e($_id_status_type == 0 ? 'selected="selected"' : ''); ?>>Tất cả</option>

                            <?php $__currentLoopData = $statustypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <option value="<?php echo e($row['id_status_type']); ?>" <?php echo e($row['id_status_type'] == $_id_status_type ? 'selected="selected"' : ''); ?>><?php echo e($row['name_status_type']); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          </select> 

                        <?php endif; ?>
                    </div>
                  </div>
                   <div class="col-sm-2 text-center">
                        <?php if(isset($rs_store)): ?>
                          <select class="form-control sel-control" name="sel_id_store" required="true">

                            <option value="0" <?php echo e($_id_store == 0 ? 'selected="selected"' : ''); ?>>Tất cả</option>

                            <?php $__currentLoopData = $rs_store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <option value="<?php echo e($row['idcategory']); ?>" <?php echo e($row['idcategory'] == $_id_store ? 'selected="selected"' : ''); ?>><?php echo e($row['namecat']); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          </select> 

                        <?php endif; ?>
                  </div>
                  <div class="col-sm-2 text-center">
                    <div class="form-group">
                        <?php if(isset($statustypes)): ?>
                          <select class="form-control sel-control" name="sel_id_status" required="true">

                            <option value="0" <?php echo e($_id_status_type == 0 ? 'selected="selected"' : ''); ?>>Tất cả</option>

                            <?php $__currentLoopData = $statustypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <option value="<?php echo e($row['id_status_type']); ?>" <?php echo e($row['id_status_type'] == $_id_status_type ? 'selected="selected"' : ''); ?>><?php echo e($row['name_status_type']); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          </select> 

                        <?php endif; ?>
                    </div>
                  </div>
              </div>
              
			    <div class="row">
                  <div class="col-sm-3 text-left">
                    <div class="form-group row">
                      <label class="col-lg-12 col-form-label" for="sel_idcategory">Chuyên mục tag<span class="text-danger">*</span></label>
                      <div class="col-lg-12">
                          <select class="form-control cus-drop" name="sel_idcat_main_tag" required>
                            <option value="0">--Tất cả--</option>
                            <?php $__currentLoopData = $rs_catetag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                  </div>
                  <div class="col-sm-3 text-left">       
                      <div class="form-group row">
                        <label class="col-lg-12 col-form-label">Chọn Thẻ</label>
                        <div class="col-lg-12">
                          <div class="tagclound"></div>
                        </div>
                      </div>
                      
                    
                  </div>
				  
                  <div class="col-sm-4 text-left">
                    
                  </div>
			</div>
			<div class="row">
                  <div class="col-sm-12 text-center">
                    <div class="form-group">
                     <input type="submit" class="btn btn-default btn-filter-date" name="filter-date" value="Áp dụng" />&nbsp;&nbsp;
                      
                      <a class="btn btn-default btn-primary" href="<?php echo e(action('Admin\PostsController@create',['idposttype'=>$_id_post_type_sl])); ?>">Tạo mới</a>
                    </div>
                  </div>
              </div>
              </form>
              <div class="clearfix"></div>
            </div>

              <div class="x_content">

                <p class="text-muted font-13 m-b-30"></p>
           
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> 

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Ngày</th>
						<th>Họ Tên</th>
                        <th>Điện thoại</th>
                        <td class="interactive">Tương tác</td>
                        <th style="width: 100px !important;">Số tương tác</th>
                        <th>-</th>

                     </tr>

                 </thead>

               <tfoot>

                <tr>
                      <th>ID</th>
                      <th>Ngày</th>
					  <th>Họ Tên</th>
                      <th>Điện thoại</th>
                      <td class="interactive">Tương tác</td>
                      <th style="width: 100px !important;">Số tương tác</th>
                      <th>-</th>

                   </tr>

                   </tr>

              </tfoot>

              <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($row['idproduct']); ?></td>
                  <td><?php echo e($row['created_at']); ?></td>
				  <td><?php echo e($row['lastname']); ?> <?php echo e($row['middlename']); ?> <?php echo e($row['firstname']); ?></td> 
                  <td><?php echo e($row['phone']); ?></td>
                  <td class="interactive">
                     <span class="interactive">
                        <ul class="icon">
                          <?php $__currentLoopData = $sel_cross_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              							
              								<li><a href="<?php echo e(action('Admin\PostsController@create',['idposttype' => $rows['idposttype'], 'idparent' => $row['idproduct'],'idcrosstype' => 6])); ?>" class="btn-icon btn-create-new"><?php echo $rows['icon']; ?></a></li> 
              							
							
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </ul>
                      </span> 
                  </td>
                  <td class="tdbreak" style="width: 100px !important;"><?php echo e($row['count_int']); ?></td>
                  <td class="btn-control-action">
                    <input type="hidden" name="idpost_row" value="<?php echo e($row['idproduct']); ?>">
                   <a href="<?php echo e(action('Admin\PostsController@edit',$row['idproduct'])); ?>" class="info-number"><i class="fa fa-pencil-square"></i></a>
                   
                  </td>    
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
              </tbody>

              </table>

          </div>

        </div>

      </div>

</div><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/post/index-survey.blade.php ENDPATH**/ ?>