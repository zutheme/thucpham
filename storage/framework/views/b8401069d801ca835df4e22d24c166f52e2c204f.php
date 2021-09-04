<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Ticmedi</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <a href="<?php echo e(url('/admin/profile/')); ?>/<?php echo e(Auth::id()); ?>"><img src="<?php echo e(asset($url_avatar)); ?>" alt="..." class="img-circle profile_img"></a>
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <?php if(Auth::check()): ?>
            <h2><a href="<?php echo e(url('/admin/profile/')); ?>/<?php echo e(Auth::id()); ?>"><?php echo e(Auth::user()->name); ?></a></h2> 
        <?php endif; ?>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/admin/general-left.blade.php ENDPATH**/ ?>