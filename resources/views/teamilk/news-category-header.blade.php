<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div class="td-category-header td-container-wrap">
	<div class="td-container">
		<div class="td-crumb-container">
			@if(isset($rs_lpro) and $rs_lpro[0]['_commit'] > 0)

						<div class="entry-crumbs">

						<?php HelperController::breadcrumbpost($rs_cat_product,$curent_idcategory,'',0); ?>				

						</div>

						@elseif(isset($rs_lpro) and $rs_lpro[0]['_commit'] < 1)

							<h5>Not permit</h5>

						@else
							<h5>Chưa có dữ liệu</h5>
						@endif
			{{-- <div class="entry-crumbs"><span><a title="" class="entry-crumb" href="#">Home</a></span> <i class="td-icon-right td-bread-sep td-bred-no-url-last"></i> <span class="td-bred-no-url-last">Gadgets</span>
			</div> --}}
		</div>
		<div class="td-category-title-holder">
			<h1 class="entry-title td-page-title">{{ $title }}</h1>
		</div>
		<div class="td-pulldown-container">
			{{-- <div class="td-category-pulldown-filter td-wrapper-pulldown-filter">
				<div class="td-pulldown-filter-display-option">
					<div class="td-subcat-more">Latest <i class="td-icon-menu-down"></i></div>
					
						 <ul class="td-pulldown-filter-list">
							<li class="td-pulldown-filter-item"><a class="td-pulldown-category-filter-link" id="tdi_10_996" data-td_block_id="tdi_9_9de" href="index.html">Latest</a></li>
							<li class="td-pulldown-filter-item"><a class="td-pulldown-category-filter-link" id="tdi_11_a6a" data-td_block_id="tdi_9_9de" href="index-1.html?filter_by=featured">Featured posts</a></li>
							<li class="td-pulldown-filter-item"><a class="td-pulldown-category-filter-link" id="tdi_12_6ad" data-td_block_id="tdi_9_9de" href="index-2.html?filter_by=popular">Most popular</a></li>
							<li class="td-pulldown-filter-item"><a class="td-pulldown-category-filter-link" id="tdi_13_5e6" data-td_block_id="tdi_9_9de" href="index-3.html?filter_by=popular7">7 days popular</a></li>
							<li class="td-pulldown-filter-item"><a class="td-pulldown-category-filter-link" id="tdi_14_d69" data-td_block_id="tdi_9_9de" href="index-4.html?filter_by=review_high">By review score</a></li><li class="td-pulldown-filter-item"><a class="td-pulldown-category-filter-link" id="tdi_15_0a9" data-td_block_id="tdi_9_9de" href="index-5.html?filter_by=random_posts">Random</a></li>
						</ul>
				</div>
			</div> --}}
		</div>
	</div>
</div>