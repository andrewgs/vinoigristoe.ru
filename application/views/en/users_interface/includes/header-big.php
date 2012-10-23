<header>
	<section id="navigation" class="cf">
		<aside id="translation">
			<ul>
				<li class="ru"><?=anchor('change-language/ru','Ru');?></li>
				<li class="en"><?=anchor('change-language/en','En');?></li>
			</ul>
		</aside>
		<nav role="main">
			<ul>
				<li class="home"><?=anchor('','Main');?></li>
				<li class="production"><?=anchor('production','Products');?></li>
				<li class="events"><?=anchor('#','Events',array("class"=>"none"));?></li>
				<li class="tradition"><?=anchor('tradition','Company');?></li>
				<li class="where"><?=anchor('where','Where to Buy');?></li>
				<li class="tourism"><?=anchor('tourism','Tourism');?></li>
				<li class="contacts"><?=anchor('contacts','Contacts');?></li>
			</ul>
		</nav>
	</section>
	<section id="promo-section" class="cf">
		<aside>
			<a id="logo">Tsimlyansky Wines</a>
			<p class="caption">Tsimlyanskoe</p>
			<div class="social cf">
				<div class="spline top"></div>
				<p>Follow us on:</p>
				<ul>
					<li><?=anchor('http://vk.com/vinoigristoe','<span class="vk">&nbsp;</span>Vkontakte');?></li>
					<li><?=anchor('https://www.facebook.com/vinoigristoe','<span class="fb">&nbsp;</span>Facebook');?></li>
				</ul>
				<div class="spline bottom"></div>
			</div>
		</aside>
		<div class="promo-slide">
			<div class="promo-inside">
				<img src="<?$baseurl;?>images/main-promo.jpg" alt="" />
			</div>
		</div>
	</section>
</header>