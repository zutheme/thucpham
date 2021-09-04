<div class="td-main-content-wrap td-main-page-wrap td-container-wrap">
	<div class="tdc-content-wrap">
		@include('teamilk.news-main-trending')
		@include('teamilk.news-main-slidepost')
		@include('teamilk.news-main-popular')
		@include('teamilk.news-main-youtube')
		@include('teamilk.news-main-banner')
	</div>
	<div class="td-container td-pb-article-list ">
		<div class="td-pb-row">
			@include('teamilk.news-recent-blog')
			@include('teamilk.news-main-blog-right')
		</div>
	</div>
</div>
@include('teamilk.news-main-footer-intagram')
@include('teamilk.news-main-footer-bottom')