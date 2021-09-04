<!--Blog Section Start -->
<div class="rs-blog pt-150 pb-75 md-pb-55">
    <div class="container">
         {{-- <div class="sec-title text-center mb-70 section-title-wrapper"> --}}
        <div class="text-center mb-70 section-title-wrapper">
          {{--  <h2 class="title line-middle">Tin tức</h2> --}}
           <h2 class="section_header">TIN TỨC</h2>
           <span class="title-separator separator-border theme-color-bg"></span>
           <div class="desc">
            <p class="topmargin_40">Ticmedi sử dụng phác đồ công phu ứng dụng công nghệ cao vào điều trị xương khớp dựa trên nguyên lý điều trị của tây y kết hợp thêm các phương pháp đông y, yoga trị liệu và liệu pháp tinh thần..</p>
            </div> 
        </div>
        <div class="rs-carousel owl-carousel" data-responsive-lg="3" data-responsive-md="3"  data-responsive-sm="1" data-nav="false" data-dots="true">
            <?php $count = 1; $_order =''; ?>
                 @foreach ($rs_tintuc as $row)
                    <?php if($count % 5 == 0 || $count == 1) $_order =''; else $_order = $count; ?>
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="{{ asset( $row['urlfile'] ) }}" alt="">
                            <div class="div-green"></div>
                            <div class="blog-meta">
                               <div class="blog-dates">
                                     <span class="author">{{ $row['author'] }}</span><span class="seperator"></span>
                                     <span class="category"><a href="{{ url('/') }}/{{ $row['slugcate'] }}">{{ $row['namecat'] }}</a></span>
                                </div>
                                <h3 class="blog-title"><a class="renderer" href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a></h3> 
                            </div>
                        </div>
                    </div>        
            <?php $count++; ?>
            @endforeach
        </div>
    </div>
</div>
<!-- Blog Section End