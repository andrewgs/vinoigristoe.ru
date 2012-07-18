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
		<?php $this->load->view($language."/users_interface/includes/header-big");?>
		
		<div id="main" role="main">
			<section class="main-directions cf">
				<div class="column">
					<img src="<?$baseurl;?>images/traditions.png" alt="" />
					<h2>Традиции</h2>
					<p>Виноградники ведут еще<br/>с XVIII века, когда донские<br/>казаки  производили<br/>вино для императора.</p>
				</div>
				<div class="column-sep"></div>
				<div class="column">
					<img src="<?$baseurl;?>images/events.png" alt="" />
					<h2>Искусство</h2>
					<p>Вино это не просто<br/>продукт — это целая<br/>культура и мы это<br/>понимаем!</p>
				</div>
				<div class="column-sep"></div>
				<div class="column">
					<img src="<?$baseurl;?>images/eco.png" alt="" />
					<h2>Экологичность</h2>
					<p>Наши вина неоднократно<br/>отмечались на конкурсах<br/>вин, как в России,<br/>так и за её пределами.<br/></p>
				</div>
			</section>
			<section class="book cf">
				<div class="column first">
					<h3>Наша новинка!</h3>
					<div class="page">
						<div class="page-inside">
							<img src="<?$baseurl;?>images/left-page.jpg" alt="Информация о левой странице" />
						</div>
					</div>
					<p><?=anchor('#','Перейти в полный каталог продукции');?></p>
				</div>
				<div class="column">
					<h3>Выставка и акции</h3>
					<div class="page">
						<div class="page-inside">
							<img src="<?$baseurl;?>images/right-page.jpg" alt="Информация о правой странице" />
						</div>
					</div>
					<p><?=anchor('','Смотреть все выставки и акции');?></p>
				</div>
			</section>
			<section class="news cf">
			<?php for($i=0;$i<count($news);$i++):?>
				<div class="column">
					<div class="date"><?=$news[$i]['date'];?></div>
					<?=anchor('news/'.$news[$i]['translit'],$news[$i]['title']);?>
				</div>
			<?php endfor; ?>
			</section>
			<section class="tourism-promo cf">
				<h2>Винный<br/>туризм</h2>
				<p>
					Винный туризм – это уникальная смесь<br/>
					из возможности путешествовать<br/>
					и насладиться божественным напитком.<br/>
					Основная цель винного путешествия —<br/>
					это попасть, в святую святых виноделов —<br/>
					винодельню, и испробовать самые лучшие<br/>
					вина прямо на месте.
				</p>
				<?=anchor('','Подробнее о винных турах');?>
			</section>
		</div>
	</div>
	<?php $this->load->view($language."/users_interface/includes/footer");?>
	<?php $this->load->view($language."/users_interface/includes/scripts");?>
	
</body>
</html>