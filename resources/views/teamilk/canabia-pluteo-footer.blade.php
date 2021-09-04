<?php use \App\Http\Controllers\Helper\HelperController; ?>
<!-- Footer Start -->
 <footer id="rs-footer" class="rs-footer">
     <div class="footer-top">
         <div class="container">
            <div class="row">
                 <div class="col-lg-3">
                       @if(isset($rs_logo_footer))
                            @foreach($rs_logo_footer as $row)
                              <div class="footer-logo mb-25 text-center">
                                 <a href="{{ url('/') }}"><img class="logo" src="{{ asset($row['urlfile']) }}" alt=""></a>
                             </div>
                             {!! $row['description'] !!}
                            @endforeach
                        @endif
                 </div>
                <div class="col-lg-3">
                   <div class="widget-text">
                       <h3 class="footer-title">Chuyên mục</h3>
                       <div class="text-widget">
                          <?php
                            if(isset($rs_menu2)){
                              HelperController::menu_footers($rs_menu2, 0, 0,  0, 'cate-footer', '');
                            } ?>
                       </div>
                   </div> 
                </div> 
                <div class="col-lg-3">
                   <div class="widget-text">
                       <h3 class="footer-title">Chi nhánh</h3>
                        <div class="recent-widget mb-25">
                            <div class="show-featured">
                                <div class="post-item">
                                    <div class="post-desc">
                                        <a href="#">CHI NHÁNH QUẬN 10</a>
                                        <span class="date-post"><i class="fa fa-map-marker"></i> 18, Đường số 4, Khu biệt thự Hado Centrosa,
118 Đường 2 Tháng 2, P.12, Quận 10, TP.HCM</span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="recent-widget mb-25">
                            <div class="show-featured">
                                <div class="post-item">
                                    <div class="post-desc">
                                        <a href="#"> CHI NHÁNH QUẬN BÌNH THẠNH</a>
                                        <span class="date-post"><i class="fa fa-map-marker"></i> Số 9, Đường D5, Khu biệt thự Saigon Pearl,
92 Nguyễn Hữu Cảnh, P.22, Q.Bình Thạnh, TP.HCM  </span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="recent-widget">
                            <div class="show-featured">
                                <div class="post-item">
                                    <div class="post-desc">
                                        <a href="#">CHI NHÁNH TP BUÔN MA THUỘT</a>
                                        <span class="date-post"><i class="fa fa-map-marker"></i> Số 89 Đường Nguyễn Khuyến, Phường Tân Lợi, 
Thành phố Buôn Ma Thuột, Tỉnh Đăklăk </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div> 
                </div> 
                <div class="col-lg-3">
                   <div class="widget-text">
                       <h3 class="footer-title">Nhận tin ưu đãi</h3>
                      <p>Điền thông tin để nhận ưu đãi định kỳ dành cho quý khách hàng thân thiết.
                      </p>
                      <div class="footer-inner">
                        <input type="email" name="EMAIL" placeholder="Địa chỉ Email" required="">
                            <input type="submit" value="Sign up">
                            <i class="fa fa-arrow-down"></i>
                      </div>
                   </div> 
                </div>
            </div>
         </div>
     </div>
     <div class="footer-bottom">
         <div class="container">
             <div class="copyright">
                    <p>© 2021 TICMEDI. All Rights Reserved</p>
                </div>
         </div>
    </div>
 </footer>
 <!-- Footer End -->