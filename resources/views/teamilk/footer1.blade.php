<!-- BEGIN: LAYOUT/FOOTERS/FOOTER-10 -->
<?php 
  function show_menu_footer($categories, $idparent = 0, $char = 0, $depth = 0, $class_ul='c-layout-footer-10-list', $class_li='c-layout-footer-10-list-item') {

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

                echo '<ul class="'.$class_ul.' '.$depth_ul.'">';

            }else{

                if($depth_ul == 0){

                    echo '<ul class="'.$class_ul.' '.$depth_ul.'">';

                }else if($depth_ul == 1){

                    echo '<ul class="'.$class_ul.' '.$depth_ul.'">';

                }else {

                    echo '<ul class="'.$class_ul.' '.$depth_ul.'">';

                }

            }

            foreach ($cate_child as $key => $item) {

                // Hiển thị tiêu đề chuyên mục

                $depth_li = $item['depth'];

                if($depth_li==0 && $item['haschild'] == 1){

                    $span1 = $class_li;


                } else if($depth_li==0 && $depth_li == 0){
                   $span1 = $class_li;

                }
                else if($depth_li==1){

                    $span1 = $class_li;

                }else if ($depth_li==2) {

                    $span1 = $class_li;

                }elseif ($depth_li==3) {

                    $span1 = $class_li;

                } 

                else {

                    $span1 = 'c-layout-footer-10-list-item';

                }
                echo '<!--'.$item['namemenu'].'-->';
                if($depth_li==0 && $item['haschild'] == 1){
                    echo '<li class="'.$span1.'"><a href="#">'.$item['namemenu'].'</a>';
                }else{
                    if($item['catnametype']=='link'){
                        echo '<li class="'.$span1.'"><a href="'.url('/').'/'.$item['url'].'">'.$item['namemenu'].'</a>';
                    }else{
                        echo '<li class="'.$span1.'"><a href="'.url('/').'/'.$item['slug'].'">'.$item['namemenu'].'</a>';
                    }
                }
                $char++;

                show_menu_footer($categories, $item['idmenuhascate'], $char, $item['depth'],'',''); 

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
            <h3 class="c-layout-footer-10-title"><img class="logo-image" src="{{ asset('assets-tea/images/logo/dau-that-lung.png') }}"></h3>
            {{-- <div class="c-layout-footer-10-title-line"><span class="c-theme-bg"></span></div> --}}
          </div>
          <p class="c-layout-footer-10-desc">
            CÔNG TY TNHH TICK FULL LIFE</br>
            Giấy Phép Đăng Ký Kinh Doanh</br>
            Số ĐKKD: 0315066910 do Sở KHĐT Tp. HCM cấp ngày 23/05/2018</br>
            Người Đại Diện</br>
            Nguyễn Thụy Quỳnh Hoa</br>
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
                    show_menu_footer($rs_menu2, 0, '','c-layout-footer-10-list','c-layout-footer-10-list-item');
                } ?>
             
            </div>
            
            <div class="col-md-4">
              <div class="c-layout-footer-10-title-container">
                <h3 class="c-layout-footer-10-title">Chuyên mục</h3>
                <div class="c-layout-footer-10-title-line"><span class="c-theme-bg"></span></div>
              </div>
              <?php
              if(isset($rs_menu3)){
                  show_menu_footer($rs_menu3, 0, '','c-layout-footer-10-list','c-layout-footer-10-list-item');
              } ?>
              
            </div>
            <div class="col-md-4">
              <div class="c-layout-footer-10-title-container">
                <h3 class="c-layout-footer-10-title">Liên hệ</h3>
                <div class="c-layout-footer-10-title-line"><span class="c-theme-bg"></span></div>
              </div>
             <ul class="c-layout-footer-10-list">
                <li class="c-layout-footer-10-list-item"><a href="#"> 118 đường 3/2, khu biệt thự liền kề Hà Đô. </a></li>
                <li class="c-layout-footer-10-list-item"><a href="#">Nhà số 18, đường số 4, phường 12, Q10, TPHCM</a></li>
                <li class="c-layout-footer-10-list-item"><a href="tel:0965858568">0965.85.85.68</a></li>
                <li class="c-layout-footer-10-list-item"><a href="#">tickmedical@gmail.com</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="c-layout-footer-10-subfooter-container c-bg-grey">
      <div class="c-layout-footer-10-subfooter container">
        <div class="c-layout-footer-10-subfooter-content">
          <a class="copyright" href="javascript:void(0);">Copyright © 2020 TICK FULL LIFE. All Rights Reserved.</a>
        </div>
        <div class="c-layout-footer-10-subfooter-social">
          <ul>
            <li><a href="https://www.facebook.com/TickMedical" class="socicon-btn socicon-facebook tooltips" data-original-title="Facebook"></a></li>
            <li><a href="https://www.youtube.com/tickmedical" class="socicon-btn socicon-youtube tooltips" data-original-title="Youtube"></a></li>
            <li><a href="#" class="socicon-btn socicon-twitter tooltips" data-original-title="Twitter"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- END: LAYOUT/FOOTERS/FOOTER-10-->

{{-- <div id="vfone_call"><div class="vf-btn-wrap"><div class="vf-btn-call"><div class="vf-btn-text">Gọi miễn phí</div><div class="vf-btn-text-one">Gọi miễn phí</div></div></div></div>
<div id="vfone_call"><div class="vf-btn-wrap"><div class="vf-btn-call"><div class="vf-btn-text">Gọi miễn phí</div><div class="vf-btn-text-one">Gọi miễn phí</div></div></div></div>
<script type="text/javascript">
var appid_vf = "654461604569765";
(function(d,t,s) {
var script = d.createElement(t);script.id = 'vf_681857458'; script.async = true;
var link = d.createElement(s);link.id = 'vf_681778452'; link.rel = 'stylesheet';
link.href = 'https://tongdai.vfone.vn/public/css/vfone-call.css';
script.src = 'https://tongdai.vfone.vn/public/js/vfone-call.js';
var placeholder = document.getElementById('vfone_call');
placeholder.parentNode.insertBefore(script, placeholder);
placeholder.parentNode.insertBefore(link, placeholder);
})(document,'script','link');
<<<<<<< HEAD
</script> --}}


