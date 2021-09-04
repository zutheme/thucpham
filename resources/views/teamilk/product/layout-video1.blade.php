<?php use \App\Http\Controllers\Helper\HelperController; ?>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/css/custom-sidebar-left.css?v=0.0.0.5') }}">
<div class="page-wrapper chiller-theme toggled">
  @include('teamilk.canabia-navbar-left')
  <main class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="inner-shop-part pt-100 pb-100 md-pt-80 md-pb-80 layout-video">
          <div class="container">
            <div class="row rs-vertical-middle shorting mb-25">
              <div class="col-sm-6 col-12">
                <p class="woocommerce-result-count">Showing 1-9 of 12 results</p>
              </div>
              <div class="col-sm-6 col-12">
                <select class="from-control">
                  <option>Default sorting</option>
                  <option>Sort by popularity</option>
                  <option>Sort by average rating</option>
                  <option>Sort by lates</option>
                </select>
              </div>
            </div>
            <div class="row">
              @foreach($rs_lpro as $row)
                  <div class="col-lg-3 col-md-6 col-12 mb-53 item">
                    <div class="product-list">
                      <div class="image-product">
                        <img src="{{ asset( $row['urlfile'] ) }}" alt="">
                        <div class="desc-play text-center">
                              <a class="btn-play" idyoutube="1" href="javascript:void(0)"><img class="play" src="{{ asset('public/icons/play-icon-3.png') }}"></a>
                         </div>
                      </div>
                      <div class="content-desc text-left">
                        <h2 class="loop-product-title pt-15 renderer"><a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a></h2>
                      </div>
                    </div>
                  </div>
            @endforeach
              
            </div>
            <div class="pagenav-link text-center">
              <?php $countpage = $rs_lpro[0]['count_page']; ?>
                    @if($countpage > 1)
                    <?php $curent_page = Request::segment(3); 
                      if(empty($curent_page)) $curent_page =1; ?>
                     <ul>
                      @for($i=1; $i < ($countpage + 1); $i++)
                      <?php  $curent_class = ($curent_page == $i) ? '<li><span class="current">'.$i.'</span></li>':''; ?>
                        @if (isset($curent_class) and !empty($curent_class))
                          {!! $curent_class !!}
                        @elseif($i == $countpage)
                          <li><a href="{{ url('/') }}/{{ $curent_slug }}/page/{{ $i }}"><i class="flaticon-next"></i></a></li>
                        @else
                          <li><a href="{{ url('/') }}/{{ $curent_slug }}/page/{{ $i }}">{{ $i }}</a></li>
                        @endif
                      @endfor
                  </ul>
                  @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  
