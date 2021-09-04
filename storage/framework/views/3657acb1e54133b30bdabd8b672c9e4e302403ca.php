<?php use \App\Http\Controllers\Helper\HelperController; ?>
<!--breadcrumbs-inner-part start-->
<div class="breadcrumbs-inner-part img6">
    <div class="container">
        <div class="breadcrumbs-inner-bread text-center">
            <h1 class="title"><?php echo e($title); ?></h1>
            <?php $curent_idcategory = 0;
				if(isset($cate_selected)){
				$curent_idcategory = $cate_selected[0]['idcategory'];
			} ?>
            <ul class="breadcrumbs-trial">
                <?php HelperController::breadcrumbpost($rs_cat_product,$curent_idcategory,'breadcrumbs-trial',0); ?>
            </ul>
        </div>
    </div>
</div>
<!--breadcrumbs-inner-part start-->
 <!--Blog start-->
<div class="rs-blog-inner pt-100 pb-100 md-pt-80 md-pb-80">
   <div class="container">
       <div class="row">
          <div class="col-lg-8">
          	 <?php if(isset($rs_lpro)): ?>
				<?php $__currentLoopData = $rs_lpro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				 <div class="blog-item mb-70 md-mb-40">
                     <div class="blog-img">
                          <a href="<?php echo e(url('/')); ?>/<?php echo e($row['slug']); ?>"><img src="<?php echo e(asset( $row['urlfile'] )); ?>" alt="<?php echo e($row['namepro']); ?>"></a>
                      </div>
                      <div class="full-blog-content">
                          <div class="blog-all-titles">
                              
                              <div class="title-wrap">
                                    <h3 class="blog-title">
                                        <a href="<?php echo e(url('/')); ?>/<?php echo e($row['slug']); ?>"><?php echo e($row['namepro']); ?></a>
                                    </h3>
                                 <div class="blog-meta">
                                    <ul>
                                        <li>
                                            <div class="categore-name">
                                               <a href="<?php echo e(url('/')); ?>/<?php echo e($row['slugcate']); ?>"><?php echo e($row['namecat']); ?></a> 
                                            </div>
                                        </li>
                                        <li> <div class="author"><?php echo e($row['count']); ?></div></li>
                                        
                                    </ul> 
                                 </div> 
                              </div>
                          </div>
                          <div class="blog-desc pb-15">
                              <p>
                                 <?php $content = $row['description'];
									 echo HelperController::get_the_excerpt_max(200, $content); ?> 
                              </p>
                          </div>
                          <div class="blog-button">
                              <a href="<?php echo e(url('/')); ?>/<?php echo e($row['slug']); ?>">Đọc thêm</a>
                          </div>
                      </div>
                  </div> 
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php $countpage = $rs_lpro[0]['count_page']; ?>
				<?php if($countpage > 1): ?>
				<?php $curent_page = Request::segment(3); 
					if(empty($curent_page)) $curent_page =1; ?>
				<div class="page-nav td-pb-padding-side">
					<?php for($i=1; $i < ($countpage + 1); $i++): ?>
					<?php  $curent_class = ($curent_page == $i) ? '<span class="current">'.$i.'</span>':''; ?>
						<?php if(isset($curent_class) and !empty($curent_class)): ?>
							<?php echo $curent_class; ?>

						<?php elseif($i == $countpage): ?>
							<a href="<?php echo e(url('/')); ?>/<?php echo e($curent_slug); ?>/page/<?php echo e($i); ?>" class="last" title="<?php echo e($countpage); ?>"><?php echo e($countpage); ?></a><a href="#"><i class="fa fa-arrow-right"></i></a><span class="pages">Page <?php echo e($curent_page); ?> of <?php echo e($countpage); ?></span><div class="clearfix"></div>
						<?php else: ?>
							<a class="page" title="<?php echo e($i); ?>" href="<?php echo e(url('/')); ?>/<?php echo e($curent_slug); ?>/page/<?php echo e($i); ?>"><?php echo e($i); ?></a>
						<?php endif; ?>
					<?php endfor; ?>
					
				</div>
				<?php endif; ?>
				
			<?php endif; ?>
             
              
          </div>
          <div class="col-lg-4 pl-50  md-pl-15 md-mt-60">
     			 <?php echo $__env->make('teamilk.canabia-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
       </div>
   </div>
</div>
<!--Blog End-->
<?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/teamilk/product/layout-post.blade.php ENDPATH**/ ?>