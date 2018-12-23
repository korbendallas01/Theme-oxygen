<?php if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden", true, 403); include('../inc/accessdenied.html'); exit; }; ?>
<koken:include file="inc/components/header.html" />
<koken:load limit="4">
<koken:head>
	<meta property="og:site_name" content="{{ site.title }}" />
	<meta property="og:title" content="{{ album.title strip_html="true" }}" />
	<meta property="og:description" content="{{ album.summary | album.description strip_html="true" }}" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="{{ album.url }}" />
	<meta name="Date-Creation-yyyy/mm/dd hh:mm:ss" content="{{ album.published_on.datetime }}">
	<meta name="Date-Modified-yyyy/mm/dd hh:mm:ss" content="{{ album.modified_on.datetime }}">
	<meta name="revisit-after" content="2 days">
	<koken:covers>
		<koken:shift>
			<meta property="og:image" content="{{ content.presets.medium_large.url }}" />
			<meta property="og:image:width" content="{{ content.presets.medium_large.width }}" />
			<meta property="og:image:height" content="{{ content.presets.medium_large.height }}" />
		</koken:shift>
	</koken:covers>
	<koken:not empty="profile.twitter">
		<meta name="twitter:card" content="gallery" />
		<meta name="twitter:site" content="@{{ profile.twitter }}" />
		<meta name="twitter:creator" content="@{{ profile.twitter }}" />
		<koken:covers minimum="4" limit="4">
			<koken:loop>
				<meta name="twitter:image{{ index }}" content="{{ content.presets.medium_large.cropped.url }}">
			</koken:loop>
		</koken:covers>
	</koken:not>
</koken:head>
</koken:load>
<koken:load limit="{{ settings.item_load_limits }}" infinite="true">
	<koken:not empty="album.id">
		<main role="main" id="album_{{ album.id }}">
			<koken:if data="settings.cover_styles" equals="image_cover">
				<koken:include file="inc/components/album_cover.html" />
			</koken:if>
			<koken:if data="settings.cover_styles" equals="text_cover">
				<koken:include file="inc/components/album_cover_text.html" />
			</koken:if>
			<section id="content">
				<ul class="grid">
					<koken:loop>
						<koken:include file="inc/components/album-grid-oxygen.html" />
					</koken:loop>
				</ul>
			</section>
		<koken:else>
			<h1 class="entry page-name page-content direct-access">No album to show, return to the <koken:link to="albums">albums overview</koken:link></h1>
		</koken:not>
	<koken:include file="inc/components/comments.html" />
<koken:else>
	<koken:note>
		This album is empty. Add content to it in the Library.
	</koken:note>
</koken:load>
<koken:include file="inc/components/footer.html" />
