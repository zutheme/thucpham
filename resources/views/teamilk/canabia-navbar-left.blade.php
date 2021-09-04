<?php use \App\Http\Controllers\Helper\HelperController; ?>
<a id="show-sidebar" class="btn btn-sm btn-dark" href="javascript:void(0)">
    <i class="fas fa-bars"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">TICMEDI</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-search">
        <div>
          <form method="post" action="{{ url('/search/s/page/1') }}">
            @csrf
            <input type="hidden" name="posttype" value="video">
           <div class="input-group">
              <input class="form-control search-menu" type="text" value="" name="keyword" autocomplete="off" placeholder="Từ khóa..." required >
              <div class="input-group-append">
                <button type="submit" value="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
              </div>
            </div> 
          </form>
        </div>
      </div>
      <div class="sidebar-menu">
        <?php
            if(isset($rs_menu3)){
              HelperController::menu_primary_sidebar($rs_menu3, 0, 0, 0, 0, '', '');
          } ?>
      </div>
    </div>
    <div class="sidebar-footer">
    </div>
</nav>
 