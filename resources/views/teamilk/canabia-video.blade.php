  <?php use \App\Http\Controllers\Helper\HelperController; ?>
 <!--Team start-->
<div class="rs-team style2 pt-150 md-pt-80 video">
      <div class="container">
          @foreach ($rs_youtube1 as $row)
             <script>
               playlist1.push('{{ $row['idyoutube'] }}');
              </script>
          @endforeach
          @foreach ($rs_youtube as $row)
             <script>
               playlist1.push('{{ $row['idyoutube'] }}');
              </script>
          @endforeach
          <div class="sec-title text-center mb-50">
            {{--  <span class="sub-title white-color">Team Members</span>
             <h2 class="title line-middle white-line white-color">
                  Our Trained Staff
             </h2>  --}}
            
          </div>
          <div class="team-main">
              <div class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-hoverpause="false" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="flase" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="flase" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="flase" data-ipad-device2="1" data-ipad-device-nav2="false" data-ipad-device-dots2="flase" data-md-device="4" data-md-device-nav="false" data-md-device-dots="flase">
                <?php $count = 0;  ?>
                    @foreach ($rs_youtube as $row)
                        <div class="team-item">
                           <div class="img-part">
                               <img src="{{ asset( $row['urlfile'] ) }}" alt="">
                               <div class="desc-play text-center">
                                    <a class="btn-play" idyoutube="{{ $count }}" href="javascript:void(0)"><img class="play" src="{{ asset('public/icons/play-icon-3.png') }}"></a>
                               </div>
                           </div>
                        </div>   
                    <?php $count++; ?>
                    @endforeach
              </div>
          </div>
      </div>
</div>
<!--Team End-->