<?php use \App\Http\Controllers\Helper\HelperController; ?>
<form action="#" method="post">
	<div class="input-group">
      <input type="text" class="form-control c-square c-theme-border" placeholder="Search blog...">
      <span class="input-group-btn">
        <button class="btn c-theme-btn c-theme-border c-btn-square" type="button">Go!</button>
      </span>
    </div>
</form>

<div class="c-content-ver-nav">
	<div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
		<h3 class="c-font-bold c-font-uppercase">Chuyên mục</h3>
		<div class="c-line-left c-theme-bg"></div>
	</div>
	<?php
    if(isset($rs_menu2)){
    	HelperController::menu_category($rs_menu2, 0, '',0,'c-menu c-arrow-dot1 c-theme','');
    } ?>
</div>

<div class="c-content-tab-1 c-theme c-margin-t-30">
	<div class="nav-justified">
		<ul class="nav nav-tabs nav-justified">
		    <li class="active"><a href="#blog_recent_posts" data-toggle="tab">Tin mới</a></li>
		    <li><a href="#blog_popular_posts" data-toggle="tab">Xu hướng</a></li>
		</ul>
		<div class="tab-content">
	    	<div class="tab-pane active" id="blog_recent_posts">
	    		<ul class="c-content-recent-posts-1">
	    			@foreach ($rs_Lstbyposttype as $row)
	    				<li>
	    				<div class="c-image">
	    					<a href="{{ url('/') }}/{{ $row['slug'] }}"><img src="{{ asset( $row['urlfile'] ) }}" alt="" class="img-responsive"></a>
	    				</div>
	    				<div class="c-post">
	    					<a href="{{ url('/') }}/{{ $row['slug'] }}" class="c-title">
	    						{{ $row['namepro'] }}
	    					</a>
	    					{{-- <div class="c-date">27 Jan 2015</div> --}}
	    				</div>
	    			</li>
			    	@endforeach
	    		</ul>
	    	</div>
	    	<div class="tab-pane" id="blog_popular_posts">
	    		<ul class="c-content-recent-posts-1">
	    			@foreach ($rs_Lstbyposttype as $row)
	    				<li>
	    				<div class="c-image">
	    					<a href="{{ url('/') }}/{{ $row['slug'] }}"><img src="{{ asset( $row['urlfile'] ) }}" alt="" class="img-responsive"></a>
	    				</div>
	    				<div class="c-post">
	    					<a href="{{ url('/') }}/{{ $row['slug'] }}" class="c-title">
	    						{{ $row['namepro'] }}
	    					</a>
	    					{{-- <div class="c-date">27 Jan 2015</div> --}}
	    				</div>
	    			</li>
			    	@endforeach
	    		</ul>
	    	</div>
	  	</div>
  	</div>
</div>

{{-- <div class="c-content-ver-nav">
	<div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
		<h3 class="c-font-bold c-font-uppercase">Blogs</h3>
		<div class="c-line-left c-theme-bg"></div>
	</div>
	<ul class="c-menu c-arrow-dot c-theme">
		<li><a href="#">Fasion & Arts</a></li>
		<li><a href="#">UX & Web Design</a></li>
		<li><a href="#">Mobile Development</a></li>
		<li><a href="#">Internet Marketing</a></li>
		<li><a href="#">Frontend Development</a></li>
	</ul>
</div> --}}