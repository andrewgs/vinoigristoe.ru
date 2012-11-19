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
					<a class="aside-logo">Цимлянские вина</a>
					<div class="quote">
						<img src="<?=$baseurl;?>quote/viewimage/<?=$quote['id'];?>" alt="<?=$quote['name'];?>"/>
						<blockquote><?=$quote['text'];?></blockquote>
						<p class="author"><?=$quote['name'];?></p>
					</div>
					<div class="spline"></div>
					<?=anchor('vinoigristoe_catalog.pdf','<img src="'.$baseurl.'images/pdf.png" alt="pdf" />Скачать каталог',array('class'=>'download'));?>
					<!--
					<div class="spline"></div>
					<p class="text">
						ОАО «Цимлянские вина» является<br/>одним из крупнейших предприятий<br/>на Дону. Так же это постоянно<br/>
						развивающееся предприятие,<br/>на счету которого уже не один<br/>десяток наград за высокое качество<br/> 
						производимой продукции.<br/>На заводе выпускается 51<br/>наименование продукции, в число<br/>
						которых входят, игристые,<br/>шампанские и столовые вина.
					</p>
					-->
					<div class="spline"></div>
					<div class="where-to-buy">
						<img src="<?=$baseurl;?>images/where_to_buy.png" alt="Где купить Цимлянские вина?" />
						<h2><?=anchor('where','Где купить<br/> Цимлянские вина?');?></h2>
					</div>
					<div class="spline"></div>
					<?php $this->load->view($language."/users_interface/includes/social-likes");?>
					<div class="spline"></div>
				</aside>
				<div id="main" role="main" class="cf">
					<div class="wine-flag">
						<a href="#">Хотите <br />в винный <br />тур?</a>
					</div>
					<div class="inside">
						<img src="<?=$baseurl;?>images/caralog_promo.png" alt="Каталог продукции" />
						<h1>Цимлянские вина</h1>
						<div class="spline"></div>
						<ul class="categories cf">
							<li><?=anchor('production/category/'.$category[0]['translit'],'<span class="type red"></span>'.$category[0]['title']);?></li>
							<li><?=anchor('production/category/'.$category[1]['translit'],'<span class="type shampane"></span>'.$category[1]['title']);?></li>
							<li><?=anchor('production/category/'.$category[2]['translit'],'<span class="type white"></span>'.$category[2]['title']);?></li>
							<li><?=anchor('production/category/'.$category[3]['translit'],'<span class="type dinner"></span>'.$category[3]['title']);?></li>
							<li><?=anchor('production/category/'.$category[4]['translit'],'<span class="type brandy"></span>'.$category[4]['title']);?></li>
						</ul>
						<div class="spline"></div>
					<?php for($s=0;$s<count($series);$s++):?>
						<?php $viewseries = FALSE;
						for($p=0;$p<count($products);$p++):
							if(($series[$s]['id'] == $products[$p]['series']) && $series[$s]['category'] == $categoryid):
								$viewseries = TRUE;
							endif;
						endfor;?>
						<?php if($series[$s]['default'] && $viewseries):?>
						<div class="categories-sep cf">
							<div class="left"></div>
							<div class="center"><?=$series[$s]['title'];?></div>
							<div class="right"></div>
						</div>
						<?php endif;?>
						<div class="items-list">
						<?php for($p=0;$p<count($products);$p++):?>
							<?php if($series[$s]['id'] == $products[$p]['series']):?>
							<div class="category-item">
								<img src="<?=$baseurl;?>product/viewimage/<?=$products[$p]['id'];?>" alt="<?=$products[$p]['title'];?>" title="<?=$products[$p]['title'];?>" style="" />
								<p class="category-name"><?=$products[$p]['ctitle'];?></p>
								<p class="item-name">
									<?=anchor('production/category/'.$products[$p]['ctranslit'].'/series/'.$products[$p]['stranslit'].'/product/'.$products[$p]['translit'],$products[$p]['title']);?>
									<? if (strlen($products[$p]['title']) < 50) : ?>
									<br /><br />
									<? endif; ?>
								</p>
							</div>
							<?php endif;?>
						<?php endfor;?>
						<?php if(!count($products)):?>
							<p class="item-name">Извините но список пуст :(</p>
						<?php endif;?>
						</div>
					<?php endfor;?>
						<?php if($pages): ?>
						<div class="spline"></div>
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