<footer>
	<div class="container" class="cf">
		<section class="cf">
			<!--<div class="social-widget">
				<script type="text/javascript" src="http://userapi.com/js/api/openapi.js?49"></script>
				<div id="vk_groups"></div>
				<script type="text/javascript">
					VK.Widgets.Group("vk_groups", {mode : 0,width : "218",height : "215"}, 20003922);
				</script>
			</div>
			<div class="social-widget">
				<div id="fb-root"></div>
				<script>
					( function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if(d.getElementById(id)) return;
						js = d.createElement(s);
						js.id = id;
						js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=118650518205495";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>
				<div class="fb-like-box" data-href="http://www.facebook.com/platform" data-width="218" data-height="215" data-show-faces="true" data-stream="false" data-header="false"></div>
			</div>-->
			<nav>
				<ul>
					<li><?=anchor('','Главная страница');?></li>
					<li><?=anchor('company','О компании');?></li>
					<li><?=anchor('','Партнерам');?></li>
					<li><?=anchor('events','Выставки и события');?></li>
					<li><?=anchor('production','Продукция');?></li>
					<li><?=anchor('contacts','Контактные данные');?></li>
				</ul>
			</nav>
			<div class="copyright">
				<div class="stats">
					<?=anchor('','<img src="'.$baseurl.'images/logger.png" alt="" />');?>
					<?=anchor('','<img src="'.$baseurl.'images/rambler.png" alt="" />');?>
				</div>
				<p>© 1995–2012<br/>ОАО «ЦИМЛЯНСКИЕ ВИНА»</p>
				<p>При копировании материалов<br/>сайта ссылка на источник<br/>обязательна!</p>
			</div>
		</section>
	</div>
</footer>