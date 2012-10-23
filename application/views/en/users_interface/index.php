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
					<h2><?=anchor('tradition','Heritage');?></h2>
					<!--<p>Цимлянская зона виноделия одна из древнейших в России, уже в XVII веке Цимлянские вина были известны за пределами России.</p>-->
				</div>
				<div class="column-sep"></div>
				<div class="column">
					<img src="<?$baseurl;?>images/events.png" alt="" />
					<h2><?=anchor('proizvodstvo','Production');?></h2>
					<!--<p>Мы учитываем опыт прежних поколений и используем как традиционные, так и инновационные технологии производства.</p>-->
				</div>
				<div class="column-sep"></div>
				<div class="column">
					<img src="<?$baseurl;?>images/eco.png" alt="" />
					<h2><?=anchor('vinogradniki','Vineyards');?></h2>
					<!--<p>Наши виноградники растут в уникальных климатических условиях долины Дона.</p>-->
				</div>
			</section>
			<section class="book cf">
				<div class="column first">
					<h3>Our new wine!</h3>
					<div class="page">
						<div class="page-inside">
							<img src="<?$baseurl;?>images/left-page.jpg" alt="Информация о левой странице" />
						</div>
					</div>
					<p><?=anchor('production','Go to the product catalog');?></p>
				</div>
				<div class="column">
					<h3>Exhibitions and events</h3>
					<div class="page">
						<div class="page-inside">
							<img src="<?$baseurl;?>images/right-page.jpg" alt="Информация о правой странице" />
						</div>
					</div>
					<p><?=anchor('events','See all exhibitions and events',array('class'=>'none'));?></p>
				</div>
			</section>
			<section class="news cf">
			<?php for($i=0;$i<count($news);$i++):?>
				<div class="column">
					<div class="date"><?=$news[$i]['date'];?></div>
					<?=anchor('news/'.$news[$i]['translit'],$news[$i]['title'],array('class'=>'none'));?>
				</div>
			<?php endfor; ?>
			</section>
			<section class="tourism-promo cf">
				<h2>Wine<br/>tourism</h2>
				<!-- -->
				<p>
					Enotours or wine tourism is a unique opportunity to experience the place, 
					the atmosphere and the process of our winemaking. You can visit the Tsimlyansky 
					vineyards to learn firsthand how grapes turn into a fine ancient beverage. 
				</p>
				<!--
				<p>
					Винный туризм – это уникальная смесь<br/>
					из возможности путешествовать<br/>
					и насладиться божественным напитком.<br/>
					Основная цель винного путешествия —<br/>
					это попасть, в святую святых виноделов —<br/>
					винодельню, и испробовать самые лучшие<br/>
					вина прямо на месте.
				</p>
				-->
				<?=anchor('tourism','More about wine tours');?>
			</section>
		</div>
	</div>
	<?php $this->load->view($language."/users_interface/includes/footer");?>
	<?php $this->load->view($language."/users_interface/includes/scripts");?>
	
</body>
</html>