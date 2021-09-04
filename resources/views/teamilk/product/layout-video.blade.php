<?php use \App\Http\Controllers\Helper\HelperController; ?>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/css/custom-sidebar-left.css?v=0.0.0.7') }}">
<div class="page-wrapper chiller-theme toggled">
  @include('teamilk.canabia-navbar-left')
  <main class="page-content layout-video">
    <div class="container-fluid">
        <div class="row rs-vertical-middle shorting mb-25">
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            @if(isset($rs_lpro))
            <p class="woocommerce-result-count">Hiện thị {{ $rs_lpro[0]['_beginpage'] }}-{{ $rs_lpro[0]['_endpage'] }} của {{ $rs_lpro[0]['count_row'] }} kết quả</p>
            @endif
          </div>
          {{-- <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <select class="from-control">
              <option>Default sorting</option>
              <option>Sort by popularity</option>
              <option>Sort by average rating</option>
              <option>Sort by lates</option>
            </select>
          </div> --}}
        </div>
        <div class="row">
          @foreach($rs_lpro as $row)
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 item">
                <div class="card rounded-0 p-0 shadow-sm">
                  <div class="image-product">
                   <img src="{{ asset( $row['urlfile'] ) }}" class="card-img-top rounded-0" alt="{{ $row['namepro'] }}">
                    <div class="desc-play text-center">
                          <a href="{{ url('/') }}/{{ $row['slug'] }}"><img class="play" src="{{ asset('public/icons/play-icon-3.png') }}"></a>
                     </div>
                  </div>
                  <div class="card-body text-left">
                    <h6 class="card-title renderer"><a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a></h6>
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

  
