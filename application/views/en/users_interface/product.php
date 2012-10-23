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
					<a class="aside-logo purple">Tsymlyansky Wines</a>
					<div class="quote">
						<img src="<?=$baseurl;?>quote/viewimage/<?=$quote['id'];?>" alt="<?=$quote['name'];?>"/>
						<blockquote><?=$quote['text'];?></blockquote>
						<p class="author"><?=$quote['name'];?></p>
					</div>
					<h2>Our news</h2>
					<div class="news-list cf">
					<?php for($i=0;$i<count($news);$i++):?>
						<div class="news-item">
							<div class="date"><?=$news[$i]['date'];?></div>
							<?=anchor('events/'.$news[$i]['translit'],$news[$i]['title']);?>
						</div>
					<?php endfor;?>
						<?=anchor('events','Все новости',array('class'=>'news-link'));?>
					</div>
					<div class="spline"></div>
				</aside>
				<div id="main" role="main" class="cf">
					<div class="inside">
						<img src="<?=$baseurl;?>images/product_promo.png" alt="Production catalog" />
						<div class="product-info cf">
							<div class="column center">
								<div class="product-view">
									<img src="<?=$baseurl;?>product/viewimage/<?=$product['id'];?>" alt="<?=$product['title'];?>" title="<?=$product['title'];?>" style="" />
								</div>
								<img src="<?=$baseurl;?>images/where_to_buy_small.png" alt="Where to buy Tsymlyanskoe?" />
								<?=anchor('where','Where to buy this wine?',array('class'=>'where-to-buy-small'));?>
								<?php $this->load->view($language."/users_interface/includes/social-likes");?>
							</div>
							<div class="column left">
								<ul class="breadcrumb">
									<li><?=anchor('production','Production');?> <span class="divider">/</span></li>
									<li><?=anchor('production/category/'.$product['ctranslit'],$product['ctitle']);?> <span class="divider">/</span></li>
									<li><?=anchor($this->uri->uri_string(),$product['title']);?></li>
								</ul>
								<h1><?=$product['title']?></h1>
								<div class="spline"></div>
								<p><?=$product['type']?></p>
								<p>Alcohol: <?=$product['alcohol'];?></p>
								<p>Sugar: <?=$product['sugar'];?></p>
								<div class="spline"></div>
							<?php if(count($medals)):?>
								<p class="medals">
								<?php for($i=0;$i<count($medals);$i++):?>
									<img src="<?=$baseurl;?>medals/viewimage/<?=$medals[$i]['id'];?>" alt="<?=$medals[$i]['title'];?>" title="<?=$medals[$i]['title'];?>" style="width:80px;" />
								<?php endfor;?>
								</p>
								<div class="spline"></div>
							<?php endif;?>
								<?=$product['content']?>
							</div>
						</div>
						<div class="items-list product-view">
							<hr />
						<?php for($i=0;$i<count($readproducts);$i++):?>
							<div class="category-item">	
								<img src="<?=$baseurl;?>product/viewimage/<?=$readproducts[$i]['id'];?>" alt="<?=$readproducts[$i]['title'];?>" title="<?=$readproducts[$i]['title'];?>" style="" />
								<p class="category-name"><?=$readproducts[$i]['ctitle'];?></p>
								<p class="item-name">
									<?=anchor('production/category/'.$readproducts[$i]['ctranslit'].'/series/'.$readproducts[$i]['stranslit'].'/product/'.$readproducts[$i]['translit'],$readproducts[$i]['title']);?>
									<? if ( (mb_strlen($readproducts[$i]['title']) < 42 and str_word_count($readproducts[$i]['title']) > 4) or (mb_strlen($readproducts[$i]['title']) < 37) ) : ?>
									<br /><br />
									<? endif; ?>	
								</p>
							</div>
						<?php endfor;?>
						</div>
					</div>
				</div>
			</article>
		</div>
	<?php $this->load->view($language."/users_interface/includes/footer");?>
	<?php $this->load->view($language."/users_interface/includes/scripts");?>
	
</body>
</html>