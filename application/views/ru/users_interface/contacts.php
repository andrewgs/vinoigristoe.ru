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
					<a class="aside-logo grey">Цимлянские вина</a>
					<div class="quote">
						<img src="<?=$baseurl;?>images/pushkin.jpg"  alt="Пушкин А.С." />
						<blockquote>Шампанского всем!<br />Как какого?<br /> Конечно, цимлянского!</blockquote>
						<p class="author">А.С. Пушкин</p>
					</div>
					<div class="spline"></div>
					<p class="text">
						ОАО «Цимлянские вина» является<br/>одним из крупнейших предприятий<br/>на Дону. Так же это постоянно<br/>развивающееся предприятие,<br/>
						на счету которого уже не один<br/>десяток наград за высокое качество<br/>производимой продукции.<br/>На заводе выпускается 51<br/>
						наименование продукции, в число<br/>которых входят, игристые,<br/>шампанские и столовые вина.
					</p>
					<div class="spline"></div>
					<div class="where-to-buy">
						<img src="<?=$baseurl;?>images/tourism.png" alt="Туры на виноградники Цилянских вин!" />
						<h2><?=anchor($this->uri->uri_string(),'Туры на виноградники<br/> Цилянских вин!',array('class'=>'none'));?></h2>
					</div>
					<div class="spline"></div>
					<?php $this->load->view($language."/users_interface/includes/social-likes");?>
					
					<div class="spline"></div>
				</aside>
				<div id="main" role="main" class="cf">
					<div class="wine-flag news-updates">
						Самое<br />свежее:<br />
						<?=anchor('#','<img src="'.$baseurl.'images/vk-icon.png" alt="Вконтакте" />');?>
						<?=anchor('#','<img src="'.$baseurl.'images/fb-icon.png" alt="Facebook" />');?>
					</div>
					<div class="inside">
						<img src="<?=$baseurl;?>images/news_promo.png" alt="Каталог продукции" />
						<h1>Обратная связь</h1>
						<div class="spline"></div>
						<div class="shops cf">
							<?php $this->load->view($language."/forms/frmcontact");?>
						</div>
					</div>
				</div>
			</article>
		</div>
	<?php $this->load->view($language."/users_interface/includes/footer");?>
	<?php $this->load->view($language."/users_interface/includes/scripts");?>
	<script type="text/javascript">
		$(document).ready(function(){
			
		});
	</script>
</body>
</html>