<div class="td-main-content-wrap td-footer-instagram-container td-container-wrap td_stretch_content">
	<div class="td-instagram-user">
		<h4 class="td-footer-instagram-title">Giao lưu trực tuyến<a class="td-footer-instagram-user-link" href="#" target="_blank"></a></h4>
	</div>
	<div class="td_block_wrap td_block_instagram tdi_41_032 td-pb-border-top td_block_template_9" data-td-block-uid="tdi_41_032">
		<div class="td-block-title-wrap"></div>
			<div id="tdi_41_032" class="td-instagram-wrap td_block_inner td-column-1">
				<div class="td-instagram-main td-images-on-row-6 td-image-gap-2">
					@foreach($rs_you_foot as $row)
						<div class="td-instagram-element">
							<a class="td-instagram-image" href="{{ url('/') }}/{{ $row['slug'] }}" style="background-image: url({{ asset( $row['urlfile'] ) }})"></a>
							{{-- <a class="td-instagram-image" href="{{ $row['link'] }}" style="background-image: url(https://img.youtube.com/vi/{{ $row['idyoutube'] }}/hqdefault.jpg)"></a> --}}
						</div>
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
	</div> 
</div>