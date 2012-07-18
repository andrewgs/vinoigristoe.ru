<!DOCTYPE html>
<!-- /ht Paul Irish - http://front.ie/j5OMXi -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en"><!--<![endif]-->
	<?php $this->load->view($language."/users_interface/includes/head");?>
	
<body>
	<div class="container" class="cf">
		<?php $this->load->view($language."/users_interface/includes/header-small");?>
		
			<article class="cf">
				<aside>
					<a class="aside-logo">Цимлянские вина</a>
					<div class="quote">
						<img src="<?=$baseurl;?>images/pushkin.jpg" alt="Пушкин А.С." />
						<blockquote>Шампанского всем!<br />Как какого?<br /> Конечно, цимлянского!</blockquote>
						<p class="author">А.С. Пушкин</p>
					</div>
					<div class="spline"></div>
					<?=anchor('#','<img src="'.$baseurl.'images/pdf.png" alt="pdf" />Скачать каталог',array('class'=>'download'));?>
					<div class="spline"></div>
					<p class="text">
						ОАО «Цимлянские вина» является<br/>одним из крупнейших предприятий<br/>на Дону. Так же это постоянно<br/>
						развивающееся предприятие,<br/>на счету которого уже не один<br/>десяток наград за высокое качество<br/> 
						производимой продукции.<br/>На заводе выпускается 51<br/>наименование продукции, в число<br/>
						которых входят, игристые,<br/>шампанские и столовые вина.
					</p>
					<div class="spline"></div>
					<div class="where-to-buy">
						<img src="<?=$baseurl;?>images/where_to_buy.png" alt="Где купить Цимлянские вина?" />
						<h2><?=anchor('where','Где купить<br/> Цимлянские вина?');?></h2>
					</div>
					<div class="spline"></div>
					<?php $this->load->view($language."/users_interface/includes/social-likes");?>
				</aside>
				<div id="main" role="main" class="cf">
					<div class="wine-flag">
						<?=anchor('#','Хотите <br />в винный <br />тур?');?>
					</div>
					<div class="inside">
						<img src="<?=$baseurl;?>images/caralog_promo.png" alt="Каталог продукции" />
						<h1>Цимлянские вина</h1>
						<div class="spline"></div>
						<ul class="categories cf">
							<li><?=anchor('products/category/'.$category[0]['translit'],'<span class="type white"></span>'.$category[0]['title']);?></li>
							<li><?=anchor('products/category/'.$category[1]['translit'],'<span class="type red"></span>'.$category[1]['title']);?></li>
							<li><?=anchor('products/category/'.$category[2]['translit'],'<span class="type shampane"></span>'.$category[2]['title'],array('class'=>'no-margin'));?></li>
							<li><?=anchor('products/category/'.$category[3]['translit'],'<span class="type dinner"></span>'.$category[3]['title']);?></li>
							<li><?=anchor('products/category/'.$category[4]['translit'],'<span class="type sort"></span>'.$category[4]['title']);?></li>
							<li><?=anchor('products/category/'.$category[5]['translit'],'<span class="type brandy"></span>'.$category[5]['title']);?></li>
						</ul>
						<div class="spline"></div>
						<div class="categories-sep cf">
							<div class="left"></div>
							<div class="center">Серия номер один</div>
							<div class="right"></div>
						</div>
						<div class="items-list">
							<div class="category-item">
								<img src="images/item-1.png" alt="Цимлянское игристое" />
								<p class="category-name">Игристое красное</p>
								<p class="item-name">«Цимлянское игристое»</p>
							</div>
							<div class="category-item">
								<img src="images/item-2.png" alt="Букет победы" />
								<p class="category-name">Игристое красное</p>
								<p class="item-name">«Букет победы»</p>
							</div>
							<div class="category-item">
								<img src="images/item-3.png" alt="Цимлянское" />
								<p class="category-name">Игристое красное</p>
								<p class="item-name">«Цимлянское»</p>
							</div>
						</div>
						<div class="categories-sep cf">
							<div class="left"></div>
							<div class="center">Серия номер два</div>
							<div class="right"></div>
						</div>
						<div class="items-list">
							<div class="category-item">
								<img src="images/item-4.png" alt="Цимлянское красное" />
								<p class="category-name">Игристое красное</p>
								<p class="item-name">«Цимлянское красное»</p>
							</div>
							<div class="category-item">
								<img src="images/item-1.png" alt="Цимлянское" />
								<p class="category-name">Игристое красное</p>
								<p class="item-name">«Цимлянское»</p>
							</div>
						</div>
						<div class="spline"></div>
						<div class="pagination">
							<a href="#"><img src="images/arrow-left.png" /></a>
							<a href="#">1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a class="current" href="#">4</a>
							<a href="#">5</a>
							<a class="three-dots" href="#">...</a>
							<a href="#">10</a>
							<a href="#">20</a>
							<a href="#">30</a>
							<a href="#"><img src="images/arrow-right.png" /></a>
						</div>
					</div>
				</div>
			</article>
		</div>
		<footer>
			<div class="container" class="cf">
				<section class="cf">
					<div class="social-widget">
						<!--
						<script type="text/javascript" src="http://userapi.com/js/api/openapi.js?49"></script>
						<div id="vk_groups"></div>
						<script type="text/javascript">
							VK.Widgets.Group("vk_groups", {
								mode : 0,
								width : "218",
								height : "215"
							}, 20003922);
						</script>
						-->
					</div>
					<div class="social-widget">
						<!--
						<div id="fb-root"></div>
						<script>
							( function(d, s, id) {
								var js, fjs = d.getElementsByTagName(s)[0];
								if(d.getElementById(id))
									return;
								js = d.createElement(s);
								js.id = id;
								js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=118650518205495";
								fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));
						</script>
						<div class="fb-like-box" data-href="http://www.facebook.com/platform" data-width="218" data-height="215" data-show-faces="true" data-stream="false" data-header="false"></div>
						-->
					</div>
					<nav>
						<ul>
							<li><a href="#">Главная страница</a></li>
							<li><a href="#">О компании</a></li>
							<li><a href="#">Партнерам</a></li>
							<li><a href="#">Выставки и события</a></li>
							<li><a href="#">Продукция</a></li>
							<li><a href="#">Контактные данные</a></li>
						</ul>
					</nav>
					<div class="copyright">
						<div class="stats">
							<a href="#"><img src="images/logger.png" alt="" /></a>
							<a href="#"><img src="images/rambler.png" alt="" /></a>
						</div>
						<p>
							© 1995–2012<br/>
							ОАО «ЦИМЛЯНСКИЕ ВИНА»	
						</p>
						<p>
							При копировании материалов<br/>
							сайта ссылка на источник<br/>
							обязательна!
						</p>
					</div>
				</section>
			</div>
		</footer>
	</body>
</html>