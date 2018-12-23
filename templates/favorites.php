<?php if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden", true, 403); include('../inc/accessdenied.html'); exit; }; ?>
<koken:include file="inc/components/header.html" />
<koken:load limit="4">
	<koken:head>
		<meta property="og:site_name" content="{{ site.title }}" />
		<meta property="og:title" content="{{ language.favorites }}" />
		<meta property="og:description" content="{{ site.description strip_html='true' }}" />
		<meta property="og:type" content="website" />
		<koken:first>
			<meta property="og:image" content="{{ content.presets.medium_large.url }}" />
			<meta property="og:image:width" content="{{ content.presets.medium_large.width }}" />
			<meta property="og:image:height" content="{{ content.presets.medium_large.height }}" />
		</koken:first>
		<meta property="og:url" content="{{ location.site_url }}{{ location.here }}" />
		<koken:not empty="profile.twitter">
			<meta name="twitter:card" content="gallery" />
			<meta name="twitter:site" content="@{{ profile.twitter }}" />
			<meta name="twitter:creator" content="@{{ profile.twitter }}" />
			<koken:loop>
				<meta name="twitter:image{{ index }}" content="{{ content.presets.medium_large.cropped.url }}">
			</koken:loop>
		</koken:not>
		<title>{{ language.favorites }} - {{ site.title }}</title>
	</koken:head>
</koken:load>
<main role="main">
    <koken:load limit="{{ settings.item_load_limits }}" infinite="true">
<koken:if data="settings.cover_styles" equals="image_cover">
	<koken:first>
		<koken:include file="inc/components/content_cover.html" />
	</koken:first>
</koken:if>
<koken:if data="settings.cover_styles" equals="text_cover">
	<koken:include file="inc/components/content_cover_text.html" />
</koken:if>
	<section id="content">
		<ol class="grid">
			<koken:loop>
				<koken:include file="inc/components/album-grid-oxygen.html" />
			</koken:loop>
		</ol>
	</section>
<koken:else>
	<h1 class="entry page-name page-content direct-access">No favorites found, return to the <koken:link to="home">home page</koken:link></h1>
	<koken:note>
		No images or videos found
	</koken:note>
</koken:load>
<koken:include file="inc/components/footer.html" />
