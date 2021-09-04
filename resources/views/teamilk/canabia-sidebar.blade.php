<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div class="widget-search mb-50">
   <form method="post" action="{{ url('/search/s/page/1') }}">
        @csrf
            <input class="search-input" type="search" value="" name="keyword" autocomplete="off" placeholder="Từ khóa..." required >
            <button type="submit" value="Search"><i class="fa fa-search" aria-hidden="true"></i></i></button>
    </form>
   {{--  <input type="text" placeholder="Search..." name="s" class="search-input" value="">
    <button type="submit" value="Search"><i class=" flaticon-search"></i></button> --}}
</div>
<div class="recent-widget mb-50">
    <h2 class="widget-title">Tin mới</h2>
    @foreach($rs_tintuc as $row)
    <div class="show-featured">
        <div class="post-img">
           <a href="#"><img src="{{ asset( $row['urlfile'] ) }}" alt="{{ $row['namepro'] }}"></a>
        </div>
        <div class="post-item">
            <div class="post-desc">
                <a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a>
                {{-- <span class="date-post"><i class="fa fa-clock-o"></i> Feb 19, 2020</span> --}}
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="widget-categories mb-50">
    <h2 class="widget-title">Chuyên mục</h2>
     <?php
    if(isset($rs_menu2)){
      HelperController::menu_footers($rs_menu2, 0, 0,  0, 'cate-footer', '');
    } ?>
    {{-- <ul>
        <li><a href="#">Gardening</a></li>
        <li><a href="#">illustration</a></li>
        <li><a href="#">Landscaping</a></li>
    </ul> --}}
</div>
<div class="contact-widget">
    <h2 class="widget-title">Xem nhiều</h2>
    <ul>
     @foreach($rs_listpostpular as $row)
        <li><a href="{{ url('/') }}/{{ $row['slug'] }}"><i class="fa fa-globe"></i>{{ $row['namepro'] }}</li></a>
    @endforeach
    </ul>
</div>