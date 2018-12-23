<?php if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden", true, 403); include('../inc/accessdenied.html'); exit; }; ?>
<koken:include file="inc/components/header.html" />
<koken:load limit="{{ settings.item_load_limits }}" infinite="true">
<koken:head>
	<meta property="og:site_name" content="{{ site.title }}" />
	<meta property="og:description" content="{{ site.description strip_html='true' }}" />
	<meta property="og:title" content='<koken:if data="location.template" equals="archive-essays">{{ language.essays_from_title collate="archive.title" }}<koken:else>{{ language.essays }}</koken:if>' />
	<meta property="og:type" content="blog" />
	<meta property="og:url" content="{{ location.site_url }}{{ location.here }}" />
	<title>
		<koken:if data="location.template" equals="archive-essays">
			{{ language.essays_from_title collate="archive.title" }}
		<koken:else>
			{{ language.essays }}
		</koken:if>
		 - {{ site.title }}
 	</title>
</koken:head>
<main role="main">
	<div class="page-content">
		<koken:loop>
			<article class="entry" id="content-{{ id }}" data-file="{{ essay.url }}" data-target="article">
				<p class="essay-time"><koken:time relative="{{ settings.show_event_date_relative }}" /></p>
				<koken:link title="{{ language.view_title collate='essay.title' }}">
					<h2 class="{{ essay.featured if_true="featured" }}">{{ essay.title }}</h2>
				</koken:link>
				<koken:link title="&nbsp;&nbsp;&nbsp;{{ language.view_title collate='essay.title' }}&#013;{{ essay.excerpt strip_html='true' }}">
					<koken:include file="inc/components/cover_img_essay-page.html" />
					<section>
						{{ essay.excerpt paragraphs="true" }}
					</section>
				</koken:link>
				<koken:include file="inc/components/tags-cats-loop.html" />
			</article>
		</koken:loop>
	<koken:else>
		<koken:note>
			No published essays found
		</koken:note>
	</div>
</koken:load>
<koken:include file="inc/components/footer.html" />
