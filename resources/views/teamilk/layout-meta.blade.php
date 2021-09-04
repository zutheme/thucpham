<?php

    function menu_sidebar($categories, $idparent = 0, $char = 0, $depth = 0) {

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

                echo '<ul class="ul-depth-root">';

            }else{

                if($depth_ul == 0){

                    echo '<ul class="ul-depth-'.$depth_ul.'">';

                }else if($depth_ul == 1){

                    echo '<ul class="ul-depth-'.$depth_ul.'">';

                }else {

                    echo '<ul class="ul-depth-'.$depth_ul.'">';

                }

            }

            foreach ($cate_child as $key => $item) {

                // Hiển thị tiêu đề chuyên mục

                $depth_li = $item['depth'];

                if($depth_li==0 && $item['haschild'] == 1){

                    $span1 ='li-depth-'.$depth_li;

                } else if($depth_li==0 && $depth_li == 0){
                    $span1 ='li-depth-'.$depth_li;
                }
                else if($depth_li==1){
                    $span1 ='li-depth-'.$depth_li;

                }else if ($depth_li==2) {

                    $span1 ='li-depth-'.$depth_li;

                }elseif ($depth_li==3) {

                    $span1 ='li-depth-'.$depth_li;

                } 

                else {

                    $span1 = '';


                }
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

                menu_sidebar($categories, $item['idmenuhascate'], $char, $item['depth']); 

                echo "</li>";

            }  

            echo '</ul>';

        } 

    } ?>
<div class="layout-meta">
    <div class="container">
        <div class="row">
          <div class="col-md-3 menu-category hidden-sm hidden-xs">
              <span class="menu-cate">Danh mục sản phẩm</span>
          </div>
          <div class="col-md-9 hidden-sm hidden-xs"> 
            <div class="promotion"><span>Khuyến mãi : </span><marquee class="mar" width="100%" direction="left" height="auto">
                 @foreach ($rs_promotion as $row)
                      <a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  @endforeach
            </marquee></div>
          </div>
          <div class="col-md-3 hidden-sm hidden-xs">
            <nav class="nav-sidebar">
                <?php menu_sidebar($rs_menu1, 0, ''); ?>             
            </nav>
          </div>
          <div class="col-md-9">
                <div class="col-md-9 slider-home">
                    <div class="row">
                        @include('teamilk.slider-home')
                    </div>
                </div>
                <div class="col-md-3 banner">
                    <div class="row">
                        <ul>
                            @foreach ($banners as $banner)
                                <li><a href="{{ $banner['link'] }}"><img src="{{ asset( $banner['urlfile'] ) }}"></a></li>
                            @endforeach
                           
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                      <div class="row">   
                            <ul class="list-post-home">
                                @foreach ($rs_Lstbyposttype as $row)
                                    <li>
                                        <a href="{{ url('/') }}/{{ $row['slug'] }}"><img src="{{ asset( $row['urlfile'] ) }}"></a>
                                        <p><a class="render" href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a></p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                  </div>
          </div>
        </div>
    </div>
</div>