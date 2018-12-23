<?php if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden", true, 403); include('../inc/accessdenied.html'); exit; }; ?>
<koken:include file="inc/components/header.html" />
<koken:load>
	<koken:head>
		<meta property="og:site_name" content="{{ site.title }}" />
		<meta property="og:title" content="{{ essay.title strip_html='true' }}" />
		<meta property="og:description" content="{{ essay.excerpt strip_html='true' }}" />
		<meta property="og:type" content="website" />
		<meta name="Date-Creation-yyyy/mm/dd hh:mm:ss" content="{{ essay.published_on.datetime }}" />
		<meta name="Date-Modified-yyyy/mm/dd hh:mm:ss" content="{{ essay.modified_on.datetime }}" />
		<meta name="revisit-after" content="2 days" />
		<koken:categories>
			<meta name="Category" content="<koken:loop separator=",">{{ category.title }}</koken:loop>" />
		</koken:categories>
		<koken:previous>
			<koken:include file="inc/components/meta_prerender_essay.html" />
		</koken:previous>
		<koken:next>
			<koken:include file="inc/components/meta_prerender_essay.html" />
		</koken:next>
		<koken:featured_image>
			<meta property="og:image" content="{{ content.presets.medium_large.url }}" />
			<meta property="og:image:width" content="{{ content.presets.medium_large.width }}" />
			<meta property="og:image:height" content="{{ content.presets.medium_large.height }}" />
		</koken:featured_image>
		<meta name="medium" content="article" />
		<meta property="og:url" content="{{ essay.url }}" />
		<koken:not empty="profile.twitter">
			<koken:featured_image>
				<meta name="twitter:card" content="summary_large_image" />
				<meta name="twitter:site" content="@{{ profile.twitter }}" />
				<meta name="twitter:creator" content="@{{ profile.twitter }}" />
				<meta name="twitter:image" content="{{ content.presets.medium_large.url }}" />
			</koken:featured_image>
		</koken:not>
	</koken:head>
	<main role="main" id="essay_{{ essay.id }}">
		<div class="page-content">
			<koken:not empty="essay.id">
				<koken:include file="inc/components/cover_img_essay-page.html" />
				<article class="entry">
					<p class="essay-time"><koken:time relative="{{ settings.show_event_date_relative }}" /></p>
					<div class="reading-time">{{ language.reading_time }}: <span class="eta"></span></div>
					<koken:if data="settings.show_sharing_icons" equals="true">
						<div class="social social_top"><koken:include file="inc/components/share-links-icons.html" /></div>
					</koken:if>
					<h1 class="page-name">{{ essay.title }}</h1>
					<koken:include file="inc/components/essay-aside.html" />
					{{ essay.content }}
				</article>
				<koken:if data="settings.show_sharing_icons" equals="true">
					<div class="social page_bottom">
						<koken:include file="inc/components/share-links-icons.html" />
					</div>
				</koken:if>
				<koken:include file="inc/components/comments.html" />
				<koken:if data="settings.essay_paging" equals="true">
					<koken:include file="inc/components/essay_next-prev.html" />
				</koken:if>
			<koken:else>
				<h1 class="entry page-name page-content direct-access">No essay to show, return to the <koken:link to="essays">essays overview</koken:link></h1>
			</koken:not>
		</div>
<koken:else>
	<koken:note>
		No published essay found
	</koken:note>
</koken:load>
<koken:include file="inc/components/footer.html" />
