 <!-- BEGIN: CONTENT/TILES/TILE-3 -->
<div class="c-content-box c-size-md c-bg-white">
    <div class="c-content-tile-grid c-bs-grid-reset-space" data-auto-height="true">
        <div class="c-content-title-1 wow animate fadeInDown">
            <h3 class="c-font-uppercase c-center c-font-bold">Tin chuyên gia</h3>
            <div class="c-line-center"></div>
        </div>
        <div class="row wow animate fadeInUp">
            <?php $count = 0; 
                  $_class = '';
            ?>
            @foreach ($chuyen_gia as $row)
                <?php switch ($count) {
                      case 0:
                        $_class1 = 'c-bg-green';
                        $_class2 = 'c-arrow-right c-arrow-green';
                        break;
                      case 1:
                        $_class1 = 'c-bg-brown-2';
                        $_class2 = 'c-arrow-right c-arrow-brown-2';
                        break;
                      case 2:
                        $_class1 = 'c-bg-red-2';
                        $_class2 = 'c-arrow-left c-arrow-red-2';
                        break;
                      case 3:
                        $_class1 = 'c-bg-blue-3';
                        $_class2 = 'c-arrow-left c-arrow-blue-3';
                        break; 
                      default:
                         $_class1 = '';
                         $_class2 = '';
                         break;
                    }
                    //$count++;
                ?>
                @if( $count < 2)
                    <div class="col-md-6">
                        <div class="c-content-tile-1 <?php echo $_class1; ?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="c-tile-content c-content-v-center" data-height="height">
                                        <div class="c-wrapper">
                                            <div class="c-body c-center">
                                                <h3 class="c-tile-title c-font-25 c-line-height-34 c-font-uppercase c-font-bold c-font-white"> {{ $row['namepro'] }} </h3>
                                                <a href="{{ url('/') }}/{{ $row['slug'] }}" class="btn btn-sm c-btn-white c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="c-tile-content <?php echo $_class2; ?> c-content-overlay">
                                        <div class="c-overlay-wrapper">
                                            <div class="c-overlay-content">
                                                <a href="#">
                                                    <i class="icon-link"></i>
                                                </a>
                                                <a href="{{ url('/') }}/{{ $row['slug'] }}" data-lightbox="fancybox" data-fancybox-group="gallery-4">
                                                    <i class="icon-magnifier"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="c-image c-overlay-object" data-height="height" style="background-image: url({{ asset( $row['urlfile'] ) }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <div class="c-content-tile-1 <?php echo $_class1; ?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="c-tile-content <?php echo $_class2; ?> c-content-overlay">
                                        <div class="c-overlay-wrapper">
                                            <div class="c-overlay-content">
                                                <a href="{{ url('/') }}/{{ $row['slug'] }}">
                                                    <i class="icon-link"></i>
                                                </a>
                                                <a href="{{ url('/') }}/{{ $row['slug'] }}" data-lightbox="fancybox" data-fancybox-group="gallery-4">
                                                    <i class="icon-magnifier"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="c-image c-overlay-object" data-height="height" style="background-image: url({{ asset( $row['urlfile'] ) }}"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="c-tile-content c-content-v-center" data-height="height">
                                        <div class="c-wrapper">
                                            <div class="c-body c-center">
                                                <h3 class="c-tile-title c-font-25 c-line-height-34 c-font-uppercase c-font-bold c-font-white"> {{ $row['namepro'] }} </h3>
                                                <a href="{{ url('/') }}/{{ $row['slug'] }}" class="btn btn-sm c-btn-white c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Đọc thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <?php $count++; ?>
            @endforeach
        </div>
    </div>
</div>
<!-- END: CONTENT/TILES/TILE-3 -->