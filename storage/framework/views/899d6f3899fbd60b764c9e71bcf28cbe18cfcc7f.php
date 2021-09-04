<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Hoạt động</a>
    </li>
    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Điện thoại</a>
    </li>
    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">SMS</a>
    </li>
     <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Email</a>
    </li>
    <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab5" data-toggle="tab" aria-expanded="false">Đặt lịch</a>
    </li>
    <li role="presentation" class=""><a href="#tab_content6" role="tab" id="profile-tab6" data-toggle="tab" aria-expanded="false">Scan</a>
    </li>
	<li role="presentation" class=""><a href="#tab_content7" role="tab" id="profile-tab7" data-toggle="tab" aria-expanded="false">Tư vấn</a>
    </li>
	<li role="presentation" class=""><a href="#tab_content8" role="tab" id="profile-tab8" data-toggle="tab" aria-expanded="false">Báo cáo</a>
    </li>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

      <!-- start recent activity -->
      <ul class="messages">
         <?php $__currentLoopData = $sel_cross_byidproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
            <img src="<?php echo e(asset($row['url_avatar'])); ?>" class="avatar" alt="Avatar">
            <div class="message_date">
             
              <p class="month"><?php echo e($row['created_at']); ?></p>
            </div>
            <div class="message_wrapper">
              <h4 class="heading"><?php echo e($row['firstname']); ?></h4>
              <blockquote class="message" style="word-wrap: break-word"><?php echo $row['description']; ?></blockquote>
              <br />
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="#"><?php echo $row['icon']; ?></i> <?php echo e($row['nametype']); ?></a>
              </p>
            </div>
          </li>                
              
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <!-- end recent activity -->

    </div>

    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab2">
      <!-- start recent activity -->
      <ul class="messages">
         <?php $__currentLoopData = $rs_phone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
            <img src="<?php echo e(asset($row['url_avatar'])); ?>" class="avatar" alt="Avatar">
            <div class="message_date">
             
              <p class="month"><?php echo e($row['created_at']); ?></p>
            </div>
            <div class="message_wrapper">
              <h4 class="heading"><?php echo e($row['firstname']); ?></h4>
              <blockquote class="message" style="word-wrap: break-word"><?php echo $row['description']; ?></blockquote>
              <br />
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="#"><?php echo $row['icon']; ?></i> <?php echo e($row['nametype']); ?></a>
              </p>
            </div>
          </li>                
              
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <!-- end recent activity -->
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab3">
      <!-- start recent activity -->
      <ul class="messages">
         <?php $__currentLoopData = $rs_sms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
            <img src="<?php echo e(asset($row['url_avatar'])); ?>" class="avatar" alt="Avatar">
            <div class="message_date">
             
              <p class="month"><?php echo e($row['created_at']); ?></p>
            </div>
            <div class="message_wrapper">
              <h4 class="heading"><?php echo e($row['firstname']); ?></h4>
              <blockquote class="message" style="word-wrap: break-word"><?php echo $row['description']; ?></blockquote>
              <br />
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="#"><?php echo $row['icon']; ?></i> <?php echo e($row['nametype']); ?></a>
              </p>
            </div>
          </li>                
              
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <!-- end recent activity -->
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab4">
      <!-- start recent activity -->
      <ul class="messages">
         <?php $__currentLoopData = $rs_email; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
            <img src="<?php echo e(asset($row['url_avatar'])); ?>" class="avatar" alt="Avatar">
            <div class="message_date">
             
              <p class="month"><?php echo e($row['created_at']); ?></p>
            </div>
            <div class="message_wrapper">
              <h4 class="heading"><?php echo e($row['firstname']); ?></h4>
              <blockquote class="message" style="word-wrap: break-word"><?php echo $row['description']; ?></blockquote>
              <br />
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="#"><?php echo $row['icon']; ?></i> <?php echo e($row['nametype']); ?></a>
              </p>
            </div>
          </li>                
              
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <!-- end recent activity -->
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab5">
     <!-- start recent activity -->
      <ul class="messages">
         <?php $__currentLoopData = $rs_booking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
            <img src="<?php echo e(asset($row['url_avatar'])); ?>" class="avatar" alt="Avatar">
            <div class="message_date">
             
              <p class="month"><?php echo e($row['created_at']); ?></p>
            </div>
            <div class="message_wrapper">
              <h4 class="heading"><?php echo e($row['firstname']); ?></h4>
              <blockquote class="message" style="word-wrap: break-word"><?php echo $row['description']; ?></blockquote>
              <br />
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="#"><?php echo $row['icon']; ?></i> <?php echo e($row['nametype']); ?></a>
              </p>
            </div>
          </li>                
              
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <!-- end recent activity -->
    </div>
	<div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab6">
     <!-- start recent activity -->
      <ul class="messages">
         <?php $__currentLoopData = $rs_scan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
            <img src="<?php echo e(asset($row['url_avatar'])); ?>" class="avatar" alt="Avatar">
            <div class="message_date">
             
              <p class="month"><?php echo e($row['created_at']); ?></p>
            </div>
            <div class="message_wrapper">
              <h4 class="heading"><?php echo e($row['firstname']); ?></h4>
              <blockquote class="message" style="word-wrap: break-word"><?php echo $row['description']; ?></blockquote>
              <br />
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="#"><?php echo $row['icon']; ?></i> <?php echo e($row['nametype']); ?></a>
              </p>
            </div>
          </li>                
              
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <!-- end recent activity -->
    </div>
	<div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="profile-tab7">

      <!-- start recent activity -->
      <ul class="messages">
         <?php $__currentLoopData = $rs_consultant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
            <img src="<?php echo e(asset($row['url_avatar'])); ?>" class="avatar" alt="Avatar">
            <div class="message_date">
             
              <p class="month"><?php echo e($row['created_at']); ?></p>
            </div>
            <div class="message_wrapper">
              <h4 class="heading"><?php echo e($row['firstname']); ?></h4>
              <blockquote class="message" style="word-wrap: break-word"><?php echo $row['description']; ?></blockquote>
              <br />
              <p class="url">
                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                <a href="#"><?php echo $row['icon']; ?></i> <?php echo e($row['nametype']); ?></a>
              </p>
            </div>
          </li>                
              
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <!-- end recent activity -->

    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_content8" aria-labelledby="profile-tab8">

      <!-- start user projects -->
      <table class="data table table-striped no-margin">
        <thead>
          <tr>
            <th>#</th>
            <th>Tương tác</th>
            <th>Số lượng</th>
            <th class="hidden-phone">Đã nhận</th>
            <th>Chưa nhận</th>
          </tr>
        </thead>
        <tbody>
          <?php $order = 1; ?>
          <?php $__currentLoopData = $rs_report; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($order); ?></td>
            <td><?php echo e($row['nametype']); ?></td>
            <td><?php echo e($row['counttype']); ?></td>
            <td>0</td>
            <td>0</td>
          </tr>
          <?php $order++; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
        </tbody>
      </table>
      <!-- end user projects -->

    </div>
  </div>
</div>
 <?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/post/timeline.blade.php ENDPATH**/ ?>