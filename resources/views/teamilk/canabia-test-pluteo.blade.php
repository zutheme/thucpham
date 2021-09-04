 <?php use \App\Http\Controllers\Helper\HelperController; ?>
 <!-- Testimonial Start -->
<div class="rs-testimonial style2 bg5 pt-100 pb-100 md-pt-80 md-pb-80">
   <div class="container">
        <div class="text-center mb-70 section-title-wrapper theme-color-bg-white">
           <h2 class="section_header"> Cảm nhận khách hàng</h2>
           <span class="title-separator separator-border theme-color-bg-white white-color"></span>
           <div class="desc">
            <p class="topmargin_40 white-color">Ticmedi sử dụng phác đồ công phu ứng dụng công nghệ cao vào điều trị xương khớp dựa trên nguyên lý điều trị của tây y kết hợp thêm các phương pháp đông y, yoga trị liệu và liệu pháp tinh thần..</p>
            </div>
             
        </div>
            <div class="testimonial-main">
            <div class="rs-carousel owl-carousel" data-responsive-lg="2" data-responsive-md="2" data-nav="false" data-dots="true">
                <?php $count = 1; $_order =''; ?>
                         @foreach ($rs_testimonial as $row)
                            <?php if($count % 5 == 0 || $count == 1) $_order =''; else $_order = $count; ?>
                            <div class="testimonial-item">
                                <div class="item-details">
                                    <p>
                                        <i class="fa fa-quote-left"></i>
                                        <?php $content = $row['description']; ?>
                                        <?php echo HelperController::get_the_excerpt_max(200, $content); ?>
                                    </p>
                                    <div class="testimonial-image">
                                        <div class="item-img">
                                            <img src="{{ asset( $row['urlfile'] ) }}" alt="">
                                        </div>
                                       <ul class="cl-author-info">
                                             <?php $short_desc = $row['short_desc']; ?>
                                            <li>{{ $row['namepro'] }}</li>
                                            <li class="categores"><?php echo HelperController::get_the_excerpt_max(100, $short_desc); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>    
                    <?php $count++; ?>
                    @endforeach
           </div>
        </div>
    </div>
</div>
<!-- Testimonial end -->