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
							<li class="home"><?=anchor('','Главная');?></li>
							<li class="production"><?=anchor('production','Продукция');?></li>
							<li class="events"><?=anchor('#','События');?></li>
							<li class="company"><?=anchor('tradition','Компания');?></li>
							<li class="where"><?=anchor('where','Где купить');?></li>
							<li class="tourism"><?=anchor('tourism','Туризм');?></li>
							<li class="contacts"><?=anchor('contacts','Контакты');?></li>
						</ul>
					</nav>
				</section>
				<section id="promo-section" class="cf">
					<aside>
						<a id="logo">Цимлянские вина</a>
						<p class="caption">
							Цимлянское
						</p>
						<div class="social cf">
							<div class="spline top"></div>
							<p>Мы в социальных сетях:</p>
							<ul>
								<li><a href="#"><span class="vk">&nbsp;</span>Вконтакте</a></li>
								<li><a href="#"><span class="fb">&nbsp;</span>Facebook</a></li>
							</ul>
							<div class="spline bottom"></div>
						</div>
					</aside>
					<div class="promo-slide">
						<div class="promo-inside">
							<img src="<?=$baseurl;?>images/eco-promo.jpg" alt="" />
						</div>
					</div>
				</section>
			</header>
			<div id="main" role="main">
				<section class="art company-page bg cf">
					<h2>
						Увлекательный день с посещением производства и виноградников компании «Цимлянские вина»
					</h2>
					<div class="ornament-sep"> </div>
					<div class="column">
						<p class="pt1em">
							Винный туризм – это уникальная возможность проникнуться местом, атмосферой и процессом создания нашего вина. 
							Вы сможете посетить виноградники, расположенные на берегу Цимлянского водохранилища и увидеть, процесс превращения 
							винограда в древний благородный напиток, воочию увидеть все этапы производства, от поступления бутылки на конвейер, 
							до розлива и нанесения этикетки. Так же вы сможете увидеть выдержку вина в дубовых бочках и процесс бутылочной 
							шампанизации нашей премиальной линейки игристых вин.
						</p>
						<p>
							Компания «Цимлянские вина» совместно с туристической компанией Орион предлагают 
							Вам провести увлекательный день на нашем производстве
							и виноградниках, а также продегустировать нашу продукцию.
						</p>
						<p class="purple-italic">
							Для больших групп и корпоративных мероприятий возможна индивидуальная программа.
						</p>
					</div>					
					<div class="column">
						<p class="pt-75em">
							<img src="<?=$baseurl;?>images/tradicion_frames.png" alt="Фотографии виноградников Цимлянских вин" />
						</p>
					</div>
				</section>
				<div class="spline"> </div>
				<section class="tourism company-page cf">
					<div class="column">
						<h3>Экскурсии на производство и виноградники</h3>
						<p>
							Экскурсия по заводу без дегустации. <br /> 
							Группа от 5 человек &ndash; 350 руб./чел. 
						</p>
						<p>	
							Экскурсия по заводу + дегустация. На дегустации будут представлены 6 базовых вин. <br />
							Группа от 5 человек &ndash; 500 руб./чел.
						</p>
						<p>	
							Экскурсии по заводу с расширенной дегустацией. На дегустации будут представлены 6 премиальных вин. <br /> 
							Группа от 5 человек &ndash; 750 руб./чел.
						</p>
						<p>
							Экскурсия на виноградники. <br />
							Группа от 5 человек &ndash; 300 рублей.
						</p>
						<p>
							Стоимость экскурсии по виноградникам и Правобережном Цимлянском Городище, 
							через станицу Цымлянскую для проведения фотосессии - 350 руб./чел., группа от 5 человек.
						</p>
						<p class="solid">
							Контактный телефон турагентства Орион +7 (918) 520-43-88
						</p>						
					</div>
					<div class="column">
						<img class="bordered" alt="" src="<?=$baseurl;?>images/bottles.jpg">
					</div>
				</section>
			</div>
		</div>
	<?php $this->load->view($language."/users_interface/includes/footer");?>
	<?php $this->load->view($language."/users_interface/includes/scripts");?>
	
</body>
</html>