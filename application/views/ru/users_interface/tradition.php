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
	<div class="container cf">
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
						<li class="company active"><?=anchor('tradition','Компания');?></li>
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
						<img src="<?=$baseurl;?>images/tradicion_promo.jpg" alt="" />
					</div>
				</div>
			</section>
		</header>
		<div id="main" role="main">
			<section class="art company-page cf">
				<h2>
					Наше производство и виноградники <br />находятся в одной из древнейших зон виноделия России
				</h2>
				<div class="ornament-sep"> </div>
				<div class="column">
					<p class="pt1em">
						История Цимлянского виноделия началась ещё во времена хазарского каганата, ориентировочно IX век от Р.Х. 
						Жители хазарской крепости Саркел, находящейся теперь на дне Цимлянского водохранилища, выращивали 
						виноград и производили вино, что было подтверждено раскопками крепости до затопления.
					</p>
					<p>
						После захвата крепости князем Святославом и последующего разрушения её половцами, виноделие на Дону 
						сводится к минимуму, но виноградники переживают это смутное время и виноделие продолжается уже казаками.
					</p>
				</div>
				<div class="column">
					<p class="pt-75em">
						<img src="<?=$baseurl;?>images/tradicion_frames.png" alt="Фотографии виноградников Цимлянских вин" />
					</p>
				</div>
				<div class="cf">
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
				</div>
				<div class="column">
					<img src="<?=$baseurl;?>images/petr-frame.png" alt="Петр I" />
				</div>					
				<div class="column">
					<h3>
						Первым известным поклонником Цимлянского был царь Петр I
					</h3>
					<p>
						Первое документальное упоминание о Цимлянских винах относится ко временам императора Петра I, 
						который после посещения в Париже дома инвалидов послал в подарок ветеранам Людовика XIV 20 
						бочек Цимлянского красного вина. 
					</p>
					<p>
						Царь настолько вдохновился Цимлянским виноделием, что всячески поощрял его развитие и 
						собственноручно посадил 5 кустов винограда во дворе казака Персиянова.
					</p>
				</div>
			</section>
			<div class="spline"> </div>
			<section class="shampane-production company-page cf">
				<h2>Казачье игристое</h2>
				<div class="ornament-sep"> </div>
				<div class="column">
					<p>
						В XVIII веке казаками была придумана собственная технология производства игристых вин. 
						Первая документально зарегистрированная бутылка Цимлянского игристого относится к 1786 году. 
						Производилось оно, как и сейчас, из аборигенных сортов винограда Цимлянский чёрный и Плечистик.
						Ягоды после сбора подвяливались на камышовых циновках в проветриваемом помещении. После подвяливания
						ягоды дробились, перетирались и сливались вместе с соком в усечённые сверху чаны (подрезы).
					</p>
					<p>
						При брожении мезга не перемешивалась, кожица поднималась на поверхность, а семена уходили на дно. Брожение начаналось 
						осенью, шло медленно из-за высокой сахаристости и по наступлению холодов останавливалось раньше срока. 
						Весной вино разливалось в бутылки и закупоривалось пробкой, привязанной к горлу бечёвкой, и после этого 
						заливалось смолой. После чего брожение возобновлялось уже в бутылке и, за счёт накопления при этом углекислоты, 
						вино становилось игристым.
					</p>
				</div>
				<div class="column">
					<p>
						<br />
						<img src="<?=$baseurl;?>images/kazachie_photos.png" alt="" />
					</p>
				</div>
				<div class="cf"> </div>
			</section>
			<div class="spline"> </div>
			<section class="fans-page company-page cf">
				<div>
					<img class="fans" src="<?=$baseurl;?>images/platov-frame.png" alt="" />
					<div class="fans">
						<p class="title">
							Следующим поклонником и благодетелем Цимлянского <br/> был казачий атаман Платов
						</p>
						<p>
							Большую роль в развитии донского виноградарства и виноделия сыграл казачий атаман Платов. 
							Цимлянское было его самым любимым вином, и Платов везде возил с собой несколько бочонков 
							такого вина. После разгрома наполеоновской армии Платов дал приказ своим войскам собрать 
							и вести на Дон семена и чубуки всех известных французских сортов винограда. Часть этих 
							сортов попала и в Цимлу. Платов энергично поддерживал виноделие, выписав виноделов с Рейна, 
							которые за счет Войска должны были по контракту выделывать вина на манер рейнских.
						</p>
					</div>
				</div>
				<div>
					<div class="fans">
						<p class="title">
							Цимлянское &ndash; вино победы
						</p>
						<p>
							Именно этим вином была отмечена великая победа русского оружия в Париже в 1813 году. 
							Так на площади Свободы в Париже было распито три тысячи бутылок Цимлянского.
						</p>
					</div>
					<img class="fans" src="<?=$baseurl;?>images/kutuzov-frame.png" alt="" />
				</div>
			</section>
			<div class="spline"> </div>
			<section class="shampane-production company-page cf">
				<h2>Промышленное производство Цимлянского игристого началось с завода, построенного <br/>великим князем Константином Николаевичем</h2>
				<div class="ornament-sep"> </div>
				<div class="column">
					<p>
						До революции вино делали преимущественно казаки - частники. В Цимлянской станице 
						насчитывалось 1200 виноградников. В 1880 году великим князем Константином Николаевичем 
						было решено построить спиртово-водочный цех в станице Цимлянской.
					</p>
				</div>
				<div class="column">
					<p>
						Именно на его базе после революции был основан Цимлянский винсовхоз. Во время войны завод 
						был разрушен. Но производство продолжалось под открытым небом до тех пор, 
						пока не был построен современный завод Цимлянских вин. 
					</p>
				</div>
				<div class="cf">
					<img src="<?=$baseurl;?>images/bottles-row.jpg" alt="" />
				</div>
				<div class="column">
					<p>
						Первая бутылка была выпущена на новом 
						заводе в 1966 году. А игристое вино, произведённое старым казачьим способом, было отмечено 
						золотом в Румынии уже в 1968 году. В настоящие дни производственный оборот тихих и игристых 
						вин составляет 11 миллионов бутылок в год.
					</p>
				</div>
				<div class="column">
					<p>
						Производятся закупки нового оборудования. Постоянно 
						расширяется ассортимент продукции. Используются как классический бутылочный, так и резервуарный 
						методы производства игристых вин.
					</p>
				</div>
				<div class="cf">
					<img src="<?=$baseurl;?>images/bottles-row-2.jpg" alt="" />
				</div>					
			</section>
			<div class="spline"> </div>
			<section class="company-page art-sample cf">
				<h2>Продолжение следует ...</h2>
				<div class="ornament-sep"> </div>
			</section>
		</div>
	</div>
	<?php $this->load->view($language."/users_interface/includes/footer");?>
	<?php $this->load->view($language."/users_interface/includes/scripts");?>
	
</body>
</html>