<?php use \App\Http\Controllers\Helper\HelperController; ?>

<div class="recent-widget">
    <!-- <h2 class="widget-title">Tin mới</h2> -->
    @foreach($rs_Lstbyposttype_video as $row)
    <div class="show-featured">
        <div class="post-img">
           <a href="{{ url('/') }}/{{ $row['slug'] }}"><img src="{{ asset( $row['urlfile'] ) }}" alt="{{ $row['namepro'] }}"></a>
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

<div class="contact-widget">
    <h2 class="widget-title">Xem nhiều</h2>
    <ul>
        @foreach($rs_listvideopular as $row)
            <li><a href="{{ url('/') }}/{{ $row['slug'] }}"><i class="fa fa-globe"></i>{{ $row['namepro'] }}</li></a>
        @endforeach
    </ul>
</div>