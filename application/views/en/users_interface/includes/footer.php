<footer>
	<div class="container" class="cf">
		<section class="cf">
			<div class="social-widget">
				<script type="text/javascript" src="http://userapi.com/js/api/openapi.js?49"></script>
				<div id="vk_groups"></div>
				<script type="text/javascript">
					VK.Widgets.Group("vk_groups", {mode : 0,width : "218",height : "215"}, 38970572);
				</script>
			</div>
			<div class="social-widget">
				<div id="fb-root"></div>
				<script>
					( function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if(d.getElementById(id)) return;
						js = d.createElement(s);
						js.id = id;
						js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=118650518205495";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>
				<div class="fb-like-box" data-href="http://www.facebook.com/vinoigristoe" data-width="218" data-height="215" data-show-faces="true" data-stream="false" data-header="false"></div>
			</div>
			<nav>
				<ul>
					<li><?=anchor('','Main page');?></li>
					<li><?=anchor('tradition','About');?></li>
					<li><?=anchor('tourism','Wine tourism');?></li>
					<li><?=anchor('events','Exhibitions and events');?></li>
					<li><?=anchor('production','Production');?></li>
					<li><?=anchor('contacts','Contacts');?></li>
				</ul>
			</nav>
			<div class="copyright">
				<div class="stats">
					<?=anchor('','<img src="'.$baseurl.'images/logger.png" alt="" />');?>
					<?=anchor('','<img src="'.$baseurl.'images/rambler.png" alt="" />');?>
				</div>
				<p>© 1995–2012<br/>JSC «Tsimlyansk Wines»</p>
				<p>When copying materials from <br/>this site link is required</p> 
			</div>
		</section>
	</div>
</footer>