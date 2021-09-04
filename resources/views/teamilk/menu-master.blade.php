<?php

    function show_all_menu($categories, $idparent = 0, $char = 0, $depth = 0) {

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

                echo '<ul class="nav navbar-nav c-theme-nav">';

            }else{

                if($depth_ul == 0){

                    echo '<ul class="dropdown-menu c-menu-type-classic c-pull-left">';

                }else if($depth_ul == 1){

                    echo '<ul class="dropdown-menu c-pull-right '.$depth_ul.'">';

                }else {

                    echo '<ul class="dropdown-menu c-pull-left '.$depth_ul.'">';

                }

            }

            foreach ($cate_child as $key => $item) {

                // Hiển thị tiêu đề chuyên mục

                $depth_li = $item['depth'];

                if($depth_li==0 && $item['haschild'] == 1){

                    $span1 =' class="c-link dropdown-toggle c-toggler"';

                    $span2 = ' <span class="c-arrow c-toggler"></span>';

                    $span3= ' class="c-menu-type-classic"';

                } else if($depth_li==0 && $depth_li == 0){
                    $span1 =' class="c-link dropdown-toggle"';

                    $span2 = ' <span class="c-arrow c-toggler"></span>';

                    $span3= ' class="c-menu-type-classic"';
                }
                else if($depth_li==1){

                    $span1 = '';

                    $span2 = '';

                    $span3 = ' class="dropdown-submenu"';

                }else if ($depth_li==2) {

                    $span1 = '';

                    $span2 = '';

                    $span3 = ' class="dropdown-submenu"';

                }elseif ($depth_li==3) {

                    $span1 = '';

                    $span2 = '';

                    $span3 = ' class="dropdown-submenu"';

                } 

                else {

                    $span1 = '';

                    $span2 = '';

                    $span3 = '';

                }
                if($depth_li==0 && $item['haschild'] == 1){
                    echo '<li'.$span3.'><a href="#"'.$span1.'>'.$item['namemenu'].$span2.'</a>';
                }else{
                    if($item['catnametype']=='link'){
                        echo '<li'.$span3.'><a href="'.url('/').'/'.$item['url'].'"'.$span1.'>'.$item['namemenu'].$span2.'</a>';
                    }else{
                        echo '<li'.$span3.'><a href="'.url('/').'/'.$item['slug'].'"'.$span1.'>'.$item['namemenu'].$span2.'</a>';
                    }
                }
                $char++;

                show_all_menu($categories, $item['idmenuhascate'], $char, $item['depth']); 

                echo "</li>";

            }  

            echo '</ul>';

        } 

    } ?>



<nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold menu-home" >
        <?php show_all_menu($rs_menu, 0, '',0); ?>             
</nav>