<?php if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden", true, 403); include('../inc/accessdenied.html'); exit; }; ?>
<koken:include file="inc/components/header.html" />
<koken:load limit="4">
	<koken:head>
		<meta property="og:site_name" content="{{ site.title }}" />
		<meta property="og:title" content="{{ language.sets }}" />
		<meta property="og:description" content="{{ site.description strip_html='true' }}" />
		<meta property="og:type" content="website" />
		<koken:first>
			<koken:covers>
				<koken:first>
					<meta property="og:image" content="{{ content.presets.medium_large.url }}" />
					<meta property="og:image:width" content="{{ content.presets.medium_large.width }}" />
					<meta property="og:image:height" content="{{ content.presets.medium_large.height }}" />
				</koken:first>
			</koken:covers>
		</koken:first>
		<meta property="og:url" content="{{ location.site_url }}{{ location.here }}" />
		<koken:not empty="profile.twitter">
			<meta name="twitter:card" content="gallery" />
			<meta name="twitter:site" content="@{{ profile.twitter }}" />
			<meta name="twitter:creator" content="@{{ profile.twitter }}" />
			<koken:loop>
				<koken:covers>
					<koken:shift>
						<meta name="twitter:image{{ index }}" content="{{ content.presets.medium_large.cropped.url }}">
					</koken:shift>
				</koken:covers>
			</koken:loop>
		</koken:not>
		<title>{{ language.sets }} - {{ site.title }}</title>
	</koken:head>
</koken:load>
<koken:if data="settings.menu_type" equals="right || left">
	<main role="main" id="oxygen-wrapper">
<koken:else>
	<main role="main">
</koken:if>
	<koken:load limit="{{ settings.item_load_limits }}" infinite="true">
		<ul class="grid" id="{{ settings.albums_grid_type }}">
			<koken:loop>
				<koken:include file="inc/components/albums_loop.html" />
			</koken:loop>
		</ul>
	<koken:else>
		<koken:note>No public albums found</koken:note>
	</koken:load>
<koken:include file="inc/components/footer.html" />
