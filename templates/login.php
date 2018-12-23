<?php if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) { header($_SERVER["SERVER_PROTOCOL"]." 403 Forbidden", true, 403); include('../inc/accessdenied.html'); exit; }; ?>
<koken:include file="inc/components/header.html" />
<main role="main">
<koken:include file="inc/components/img/icons/login-sprite.svg" />
<script>'use strict';$(function(){if($.browser.msie||!!navigator.userAgent.match(/Trident.*rv\:11\./)){}else{var a=$(".klogin_input");var e=$(".pw-submit");var c=$(".klogin_input");var d='<a href="#" class="js-password-toggle pw_toggle"><svg class="icon-misc" id="icon-misc-eye"><use xlink:href="#icon-misc-eye" /></svg></a>';c.after(d);var b=$(".js-password-toggle");b.on("click",function(f){f&&f.preventDefault();if(c.attr("type")=="password"){c.attr("type","text");$("use").attr({"xlink:href":"#icon-misc-eye2"})}else{$("use").attr({"xlink:href":"#icon-misc-eye"});c.attr("type","password")}});e.on("click",function(f){f&&f.preventDefault();c.attr("type","password")})}});</script>
	<div class="page-content">
		<article class="entry">
			<div class="k-content">
				<div class="login-container">
					<section id="login-content">
						<koken:form class="js-form">
							<h1>{{ language.password_required }}</h1>
							<div>
								<input type="password" name="password" autofocus placeholder="{{ language.enter_password}}" class="klogin_input" id="login-password" />
							</div>
							<div>
								<button type="submit" disabled> {{ language.go }} </button>
							</div>
						</koken:form>
					</section>
				</div>
				<koken:not empty="messages.koken_password_error">
					<p class="password-error">{{ messages.koken_password_error }}</p>
				</koken:not>
			</div>
		</article>
	</div>
<koken:include file="inc/components/footer.html" />
