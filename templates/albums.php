<?php if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden", true, 403); include('../inc/accessdenied.html'); exit; }; ?>
<koken:include file="inc/components/header.html" />
<koken:load limit="4">
	<koken:head>
		<meta property="og:site_name" content="{{ site.title }}" />
		<meta property="og:title" content='<koken:if data="location.template" equals="archive-albums">{{ language.view_all_albums_in_title collate="archive.title" }}<koken:else>{{ language.albums }}</koken:if>' />
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
		<title>
			<koken:if data="location.template" equals="archive-albums">
				{{ language.view_all_albums_in_title collate="archive.title" }}
			<koken:else>
				{{ language.albums }}
			</koken:if>
		 - {{ site.title }}</title>
	</koken:head>
</koken:load>
	<main role="main">
	<koken:load limit="{{ settings.item_load_limits }}" infinite="true">
		<ul id="{{ settings.albums_grid_type }}" class="grid">
			<koken:if data="settings.albums_grid_type" equals="flat_grid">
				<koken:load source="albums" filter:flat="true">
					<koken:loop>
						<koken:not data="{{ album.album_type }}" equals="set">
							<koken:include file="inc/components/albums_loop.html" />
						</koken:not>
					</koken:loop>
				</koken:load>
			<koken:else>
				<koken:loop>
					<koken:include file="inc/components/albums_loop.html" />
				</koken:loop>
			</koken:if>
		</ul>
	<koken:else>
		<koken:note>
			<strong>No albums found.</strong> Create some in the Library.
		</koken:note>
	</koken:load>
<koken:include file="inc/components/footer.html" />
