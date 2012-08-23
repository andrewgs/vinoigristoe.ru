<div class="span3">
	<div class="well sidebar-nav">
		<ul class="nav nav-pills nav-stacked">
			<li class="nav-header">Списки</li>
			<li num="events"><?=anchor('admin-panel/actions/events','События и новости');?></li>
			<li num="category"><?=anchor('admin-panel/actions/category','Категории и серии');?></li>
			<li num="products"><?=anchor('admin-panel/actions/products','Продукты');?></li>
			<li num="country"><?=anchor('admin-panel/actions/country','Страны и города');?></li>
			<li num="shops"><?=anchor('admin-panel/actions/shops','Магазины');?></li>
			<li num="quote"><?=anchor('admin-panel/actions/quote','Цитаты');?></li>
			<li class="nav-header">Действия</li>
			<li><?=anchor('admin-panel/actions/control','Дополнительно');?></li>
			<li><?=anchor('admin-panel/actions/logoff','Завершить сеанс');?></li>
		</ul>
	</div>
</div>