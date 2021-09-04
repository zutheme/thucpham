<?php use \App\Http\Controllers\Helper\HelperController; ?>
<!--breadcrumbs-inner-part start-->
<div class="breadcrumbs-inner-part img6">
    <div class="container">
        <div class="breadcrumbs-inner-bread text-center">
            <h1 class="title">{{ $product[0]['namepro'] }}</h1>
            <?php $curent_idcategory = 0;
				if(isset($cate_selected)){
				$curent_idcategory = $cate_selected[0]['idcategory'];
			} ?>
            <ul class="breadcrumbs-trial">
                <?php HelperController::breadcrumbpost($rs_cat_product,$curent_idcategory,'breadcrumbs-trial',0); ?>
            </ul>
        </div>
    </div>
</div>
  <!--breadcrumbs-inner-part start-->
<!--Blog start-->
<div class="rs-blog-inner single-blog pt-100 pb-100 md-pt-80 md-pb-80">
   <div class="container">
       <div class="row">
         <div class="col-lg-8">
            <div class="blog-item">
               <div class="blog-img">
                  {{-- <a href="#"><img src="{{ $product[0]['url_thumbnail'] }}" alt=""></a>  --}}
                </div> 
                <div class="full-blog-content">
                    <div class="blog-all-titles">
                        {{-- <div class="get-date">
                            <div class="blog-date">
                                <span class="date">19</span>
                                <span class="month">nov</span>
                            </div>
                        </div> --}}
                        <div class="title-wrap">
                              <h3 class="blog-title">
                                  <a href="#">{{ $product[0]['namepro'] }}</a>
                              </h3>
                           <div class="blog-meta">
                              <ul>
                                  <li> <div class="author">{{ $product[0]['author'] }}</div></li>
                                  <li>
                                      <div class="categore-name">
                                         <a href="{{ url('/') }}/{{ $product[0]['slugcate'] }}">{{ $product[0]['namecat'] }}</a> 
                                      </div>
                                  </li>
                              </ul> 
                           </div> 
                        </div>
                    </div>
                    <div class="blog-desc">
                         {!! $product[0]['description'] !!}
                    </div>
                </div>
            </div> 
         </div>
          <div class="col-lg-4 pl-50 md-pl-15 md-mt-60">
              @include('teamilk.canabia-sidebar')
          </div>
       </div>
   </div>
</div>
<!--Blog End-->
@section('other_scripts')

    {{-- <script src="{{ asset('dashboard/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets-tea/js/custom-post.js?v=0.0.8') }}" type="text/javascript"></script> --}}
@stop