<!DOCTYPE html>
<html lang="en">
<?php $this->load->view($language."/admin_interface/includes/head");?>
<body>
	<?php $this->load->view($language."/admin_interface/includes/header");?>
	<div class="container">
		<div class="row">
			<div class="span9">
				<ul class="breadcrumb">
					<li>
						<?=anchor('',"Продукты",array('class'=>'none backpath'));?><span class="divider">/</span>
					</li>
					<li class="active">
						Где купить
					</li>
				</ul>
				<?php $this->load->view($language."/alert_messages/alert-error");?>
				<?php $this->load->view($language."/alert_messages/alert-success");?>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="w200"><center>Магазин</center></th>
							<th class="w200"><center>Адрес</center></th>
							<th class="w200"><center>Телефоны</center></th>
							<th class="w50">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php for($i=0;$i<count($whereby);$i++):?>
						<tr class="align-center">
							<td class="w200"><i><b><?=$whereby[$i]['title'];?></b></i></td>
							<td class="w200"><?=$whereby[$i]['country'].', '.$whereby[$i]['city'].', '.$whereby[$i]['address'];?></td>
							<td class="w200"><?=$whereby[$i]['phones'];?></td>
							<td class="w50">
								<div id="params<?=$i;?>" style="display:none" data-wbid="<?=$whereby[$i]['id'];?>"></div>
								<a class="btn btn-danger deleteWhereby" data-param="<?=$i;?>" data-toggle="modal" href="#deleteWhereby" title="Удалить"><nobr>&nbsp;&nbsp;<i class="icon-trash icon-white"></i>&nbsp;&nbsp;</nobr></a>
							</td>
						</tr>
					<?php endfor; ?>
					</tbody>
				</table>
				<a class="btn btn-info addMedal" data-param="<?=$i;?>" data-toggle="modal" href="#addMedal" title="Добавить"><nobr><i class="icon-plus icon-white"></i> Добавить</nobr></a>
			</div>
		<?php $this->load->view($language."/admin_interface/includes/rightbar");?>
		<?php $this->load->view($language."/admin_interface/modal/add-whereby");?>
		<?php $this->load->view($language."/admin_interface/modal/delete-whereby");?>
		</div>
	</div>
	<?php $this->load->view($language."/admin_interface/includes/scripts");?>
	<script type="text/javascript">
		$(document).ready(function(){
			var wbID = 0;
			$(".deleteWhereby").click(function(){var Param = $(this).attr('data-param'); wbID = $("div[id = params"+Param+"]").attr("data-wbid");});
			$("#DelWhereby").click(function(){location.href='<?=$baseurl;?><?=$this->uri->uri_string();?>/delete/wherebyid/'+wbID;});
		});
	</script>
</body>
</html>

