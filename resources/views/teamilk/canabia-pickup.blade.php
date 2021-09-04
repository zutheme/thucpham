<section class="contact-home">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 text-center section-title-wrapper"> 
				<h2 class="section_header">Đặt lịch khám</h2>
				<span class="title-separator separator-border theme-color-bg"></span>
				<div class="desc">
					<p class="topmargin_40">Quý khách vui lòng đặt lịch thăm khám trước để được phục vụ tốt nhất</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="ds parallax page_shop section_padding_top_50 section_padding_bottom_50" style="background-image: url({{ asset('public/images/parallax/BACKGROUND_1.jpg')}}">
	<div class="container">
		<div class="row">
	      <div class="main-contact">
	            <form class="contact-form row columns_padding_10" method="post">
            		<div class="col-sm-12 text-center">
            			<label class="header">Thông tin đặt lịch</label>
            		</div>
					<div class="col-md-9 col-sm-12">
						<div class="form-group bottommargin_0"> <label for="name">Họ tên <span class="required">*</span></label> <input type="text" aria-required="true" size="30" value="" name="name" class="form-control" placeholder="Họ tên"> </div>
					</div>
					<div class="col-md-3 col-sm-12">
						<div class="form-group bottommargin_0"> <label for="name">Giới tính <span class="required">*</span></label>
							<select name="sex" class="form-control">
								<option value="0" class="form-control">Giới tính</option>
								<option value="nam" class="form-control">Nam</option>
								<option value="nu" class="form-control">Nữ</option>
							</select>  
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="form-group bottommargin_0"> <label for="phone">Điện thoại</label> <input type="text" size="30" value="" name="phone"  class="form-control" placeholder="Điện thoại"> </div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="form-group bottommargin_0"> <label for="email">Email<span class="required">*</span></label> <input type="email" aria-required="true" size="30" value="" name="email" class="form-control" placeholder="Email "> </div>
					</div>
					<div class="col-md-12 col-sm-12 branchs">
						<div class="form-group bottommargin_0"> <label for="subject">Chọn chi nhánh gần nhất</label> 
							<select name="branch" class="form-control" required>
								<option class="form-control" value="0">Chọn chi nhánh gần nhất</option>
								<option class="form-control" value="Sài Gòn Pearl">Sài Gòn Pearl</option>
								<option class="form-control" value="CN Hà Đô">CN Hà Đô</option>
								<option class="form-control" value="Buôn Mê Thuột">Buôn Mê Thuột</option>
							</select> 
						</div>
					</div>
					<div class="col-md-12 col-sm-12 calendar">
						<div class="form-group"> 
							<label class="calendar"><span class="glyphicon glyphicon-calendar"></span>&nbsp;Thời gian đặt hẹn</label> 
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
						            <div class='input-group date' id='datetimepicker1'>
						               <input type='text' name="date1" class="form-control" placeholder="mm-dd-yyyy" />
						               <span class="input-group-addon">
						               <span class="glyphicon glyphicon-calendar"></span>
						               </span>
						            </div>
						         </div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
						            <div class='input-group date' id='datetimepicker2'>
						               <input type='text' name="date2" class="form-control" placeholder="Chọn khung giờ" />
						               <span class="input-group-addon">
						               <span class="glyphicon glyphicon-calendar"></span>
						               </span>
						            </div>
						         </div>
							</div>
						</div>
					</div>  
					
					<div class="col-md-12 col-sm-12">
						<div class="form-group bottommargin_0 message"> 
							<label for="message">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Để lại lời nhắn</label> 
							<textarea aria-required="true" rows="3" cols="45" name="note" class="form-control" placeholder="Nội dung..."></textarea> 
						</div>
					</div>
					<div class="col-md-12 col-sm-12 text-center">
						<div class="contact-form-submit topmargin_10"> 
							<button type="button" name="contact_submit" class="theme_button color4 min_width_button margin_0 btn-register-api">Đặt lịch hẹn khám</button> </div>
					</div>
				</form>
	      </div>
		</div>
	</div>
</section>
