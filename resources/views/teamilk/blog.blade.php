<!-- BEGIN: CONTENT/EVENTS/EVENTS-1 -->
<div class="c-content-box c-size-md c-bg-white">
	<div class="container">
		<div class="c-content-title-1 c-opt-1 wow fadeInDown">
			<h3 class="c-center c-font-bold">Tin tức</h3>
			<p class="c-font-center"></p>
			<div class="c-line-center c-theme-bg"></div>
		</div>
		<div class="c-content-events-1">
			<div class="row">
				@foreach ($rs_Lstbyposttype as $row)
					<div class="col-md-4">
						<div class="c-content-events-1-item wow fadeInLeft" data-wow-delay="0.2s">
							<div class="c-content-events-1-img-container">
								<a href="{{ url('/') }}/{{ $row['slug'] }}"><img class="c-content-events-1-img" src="{{ asset( $row['urlfile'] ) }}"></a>
							</div>
							<div class="c-content-events-1-content-container">
								{{-- <div class="c-content-events-1-cat">News</div> --}}
								<h3 class="c-content-events-1-title render"><a href="{{ url('/') }}/{{ $row['slug'] }}">{{ $row['namepro'] }}</a></h3>
								{{-- <p class="c-content-events-1-desc">{{ $row['short_desc'] }}</p> --}}
								<a href="{{ url('/') }}/{{ $row['slug'] }}" class="c-content-events-1-link">Đọc thêm</a>
							</div>
						</div>
					</div>
                @endforeach
			</div>
		</div>
	</div>
</div><!-- END: CONTENT/EVENTS/EVENTS-1 -->