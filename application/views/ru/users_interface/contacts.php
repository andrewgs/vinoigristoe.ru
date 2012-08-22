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
						<blockquote>Игристого всем!<br />Как какого?<br /> Конечно, цимлянского!</blockquote>
						<p class="author">А.С. Пушкин</p>
					</div>
					<!--
					<div class="spline"></div>
					<p class="text">
						ОАО «Цимлянские вина» является<br/>одним из крупнейших предприятий<br/>на Дону. Так же это постоянно<br/>развивающееся предприятие,<br/>
						на счету которого уже не один<br/>десяток наград за высокое качество<br/>производимой продукции.<br/>На заводе выпускается 51<br/>
						наименование продукции, в число<br/>которых входят, игристые,<br/>шампанские и столовые вина.
					</p>
					-->
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
						<?=anchor('http://vk.com/vinoigristoe','<img src="'.$baseurl.'images/vk-icon.png" alt="Вконтакте" />');?>
						<?=anchor('https://www.facebook.com/vinoigristoe','<img src="'.$baseurl.'images/fb-icon.png" alt="Facebook" />');?>
					</div>
					<div class="inside">
						<img src="<?=$baseurl;?>images/news_promo.png" alt="Каталог продукции" />
						<h1>Контактная информация</h1>
						<div class="spline"></div>
						<section class="contact-info">
							<address>
								ОАО «Цимлянские вина» <br />
								115054, г. Москва, ул. Дубининская, д. 57, корп. 2, оф. 310 <br />
								+7 (499) 750-01-40
							</address>
							<div class="contacts-map cf">
								<div id="ymaps-map-id_134487107820731102958" style="width: 39.75em; height: 25em;"></div>
								<script type="text/javascript">function fid_134487107820731102958(ymaps) {var map = new ymaps.Map("ymaps-map-id_134487107820731102958", {center: [37.635205999999975, 55.7207788711647], zoom: 13, type: "yandex#map"});map.controls.add("zoomControl").add("mapTools").add(new ymaps.control.TypeSelector(["yandex#map", "yandex#satellite", "yandex#hybrid", "yandex#publicMap"]));map.geoObjects.add(new ymaps.Placemark([37.635206, 55.720089], {balloonContent: "ОАО «Цимлянские вина»<br/>115054, г. Москва, ул. Дубининская, д. 57, корп. 2, оф. 310<br/>+7 (499) 750-01-40 "}, {preset: "twirl#darkblueDotIcon"}));};</script>
								<script type="text/javascript" src="http://api-maps.yandex.ru/2.0/?coordorder=longlat&load=package.full&wizard=constructor&lang=ru-RU&onload=fid_134487107820731102958"></script>
							</div>
							<p>
								Отдел продаж: <?= safe_mailto('sales@vinoigristoe.ru', 'sales@vinoigristoe.ru'); ?> <br />
								Для прессы: <?= safe_mailto('pressa@vinoigristoe.ru', 'pressa@vinoigristoe.ru'); ?> <br />
								Туризм: <?= safe_mailto('turism@vinoigristoe.ru', 'turism@vinoigristoe.ru'); ?> <br />
								По общим вопросам: <?= safe_mailto('info@vinoigristoe.ru', 'info@vinoigristoe.ru'); ?>
							</p>
						</section>
						<div class="spline"></div>
						<div class="contact">
							<?php $this->load->view($language."/alert_messages/alert-error");?>
							<?php $this->load->view($language."/alert_messages/alert-success");?>
							<div id="message_box"></div>
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
			$("#submit").click(function(event){
				var err = false;
				$(".inpval").removeClass('empty-error');
				var email = $("#email").val();
				var phone = $("#phone").val();
				$(".inpval").each(function(i,element){if($(this).val()==''){err = true;$(this).addClass('empty-error');}});
				if(err){$("#message_box").html('<div class="alert alert-error">Поля не могут быть пустыми</div>'); event.preventDefault();};
				if(!err && !isValidEmailAddress(email)){$("#message_box").html('<div class="alert alert-error">Не верный адрес E-Mail</div>');$("#email").addClass('empty-error');err = true; event.preventDefault();}
				if(!err && !isValidPhone(phone)){$("#message_box").html('<div class="alert alert-error">Не верный номер телефона</div>');$("#phone").addClass('empty-error'); event.preventDefault();}
			});
		});
	</script>
</body>
</html>