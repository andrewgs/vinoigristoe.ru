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
					<a class="aside-logo">Tsymlyansky wines</a>
					<!--
					<div class="quote">
						<img src="<?=$baseurl;?>quote/viewimage/<?=$quote['id'];?>" alt="<?=$quote['name'];?>"/>
						<blockquote><?=$quote['text'];?></blockquote>
						<p class="author"><?=$quote['name'];?></p>
					</div>
					<div class="spline"></div>
					-->
					<?=anchor('vinoigristoe_catalog.pdf','<img src="'.$baseurl.'images/pdf.png" alt="pdf" />Download catalog',array('class'=>'download'));?>
					<div class="spline"></div>
					<div class="where-to-buy">
						<img src="<?=$baseurl;?>images/where_to_buy.png" alt="Where to buy Tsimlyansky Wines?" />
						<h2><?=anchor('where','Where to buy<br/> Tsimlyansky Wines?');?></h2>
					</div>
					<div class="spline"></div>
					<?php $this->load->view($language."/users_interface/includes/social-likes");?>
					<div class="spline"></div>
				</aside>
				<div id="main" role="main" class="cf">
					<div class="wine-flag">
						<?=anchor('tourism','Want <br />to wine <br />tour?');?>
					</div>
					<div class="inside">
						<img src="<?=$baseurl;?>images/caralog_promo.png" alt="The product catalog" />
						<h1>Tsimlyansky Wines</h1>
						<div class="spline"></div>
						<ul class="categories cf">
							<li><?=anchor('production/category/'.$category[0]['translit'],'<span class="type red"></span>'.$category[0]['title']);?></li>
							<li><?=anchor('production/category/'.$category[1]['translit'],'<span class="type shampane"></span>'.$category[1]['title']);?></li>
							<li><?=anchor('production/category/'.$category[2]['translit'],'<span class="type white"></span>'.$category[2]['title']);?></li>
							<li><?=anchor('production/category/'.$category[3]['translit'],'<span class="type dinner"></span>'.$category[3]['title']);?></li>
							<li><?=anchor('production/category/'.$category[4]['translit'],'<span class="type brandy"></span>'.$category[4]['title']);?></li>
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
								$viewseries = TRUE;
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
									<? if ( (mb_strlen($products[$j]['title']) < 42 and str_word_count($products[$j]['title']) > 4) or (mb_strlen($products[$j]['title']) < 37) ) : ?>
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