<?php if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden", true, 403); include('../inc/accessdenied.html'); exit; }; ?>
<koken:include file="inc/components/header.html" />
<koken:load>
	<koken:head>
		<meta property="og:site_name" content="{{ site.title }}" />
		<meta property="og:title" content="{{ content.title | content.filename.clean strip_html="true" }}" />
		<meta property="og:description" content="<koken:not empty="content.caption">{{ content.caption strip_html="true" }}<koken:else>{{ content.title|content.filename strip_html="true" }}</koken:if>" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="{{ content.presets.medium_large.url }}" />
		<meta property="og:image:width" content="{{ content.presets.medium_large.width }}" />
		<meta property="og:image:height" content="{{ content.presets.medium_large.height }}" />
		<meta property="og:url" content="{{ content.url }}" />
		<koken:content_image>
			<koken:not empty="profile.twitter">
				<meta name="twitter:card" content="photo" />
				<meta name="twitter:site" content="@{{ profile.twitter }}" />
				<meta name="twitter:creator" content="@{{ profile.twitter }}" />
				<meta name="twitter:image" content="{{ content.presets.medium_large.cropped.url }}" />
			</koken:not>
		</koken:content_image>
		<koken:previous>
			<koken:include file="inc/components/meta_prerender_content.html" />
		</koken:previous>
		<koken:next>
			<koken:include file="inc/components/meta_prerender_content.html" />
		</koken:next>
		<title>{{ content.title | content.filename.clean case="title" }} - {{ site.title }}</title>
	</koken:head>
</koken:load>
<main role="main" id="content-{{ id }}">
<koken:load>
	<koken:content_image>
		<koken:variable name="item_info" value="{{ language.kcs_image_info_ }}" />
	</koken:content_image>

	<koken:content_video>
		<koken:variable name="item_info" value="{{ language.kcs_video_info_ }}" />
	</koken:content_video>

<div class="page-content">
	<article class="entry">
		<h1 class="page-name">{{ content.title | content.filename.clean case="title" }}</h1>
	</article>
	<div class="k-content">
		<koken:include file="inc/components/next-prev.html" />
		<koken:if data="settings.use_lightbox" equals="true">
			<koken:content_image>
				<koken:link lightbox="{{ settings.use_lightbox }}" data-bind-to-key="l" title="{{ language.view }} {{ content.title | content.filename.clean }} {{ language.kcs_in_fullscreen }}">
					<koken:img respond_to="width" lazy="true" alt="{{ content.title | content.filename.clean }}" />
					<koken:if data="settings.enable_ps_caption" equals="true">
						<koken:include file="inc/components/photoswipe_caption.html" />
					</koken:if>
				</koken:link>
			</koken:content_image>
		<koken:else>
			<koken:content_image>
				<koken:img respond_to="width" lazy="true" alt="{{ content.title | content.filename.clean }}" />
			</koken:content_image>
		</koken:if>
		<koken:content_video>
			<koken:video respond_to="width" />
		</koken:content_video>
		<!--<koken:include file="inc/components/next-prev.html" />-->
	</div>
		<koken:if data="settings.show_exif" equals="true">
			<div class="picinfo_content clearfix">
				<koken:include file="inc/components/picinfo.html" />
			</div>
		</koken:if>
		<koken:include file="inc/components/comments.html" />
		<koken:if data="settings.show_sharing_icons" equals="true">
			<div class="social page_bottom">
				<koken:include file="inc/components/share-links-icons.html" />
			</div>
		</koken:if>

<koken:else>
	<koken:note>
		No image or video found
	</koken:note>
</koken:load>
</div>
<koken:include file="inc/components/footer.html" />
