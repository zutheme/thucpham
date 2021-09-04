



<?php $__env->startSection('other_styles'); ?>

   <link href="<?php echo e(asset('assets-tea/css/custom-product.css?v=0.8.7')); ?>" rel="stylesheet" type="text/css">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->

<div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">

	<div class="container">

		<div class="c-page-title c-pull-left">

			<h3 class="c-font-uppercase c-font-sbold">Thanh toán</h3>

			<h4 class="">Vui lòng cung cấp thông tin chi tiết để được phục vụ tốt hơn</h4>

			<?php if(isset($str_qr)): ?>

				

			<?php endif; ?>

		</div>

		

	</div>

</div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->

<?php $str_profile = session()->get('profile'); 

      $profile = json_decode($str_profile, true); 
      $sel_sex = 0;
      $url_avatar = "";
      $firstname = '';
      $lastname = '';
      $middlename = '';
      $idsex = 0;
      $birthday = '';
      $address = '';
      $mobile = '';
      $email = '';
      $url_avatar = '';
      $idcountry = '';
      $idprovince = '';
      $idcitytown = '';
      $iddistrict = '';
      $idward = '';
     if(isset($profile)) {

      foreach($profile as $row) {



          $idprofile = $row["idprofile"];



          $firstname = $row["firstname"];



          $lastname = $row['lastname'];


          $middlename = $row['middlename'];


          $idsex = $row['idsex'];



          $birthday = $row['birthday'];



          $address = $row['address'];



          $mobile = $row['mobile'];



          $email = $row['email'];



          $url_avatar = $row['url_avatar'];



          $idcountry = $row['idcountry'];

          $idprovince = $row['idprovince'];

          $idcitytown = $row['idcitytown'];

          $iddistrict = $row['iddistrict'];

          $idward = $row['idward'];

       }

       $url_avartar_sex = ($sel_sex == 0) ? 'dashboard/production/images/avatar/avatar-female.jpg' : 'dashboard/production/images/avatar/avatar-male.jpg';



       $url_avatar = (strlen($url_avatar) > 0) ? $url_avatar : $url_avartar_sex; 



     } ?>

		<!-- BEGIN: PAGE CONTENT -->

		<div class="c-content-box c-size-lg">

			<div class="container">

				<form class="c-shop-form-1" method="post" action="<?php echo e(url('/cart/submitcheckout')); ?>" enctype='application/json'>

					<?php echo e(csrf_field()); ?>


					<div class="row">

						<!-- BEGIN: ADDRESS FORM -->

						<div class="col-md-7 c-padding-20">

							<!-- BEGIN: BILLING ADDRESS -->

							<h3 class="c-font-bold c-font-uppercase c-font-24">Thông tin khách hàng</h3>

							<div class="row">

								<div class="col-md-12">

									<?php if(isset($error_reg)): ?>

										

									<?php endif; ?>

								</div>

							</div>

							<div class="row">

								<div class="col-md-12">
									<div class="row">
										<div class="form-group col-md-6">
											<label class="control-label">Điện thoại</label>
											<input type="tel" class="form-control c-square c-theme" name="phone" placeholder="" value="<?php echo e($mobile); ?>" required="true">
										</div>
										<div class="col-md-6">
											<label class="control-label">Họ Tên</label>
											<input type="text" class="form-control c-square c-theme" name="firstname" placeholder="" required="true" value="<?php echo e($firstname); ?>">
										</div>
										<input type="hidden" class="form-control c-square c-theme" name="lastname" placeholder="" value="<?php echo e($lastname); ?>">
										<input type="hidden" class="form-control c-square c-theme" name="middlename" placeholder="" value="<?php echo e($middlename); ?>">
									</div>

								</div>

							</div>					

							<div class="row">

								<div class="form-group col-md-12">

									<label class="control-label">Địa chỉ</label>

									<input type="text" class="form-control c-square c-theme" name="address" placeholder="" value="<?php echo e($address); ?>" required>

								</div>

							</div>

							

							<div class="row">

								<div class="form-group col-md-12">

									<div class="row">

										<div class="form-group col-md-12">

											<label class="control-label">Địa chỉ Email</label>

											<input type="email" class="form-control c-square c-theme" name="email" placeholder="" value="<?php echo e($email); ?>">

										</div>

										

									</div>

								</div>

							</div>

							<?php if(!Auth::check()): ?>

								<div class="row c-margin-t-15">

									<div class="form-group col-md-12">

										<div class="c-checkbox c-toggle-hide" data-object-selector="c-account" data-animation-speed="600">

											<input type="checkbox" id="checkbox1-77" class="c-check" name="check_new_account">

											<label for="checkbox1-77">

												<span class="inc"></span>

												<span class="check"></span>

												<span class="box"></span>

												Tạo tài khoản mới?

											</label>

										</div>

										<p class="help-block">Nhập thông tin sau để tạo tài khoản. Vui lòng đăng nhập nếu đã có tài khoản.</p>

									</div>

								</div>

								<div class="row c-account">

									<div class="form-group col-md-12">

										<label class="control-label">Mật khẩu</label>

										<input type="password" class="form-control c-square c-theme" name="password" placeholder="">

									</div>

								</div>

								<div class="row c-account">

									<div class="form-group col-md-12">

										<label class="control-label">Nhập lại mật khẩu</label>

										<input type="password" class="form-control c-square c-theme" name="c_password" placeholder="">

									</div>

								</div>

							<?php endif; ?>

							<div class="row">

								<div class="form-group col-md-12">

									<label class="control-label">Ghi chú</label>

									<textarea class="form-control c-square c-theme" rows="3" name="reci_note" placeholder=""></textarea>

								</div>

							</div>

						</div>

						<!-- END: ADDRESS FORM -->

						<!-- BEGIN: ORDER FORM -->

						<div class="col-md-5">

							<div class="c-content-bar-1 c-align-left c-bordered c-theme-border c-shadow">

							<h1 class="c-font-bold c-font-uppercase c-font-24">Đặt mua</h1>

							<ul class="c-order list-unstyled list_order">

							</ul>

							<ul class="c-order list-unstyled">

								<li class="row c-margin-b-15">

							<div class="col-md-6 c-font-20"><h2>Sản phẩm</h2></div>

							<div class="col-md-6 c-font-20"><h2>Tổng</h2></div>

						</li>

						<?php $subtotal = 0; ?>

			<?php $__currentLoopData = $rs_lstordsess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				 <?php $_total_item_parent = $row['price']*$row['inp_session'];?>

				 	<li class="row c-border-bottom"></li>

					<li class="row c-margin-b-15 c-margin-t-15">

						<div class="col-md-6 c-font-20"><a href="<?php echo e(action('teamilk\ProductController@show',$row['idproduct'])); ?>" class="c-theme-link"><?php echo e($row['namepro']); ?> x  <?php echo e($row['inp_session']); ?> (*)</a></div>

						<div class="col-md-6 c-font-20">

							<p class=""><span class="currency"><?php echo e($_total_item_parent); ?></span><span class="vnd"></span></p>

						</div>

					</li>

		  				<input type="hidden" name="l_idproduct[]" value="<?php echo e($row['idproduct']); ?>">

		  				<input type="hidden" name="l_idorder[]" value="<?php echo e($row['idorder']); ?>">

	  				<input type="hidden" name="l_parent_id[]" value="<?php echo e($row['parent']); ?>">

	 				<input type="hidden" name="l_quality[]" value="<?php echo e($row['inp_session']); ?>">

	  				<input type="hidden" name="l_unit_price[]" value="<?php echo e($row['price']); ?>">

				 <?php $subtotal = $subtotal + $_total_item_parent; ?>

				

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						

						<li class="row c-margin-b-15 c-margin-t-15">

							<div class="col-md-6 c-font-20">

								<p class="c-font-30">Tổng</p>

							</div>

							<div class="col-md-6 c-font-20">

								<p class="c-font-bold c-font-30"><span class="c-shipping-total"><span class="currency"><?php echo e($subtotal); ?></span><span class="vnd"></span></span></p>

							</div>

						</li>

								<li class="row">

									<div class="col-md-12">

										<div class="c-radio-list">

											<div class="c-radio">

												<input type="radio" id="radio1" class="c-radio" name="payment" checked="">

												<label for="radio1" class="c-font-bold c-font-20">

													<span class="inc"></span>

													<span class="check"></span>

													<span class="box"></span>

													Xác nhận 

												</label>

												<p class="help-block">Vui lòng kiểm tra đơn hàng và thông thông tin hợp lệ để chúng tôi phục vụ tốt hơn.</p>

											</div>

											

										</div>

									</div>

								</li>

								<li class="row c-margin-b-15 c-margin-t-15">

									<div class="form-group col-md-12">

										<div class="c-checkbox">

											<input type="checkbox" id="checkbox1-11" class="c-check">

											<label for="checkbox1-11">

												<span class="inc"></span>

												<span class="check"></span>

												<span class="box"></span>

												Bạn đã đọc và chấp nhận điều kiện, chính sách của chúng tôi

											</label>

										</div>

									</div>

								</li>

								<li class="row">

									<div class="form-group col-md-12" role="group">

										<button type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Xác nhận</button>

										<button type="submit" class="btn btn-lg btn-default c-btn-square c-btn-uppercase c-btn-bold">Bỏ qua</button>

									</div>

								</li>

							</ul>

						</div>

						</div>

						<!-- END: ORDER FORM -->

					</div>

				</form>

			</div>

		</div>  

		<!-- END: PAGE CONTENT -->

<script type="text/javascript">

	var _url_show = '<?php echo e(action('teamilk\ProductController@show',0)); ?>';

	_url_show = _url_show.substring(0, _url_show.length-1);

	var url_home = '<?php echo e(url('/')); ?>';

	var _url_check_out = '<?php echo e(url('/teamilk/checkout')); ?>';

	var _url_complete = '<?php echo e(url('/complete')); ?>';

</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('other_scripts'); ?>

	<script src="<?php echo e(asset('assets-tea/js/checkout.js?v=0.3.5')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('teamilk.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thucpham/domains/thucphamsachban.com/public_html/resources/views/teamilk/addcart/check-out.blade.php ENDPATH**/ ?>