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

            
  
             <form method="post" action="<?php echo e(url('/admin/tag')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                      <div class="col-md-12 col-sm-12 ">
                        <div class="dashboard_graph">
                          <div class="row x_title">
                            <div class="col-md-3">
                                <div class="col-md-6 col-sm-6">
                                    <input type="hidden" class="form-control _start_date" name="_start_date" value="<?php echo e($_start_date_sl); ?>">
                                    
                                </div>
                                <div class="col-md-6 col-sm-6">
                                   
                                  </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-6 col-sm-6">
                                    <input type="hidden" class="form-control _end_date" name="_end_date" value="<?php echo e($_end_date_sl); ?>">
                                   
                                 </div>                       
                                <div class="col-md-6 col-sm-6">
                                    
                                </div>
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
                            <option value="0">--T???t c???--</option>
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

                            <option value="0" <?php echo e($_id_post_type_sl == 0 ? 'selected="selected"' : ''); ?>>Ki???u post</option>

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

                            <option value="0" <?php echo e($_id_status_type == 0 ? 'selected="selected"' : ''); ?>>T???t c???</option>

                            <?php $__currentLoopData = $statustypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <option value="<?php echo e($row['id_status_type']); ?>" <?php echo e($row['id_status_type'] == $_id_status_type ? 'selected="selected"' : ''); ?>><?php echo e($row['name_status_type']); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          </select> 

                        <?php endif; ?>
                    </div>
                  </div>
                   <div class="col-sm-2 text-center">
                        
                  </div>
                  <div class="col-sm-2 text-center">
                  <div class="form-group">
                   <input type="submit" class="btn btn-default btn-filter-date" name="filter-date" value="??p d???ng" />&nbsp;&nbsp;
                    
                    <a class="btn btn-default btn-primary" href="<?php echo e(action('Admin\TagController@create')); ?>">T???o m???i</a>
                  </div>
                </div>
              </div>
              </form>
              <div class="clearfix"></div>
            </div>

              <div class="x_content">

                <p class="text-muted font-13 m-b-30"></p>
                  <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Th???</th>
                            <th>Chuy??n m???c</th>
                            <th>-</th>
                            <th>-</th>
                         </tr>
                     </thead>
                     <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Th???</th>
                            <th>Chuy??n m???c</th>
                            <th>-</th>
                            <th>-</th>
                         </tr>
                    </tfoot>

                    <tbody>
                      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                         <td><?php echo e($row['idtag']); ?></td>
                         <td><?php echo e($row['nametag']); ?></td>
                         <td><?php echo e($row['namecat']); ?></td>
                         <td class="btn-control">
                           
                            <button type="button" class="btn btn-danger btn-delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                          
                         </td>
                         <td>
                          <a href="<?php echo e(url('admin/tag/'.$row['idtag'].'/edit')); ?>" class="info-number"><i class="fa fa-pencil-square"></i></a> 
                        </td> 
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </tbody>
              </table>
          </div>

        </div>

      </div>

</div><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/tag/index-tag.blade.php ENDPATH**/ ?>