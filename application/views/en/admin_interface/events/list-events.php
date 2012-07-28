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
						<?=anchor($this->uri->uri_string(),"События и Новости");?>
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
							<th class="w85"><center>Тип / Дата</center></th>
							<th class="w600"><center>Содержание</center></th>
							<th class="w50">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php for($i=0;$i<count($events);$i++):?>
						<tr class="align-center">
							<td class="w85"><nobr><?=$events[$i]['tptitle'];?><br/><?=$events[$i]['date'];?></nobr></td>
							<td class="w500">
								<i><b><?=$events[$i]['title'];?></b></i>
								<p><?=$events[$i]['content'];?></p>
							</td>
							<td class="w50">
								<div id="params<?=$i;?>" style="display:none" data-nid="<?=$events[$i]['id'];?>"></div>
								<?=anchor('admin-panel/actions/events/edit/'.$events[$i]['translit'],'<nobr>&nbsp;&nbsp;<i class="icon-edit icon-white"></i>&nbsp;&nbsp;</nobr>',array('class'=>'btn btn-success','title'=>'Редактировать'));?>
								<a class="btn btn-danger deleteNews" data-param="<?=$i;?>" data-toggle="modal" href="#deleteNews" title="Удалить"><nobr>&nbsp;&nbsp;<i class="icon-trash icon-white"></i>&nbsp;&nbsp;</nobr></a>
							</td>
						</tr>
					<?php endfor; ?>
					</tbody>
				</table>
				<?php if($pages): ?>
					<?=$pages;?>
				<?php endif;?>
				<hr/>
				<?=anchor('admin-panel/actions/events/add','<nobr><i class="icon-plus icon-white"></i> Добавить</nobr>',array('class'=>'btn btn-info'));?>
			</div>
		<?php $this->load->view($language."/admin_interface/includes/rightbar");?>
		<?php $this->load->view($language."/admin_interface/modal/delete-news");?>
		</div>
	</div>
	<?php $this->load->view($language."/admin_interface/includes/scripts");?>
	<script type="text/javascript">
		$(document).ready(function(){
			var nID = 0;
			$(".deleteNews").click(function(){var Param = $(this).attr('data-param'); nID = $("div[id = params"+Param+"]").attr("data-nid");});
			$("#DelNews").click(function(){location.href='<?=$baseurl;?>admin-panel/actions/news/delete/newsid/'+nID;});
		});
	</script>
</body>
</html>
