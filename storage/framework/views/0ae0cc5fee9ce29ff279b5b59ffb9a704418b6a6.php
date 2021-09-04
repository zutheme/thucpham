<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div class="widget-search mb-50">
   <form method="post" action="<?php echo e(url('/search/s/page/1')); ?>">
        <?php echo csrf_field(); ?>
            <input class="search-input" type="search" value="" name="keyword" autocomplete="off" placeholder="Từ khóa..." required >
            <button type="submit" value="Search"><i class="fa fa-search" aria-hidden="true"></i></i></button>
    </form>
   
</div>
<div class="recent-widget mb-50">
    <h2 class="widget-title">Tin mới</h2>
    <?php $__currentLoopData = $rs_tintuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="show-featured">
        <div class="post-img">
           <a href="#"><img src="<?php echo e(asset( $row['urlfile'] )); ?>" alt="<?php echo e($row['namepro']); ?>"></a>
        </div>
        <div class="post-item">
            <div class="post-desc">
                <a href="<?php echo e(url('/')); ?>/<?php echo e($row['slug']); ?>"><?php echo e($row['namepro']); ?></a>
                
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="widget-categories mb-50">
    <h2 class="widget-title">Chuyên mục</h2>
     <?php
    if(isset($rs_menu2)){
      HelperController::menu_footers($rs_menu2, 0, 0,  0, 'cate-footer', '');
    } ?>
    
</div>
<div class="contact-widget">
    <h2 class="widget-title">Xem nhiều</h2>
    <ul>
     <?php $__currentLoopData = $rs_listpostpular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a href="<?php echo e(url('/')); ?>/<?php echo e($row['slug']); ?>"><i class="fa fa-globe"></i><?php echo e($row['namepro']); ?></li></a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/teamilk/canabia-sidebar.blade.php ENDPATH**/ ?>