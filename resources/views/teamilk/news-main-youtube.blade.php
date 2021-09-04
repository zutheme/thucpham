<div id="tdi_27_670" class="tdc-row">
	<div class="vc_row tdi_28_623 td-vlog-container wpb_row td-pb-row">
		<div class="vc_column tdi_30_773  wpb_column vc_column_container tdc-column td-pb-span12">
			<div class="wpb_wrapper">
				<div class="td_block_wrap td_block_video_playlist tdi_31_073">
					<div class="td_block_inner">
						<div class="td_video_playlist_column_3">
							<div class="td_video_playlist_title">
							<div class="td_video_title_text">Video</div>
							</div>
							<div class="td_wrapper_video_playlist">
								<?php $count = 0; ?>
							@foreach($rs_youtube as $row)
								@if ($count == 0)
								<div class="td_wrapper_player td_wrapper_playlist_player_youtube" data-first-video="{{ $row['idyoutube'] }}" data-autoplay="0">
									<iframe id="player_youtube_0" class="td-youtube-player" frameborder="0" allowfullscreen="1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" title="YouTube video player" width="100%" height="100%" src="https://www.youtube.com/embed/{{ $row['idyoutube'] }}?autoplay=0&amp;enablejsapi=1&amp;widgetid=1"></iframe>
								</div>
								<div class="td_container_video_playlist ">
									<div class="td_video_controls_playlist_wrapper">
										<div class="td_video_stop_play_control"><a class="td-sp-video-play td-sp td_youtube_control"></a></div>
										<div class="td_current_video_play_title_youtube td_video_title_playing">{{ $row['namepro'] }}</div>
										<div class="td_current_video_play_time_youtube td_video_time_playing">03:22</div>
									</div>
									<div id="td_youtube_playlist_video" class="td_playlist_clickable td_add_scrollbar_to_playlist_for_mobile">
										<a class="td_{{ $row['idyoutube'] }} td_click_video td_click_video_youtube td_video_currently_playing" data-video-id="{{ $row['idyoutube'] }}"> 
											<div class="td_video_thumb">
												<img src="https://img.youtube.com/vi/{{ $row['idyoutube'] }}/default.jpg" alt="Video thumbnail">
											</div>
											<div class="td_video_title_and_time">
												<div class="td_video_title">{{ $row['namepro'] }}</div>
												<div class="td_video_time">03:22</div>
											</div>
										</a>
										@else
										<a class="td_{{ $row['idyoutube'] }} td_click_video td_click_video_youtube" data-video-id="{{ $row['idyoutube'] }}"> 
											<div class="td_video_thumb">
												<img src="https://img.youtube.com/vi/{{ $row['idyoutube'] }}/default.jpg" alt="Video thumbnail">
											</div>
											<div class="td_video_title_and_time">
												<div class="td_video_title">{{ $row['namepro'] }}</div>
												 <div class="td_video_time">07:16</div>
											</div>
										</a>
										@endif
										<?php $count++; ?>
									@endforeach	 
									</div>
								</div>
							</div>
						</div>
					<script>if (undefined === window.td_youtube_list_ids) {window.td_youtube_list_ids = {}}; </script>
						@foreach($rs_youtube as $row)
							<script>
								window.td_youtube_list_ids['td_{{ $row['idyoutube'] }}'] = {title:"{{ $row['namepro'] }}",time:"03:00"};
							</script>
						@endforeach	
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>