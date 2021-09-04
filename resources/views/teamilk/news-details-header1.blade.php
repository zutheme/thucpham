<?php use \App\Http\Controllers\Helper\HelperController; ?>
<div class="td-pb-row">
	<div class="td-pb-span12">
		<div class="td-post-header">
			<div class="td-crumb-container">
				<div class="entry-crumbs">
					<?php $curent_idcategory = 0;
						if(isset($cate_selected)){
						$curent_idcategory = $cate_selected[0]['idcategory'];
					} 
					HelperController::breadcrumbpost($rs_cat_product,$curent_idcategory,'',0); ?>
					<span class="td-bred-no-url-last">{{ $product[0]['namepro'] }}</span>
				</div>
			</div>
			<header class="td-post-title">
				<h1 class="entry-title">{{ $product[0]['namepro'] }}</h1>
				<div class="td-module-meta-info">
					<div class="td-post-author-name"><div class="td-author-by">Bởi</div> 
						<a href="#">{{ $product[0]['author'] }}</a><div class="td-author-line"> - </div> 
					</div> 
					<div class="td-post-views"><i class="td-icon-views"></i><span class="td-nr-views-38">{{ $product[0]['count'] }}</span></div> 
				</div>
			</header>
			<div class="td-post-sharing-top">
				<div id="td_social_sharing_article_top" class="td-post-sharing td-ps-bg td-ps-padding td-post-sharing-style2 ">
					<div class="td-post-sharing-visible">
						<a class="td-social-sharing-button td-social-sharing-button-js td-social-network td-social-facebook" href="https://www.facebook.com/sharer.php?u={{ url('/')}}/{{ $product[0]['slug'] }}" style="transition: opacity 0.2s ease 0s; opacity: 1;">
							<div class="td-social-but-icon"><i class="td-icon-facebook"></i></div>
							<div class="td-social-but-text">Facebook</div></a>
						<a class="td-social-sharing-button td-social-sharing-button-js td-social-network td-social-twitter" href="https://twitter.com/intent/tweet?text={{ $product[0]['namepro'] }}&amp;url={{ url('/')}}/{{ $product[0]['slug'] }}" style="transition: opacity 0.2s ease 0s; opacity: 1;">
							<div class="td-social-but-icon"><i class="td-icon-twitter"></i></div>
							<div class="td-social-but-text">Twitter</div></a>
						<a class="td-social-sharing-button td-social-sharing-button-js td-social-network td-social-pinterest" href="https://pinterest.com/pin/create/button/?url={{ url('/')}}/{{ $product[0]['slug'] }}/&amp;media=&amp;description={{ $product[0]['short_desc'] }}" style="transition: opacity 0.2s ease 0s; opacity: 1;">
							<div class="td-social-but-icon"><i class="td-icon-pinterest"></i></div>
							<div class="td-social-but-text">Pinterest</div></a>
						<a class="td-social-sharing-button td-social-sharing-button-js td-social-network td-social-whatsapp" href="whatsapp://send?text="">
							<div class="td-social-but-icon"><i class="td-icon-whatsapp"></i></div>
							<div class="td-social-but-text">WhatsApp</div></a>
					</div>
					<div class="td-social-sharing-hidden" style="display: none;"><ul class="td-pulldown-filter-list"></ul><a class="td-social-sharing-button td-social-handler td-social-expand-tabs" href="#" data-block-uid="td_social_sharing_article_top">
						<div class="td-social-but-icon"><i class="td-icon-plus td-social-expand-tabs-icon"></i></div></a>
					</div>
				</div>
			</div> 
		</div>
	</div>
</div>