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
					<div class="where-to-buy">
						<img src="<?=$baseurl;?>images/where_to_buy.png" alt="Где купить Цимлянские вина?" />
						<h2><?=anchor('where','Где купить<br/> Цимлянские вина?');?></h2>
					</div>
					<div class="spline"></div>
					<div class="quote">
						<img src="<?=$baseurl;?>images/pushkin.jpg" alt="Пушкин А.С." />
						<blockquote>Игристого всем!<br />Как какого?<br /> Конечно, цимлянского!</blockquote>
						<p class="author">А.С. Пушкин</p>
					</div>
				</aside>
				<div id="main" role="main" class="cf">
					<div class="wine-flag news-updates">
						Самое<br />свежее:<br />
						<?=anchor('#','<img src="'.$baseurl.'images/vk-icon.png" alt="Вконтакте" />');?>
						<?=anchor('#','<img src="'.$baseurl.'images/fb-icon.png" alt="Facebook" />');?>
					</div>
					<div class="inside no-padding">
						<img src="<?=$baseurl;?>images/news_promo_new.png" alt="Каталог продукции" />
						<div class="news-header">
							<h1>Цимлянская зона виноделия, одна из старейших в России</h1>
						</div>
						<div class="spline"></div>
						<div class="news-body">
							<p>
								До затопления, Цимлянские виноградники росли преимущественно на склонах реки Дон и пассажиры, 
								проплывавшие по реке, в том месте, где Дон прижимался к коренному берегу, а на самом верху было 
								городище Саркел, видели сорокаметровую изумрудную стену. Бесчисленными фиолетовыми вкраплениями в ней 
								мерцали зреющие грозди винограда. При взгляде сбоку виноградные шпалеры сливались в сплошную массу. 
								Она казалась совершенно вертикальной̆, и все представлялось фантастической декорацией.
							</p>
							<p>
								<img src="<?=$baseurl;?>images/vinogradniki-1.jpg" alt="" />
								<img src="<?=$baseurl;?>images/vinogradniki-2.jpg" alt="" />
							</p>
							<p>
								В 1952 году началось заполнение Цимлянского водохранилища, старые казачьи виноградники попали в зону затопления.
								Чтобы их спасти - пришлось пересаживать кусты вручную и при помощи машин на плато. 
							</p>
							<p>
								<img src="<?=$baseurl;?>images/vinogradniki-4.jpg" alt="" />
								<img src="<?=$baseurl;?>images/vinogradniki-5.jpg" alt="" />
							</p>
							<p>
								Теперь наши виноградники 
								занимают пощадь более 1000 гектар. И среди них спасённые из зоны затопления уникальные аборигенные сорта 
								Цимлянский чёрный, Плечистик и Красностоп золотовский, не имеющие генетического родства с известными 
								европейскими техническими сортами.
							</p>
							<p>
								<img src="<?=$baseurl;?>images/vinogradniki-3.jpg" alt="" />
							</p>
							<p>
								Все Цимлянские виноградники, в силу географического положения и особенностей климата, являются укрывными и 
								принадлежат к самой северной зоне промышленного виноградарства в России, а их уникальность заключается также 
								в отсутствии необходимости интенсивной̆ обработки химическими веществами в период вызревания, что позволяет 
								называть Цимлянское вино органическим.
							</p>
							<p>
								<img src="<?=$baseurl;?>images/vinogradniki-6.jpg" alt="" />
							</p>
							<p>
								Донская зона виноградарства расположена на правом берегу Дона. В год выпадает от 350 до 450 мм осадков. 
								Почвы – черноземы и темно-каштановые, но в подпочве и, особенно на склонах, известняки начинаются уже с 
								небольшой глубины. Вегетационный период достаточен для полного созревания винограда, но опасность представляют 
								ранние осенние заморозки, которые случаются в отдельные годы. 
							</p>
							<p>
								<img src="<?=$baseurl;?>images/vinogradniki-7.jpg" alt="" />
								<img src="<?=$baseurl;?>images/vinogradniki-8.jpg" alt="" />
							</p>
						</div>
						<div class="event-likes">
							<p>Расскажите друзьям об этом!</p>
							<div class="like">
								<img src="<?=$baseurl;?>images/vk.png" alt="" />
							</div>	
							<div class="like">
								<img src="<?=$baseurl;?>images/gplus.png" alt="" />
							</div>
							<div class="like">
								<img src="<?=$baseurl;?>images/tw.png" alt="" />
							</div>
							<div class="like">
								<img src="<?=$baseurl;?>images/fb.png" alt="" />
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	<?php $this->load->view($language."/users_interface/includes/footer");?>
	<?php $this->load->view($language."/users_interface/includes/scripts");?>
</body>
</html>