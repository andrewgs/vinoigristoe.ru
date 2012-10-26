<!DOCTYPE html>
<!-- /ht Paul Irish - http://front.ie/j5OMXi -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en"><!--<![endif]-->
	<?php $this->load->view($language."/users_interface/includes/head");?>
	
<body>
	<?php if(!$this->session->userdata('validation_age')):?>
	<?php $this->load->view($language."/users_interface/includes/validation-age");?>
	<?php endif;?>
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
							<li class="events"><?=anchor('events','События');?></li>
							<li class="company"><?=anchor('company','Компания');?></li>
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
				<section class="company-page cf">
					<h2>
						Цимлянское вино считается наиболее <br/> 
						экологичным в России.
					</h2>
					<div class="ornament-sep"> </div>
					<div class="column">
						<p class="pt1em solid">
							Экологичность вина определяется 
							в первую очередь показателями 
							терруара, он же определяет качество,
							«букет» вина, все оттенки его вкуса.
						</p>
						<p>
							Терруар — совокупность почвенных 
							и климатических особенностей места,
							где произрастает виноград. Терруар 
							Долины Дона уникален. 
						</p>
					</div>
					<div class="column">
						<p class="pt-75em">
							<img src="<?=$baseurl;?>images/relief.jpg" alt="Рельеф и растительный мир Дона" />
						</p>
					</div>
				</section>
				<div class="spline"> </div>
				<section class="vino-zone company-page cf">
					<div class="relative-picture">
						<img src="<?=$baseurl;?>images/vino-zone.png" alt="Лучшая зона виноградства в этом районе" />
					</div>
					<h3>
						Лучшая зона виноградарства в этом районе — <br/> 
						на правом берегу реки, где и располагаются <br/>
						Цимлянские виноградники. 
					</h3>
					<p>
						Черноземы и темно-каштановые почвы с давних <br/> 
						времен благоприятствовали приживаемости здесь <br/>
						местных и привезенных лоз. Раньше виноград <br/>
						рос в основном на прибрежных склонах. <br/>
						Но со временем посадки на плоских площадях <br/>
						увеличились, и появилась возможность <br/>
						использовать технику для обработки почв <br/>
						иукрытия лозы.
					</p>
					<div class="spline"> </div>
					<h3>
						Виноградники, дающие <br/>
						виноград для Цимлянского вина, <br/> 
						находятся в самой северной <br/>
						зоне промышленного <br/>
						виноградарства России.
					</h3>
					<p>
						Показатели местной почвы сравнимы с лучшими винодельческими зонами. Более того, у Цимлянских 
						лоз есть и преимущества относительно большинства из них.
					</p>
					<p>
						Цимлянский суровый климат позволяет не обрабатывать виноград химическими составами — вредные 
						насекомые и так не переживают местных морозов. При этом современная инженерия предоставляет
						возможность укрывать виноградники от холодной зимы, что на вкусе ягод никак не сказывается.
					</p>
				</section>
				<div class="spline"> </div>
				<section class="shampane-production company-page cf">
					<h2>
						Показатели почв долины Дона позволяют <br /> 
						выращивать здесь не только классические, <br />
						но и особенные сорта винограда.
					</h2>
					<div class="ornament-sep"> </div>
					<div class="column">
						<p>
							Эти аборигенные сорта, выведенные и культивируемые
							в Цимлянском районе, считаются уникальным 
							генофондом Российской Федерации. Наиболее 
							интересные из них: «Цимлянский черный», «Плечистик», 
							«Красностоп Золотовский». Сорт «Цимлянский черный» 
							имеет особый статус. Его необыкновенный вкус 
							рождается благодаря редкой почве, богатой зеленой 
							глиной. Лозы у этого сорта хрупкие, поэтому собирают 
							урожай «Цимлянского черного» вручную.
						</p>
						<p class="solid">
							В каждой бутылке с этикеткой 
							«Цимлянское» — экологически чистое, 
							настоящее и полезное вино.
						</p>
					</div>
					<div class="column">
						<img src="<?=$baseurl;?>images/vino-loses.jpg" alt="Виноградники завода Цимлянские вина" />
					</div>
				</section>
			</div>
		</div>
	<?php $this->load->view($language."/users_interface/includes/footer");?>
	<?php $this->load->view($language."/users_interface/includes/scripts");?>
	
</body>
</html>