<!-- BEGIN: LAYOUT/FOOTERS/FOOTER-10 -->
<?php 
  function show_menu_footer($categories, $idparent = 0, $char = 0, $depth = 0) {

        $cate_child = array();

        $arr_parent = array();

        foreach ($categories as $key => $item) {

            if($item['idparent'] == $idparent) {

                $cate_child[] = $item;

                unset($categories[$key]);

            }

        }                   

        if ($cate_child) {

            $depth_ul = $depth;

            if(!$char){

                echo '<ul class="c-layout-footer-10-list">';

            }else{

                if($depth_ul == 0){

                    echo '<ul class="c-layout-footer-10-list">';

                }else if($depth_ul == 1){

                    echo '<ul class="c-layout-footer-10-list '.$depth_ul.'">';

                }else {

                    echo '<ul class="c-layout-footer-10-list '.$depth_ul.'">';

                }

            }

            foreach ($cate_child as $key => $item) {

                // Hiển thị tiêu đề chuyên mục

                $depth_li = $item['depth'];

                if($depth_li==0 && $item['haschild'] == 1){

                    $span1 =' class="c-layout-footer-10-list-item"';


                } else if($depth_li==0 && $depth_li == 0){
                    $span1 =' class="c-layout-footer-10-list-item"';

                }
                else if($depth_li==1){

                    $span1 = 'c-layout-footer-10-list-item';

                }else if ($depth_li==2) {

                    $span1 = 'c-layout-footer-10-list-item';

                }elseif ($depth_li==3) {

                    $span1 = 'c-layout-footer-10-list-item';

                } 

                else {

                    $span1 = 'c-layout-footer-10-list-item';

                }
                if($depth_li==0 && $item['haschild'] == 1){
                    echo '<li'.$span1.'><a href="#">'.$item['namemenu'].'</a>';
                }else{
                    if($item['catnametype']=='link'){
                        echo '<li'.$span1.'><a href="'.url('/').'/'.$item['url'].'">'.$item['namemenu'].'</a>';
                    }else{
                        echo '<li'.$span1.'><a href="'.url('/').'/'.$item['slug'].'">'.$item['namemenu'].'</a>';
                    }
                }
                $char++;

                show_all_menu($categories, $item['idmenuhascate'], $char, $item['depth']); 

                echo "</li>";

            }  

            echo '</ul>';

        } 

    }
?>
<a name="footer"></a>
<footer class="c-layout-footer c-layout-footer-10 c-bg-white-footer">
  <div class="c-footer">
    <div class="c-layout-footer-10-content container">
      <div class="row">
        <div class="col-md-5">
          <div class="c-layout-footer-10-title-container logo-footer">
            <h3 class="c-layout-footer-10-title"><img class="logo-image" src="{{ asset('assets-tea/images/logo/allysfast_01.png') }}"></h3>
            {{-- <div class="c-layout-footer-10-title-line"><span class="c-theme-bg"></span></div> --}}
          </div>
          <p class="c-layout-footer-10-desc">
            CÔNG TY TNHH ALLYS FAST
            Số ĐKKD: 0316262322 do Sở KHĐT Tp. HCM cấp ngày 11/05/2020
            Người đại diện: Cao Tiến Thiện
          </p>
        </div>
        <div class="col-md-7">
          <div class="row">
            <div class="col-md-4">
              <div class="c-layout-footer-10-title-container">
                <h3 class="c-layout-footer-10-title">Chuyên mục</h3>
                <div class="c-layout-footer-10-title-line"><span class="c-theme-bg"> </span></div>
              </div>
               <?php
                if(isset($rs_menu2)){
                    show_menu_footer($rs_menu2, 0, '');
                } ?>
              <!-- <ul class="c-layout-footer-10-list">
                <li class="c-layout-footer-10-list-item"><a href="#">Sức khỏe</a></li>
                <li class="c-layout-footer-10-list-item"><a href="#">Làm đẹp</a></li>
                <li class="c-layout-footer-10-list-item"><a href="#">Hàng tiêu dùng</a></li>
                <li class="c-layout-footer-10-list-item"><a href="#">Careers</a></li>
              </ul> -->
            </div>
            
            <div class="col-md-4">
              <div class="c-layout-footer-10-title-container">
                <h3 class="c-layout-footer-10-title">Chính sách</h3>
                <div class="c-layout-footer-10-title-line"><span class="c-theme-bg"></span></div>
              </div>
              <?php
              if(isset($rs_menu3)){
                  show_menu_footer($rs_menu3, 0, '');
              } ?>
              <!-- <ul class="c-layout-footer-10-list">
                <li class="c-layout-footer-10-list-item"><a href="#">Điều khoản và chính sách</a></li>
                <li class="c-layout-footer-10-list-item"><a href="#">Chính sách bảo mật</a></li>
                <li class="c-layout-footer-10-list-item"><a href="#">Khuyến mãi</a></li>
                <li class="c-layout-footer-10-list-item"><a href="#">Sự kiện</a></li> 
              </ul> -->
            </div>
            <div class="col-md-4">
              <div class="c-layout-footer-10-title-container">
                <h3 class="c-layout-footer-10-title">Liên hệ</h3>
                <div class="c-layout-footer-10-title-line"><span class="c-theme-bg"></span></div>
              </div>
             <ul class="c-layout-footer-10-list">
                <li class="c-layout-footer-10-list-item"><a href="#"> Villa 9 Đ5 Saigon Pearl - 92 Nguyễn Hữu Cảnh, P.22, Quận Bình Thạnh</a></li>
                <li class="c-layout-footer-10-list-item"><a href="#">Thành phố Hồ Chí Minh, Việt Nam</a></li>
                <li class="c-layout-footer-10-list-item"><a href="tel:0909732528">0909.732.528</a></li>
                <li class="c-layout-footer-10-list-item"><a href="#">allysfast@gmail.com</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-layout-footer-10-subfooter-container c-bg-grey">
      <div class="c-layout-footer-10-subfooter container">
        <div class="c-layout-footer-10-subfooter-content">
          Copyright © 2020 allysfast.com. All Rights Reserved.
        </div>
        <div class="c-layout-footer-10-subfooter-social">
          <ul>
            <li><a href="https://www.facebook.com/Allysfast" class="socicon-btn socicon-facebook tooltips" data-original-title="Facebook"></a></li>
            <li><a href="#" class="socicon-btn socicon-google tooltips" data-original-title="Google"></a></li>
            <li><a href="#" class="socicon-btn socicon-twitter tooltips" data-original-title="Twitter"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer><!-- END: LAYOUT/FOOTERS/FOOTER-10