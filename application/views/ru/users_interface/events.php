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
		<?php $this->load->view($language."/users_interface/includes/header-small");?>
		
		<article class="cf">
			<aside>
				<a class="aside-logo purple">Цимлянские вина</a>
				<!--				
				<div class="spline"></div>
				<p class="text">
					ОАО «Цимлянские вина» является<br/>одним из крупнейших предприятий<br/>на Дону. Так же это постоянно<br/>развивающееся предприятие,<br/>
					на счету которого уже не один<br/>десяток наград за высокое качество<br/>производимой продукции.<br/>На заводе выпускается 51<br/>
					наименование продукции, в число<br/>которых входят, игристые,<br/>шампанские и столовые вина.</p>
				<div class="spline"></div>
				-->
				<div class="where-to-buy">
					<img src="<?=$baseurl;?>images/tourism.png" alt="Туры на виноградники Цилянских вин!" />
					<h2><?=anchor('#','Туры на виноградники<br/> Цилянских вин!');?></h2>
				</div>
				<div class="spline"></div>
				<div class="quote">
					<img src="<?=$baseurl;?>quote/viewimage/<?=$quote['id'];?>" alt="<?=$quote['name'];?>"/>
					<blockquote><?=$quote['text'];?></blockquote>
					<p class="author"><?=$quote['name'];?></p>
				</div>
				<div class="spline"></div>
				<?php $this->load->view($language."/users_interface/includes/social-likes");?>
				<div class="spline"></div>
			</aside>
			<div id="main" role="main" class="cf">
				<div class="wine-flag news-updates">
					Самое<br />свежее:<br />
					<?=anchor('http://vk.com/vinoigristoe','<img src="'.$baseurl.'images/vk-icon.png" alt="Вконтакте" />');?>
					<?=anchor('https://www.facebook.com/vinoigristoe','<img src="'.$baseurl.'images/fb-icon.png" alt="Facebook" />');?>
				</div>
				<div class="inside">
					<img src="<?=$baseurl;?>images/news_promo.png" alt="Каталог продукции" />
					<h1>Наши новости</h1>
				<?php for($i=0;$i<count($events);$i++):?>
					<div class="spline"></div>
					<div class="news-paper">
						<h2><?=$events[$i]['title'];?></h2>
						<div class="date">Опубликовано: <?=$events[$i]['date'];?></div>
						<img src="<?=$baseurl;?>events/viewimage/<?=$events[$i]['id'];?>" alt="" />
						<p><?=$events[$i]['content'];?></p>
						<p><?=anchor('events/'.$events[$i]['translit'],'Читать далее &rarr;');?></p>
					</div>
				<?php endfor;?>
					<div class="spline"></div>
					<?php if($pages): ?>
					<div class="pagination">
						<?=$pages;?>
					</div>
					<?php endif;?>
				</div>
			</div>
		</article>
	</div>
	<?php $this->load->view($language."/users_interface/includes/footer");?>
	<?php $this->load->view($language."/users_interface/includes/scripts");?>
	
</body>
</html>