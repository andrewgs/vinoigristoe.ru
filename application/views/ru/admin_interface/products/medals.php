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
						Награды
					</li>
				</ul>
				<?php $this->load->view($language."/alert_messages/alert-error");?>
				<?php $this->load->view($language."/alert_messages/alert-success");?>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="w85"><center>Фото</center></th>
							<th class="w400"><center>Название</center></th>
							<th class="w50">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php for($i=0;$i<count($medals);$i++):?>
						<tr class="align-center">
							<td class="w85"><img src="<?=$baseurl;?>medals/viewimage/<?=$medals[$i]['id'];?>" alt="" style="width:80px;" /></td>
							<td class="w400">
								<i><b><?=$medals[$i]['title'];?></b></i><br/>
							</td>
							<td class="w50" style="text-align:center; vertical-align:middle;">
								<div id="params<?=$i;?>" style="display:none" data-mid="<?=$medals[$i]['id'];?>"></div>
								<a class="btn btn-danger deleteMedal" data-param="<?=$i;?>" data-toggle="modal" href="#deleteMedal" title="Удалить"><nobr>&nbsp;&nbsp;<i class="icon-trash icon-white"></i>&nbsp;&nbsp;</nobr></a>
							</td>
						</tr>
					<?php endfor; ?>
					</tbody>
				</table>
				<a class="btn btn-info addMedal" data-param="<?=$i;?>" data-toggle="modal" href="#addMedal" title="Добавить"><nobr><i class="icon-plus icon-white"></i> Добавить</nobr></a>
			</div>
		<?php $this->load->view($language."/admin_interface/includes/rightbar");?>
		<?php $this->load->view($language."/admin_interface/modal/add-medal");?>
		<?php $this->load->view($language."/admin_interface/modal/delete-medal");?>
		</div>
	</div>
	<?php $this->load->view($language."/admin_interface/includes/scripts");?>
	<script type="text/javascript">
		$(document).ready(function(){
			var mID = 0;
			
			$(".deleteMedal").click(function(){var Param = $(this).attr('data-param'); mID = $("div[id = params"+Param+"]").attr("data-mid");});
			$("#DelMedal").click(function(){location.href='<?=$baseurl;?><?=$this->uri->uri_string();?>/delete/medalid/'+mID;});
		});
	</script>
</body>
</html>

