<div class="td-pb-span4 td-main-sidebar" role="complementary">
    <div class="td-ss-main-sidebar">
        <div class="clearfix"></div>
        <aside id="text-2" class="td_block_template_9 widget text-2 widget_text"><h4 class="td-block-title"><span>Ý kiến độc giả</span></h4> 
            <div class="textwidget">
                @foreach ($rs_tuvan as $row)
                    <div class="td-sidebar-about">
                        <a href="#"><img src="{{ asset( $row['urlfile'] ) }}"></a>
                        {!! $row['description'] !!}
                    </div>
                @endforeach
            </div>
        </aside>
        <div class="td_block_wrap td_block_9 td_block_widget tdi_40_66c td_with_ajax_pagination td-pb-border-top td_block_template_9 td_ajax_preloading_preload td-column-1 td_block_padding td_block_bot_line" data-td-block-uid="tdi_40_66c">
            <div class="td-block-title-wrap">
                <h4 class="td-block-title"><span class="td-pulldown-size">Khám bệnh online</span></h4>
            </div>
            <div id="tdi_40_66c" class="td_block_inner">
                @foreach ($rs_online as $row)
                    <div class="td-block-span12">
                        <div class="td_module_8 td_module_wrap">
                            <div class="item-details">
                                <h3 class="entry-title td-module-title"><a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" title="{{ $row['namepro'] }}">{{ $row['namepro'] }}</a></h3>
                                <div class="td-module-meta-info">
                                    <a href="{{ url('/') }}/{{ $row['slug'] }}" class="td-post-category">Tìm hiểu</a>
                                    <span class="td-post-author-name"><a href="{{ url('/') }}/{{ $row['slugcate'] }}">{{ $row['namecat'] }}</a> <span>-</span> </span>  
                                    <span class="td-module-comments"><a href="#">{{ $row['count'] }}</a></span> 
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach 
            </div>
        </div>
        <div class="td_block_wrap td_block_7 tdi_43_ad5 td-pb-border-top td_block_template_9 td-column-1 td_block_padding" data-td-block-uid="tdi_43_ad5">
            <div class="td-block-title-wrap">
                <h4 class="td-block-title"><span class="td-pulldown-size">Ý Kiến độc giả</span></h4>
            </div>
            <div class="td_block_inner">
                @foreach($rs_doc_gia as $row)
                <div class="td-block-span12">
                    <div class="td_module_6 td_module_wrap td-animation-stack">
                        <div class="td-module-thumb">
                            <a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" class="td-image-wrap " title="{{ $row['namepro'] }}"><img width="100" height="70" class="entry-thumb" src="{{ asset( $row['urlfile'] ) }}" alt="" title="{{ $row['namepro'] }}"></a>
                        </div>
                        <div class="item-details">
                            <h3 class="entry-title td-module-title"><a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" title="{{ $row['namepro'] }}">{{ $row['namepro'] }}</a></h3> 
                        </div>
                    </div>
                </div> 
                @endforeach

            </div>
        </div>  
        
         
        <div class="td_block_wrap td_block_social_counter td_block_widget tdi_37_666 td-social-style10 td-social-boxed td-social-colored td-pb-border-top td_block_template_9">
            <div class="td-block-title-wrap">
                <h4 class="td-block-title"><span class="td-pulldown-size">Kết nối</span></h4>
            </div>
            <div class="td-social-list">
                <div class="td_social_type td-pb-margin-side td_social_facebook">
                    <div class="td-social-box">
                        <div class="td-sp td-sp-facebook"></div>
                        {{-- <span class="td_social_info td_social_info_counter">20,831</span>
                        <span class="td_social_info td_social_info_name">Fans</span> --}}
                        <span class="td_social_button"><a href="https://www.facebook.com/TickMedical" target="_blank">Like</a></span>
                    </div>
                </div>
                <div class="td_social_type td-pb-margin-side td_social_youtube">
                    <div class="td-social-box">
                        <div class="td-sp td-sp-youtube"></div>
                       {{--  <span class="td_social_info td_social_info_counter">17,200</span>
                        <span class="td_social_info td_social_info_name">Subscribers</span> --}}
                        <span class="td_social_button"><a href="https://www.youtube.com/channel/UCq54D5mU4z2ZgNRI89kEIpQ" target="_blank">Subscribe</a></span>
                    </div>
                </div>
                <div class="td_social_type td-pb-margin-side td_social_instagram">
                    <div class="td-social-box">
                        <div class="td-sp td-sp-instagram"></div>
                        {{-- <span class="td_social_info td_social_info_counter">2,736</span>
                        <span class="td_social_info td_social_info_name">Followers</span> --}}
                        <span class="td_social_button"><a href="https://www.facebook.com/groups/congdongdieutrixuongkhop" target="_blank">Follow</a></span>
                    </div>
                </div>
                <div class="td_social_type td-pb-margin-side td_social_twitter">
                    <div class="td-social-box">
                        <div class="td-sp td-sp-twitter"></div>
                        {{-- <span class="td_social_info td_social_info_counter">2,506</span>
                        <span class="td_social_info td_social_info_name">Followers</span> --}}
                        <span class="td_social_button">
                            <a href="https://zalo.me/4222044563931562361" target="_blank">Follow</a></span>
                    </div>
                </div>
                
            </div>
        </div> 
        
        <div class="td-a-rec td-a-rec-id-sidebar  tdi_39_203 td_block_template_9">
            @foreach ($rs_banner_right as $row)
                <div class="td-visible-desktop">
                    <a href="{{ $row['link'] }}"><img src="{{ asset( $row['urlfile'] ) }}" alt="{{ $row['namepro'] }}"></a>
                </div>
                <div class="td-visible-tablet-landscape">
                    <a href="{{ $row['link'] }}"><img src="{{ asset( $row['urlfile'] ) }}" alt="{{ $row['namepro'] }}"></a>
                </div>
                <div class="td-visible-tablet-portrait">
                    <a href="{{ $row['link'] }}"><img src="{{ asset( $row['urlfile'] ) }}" alt="{{ $row['namepro'] }}"></a>
                </div>
                <div class="td-visible-phone">
                    <a href="{{ $row['link'] }}"><img src="{{ asset( $row['urlfile'] ) }}" alt="{{ $row['namepro'] }}"></a>
                </div>
            @endforeach
        </div>
        <div class="td_block_wrap td_block_9 td_block_widget tdi_40_66c td_with_ajax_pagination td-pb-border-top td_block_template_9 td_ajax_preloading_preload td-column-1 td_block_padding td_block_bot_line" data-td-block-uid="tdi_40_66c">
            <div class="td-block-title-wrap">
                <h4 class="td-block-title"><span class="td-pulldown-size">5 bài viết phải đọc</span></h4>
            </div>
            <div id="tdi_40_66c" class="td_block_inner">
                @foreach ($rs_feature as $row)
                    <div class="td-block-span12">
                        <div class="td_module_8 td_module_wrap">
                            <div class="item-details">
                                <h3 class="entry-title td-module-title"><a href="{{ url('/') }}/{{ $row['slug'] }}" rel="bookmark" title="{{ $row['namepro'] }}">{{ $row['namepro'] }}</a></h3>
                                <div class="td-module-meta-info">
                                    <a href="{{ url('/') }}/{{ $row['slug'] }}" class="td-post-category">Tìm hiểu</a>
                                    <span class="td-post-author-name"><a href="{{ url('/') }}/{{ $row['slugcate'] }}">{{ $row['namecat'] }}</a> <span>-</span> </span>  
                                    <span class="td-module-comments"><a href="#">{{ $row['count'] }}</a></span> 
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach 
            </div>
        </div>  
        <div class="clearfix"></div>
    </div>
</div>