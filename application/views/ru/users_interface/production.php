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
						<blockquote>Игристого всем!<br />Как какого?<br /> Конечно, цимлянского!</blockquote>
						<p class="author">А.С. Пушкин</p>
					</div>
					<div class="spline"></div>
					<?=anchor('#','<img src="'.$baseurl.'images/pdf.png" alt="pdf" />Скачать каталог',array('class'=>'download'));?>
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
						<?=anchor('tourism','Хотите <br />в винный <br />тур?');?>
					</div>
					<div class="inside">
						<img src="<?=$baseurl;?>images/caralog_promo.png" alt="Каталог продукции" />
						<h1>Цимлянские вина</h1>
						<div class="spline"></div>
						<ul class="categories cf">
							<li><?=anchor('production/category/'.$category[1]['translit'],'<span class="type red"></span>'.$category[1]['title']);?></li>
							<li><?=anchor('production/category/'.$category[2]['translit'],'<span class="type shampane"></span>'.$category[2]['title'],array('class'=>'no-margin'));?></li>
							<li class="ml1em"><?=anchor('production/category/'.$category[0]['translit'],'<span class="type white"></span>'.$category[0]['title']);?></li>
							<li><?=anchor('production/category/'.$category[3]['translit'],'<span class="type dinner"></span>'.$category[3]['title']);?></li>
							<!--<li><?=anchor('production/category/'.$category[4]['translit'],'<span class="type sort"></span>'.$category[4]['title']);?></li>-->
							<li><?=anchor('production/category/'.$category[5]['translit'],'<span class="type brandy"></span>'.$category[5]['title']);?></li>
						</ul>
						<div class="spline"></div>
					<?php $categoryid = 0;?>
				<?php for($c=0;$c<count($category);$c++):
					$viewcategory = FALSE;
					for($p=0;$p<count($products);$p++):
						if($category[$c]['id'] == $products[$p]['category']):
							$viewcategory = TRUE;
						endif;
					endfor;?>
					<?php if($viewcategory):?>
						<div class="categories-sep cf">
							<div class="left"></div>
							<div class="center"><?=$category[$c]['title'];?></div>
							<div class="right"></div>
						</div>
					<?php else:?>
						<?php continue;?>
					<?php endif;?>
					<?php for($i=0;$i<count($series);$i++):?>
						<?php $viewseries = FALSE;
						for($p=0;$p<count($products);$p++):
							if(($series[$i]['id'] == $products[$p]['series']) && $series[$i]['category'] == $category[$c]['id']):
//								$viewseries = TRUE;
							endif;
						endfor;?>
						<?php if($series[$i]['default'] && $viewseries):?>
						<div class="categories-sep cf">
							<div class="left"></div>
							<div class="center"><?=$series[$i]['title'];?></div>
							<div class="right"></div>
						</div>
						<?php endif;?>
						<div class="items-list">
					<?php for($j=0;$j<count($products);$j++):?>
						<?php if(($series[$i]['id'] == $products[$j]['series']) && $category[$c]['id'] == $products[$j]['category']):?>
							<div class="category-item">
								<img src="<?=$baseurl;?>product/viewimage/<?=$products[$j]['id'];?>" alt="<?=$products[$j]['title'];?>" title="<?=$products[$j]['title'];?>" style="" />
								<p class="category-name"><?=$products[$j]['ctitle'];?></p>
								<p class="item-name">
									<?=anchor('production/category/'.$products[$j]['ctranslit'].'/series/'.$products[$j]['stranslit'].'/product/'.$products[$j]['translit'],$products[$j]['title']);?>
									<? if (strlen($products[$j]['title']) < 50) : ?>
									<br /><br />
									<? endif; ?>	
								</p>
							</div>
						<?php endif;?>
					<?php endfor;?>
						</div>
					<?php endfor;?>
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