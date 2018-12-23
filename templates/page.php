<?php if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden", true, 403); include('../inc/accessdenied.html'); exit; }; ?>
<koken:include file="inc/components/header.html" />
<koken:load>
	<koken:head>
		<meta property="og:site_name" content="{{ site.title }}" />
		<meta property="og:title" content="{{ page.title strip_html='true' }}" />
		<meta property="og:description" content="{{ page.excerpt strip_html='true' }}" />
		<meta property="og:url" content="{{ page.url }}" />
		<meta property="og:type" content="website" />
		<meta name="Date-Creation-yyyy/mm/dd hh:mm:ss" content="{{ page.published_on.datetime }}" />
		<meta name="Date-Modified-yyyy/mm/dd hh:mm:ss" content="{{ page.modified_on.datetime }}" />
		<meta name="revisit-after" content="2 days" />
		<koken:featured_image>
			<meta property="og:image" content="{{ content.presets.medium_large.url }}" />
			<meta property="og:image:width" content="{{ content.presets.medium_large.width }}" />
			<meta property="og:image:height" content="{{ content.presets.medium_large.height }}" />
		</koken:featured_image>
		<meta name="medium" content="article" />
		<koken:not empty="profile.twitter">
			<koken:featured_image>
				<meta name="twitter:card" content="summary_large_image" />
				<meta name="twitter:site" content="@{{ profile.twitter }}" />
				<meta name="twitter:creator" content="@{{ profile.twitter }}" />
				<meta name="twitter:image" content="{{ content.presets.medium_large.url }}" />
			</koken:featured_image>
		</koken:not>
	</koken:head>
<main role="main" id="page_{{ page.id}}">
	<div class="page-content">
		<koken:not empty="page.id">
			<koken:include file="inc/components/cover_img_essay-page.html" />
			<article class="entry">
				<h1 id="page-name">
					{{ page.title }}
					<span class="page-modified" title="{{ language.kcs_last_modified collate='page.modified_on' }}">{{ page.modified_on }}</span>
				</h1>
				{{ page.content }}
			</article>
			<koken:include file="inc/components/comments.html" />
			<koken:if data="settings.show_sharing_icons" equals="true">
				<div class="social page_bottom">
					<koken:include file="inc/components/share-links-icons.html" />
				</div>
			</koken:if>
		<koken:else>
			<h1 class="entry page-name page-content direct-access">No page to show, return to the <koken:link to="home">home page</koken:link></h1>
		</koken:not>
	<koken:else>
		<koken:note>No page found</koken:note>
	</koken:load>
	</div>
<koken:include file="inc/components/footer.html" />
