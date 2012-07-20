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
						<blockquote>
							Шампанского всем!<br />
							Как какого?<br /> 
							Конечно, цимлянского!
						</blockquote>
						<p class="author">А.С. Пушкин</p>
					</div>
					<div class="spline"></div>
					<p class="text">
						ОАО «Цимлянские вина» является<br/> 
						одним из крупнейших предприятий<br/> 
						на Дону. Так же это постоянно<br/>
						развивающееся предприятие,<br/>
						на счету которого уже не один<br/>
						десяток наград за высокое качество<br/> 
						производимой продукции.<br/>
						На заводе выпускается 51<br/>
						наименование продукции, в число<br/>
						которых входят, игристые,<br/>
						шампанские и столовые вина. 						
					</p>
					<div class="spline"></div>
					<div class="where-to-buy">
						<img src="<?=$baseurl;?>images/tourism.png" alt="Туры на виноградники Цилянских вин!" />
						<h2><a href="#">Туры на виноградники<br/> Цилянских вин!</a></h2>
					</div>
					<div class="spline"></div>
					<div class="social-likes">
						<p>
							Нравятся цимлянские вина?<br/>
							Расскажите о нем друзьям!
						</p>					
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
					<div class="spline"></div>
				</aside>
				<div id="main" role="main" class="cf">
					<div class="wine-flag news-updates">
						Самое<br />свежее:<br />
						<a href="#"><img src="<?=$baseurl;?>images/vk-icon.png" alt="Вконтакте" /></a>
						<a href="#"><img src="<?=$baseurl;?>images/fb-icon.png" alt="Facebook" /></a>
					</div>
					<div class="inside">
						<img src="<?=$baseurl;?>images/news_promo.png" alt="Каталог продукции" />
						<h1>Где купить «Цимлянские вина»?</h1>
						<div class="spline"></div>
						<div class="search-widget">
							<label for="country">Страна:</label>
							<select name="country">
								<option>Россия</option>
							</select>
							<label for="city">Город:</label>
							<select name="city">
								<option>Москва</option>
							</select>
							<button>ОК</button>
							<a href="#" class="hide"><img src="<?=$baseurl;?>images/close.png" alt="Закрыть" /></a>
						</div>
						<div class="spline"></div>
						<div class="ya-map cf">
							<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (начало) -->
							<div id="ymaps-map-id_1342633308372835223905" style="width: 39.75em; height: 25em;"></div>
							<script type="text/javascript">function fid_1342633308372835223905(ymaps) {var map = new ymaps.Map("ymaps-map-id_1342633308372835223905", {center: [44.53842512499998, 56.08994453806978], zoom: 4, type: "yandex#map"});map.controls.add("zoomControl").add("mapTools").add(new ymaps.control.TypeSelector(["yandex#map", "yandex#satellite", "yandex#hybrid", "yandex#publicMap"]));map.geoObjects.add(new ymaps.Placemark([37.609218, 55.753559], {balloonContent: "", iconContent: "1"}, {preset: "twirl#blueIcon"})).add(new ymaps.Placemark([39.744918, 47.227163], {balloonContent: "", iconContent: "3"}, {preset: "twirl#blueIcon"})).add(new ymaps.Placemark([30.313622, 59.93772], {balloonContent: "", iconContent: "2"}, {preset: "twirl#blueIcon"})).add(new ymaps.Placemark([48.41216, 54.306953], {balloonContent: "", iconContent: "4"}, {preset: "twirl#blueIcon"})).add(new ymaps.Placemark([53.201285, 56.855708], {balloonContent: "", iconContent: "5"}, {preset: "twirl#lightblueIcon"})).add(new ymaps.Placemark([56.237654, 58.004785], {balloonContent: "", iconContent: "6"}, {preset: "twirl#blueIcon"})).add(new ymaps.Placemark([44.515942, 48.707793], {balloonContent: "", iconContent: "7"}, {preset: "twirl#blueIcon"})).add(new ymaps.Placemark([49.662283, 58.581576], {balloonContent: "", iconContent: "9"}, {preset: "twirl#blueIcon"})).add(new ymaps.Placemark([37.619028, 54.193802], {balloonContent: "", iconContent: "8"}, {preset: "twirl#blueIcon"})).add(new ymaps.Placemark([39.744954, 54.619886], {balloonContent: "", iconContent: "10"}, {preset: "twirl#blueIcon"})).add(new ymaps.Placemark([39.597603, 52.603587], {balloonContent: "", iconContent: "11"}, {preset: "twirl#blueIcon"})).add(new ymaps.Placemark([39.204096, 51.662496], {balloonContent: "", iconContent: "12"}, {preset: "twirl#blueIcon"})).add(new ymaps.Placemark([45.020121, 53.199449], {balloonContent: "", iconContent: "13"}, {preset: "twirl#blueIcon"})).add(new ymaps.Placemark([50.191184, 53.205226], {balloonContent: "", iconContent: "14"}, {preset: "twirl#blueIcon"})).add(new ymaps.Placemark([40.996702, 57.008607], {balloonContent: "", iconContent: "15"}, {preset: "twirl#blueIcon"})).add(new ymaps.Placemark([39.883869, 59.223043], {balloonContent: "", iconContent: "16"}, {preset: "twirl#blueIcon"}));};</script>
							<script type="text/javascript" src="http://api-maps.yandex.ru/2.0/?coordorder=longlat&load=package.full&wizard=constructor&lang=ru-RU&onload=fid_1342633308372835223905"></script>
							<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (конец) -->
						</div>
						<div class="spline"></div>
						<div class="delivery cf">
							<img src="images/delivery.jpg" alt="" />
							<h2>Доставка Цимлянских вин по Москве</h2>
							<span class="phone">Телефон:+7(499) 755-80-30</span>
						</div>
						<div class="spline"></div>
						<div class="shops cf">
							<div class="column">
								<h3>Фирменные магазины:</h3>
								<div class="shop-item">
									<div class="title">«Цимлянские вина»</div>
									<div class="phone">(499) 123-34-56</div>
									<div class="address">ул. Тверская, д. 7 </div>
								</div>
								<div class="shop-item">
									<div class="title">Винный магазин «Бахус»</div>
									<div class="phone">(499) 123-34-56</div>
									<div class="address">ул. Садовая-Кудринска, д. 23А  </div>
								</div>
							</div>
							<div class="column">
								<h3>Сетевые магазины:</h3>
								<div class="shop-item">
									<div class="title">«Квартал»</div>
									<div class="phone">(499) 123-34-56</div>
									<div class="address">ул. Пушкинская, 17  </div>
								</div>
							</div>
							<div class="cf"> </div>
							<a class="show-all" href="#">Показать еще</a>
						</div>
					</div>
				</div>
			</article>
		</div>
	<?php $this->load->view($language."/users_interface/includes/footer");?>
	<?php $this->load->view($language."/users_interface/includes/scripts");?>
	
</body>
</html>