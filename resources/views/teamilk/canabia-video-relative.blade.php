<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div class="rs-team style2 pt-40 md-pt-15 video">
          <div class="sec-title text-left mb-10">
            <span class="sub-title">Video liên quan</span>
          </div>
          <div class="team-main">
              <div class="rs-carousel owl-carousel" data-responsive-lg="3" data-responsive-md="3"  data-responsive-sm="3" data-nav="false" data-dots="true">
                <?php $count = 0;  ?>
                    @foreach ($rs_youtube as $row)
                        <div class="team-item">
                           <div class="img-part">
                               <img src="{{ asset( $row['urlfile'] ) }}" alt="">
                               <div class="desc-play text-center">
                                    <a href="{{ url('/') }}/{{ $row['slug'] }}"><img class="play" src="{{ asset('public/icons/play-icon-3.png') }}"></a>
                               </div>
                           </div>
                        </div>   
                    <?php $count++; ?>
                    @endforeach
              </div>
          </div>
</div>
