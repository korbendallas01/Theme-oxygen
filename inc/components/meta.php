	<!-- Design and development -->
	<!-- Github: https://github.com/Koken-Community-Support -->
	<!-- Website: {{ site.documentation }} -->
	<!-- Bjarne Varöystrand - varoystrand.se | github.com/BlackSkorpio -->
	<!-- Christopher Bayer - bay3r.de | github.com/Hard-One -->
	<meta name="geo.region" content="{{ settings.language }}" />
	<koken:not empty="settings.address_city_info"><meta name="geo.placename" content="{{settings.address_city_info}}" /></koken:not>
	<meta name="web_author" content="{{ site.author.name }} {{ site.author.link }}"  />
	<meta name="Copyright" content="{{ year }} {{ site.copyright }}" />
	<meta name="format-detection" content="telephone=no" />
