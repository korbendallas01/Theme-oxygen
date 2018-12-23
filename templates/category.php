<?php if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden", true, 403); include('../inc/accessdenied.html'); exit; }; ?>
<koken:include file="inc/components/header.html" />
<koken:load infinite="true" limit="6">
	<koken:head>
		<meta property="og:site_name" content="{{ site.title }}" />
		<meta property="og:title" content="{{ language.viewing_everything_in_title collate='category.title' }} - {{ site.title }}" />
		<meta property="og:description" content="{{ site.description strip_html='true' }}" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="{{ location.site_url }}{{ location.here }}" />
		<title>{{ language.categories }} {{ category.title }} - {{ site.title }}</title>
	</koken:head>
</koken:load>
<main role="main">
<div class="page-content">
<koken:load limit="{{ settings.item_load_limits }}" infinite="true">
	<article class="top-section">
		<h1 class="page-name">{{ language.viewing_everything_in_title collate='category.title' }}</h1>
		<koken:if data="settings.show_breadcrumps" equals="true">
			<div class="OG_breadcrumps">
				<p><koken:breadcrumbs separator="/" show_if_single="false" /></p>
			</div>
		</koken:if>
	</article>
	<ol class="list">
		<koken:include file="inc/components/timeline_events.html" />
	</ol>
<koken:else>
	<article class="top-section">
		<h1 class="page-name">{{ language.no_items_were_found }}</h1>
	</article>
</koken:load>
</div>
<koken:include file="inc/components/footer.html" />
