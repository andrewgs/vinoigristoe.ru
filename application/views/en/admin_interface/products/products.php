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
				<?php if($pages): ?>
					<?=$pages;?>
				<?php endif;?>
				<hr/>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="w30"><center>Фото</center></th>
							<th class="w100"><center>Название</center></th>
							<th class="w400"><center>Описание</center></th>
							<th class="w50">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php for($i=0;$i<count($products);$i++):?>
						<tr class="align-center">
							<td class="w30"><img src="<?=$baseurl;?>product/viewimage/<?=$products[$i]['id'];?>" alt="" style="width:30px;" /></td>
							<td class="w100">
								<i><b><?=$products[$i]['title'];?></b></i><br/>
								<nobr><?=$products[$i]['type'];?><br/>спирт: <?=$products[$i]['alcohol'];?><br/>сахар: <?=$products[$i]['sugar'];?></nobr>
							</td>
							<td class="w400">
								<?=$products[$i]['content'];?>
								<br/>
								<?=anchor('admin-panel/actions/products/category/'.$products[$i]['category'].'/series/'.$products[$i]['series'].'/product/'.$products[$i]['id'].'/medals','Награды');?>
								<span class="divider">/</span>
								<?=anchor('admin-panel/actions/products/category/'.$products[$i]['category'].'/series/'.$products[$i]['series'].'/product/'.$products[$i]['id'].'/whereby','Где купить');?>
							</td>
							<td class="w50" style="text-align:center; vertical-align:middle;">
								<div id="params<?=$i;?>" style="display:none" data-pid="<?=$products[$i]['id'];?>"></div>
								<?=anchor('admin-panel/actions/products/category/'.$products[$i]['category'].'/series/'.$products[$i]['series'].'/edit/'.$products[$i]['translit'],'<nobr>&nbsp;&nbsp;<i class="icon-edit icon-white"></i>&nbsp;&nbsp;</nobr>',array('class'=>'btn btn-success','title'=>'Редактировать'));?>
								<a class="btn btn-danger deleteProduct" data-param="<?=$i;?>" data-toggle="modal" href="#deleteProduct" title="Удалить"><nobr>&nbsp;&nbsp;<i class="icon-trash icon-white"></i>&nbsp;&nbsp;</nobr></a>
							</td>
						</tr>
					<?php endfor; ?>
					</tbody>
				</table>
				<?php if($pages): ?>
					<?=$pages;?>
				<?php endif;?>
				<hr/>
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
			$("#DelProduct").click(function(){location.href='<?=$baseurl;?>admin-panel/actions/products/delete/productid/'+pID;});
		});
	</script>
</body>
</html>

