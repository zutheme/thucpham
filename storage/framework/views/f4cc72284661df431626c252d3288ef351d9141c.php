<div class="top_nav">
  <div class="nav_menu">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li class="nav-item">
          <?php if(Auth::check()): ?> 
               <a class=""  href="<?php echo e(url('admin/logout')); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a> 
            <?php endif; ?>
        </li>
        <li class="nav-item dropdown open" style="padding-left: 15px;"> 
        
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo e(asset($url_avatar)); ?>" alt=""><?php if(Auth::check()): ?> 
                      <?php echo e(Auth::user()->name); ?> 
                    <?php endif; ?>
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"  href="javascript:;"> Profile</a>
              <a class="dropdown-item"  href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Settings</span>
              </a>
          <a class="dropdown-item"  href="#">Help</a>
           <?php if(Auth::check()): ?> 
               <a class="dropdown-item"  href="<?php echo e(url('admin/logout')); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a> 
            <?php endif; ?>
          </div>
        </li>

        <li role="presentation" class="nav-item dropdown open">
          <a href="#" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green"><?php echo e(auth()->user()->unreadNotifications->count()); ?></span>
          </a>
          <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
            
            <li class="nav-item">
              <a class="dropdown-item">
                <span class="image"><img src="<?php echo e(asset('dashboard/production/images/img.jpg')); ?>" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                 
                </span>
              </a>
            </li>
          
              <li class="nav-item">
              <div class="text-center">
                <a class="dropdown-item">
                  <strong>No record</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          
            
          </ul>
        </li>
        
      </ul>
    </nav>
  </div>
</div><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/general-topsidebar.blade.php ENDPATH**/ ?>