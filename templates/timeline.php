<?php if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden", true, 403); include('../inc/accessdenied.html'); exit; }; ?>
<koken:include file="inc/components/header.html" />
<koken:load>
<koken:head>
	<meta property="og:site_name" content="{{ site.title }}" />
	<meta property="og:description" content="{{ site.description strip_html='true' }}" />
	<meta property="og:title" content="{{ language.timeline}} {{ event.title }} - {{ site.title }}" />
	<meta property="og:type" content="blog" />
	<meta property="og:url" content="{{ location.site_url }}{{ location.here }}" />
	<title>{{ language.timeline}} {{ event.title }} - {{ site.title }}</title>
</koken:head>
</koken:load>
<main role="main">
	<div class="page-content">
		<koken:load limit="{{ settings.item_load_limits }}" infinite="true">
		<article class="top-section">
			<h1 class="page-name">{{ language.timeline }} {{ event.title }}</h1>
			<koken:if data="settings.show_breadcrumps" equals="true">
				<div class="OG_breadcrumps">
					<p><koken:breadcrumbs separator="/" show_if_single="false" /></p>
				</div>
			</koken:if>
			<div class="month_select">
				<div class="styled-select sel_year sel_color rounded">
					<koken:dates filter:scope="year">
						<koken:select label="{{ language.kcs_select_year }}" />
					</koken:dates>
				</div>
				<span class="wrap first">{{ language.view }} by month </span>
				<div class="styled-select sel_color rounded">
					<koken:dates filter:scope="month">
						<koken:select label="{{ language.select_month }}" />
					</koken:dates>
				</div>
			</div>
		</article>
	<ol class="list">
		<koken:include file="inc/components/timeline_events.html" />
	</ol>
	<div class="month_select month_select-pagebottom">
		<div class="styled-select sel_year sel_color rounded">
			<koken:dates filter:scope="year">
				<koken:select label="{{ language.kcs_select_year }}" />
			</koken:dates>
		</div>
		<span class="wrap first">{{ language.view }} by month </span>
		<div class="styled-select sel_color rounded">
			<koken:dates filter:scope="month">
				<koken:select label="{{ language.select_month }}" />
			</koken:dates>
		</div>
	</div>
</div>
<koken:else>
	<koken:note>
		No timeline data found.
	</koken:note>
</koken:load>
<koken:include file="inc/components/footer.html" />
