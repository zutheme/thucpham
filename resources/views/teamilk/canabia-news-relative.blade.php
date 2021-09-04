<div class="rs-blog rs-blog-relative pt-40 pb-15 md-pb-10">
    <div class="text-left mb-15 section-title-wrapper">
           <h2 class="section_header">Bài viết liên quan</h2>
           <span class="title-separator separator-border theme-color-bg"></span>
        </div>
    <div class="rs-carousel owl-carousel" data-responsive-lg="3" data-responsive-md="3"  data-responsive-sm="1" data-nav="false" data-dots="true">
        <?php $count = 1; $_order =''; ?>
             @foreach ($rs_tintuc as $row)
                <?php if($count % 5 == 0 || $count == 1) $_order =''; else $_order = $count; ?>
                <div class="blog-item">
                    <div class="blog-img">
                        <img src="{{ asset( $row['urlfile'] ) }}" alt="">
                        {{-- <div class="div-green"></div> --}}
                        <div class="blog-meta">
                            <h3 class="blog-title"><a class="renderer" href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a></h3> 
                        </div>
                    </div>
                </div>        
        <?php $count++; ?>
        @endforeach
    </div>
</div>