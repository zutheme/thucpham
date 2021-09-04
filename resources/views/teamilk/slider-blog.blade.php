  <!-- BEGIN: LAYOUT/SLIDERS/REVO-SLIDER-4 -->
<section class="c-layout-revo-slider c-layout-revo-slider-4" dir="ltr">
    <div class="tp-banner-container c-theme">
        <div class="tp-banner rev_slider" data-version="5.0">
            <ul>
                <!--BEGIN: SLIDE #1 -->
                @if(isset($slider))
                    <?php $count = 0; $active = "active"; ?>
                    @foreach($slider as $row)
                      <?php if($count > 0) {
                          $active = "";
                      }
                      $_link = "#"; 
                      if(asset($row['link'])){
                        $_link = $row['link'];
                      }
                      ?>
                      <li data-transition="fade" data-slotamount="1" data-masterspeed="1000">
                        <img alt="" src="{{ asset( $row['urlfile'] ) }}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <div class="tp-caption customin customout" data-x="center" data-y="center" data-hoffset="" data-voffset="-50" data-speed="500" data-start="1000" data-transform_idle="o:1;" data-transform_in="rX:0.5;scaleX:0.75;scaleY:0.75;o:0;s:500;e:Back.easeInOut;" data-transform_out="rX:0.5;scaleX:0.75;scaleY:0.75;o:0;s:500;e:Back.easeInOut;" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600">
                            <h3 class="c-main-title-circle c-font-48 c-font-bold c-font-center c-font-uppercase c-font-white c-block"> TAKE THE WEB BY
                                <br>STORM WITH JANGO </h3>
                        </div>
                        <div class="tp-caption lft" data-x="center" data-y="center" data-voffset="110" data-speed="900" data-start="2000" data-transform_idle="o:1;" data-transform_in="x:100;y:100;rX:120;scaleX:0.75;scaleY:0.75;o:0;s:500;e:Back.easeInOut;" data-transform_out="x:100;y:100;rX:120;scaleX:0.75;scaleY:0.75;o:0;s:500;e:Back.easeInOut;">
                            <a href="#" class="c-action-btn btn btn-lg c-btn-square c-theme-btn c-btn-bold c-btn-uppercase">Learn More</a>
                        </div>
                    </li>
                       
                       <?php $count++; ?>
                    @endforeach
                  @endif
               
                <!--END -->
                <!--BEGIN: SLIDE #1 -->
                
                <!--END -->
                
            </ul>
        </div>
    </div>
</section>
<!-- END: LAYOUT/SLIDERS/REVO-SLIDER-4 -->
 
