<div id="tdi_32_836" class="tdc-row">
    <div class="vc_row tdi_33_a6b  wpb_row td-pb-row">
        <div class="vc_column tdi_35_543  wpb_column vc_column_container tdc-column td-pb-span12">
            <div class="wpb_wrapper">
                <div class="td-a-rec td-a-rec-id-custom_ad_1  tdi_36_695 td_block_template_9">
                    {{-- <span class="td-adspot-title">- Advertisement -</span> --}}
                     @foreach ($rs_banner as $banner)
                        <div class="td-visible-desktop">
                            <a href="{{ $banner['link'] }}"><img src="{{ asset( $banner['urlfile'] ) }}" alt=""></a>
                        </div>
                        <div class="td-visible-tablet-landscape">
                            <a href="{{ $banner['link'] }}"><img src="{{ asset( $banner['urlfile'] ) }}" alt=""></a>
                        </div>
                        <div class="td-visible-tablet-portrait">
                           <a href="{{ $banner['link'] }}"><img src="{{ asset( $banner['urlfile'] ) }}" alt=""></a>
                        </div>
                        <div class="td-visible-phone">
                            <a href="{{ $banner['link'] }}"><img src="{{ asset( $banner['urlfile'] ) }}" alt=""></a>
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>