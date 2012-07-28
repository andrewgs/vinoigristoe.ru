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
				<li class="production"><?=anchor('production','Production');?></li>
				<li class="events"><?=anchor('events','Events');?></li>
				<li class="company"><?=anchor('company','Company');?></li>
				<li class="where"><?=anchor('where','Where');?></li>
				<li class="tourism"><?=anchor('tourism','Tourism');?></li>
				<li class="contacts"><?=anchor('contacts','Contacts');?></li>
			</ul>
		</nav>
	</section>
	<section id="promo-section" class="cf">
		<aside>
			<a id="logo">Цимлянские вина</a>
			<p class="caption">Цимлянское</p>
			<div class="social cf">
				<div class="spline top"></div>
				<p>Мы в социальных сетях:</p>
				<ul>
					<li><?=anchor('','<span class="vk">&nbsp;</span>Вконтакте');?></li>
					<li><?=anchor('','<span class="fb">&nbsp;</span>Facebook');?></li>
				</ul>
				<div class="spline bottom"></div>
			</div>
		</aside>
		<div class="promo-slide">
			<div class="promo-inside">
				<img src="<?$baseurl;?>images/index_promo.png" alt="" />
			</div>
		</div>
	</section>
</header>