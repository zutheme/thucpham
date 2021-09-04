<?php use \App\Http\Controllers\Helper\HelperController; ?>
<!--breadcrumbs-inner-part start-->
<div class="breadcrumbs-inner-part img6">
    <div class="container">
        <div class="breadcrumbs-inner-bread text-center">
            <h1 class="title"><?php echo e($product[0]['namepro']); ?></h1>
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
<div class="rs-blog-inner single-blog pt-100 pb-100 md-pt-80 md-pb-80">
   <div class="container">
       <div class="row">
         <div class="col-lg-8">
            <div class="blog-item">
                
                <div class="full-blog-content">
                    <div class="blog-all-titles">
                        
                        <div class="title-wrap">
                              <h3 class="blog-title">
                                  <a href="#"><?php echo e($product[0]['namepro']); ?></a>
                              </h3>
                           <div class="blog-meta">
                              <ul>
                                <li>
                                      <div class="categore-name">
                                         <a href="<?php echo e(url('/')); ?>/<?php echo e($product[0]['slugcate']); ?>"><?php echo e($product[0]['namecat']); ?></a> 
                                      </div>
                                </li>
                                <li> <div class="author"><?php echo e($product[0]['count']); ?></div></li>
                                  
                              </ul> 
                           </div> 
                        </div>
                    </div>
                    <div class="blog-desc">
                         <?php echo $product[0]['description']; ?>

                    </div>
                    <div class="td-post-sharing-top">
                     
                        <div class="fb-like" 
                             data-href="<?php echo e(url('/')); ?>/<?php echo e($product[0]['slug']); ?>" 
                             data-width=""
                             data-layout="standard" 
                             data-action="like" 
                             data-size="small"  
                             data-share="true">
                        </div>
                    </div>

                </div>
            </div>
            <?php echo $__env->make('teamilk.canabia-news-relative', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         </div>
          <div class="col-lg-4 pl-50 md-pl-15 md-mt-60">
              <?php echo $__env->make('teamilk.canabia-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
       </div>
   </div>
</div>
<script>
  var _url = document.URL;
  console.log(_url);
  var e_btn_share = document.getElementsByClassName("btn-facebook")[0];
  e_btn_share.addEventListener("click", function(){
      FB.ui({
      method: 'share',
      href: _url
    }, function(response){
        console.log(response);
    });
  });
  
  // window.fbAsyncInit = function() {
  //   FB.init({
  //     appId            : '128078052234955',
  //     autoLogAppEvents : true,
  //     xfbml            : true,
  //     version          : 'v10.0'
  //   });
  // };

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '128078052234955',
      cookie     : true,
      xfbml      : true,
      version    : 'v10.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

   <!--Blog End-->
<!-- BEGIN: combo -->
<?php $idcrosstype = 0; ?>
<?php if(isset($sel_cross_byidproduct) && count($sel_cross_byidproduct) > 0 ): ?>
	<?php $__currentLoopData = $sel_cross_byidproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if($item['idcrosstype'] > $idcrosstype): ?>
			<?php $idcrosstype = $item['idcrosstype']; ?>
				<div class="c-content-box c-size-md c-overflow-hide c-bs-grid-small-space">
					<div class="container">
						<div class="c-content-title-4">
							<h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="c-bg-white"><?php echo e($item['namecross']); ?></span></h3>
						</div>
						<div class="row">
							<div data-slider="owl">
								<div class="owl-carousel owl-theme c-theme owl-small-space c-owl-nav-center" data-rtl="false" data-items="4" data-slide-speed="8000">
										<?php $__currentLoopData = $sel_cross_byidproduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($row['idcrosstype']==$idcrosstype): ?>
											<div class="item">
												<div class="c-content-product-2 c-bg-white c-border">
													<div class="c-content-overlay">
																
														<div class="c-overlay-wrapper">
															<div class="c-overlay-content">
																<a href="<?php echo e(action('teamilk\ProductController@show',$row['idproduct'])); ?>" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Xem giá gốc</a>
															</div>
														</div>
														<div class="c-bg-img-center-contain c-overlay-object" data-height="height" style="height: 270px; background-image: url(<?php echo e(asset($row['urlfile'])); ?>"></div>
													</div>
													<div class="c-info">
														<p class="c-title c-font-18 c-font-slim"><?php echo e($row['namepro']); ?></p>
														<p class="c-price c-font-16 c-font-slim"><span class="currency"><?php echo e($row['price']); ?></span><span class="vnd"></span> &nbsp;
															<span class="c-font-16 c-font-slim">x<?php echo e($row['quality_sale']); ?>(buổi)</span>
															
														</p>
													</div>
													<div class="btn-group btn-group-justified" role="group">
														<div class="btn-group c-border-top" role="group">
															<a href="javascript:void(0)" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product">Thích</a>
														</div>
														<div class="btn-group c-border-left c-border-top" role="group">
															<a href="<?php echo e(action('teamilk\ProductController@show',$row['idproduct'])); ?>" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product">Mua</a>
														</div>
													</div>
												</div>
											</div>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
		<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php $__env->startSection('other_scripts'); ?>

    
    
<?php $__env->stopSection(); ?><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/teamilk/product/show-post.blade.php ENDPATH**/ ?>