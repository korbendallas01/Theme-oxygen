<?php if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden", true, 403); include('../inc/accessdenied.html'); exit; }; ?>
<koken:include file="inc/components/header.html" />
<koken:load>
	<koken:head>
		<meta property="og:site_name" content="{{ site.title }}" />
		<meta property="og:title" content="{{ language.tags }}" />
		<meta property="og:description" content="{{ site.description strip_html='true' }}" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="{{ location.site_url }}{{ location.here }}" />
		<title>{{ language.tags }} - {{ site.title }}</title>
	</koken:head>
</koken:load>
<main role="main">
<koken:load limit="{{ settings.item_load_limits }}" infinite="true">
	<koken:if data="settings.cover_styles" equals="image_cover">
		<koken:load source="contents" filter:tags="{{ tag.title }}" limit="1">
			<koken:first>
				<koken:include file="inc/components/content_cover.html" />
			</koken:first>
		</koken:load>
	</koken:if>
	<koken:if data="settings.cover_styles" equals="text_cover">
		<article class="top-section">
			<h1 class="page-name">{{ language.tags }}</h1>
			<koken:if data="settings.show_breadcrumps" equals="true">
				<div class="OG_breadcrumps">
					<p><koken:breadcrumbs separator="/" show_if_single="false" /></p>
				</div>
			</koken:if>
		</article>
	</koken:if>
<section id="content">
	<ul class="grid">
		<koken:loop>
			<li id="content-{{ id }}">
				<koken:link to="tag" title="{{ language.viewing_everything_in_title collate='tag.title' }}">
					<koken:load source="contents" filter:tags="{{ tag.title }}" limit="1">
						<koken:shift>
							<koken:img size="{{ settings.grid_asp_ratio }}" class="preview no-cart" lazy="true" alt="{{ content.title | content.filename }}" onclick="void(0)" />
						</koken:shift>
					</koken:load>
				</koken:link>
				<h3 class="name_overlay tag-cat--parent">
					<span class="tag-cat--title">{{ tag.title }}</span>
					<span class="tag-cat--nr">&nbsp;x {{ tag.counts.total }}</span>
				</h3>
			</li>
		</koken:loop>
	</ul>
</section>
<koken:else>
	No tags found.
</koken:load>
<koken:include file="inc/components/footer.html" />
