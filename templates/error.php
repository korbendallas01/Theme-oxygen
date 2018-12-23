<?php if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden", true, 403); include('../inc/accessdenied.html'); exit; }; ?>
<koken:include file="inc/components/header.html" />
<koken:if data="routed_variables.code" equals="404 || """><koken:head><koken:asset file="animate.css" common="true" /></koken:head></koken:if>
<main role="main" id="error_page-<koken:if empty="routed_variables.code">404<koken:else>{{ routed_variables.code }}</koken:if>">
	<div class="page-content">
		<article class="entry">
			<h1 class="page-name" style="border:1px solid #990000; color: #990000; display:none;">{{ site.title }} {{ language.error }}: {{ routed_variables.code }}</h1>
			<koken:if data="settings.show_breadcrumps" equals="true">
				<div class="OG_breadcrumps"><p><koken:breadcrumbs separator="/" show_if_single="false" /></p></div>
			</koken:if>
			<div class="k-content">
				<div style="/*border:1px solid #990000;*/ max-width: 750px; padding:0;margin:0 auto;">
					<koken:if data="location.hostname" equals="varoystrand.se">
						<koken:asset file="inc/brokenboot.bu/brokenboot.css" />
						<koken:asset file="inc/brokenboot.bu/TweenMax.min.js" />
						<koken:asset file="inc/brokenboot.bu/snap.svg-min.js" />
						<koken:asset file="inc/brokenboot.bu/brokenboot.js" />
						<koken:include file="inc/brokenboot.bu/brokenbotSVG.svg" />
					<koken:else>
						<div id="error-image">
							<div id="error" class="error_message <koken:if data="routed_variables.code" equals="404 || """>animated hinge</koken:if>">
								{{ language.error }}: <koken:if empty="routed_variables.code">404<koken:else>{{ routed_variables.code }}</koken:if>
							</div>
							<koken:asset file="inc/components/img/error.jpg" style="width:100%;max-width:750px" alt="{{ language.error }}: {{ routed_variables.code }}"; />
							<div class="error-credit" id="error">
								<span id="error">{{ language.kcs_photographer_ }} <a href="https://www.flickr.com/photos/bala_/" target="_blank">Bala Sivakumar</a></span>
								<span id="error">{{ language.kcs_license_ }} <a href="https://creativecommons.org/licenses/by/2.0/" target="_blank">CC Attributon 2.0 (CC BY 2.0)</a></span>
							</div>
						</div>
					</koken:if>
					<p style="color: #990000;">
						<koken:if empty="routed_variables.code"><koken:head><title>{{ language.kcs_error_404_ }} - {{ site.title }}</title></koken:head><strong>{{ language.kcs_error_404_ }}</strong></koken:if>
						<koken:if data="routed_variables.code" equals="403"><koken:head><title>Forbidden - {{ site.title }}</title></koken:head><strong>You are trying to access a page your not allowed to: shame on you!</strong></koken:if>
						<koken:if data="routed_variables.code" equals="404"><koken:head><title>{{ language.kcs_error_404_ }} - {{ site.title }}</title></koken:head><strong>{{ language.kcs_error_404_ }}</strong></koken:if>
						<koken:if data="routed_variables.code" equals="405"><koken:head><title>Method Not Allowed - {{ site.title }}</title></koken:head><strong>Method Not Allowed.</strong></koken:if>
						<koken:if data="routed_variables.code" equals="406"><koken:head><title>Not Acceptable - {{ site.title }}</title></koken:head><strong>Not Acceptable.</strong></koken:if>
						<koken:if data="routed_variables.code" equals="407"><koken:head><title>Proxy Authentication Required - {{ site.title }}</title></koken:head><strong>Proxy Authentication Required.</strong></koken:if>
						<koken:if data="routed_variables.code" equals="408"><koken:head><title>Request Timeout - {{ site.title }}</title></koken:head><strong>Request Timeout.</strong></koken:if>
						<koken:if data="routed_variables.code" equals="409"><koken:head><title>Conflict - {{ site.title }}</title></koken:head><strong>Conflict.</strong></koken:if>
						<koken:if data="routed_variables.code" equals="410"><koken:head><title>Gone - {{ site.title }}</title></koken:head><strong>Gone.</strong></koken:if>
						<koken:if data="routed_variables.code" equals="415"><koken:head><title>Unsuppored Media Type - {{ site.title }}</title></koken:head><strong>Unsuppored Media Type.</strong></koken:if>
						<koken:if data="routed_variables.code" equals="416"><koken:head><title>Requested Range Not Satisfiable - {{ site.title }}</title></koken:head><strong>Requested Range Not Satisfiable.</strong></koken:if>
						<koken:if data="routed_variables.code" equals="417"><koken:head><title>Expectation Failed - {{ site.title }}</title></koken:head><strong>Expectation Failed.</strong></koken:if>
						<koken:if data="routed_variables.code" equals="418"><koken:head><title>I'm a teapot - {{ site.title }}</title></koken:head><strong>I'm a teapot.</strong></koken:if>
						<koken:if data="routed_variables.code" equals="444"><koken:head><title>No Response - {{ site.title }}</title></koken:head><strong>No Response.<br />In The Age Of Social No Response Is Not An Option.</strong></koken:if>
						<koken:if data="routed_variables.code" equals="500"><koken:head><title>Internal Server Error - {{ site.title }}</title></koken:head><strong>Internal Server Error.</strong></koken:if>
						<koken:if data="routed_variables.code" equals="501"><koken:head><title>Not Implemented - {{ site.title }}</title></koken:head><strong>Not Implemented.</strong><br />The server either does not recognize the request method, or it lacks the ability to fulfil the request.</koken:if>
						<koken:if data="routed_variables.code" equals="502"><koken:head><title>Bad Gateway - {{ site.title }}</title></koken:head><strong>Bad Gateway.</strong></koken:if>
						<koken:if data="routed_variables.code" equals="503"><koken:head><title>Service Unavailable - {{ site.title }}</title></koken:head><strong>Service Unavailable</strong><br />The server is currently unavailable (because it is overloaded or down for maintenance). Generally, this is a temporary state.</koken:if>
					</p>
					<p>{{ language.kcs_please_head_back_to_the_ }} <koken:link to="front">{{ language.kcs_front_page_ }}</koken:link>.</p>
				</div>
			</div>
		</article>
	</div>
<koken:include file="inc/components/footer.html" />
