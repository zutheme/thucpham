<?php use \App\Http\Controllers\Helper\HelperController; ?>
<!--breadcrumbs-inner-part start-->
<div class="breadcrumbs-inner-part img6">
    <div class="container">
        <div class="breadcrumbs-inner-bread text-center">
            <h1 class="title">{{ $product[0]['namepro'] }}</h1>
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
<style type="text/css">
	#gmapbg {
	  width: 100%;
	  height: 500px;
	}
</style>
<!--Contact start-->
<div class="rs-contact pt-100 pb-100 md-pt-80 md-pb-80">
   <div class="container">
      <div class="row">
          <div class="col-lg-12 md-mb-50">
              <div class="maps">
                   <div id="gmapbg"></div>
              </div>
          </div>
          <div class="col-lg-12">
                <div class="content-part">
                    <div class="sec-title">
                        <h2 class="title">Đăng ký tư vấn</h2>
                        <p class="margin-0 pb-45">
                            Vui lòng gửi thông tin tư vấn, chúng tôi luôn mong muốn nhận được đóng góp ý kiến của bạn để được phục vụ khách hàng tốt hơn.
                        </p>
                    </div>
                    <div class="form-part">
                        <form id="contact-form" method="post">
                            <div class="row">
                            <div class="col-lg-6 mb-20">
                                <input class="from-control" type="text" id="name" name="name" placeholder="Họ tên" required="">
                            </div>
                            <div class="col-lg-6 mb-20">
                                <input class="from-control" type="email" id="email" name="email" placeholder="E-mail" required="">
                            </div>
                            <div class="col-lg-6 mb-20">
                                <input class="from-control" type="text" id="phone_number" name="phone" placeholder="Điện thoại" required="">
                            </div> 
                            <div class="col-lg-6 mb-20">
                                <input class="from-control" type="text" id="Subject" name="address" placeholder="Địa chỉ" required="">
                            </div>
                            <div class="col-lg-12 mb-30">
                                <textarea class="from-control" id="message" name="note" placeholder="Nội dung" required=""></textarea>
                            </div>
                            <div class="col-lg-12">
                                <button class="type btn-register-api">Xác nhận</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
<!--Contact End-->

<!--Contact start-->
<div class="rs-contact style2 pb-100 md-pb-80">
  <div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 md-mb-30">
            <div class="address-item style">
                <div class="address-icon">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="address-text">
                    <h3 class="contact-title">CHI NHÁNH QUẬN 10</h3>
                    <p>18, Đường số 4, Khu biệt thự Hado Centrosa, 118 Đường 2 Tháng 2, P.12, Quận 10, TP.HCM</p>
                </div>
            </div>
        </div> 
        <div class="col-lg-4 col-md-6 md-mb-30">
            <div class="address-item style">
                <div class="address-icon">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="address-text">
                    <h3 class="contact-title">CHI NHÁNH QUẬN BÌNH THẠNH</h3>
                    <p>Số 9, Đường D5, Khu biệt thự Saigon Pearl, 92 Nguyễn Hữu Cảnh, P.22, Q.Bình Thạnh, TP.HCM</p>
                </div>
            </div>
        </div> 
        <div class="col-lg-4 col-md-6 sm-mb-30">
            <div class="address-item">
                <div class="address-icon">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="address-text">
                    <h3 class="contact-title">CHI NHÁNH TP BUÔN MA THUỘT</h3>
                    <p>Số 89 Đường Nguyễn Khuyến, Phường Tân Lợi, Thành phố Buôn Ma Thuột, Tỉnh Đaklak</p>
                </div>
            </div>
        </div> 
    </div>
  </div> 
</div>
<!--Contact End-->

 <script type="text/javascript">    
    // Initialize and add the map
        function initMap() {
          // The location of Uluru,, 10.788438, 106.678147
          var uluru = {lat: 10.788438, lng: 106.678147};
          // The map, centered at Uluru
          var gmapbg = new google.maps.Map(document.getElementById('gmapbg'), {zoom: 14, center: uluru});
          // The marker, positioned at Uluru
          var marker1 = new google.maps.Marker({position: uluru, map: gmapbg});
        }
        
        function initialize(condition) {
          
            var uluru1 = {lat: 10.789308, lng: 106.720466};
            var gmapbg = new google.maps.Map(document.getElementById('gmapbg'), {zoom: 14, center: uluru1});
            var marker1 = new google.maps.Marker({position: uluru1, map: gmapbg});
           
        }
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAV0eYc-TI6hKpAW9XyErnr6AmTtg9dxIA&callback=initialize">
    </script>