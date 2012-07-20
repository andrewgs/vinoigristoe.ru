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
						<?=anchor($this->uri->uri_string(),"Магазины");?>
					</li>
				</ul>
				<?php $this->load->view($language."/alert_messages/alert-error");?>
				<?php $this->load->view($language."/alert_messages/alert-success");?>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="w200"><center>Название</center></th>
							<th class="w200"><center>Адрес</center></th>
							<th class="w200"><center>Телефоны</center></th>
							<th class="w50">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php for($i=0;$i<count($magazines);$i++):?>
						<tr class="align-center">
							<td class="w200"><i><b><?=$magazines[$i]['title'];?></b></i></td>
							<td class="w200"><?=$magazines[$i]['country'].', '.$magazines[$i]['city'].', '.$magazines[$i]['address'];?></td>
							<td class="w200"><?=$magazines[$i]['phones'];?></td>
							<td class="w50">
								<div id="params<?=$i;?>" style="display:none" data-mid="<?=$magazines[$i]['id'];?>"></div>
								<?=anchor('admin-panel/actions/shops/countryid/'.$magazines[$i]['countryid'].'/cityid/'.$magazines[$i]['cityid'].'/edit/'.$magazines[$i]['translit'],'<nobr>&nbsp;&nbsp;<i class="icon-edit icon-white"></i>&nbsp;&nbsp;</nobr>',array('class'=>'btn btn-success','title'=>'Редактировать'));?>
								<a class="btn btn-danger deleteMagazine" data-param="<?=$i;?>" data-toggle="modal" href="#deleteMagazine" title="Удалить"><nobr>&nbsp;&nbsp;<i class="icon-trash icon-white"></i>&nbsp;&nbsp;</nobr></a>
							</td>
						</tr>
					<?php endfor; ?>
					</tbody>
				</table>
				<?=anchor('admin-panel/actions/shops/add','<nobr><i class="icon-plus icon-white"></i> Добавить</nobr>',array('class'=>'btn btn-info'));?>
			</div>
		<?php $this->load->view($language."/admin_interface/includes/rightbar");?>
		<?php $this->load->view($language."/admin_interface/modal/delete-magazine");?>
		</div>
	</div>
	<?php $this->load->view($language."/admin_interface/includes/scripts");?>
	<script type="text/javascript">
		$(document).ready(function(){
			var mID = 0;
			$(".deleteMagazine").click(function(){var Param = $(this).attr('data-param'); mID = $("div[id = params"+Param+"]").attr("data-mid");});
			$("#DelMagazine").click(function(){location.href='<?=$baseurl;?>admin-panel/actions/shops/delete/shopid/'+mID;});
		});
	</script>
</body>
</html>

