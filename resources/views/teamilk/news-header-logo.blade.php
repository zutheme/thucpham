<div class="td-banner-wrap-full td-logo-wrap-full td-logo-mobile-loaded td-container-wrap td_stretch_container">
	<div class="td-header-sp-logo">
		<h1 class="td-logo">
			@foreach($rs_logo_header as $row)
				<a class="td-main-logo" href="{{ url('/') }}">
					<img src="{{ asset($row['urlfile']) }}" alt="">
					<span class="td-visual-hidden">{{ asset($row['namepro']) }}</span>
				</a>
			@endforeach
			
		</h1> 
	</div>
</div>