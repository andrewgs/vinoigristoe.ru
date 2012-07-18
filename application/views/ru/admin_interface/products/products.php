<!DOCTYPE html>
<html lang="en">
<?php $this->load->view($language."/admin_interface/includes/head");?>
<body>
	<?php $this->load->view($language."/admin_interface/includes/header");?>
	<div class="container">
		<div class="row">
			<div class="span9">
				<ul class="breadcrumb">
					<li class="active">
						<?=anchor($this->uri->uri_string(),"Продукты");?>
					</li>
				</ul>
				<?php $this->load->view($language."/alert_messages/alert-error");?>
				<?php $this->load->view($language."/alert_messages/alert-success");?>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="w50"><center>Фото</center></th>
							<th class="w100"><center>Название</center></th>
							<th class="w400"><center>Описание</center></th>
							<th class="w50">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php for($i=0;$i<count($products);$i++):?>
						<tr class="align-center">
							<td class="w50"><img src="<?=$baseurl;?>category/viewimage/<?=$category[$i]['id'];?>" alt="" /></td>
							<td class="w500">
								<i><b><?=$category[$i]['title'];?></b></i>
								<ol>
							<?php for($j=0;$j<count($series);$j++):?>
								<?php if($series[$j]['category'] == $category[$i]['id']):?>
									<li><?=$series[$j]['title'];?> (<?=anchor('admin-panel/actions/series/'.$category[$i]['translit'].'/'.$series[$j]['translit'],'<i class="icon-edit"></i>');?>)</li>
								<?php endif;?>
							<?php endfor;?>
								</ol>
							</td>
							<td class="w50">
								<div id="params<?=$i;?>" style="display:none" data-cid="<?=$category[$i]['id'];?>"></div>
								<?=anchor('admin-panel/actions/category/edit/'.$category[$i]['translit'],'<nobr>&nbsp;&nbsp;<i class="icon-edit icon-white"></i>&nbsp;&nbsp;</nobr>',array('class'=>'btn btn-success','title'=>'Редактировать'));?>
								<a class="btn btn-info addSeries" data-param="<?=$i;?>" data-toggle="modal" href="#addSeries" title="Добавить серию"><nobr>&nbsp;&nbsp;<i class="icon-plus icon-white"></i>&nbsp;&nbsp;</nobr></a>
								<a class="btn btn-danger deleteCategory" data-param="<?=$i;?>" data-toggle="modal" href="#deleteCategory" title="Удалить"><nobr>&nbsp;&nbsp;<i class="icon-trash icon-white"></i>&nbsp;&nbsp;</nobr></a>
							</td>
						</tr>
					<?php endfor; ?>
					</tbody>
				</table>
				<?=anchor('admin-panel/actions/products/add','<nobr><i class="icon-plus icon-white"></i> Добавить</nobr>',array('class'=>'btn btn-info'));?>
			</div>
		<?php $this->load->view($language."/admin_interface/includes/rightbar");?>
		<?php $this->load->view($language."/admin_interface/modal/delete-product");?>
		</div>
	</div>
	<?php $this->load->view($language."/admin_interface/includes/scripts");?>
	<script type="text/javascript">
		$(document).ready(function(){
			var pID = 0;
			
			$(".deleteProduct").click(function(){var Param = $(this).attr('data-param'); pID = $("div[id = params"+Param+"]").attr("data-pid");});
			$("#DelProduct").click(function(){location.href='<?=$baseurl;?>admin-panel/actions/product/delete/productid/'+pID;});
		});
	</script>
</body>
</html>

