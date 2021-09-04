<?php use \App\Http\Controllers\Helper\HelperController; ?>
<!--breadcrumbs-inner-part start-->
{{-- <div class="breadcrumbs-inner-part img6">
    <div class="container">
        <div class="breadcrumbs-inner-bread text-center">
            <h1 class="title">{{ $title }}</h1>
            <?php $curent_idcategory = 0;
        if(isset($cate_selected)){
        $curent_idcategory = $cate_selected[0]['idcategory'];
      } ?>
            <ul class="breadcrumbs-trial">
                <?php HelperController::breadcrumbpost($rs_cat_product,$curent_idcategory,'breadcrumbs-trial',0); ?>
            </ul>
        </div>
    </div>
</div> --}}
<!--breadcrumbs-inner-part start-->
 <!--Blog start-->
<div class="rs-blog-inner pt-100 pb-100 md-pt-80 md-pb-80">
   <div class="container">
       <div class="row">
          <div class="col-lg-8">
             @if(isset($rs_lpro) && $rs_lpro[0]['count_row'] > 0)
                  @foreach($rs_lpro as $row)
                       <div class="blog-item mb-5 md-mb-5">
                            <div class="full-blog-content">
                                <div class="blog-all-titles">
                                    <div class="title-wrap">
                                          <h3 class="blog-title">
                                              <a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a>
                                          </h3>
                                    </div>
                                </div>
                                <div class="blog-desc pb-5">
                                    <p>
                                       <?php $content = $row['description'];
                                        echo HelperController::get_the_excerpt_max(200, $content); ?> 
                                    </p>
                                </div>
                            </div>
                        </div> 
                  @endforeach
              @else
                  <p>Đang cập nhật</p>
              @endif
              <?php $countpage = $rs_lpro[0]['count_page']; ?>
                @if($countpage > 1)
                <?php $curent_page = Request::segment(3); 
                  if(empty($curent_page)) $curent_page =1; ?>
                <div class="page-nav td-pb-padding-side">
                  @for($i=1; $i < ($countpage + 1); $i++)
                  <?php  $curent_class = ($curent_page == $i) ? '<span class="current">'.$i.'</span>':''; ?>
                    @if (isset($curent_class) and !empty($curent_class))
                      {!! $curent_class !!}
                    @elseif($i == $countpage)
                      <a href="{{ url('/') }}/{{ $curent_slug }}/page/{{ $i }}" class="last" title="{{ $countpage }}">{{ $countpage }}</a><a href="#"><i class="fa fa-arrow-right"></i></a><span class="pages">Page {{ $curent_page }} of {{ $countpage }}</span><div class="clearfix"></div>
                    @else
                      <a class="page" title="{{ $i }}" href="{{ url('/') }}/{{ $curent_slug }}/page/{{ $i }}">{{ $i }}</a>
                    @endif
                  @endfor
                  
                </div>
                @endif
          </div>
          <div class="col-lg-4 pl-50  md-pl-15 md-mt-60">
           @include('teamilk.canabia-sidebar')
          </div>
       </div>
   </div>
</div>
<!--Blog End-->
