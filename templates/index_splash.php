<?php if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden", true, 403); include('../inc/accessdenied.html'); exit; }; ?>
<koken:include file="inc/components/header.html" />
<koken:load source="{{ settings.slideshow_source }}" limit="4">
	<koken:head>
		<meta property="og:site_name" content="{{ site.title }}" />
		<meta property="og:title" content="{{ site.title }}" />
		<meta property="og:description" content="{{ site.description strip_html='true' }}" />
		<meta property="og:type" content="website" />
		<koken:if data="settings.slideshow_source" equals="featured_albums">
			<koken:first>
				<koken:covers>
					<koken:first>
						<meta property="og:image" content="{{ content.presets.medium_large.url }}" />
						<meta property="og:image:width" content="{{ content.presets.medium_large.width }}" />
						<meta property="og:image:height" content="{{ content.presets.medium_large.height }}" />
					</koken:first>
				</koken:covers>
			</koken:first>
		<koken:else>
			<koken:loop>
				<meta property="og:image" content="{{ content.presets.medium_large.url }}" />
				<meta property="og:image:width" content="{{ content.presets.medium_large.width }}" />
				<meta property="og:image:height" content="{{ content.presets.medium_large.height }}" />
			</koken:loop>
		</koken:if>
		<meta property="og:url" content="{{ location.site_url }}{{ location.here }}" />
		<koken:not empty="profile.twitter">
			<meta name="twitter:card" content="gallery" />
			<meta name="twitter:site" content="@{{ profile.twitter }}" />
			<meta name="twitter:creator" content="@{{ profile.twitter }}" />
			<koken:if data="settings.slideshow_source" equals="featured_albums">
				<koken:first>
					<koken:covers>
						<koken:first>
							<meta name="twitter:image{{ index }}" content="{{ content.presets.medium_large.cropped.url }}" />
						</koken:first>
					</koken:covers>
				</koken:first>
			<koken:else>
				<koken:loop>
					<meta name="twitter:image{{ index }}" content="{{ content.presets.medium_large.cropped.url }}" />
				</koken:loop>
			</koken:if>
		</koken:not>
	</koken:head>
</koken:load>
<koken:include file="inc/components/img/icons/slide-sprite.svg" />
<main role="main">

	<section id="slideshow" class="o-index-intro">
		<koken:pulse jsvar="pulse" width="100%" height="100%" crop="fill" order="random" link_to="album" autostart="true" loop="true" source="{{ settings.slideshow_source }}" next=".sldshw-arrow-right" previous=".sldshw-arrow-left" toggle=".sldshw_play"  restart=".sldshw_restart" fallbacktext="No {{ settings.slideshow_source }} content found. Please assign them in the Library, or choose a different source for your slideshow." />
		<koken:if true="settings.slideshow_nav_hide">
			<ul id="slideshow_nav">
				<li><a href="#" title="{{ language.previous }}" class="sldshw-arrow-left" data-bind-to-key="left"><i class="icon-{{ settings.slideshow_nav_arrows }}-left"></i></a></li>
				<li><a href="#" title="{{ language.next }}" class="sldshw-arrow-right" data-bind-to-key="right"><i class="icon-{{ settings.slideshow_nav_arrows }}-right"></i></a></a></li>
				<koken:load source="{{ settings.slideshow_source }}"><li class="amount-check">{{ count }}</li></koken:load>
			</ul>
			<koken:not data="settings.extended_splash" equals="on">
				<div id="tgl_slideshow">
					<a href="#" class="sldshw_play" data-bind-to-key="space" title="{{ language.play }}/{{ language.pause }}">
						<!--<i class="fa fa-play-circle" title="{{ language.play }}"></i>-->
						<svg class="icon-slide" id="icon-slide-play" title="{{ language.play }}"><use xlink:href="#icon-slide-play" /></svg>
					</a>
				</div>
			</koken:not>
		</koken:if>

		<div class="tagline {{ settings.tagline_placement }} page_{{ settings.about_me_page_id }}">
			<koken:if true="settings.about_me_page">
				<koken:not empty="settings.about_me_page_id">
					<koken:load source="page" filter:id="{{ settings.about_me_page_id }}">
						<koken:not empty="page.excerpt">
							{{ page.excerpt paragraphs="true" }}
						<koken:else>
							{{ page.content truncate="255" paragraphs="true" }}
						</koken:not>
						<koken:if true="settings.aboutme_link">
							<span>
								<koken:link to="page" filter:id="{{ settings.about_me_page_id }}" class="" title="{{ language.view_title collate='page.title' }}">
									{{ language.read_more }}&hellip;
								</koken:link>
							</span>
						</koken:if>
					</koken:load>
				<koken:else>
					{{ site.tagline paragraphs="true" }}
					<koken:note>No page ID found</koken:note>
				</koken:not>
			<koken:else>
				{{ site.tagline paragraphs="true" }}
			</koken:if>
		</div>

		<koken:if true="settings.built_with">
			<div class="oxygen-ribbon black oxygen-rb-shadow"><a style="white-space: pre-line;margin:0 10px 0 10px;" title="{{ site.theme.name }} v{{ site.theme.version }}&#013;Development by {{ site.author.name }}&#013;{{ site.theme.description }}" onclick="return !window.open(this.href);" href="http://oxygen.kokensupport.com/">{{ site.theme.name }}</a></div>
		</koken:if>

		<koken:if data="settings.extended_splash" equals="on">
			<koken:if data="settings.extended_essays || settings.extended_albums || settings.extended_content || settings.extended_favorites || settings.extended_featured" equals="block || flex">
				<a href="#extended" class="cover_scroll_link scrolldown extended_splash_{{ settings.extended_splash }}">
					<span></span><span></span><span></span>
					{{ language.see_more }}
				</a>
			</koken:if>
		</koken:if>

		<koken:if true="settings.show_auxiliary_links">
			<div id="auxiliary">
				<koken:navigation group="auxiliary" fallbacktext="Add links to here through the Auxiliary links navigation group in the Site editor" />
			</div>
		</koken:if>

		<script>'use strict';pulse.on( 'start', function() {$('#ss_spinner').addClass('loading');});pulse.on( 'waiting', function(e) {if (e) {$('body').addClass('Page--loading');$('#ss_spinner').addClass('loading');} else {$('#ss_spinner').removeClass('loading');$('body').removeClass('Page--loading');}});pulse.on( 'dataloaded', function() {$('#ss_spinner').removeClass('loading');$('body').removeClass('Page--loading');});<koken:if true="settings.slideshow_nav_hide">var albumCount = $('.amount-check').html();if (albumCount === '1') {$('#slideshow_nav').hide();$('.sldshw_play').hide();} else {pulse.on( 'playing', function(isPlaying) {var el = $('.sldshw_play');if (isPlaying) {el.html('<svg class="icon-slide" id="icon-slide-pause" title="{{ language.pause }}"><use xlink:href="#icon-slide-pause" /></svg>');} else {el.html('<svg class="icon-slide" id="icon-slide-play" title="{{ language.play }}"><use xlink:href="#icon-slide-play" /></svg>');}});var interval = 1;setInterval(function(){if(interval == 3){$('#slideshow_nav').fadeOut(2000);$('#tgl_slideshow').fadeOut(2000);interval = 1;}interval = interval+1;},1000);$(document).bind('mousemove keypress', function() {$('#slideshow_nav').fadeIn(2000);$('#tgl_slideshow').fadeIn(2000);interval = 1;});}</koken:if></script>

		<div id="ss_spinner"></div>
	</section>

<koken:if data="settings.extended_splash" equals="on">
	<section id="extended" class="scrolltarget extended_splash_{{ settings.extended_splash }}"></section>

	<section id="essays" class="o-index--essays extended_splash_{{ settings.extended_splash }}">
		<header class="o-index--head">
			<h1><koken:link bind_to_key="e" to="essays" title="{{ language.view_all_essays }}">{{ language.recent_essays }}</koken:link></h1>
		</header>
		<koken:load source="essays" order_by="published_on" limit="{{ settings.extended_essays_load }}">
			<koken:loop>
				<article class="" id="content-{{ id }}" data-file="{{ essay.url }}" data-target="article">
					<koken:time relative="{{ settings.show_event_date_relative }}" class="index-time" />
					<koken:link title="&nbsp;&nbsp;&nbsp;{{ language.view_title collate='essay.title' case='lower' }}&#013;{{ essay.excerpt strip_html='true' }}">
						<koken:featured_image>
							<header class="page_cover">
								<koken:background lazy="true" id="cover_bg" style="height:100%;"></koken:background>
							</header>
						</koken:featured_image>
						<h2 class="{{ essay.featured if_true="featured" }}">{{ essay.title }}</h2>
						<section>
							{{ essay.excerpt paragraphs="true" }}
						</section>
					</koken:link>
					<koken:include file="inc/components/tags-cats-loop.html" />
				</article>
			</koken:loop>
		</koken:load>
	</section>

	<section id="albums" class="o-index--albums extended_splash_{{ settings.extended_splash }} clearfix">
		<header class="o-index--head">
			<h1><koken:link bind_to_key="a" to="albums" title="{{ language.view_all_albums }}">{{ language.latest }} {{ language.albums }}</koken:link></h1>
		</header>
		<koken:load source="albums" order_by="modified_on" limit="{{ settings.extended_albums_load }}">
			<ul class="grid">
				<koken:loop>
					<koken:include file="inc/components/albums_loop.html" />
				</koken:loop>
			</ul>
		</koken:load>
	</section>

	<section id="content" class="o-index--content extended_splash_{{ settings.extended_splash }} clearfix">
		<header class="o-index--head">
			<h1><koken:link bind_to_key="c" to="contents" title="{{ language.view_all_content }}">{{ language.latest }} {{ language.content }}</koken:link></h1>
		</header>
		<koken:load source="contents" limit="{{ settings.extended_content_load }}">
			<ul class="grid">
				<koken:loop>
					<koken:include file="inc/components/album-grid-oxygen.html" />
				</koken:loop>
			</ul>
		</koken:load>
	</section>

	<section id="favorites" class="o-index--favorites extended_splash_{{ settings.extended_splash }} clearfix">
		<header class="o-index--head">
			<h1><koken:link bind_to_key="f" to="favorites" title="{{ language.view_all }} {{ language.favorites case='lower' }}">{{ language.latest }} {{ language.favorites }}</koken:link></h1>
		</header>
		<koken:load source="favorites" order_by="favorited_on" order_direction="desc" limit="{{ settings.extended_favorites_load }}">
			<ul class="grid">
				<koken:loop>
					<koken:include file="inc/components/album-grid-oxygen.html" />
				</koken:loop>
			</ul>
		</koken:load>
	</section>

	<section id="featured" class="o-index--feat_content extended_splash_{{ settings.extended_splash }} clearfix">
		<header class="o-index--head">
			<h1><koken:link bind_to_key="n" to="featured" title="{{ language.view_all }} {{ language.kcs_featured_images case='lower' }}">{{ language.kcs_featured_images }}</koken:link></h1>
		</header>
		<koken:load source="featured_content" order_by="featured_on" order_direction="desc" limit="{{ settings.extended_featured_load }}">
			<ul class="grid">
				<koken:loop>
					<koken:include file="inc/components/album-grid-oxygen.html" />
				</koken:loop>
			</ul>
		</koken:load>
	</section>
</koken:if>

<koken:include file="inc/components/footer.html" />
