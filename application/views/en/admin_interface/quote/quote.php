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
						<?=anchor($this->uri->uri_string(),"Цитаты");?>
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
							<th class="w200"><center>Фото</center></th>
							<th class="w200"><center>Инициалы</center></th>
							<th class="w200"><center>Цитата</center></th>
							<th class="w50">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php for($i=0;$i<count($quote);$i++):?>
						<tr class="align-center">
							<td class="w200">
								<img src="<?=$baseurl;?>quote/viewimage/<?=$quote[$i]['id'];?>" alt=""/>
							</td>
							<td class="w200"><?=$quote[$i]['name'];?></td>
							<td class="w200"><?=$quote[$i]['text'];?></td>
							<td class="w50">
								<div id="params<?=$i;?>" style="display:none" data-qid="<?=$quote[$i]['id'];?>"></div>
								<?=anchor('admin-panel/actions/quote/edit/'.$quote[$i]['id'],'<nobr>&nbsp;&nbsp;<i class="icon-edit icon-white"></i>&nbsp;&nbsp;</nobr>',array('class'=>'btn btn-success','title'=>'Редактировать'));?>
								<a class="btn btn-danger deleteQuote" data-param="<?=$i;?>" data-toggle="modal" href="#deleteQuote" title="Удалить"><nobr>&nbsp;&nbsp;<i class="icon-trash icon-white"></i>&nbsp;&nbsp;</nobr></a>
							</td>
						</tr>
					<?php endfor; ?>
					</tbody>
				</table>
				<?php if($pages): ?>
					<?=$pages;?>
				<?php endif;?>
				<hr/>
				<?=anchor('admin-panel/actions/quote/add','<nobr><i class="icon-plus icon-white"></i> Добавить</nobr>',array('class'=>'btn btn-info'));?>
			</div>
		<?php $this->load->view($language."/admin_interface/includes/rightbar");?>
		<?php $this->load->view($language."/admin_interface/modal/delete-quote");?>
		</div>
	</div>
	<?php $this->load->view($language."/admin_interface/includes/scripts");?>
	<script type="text/javascript">
		$(document).ready(function(){
			var qID = 0;
			$(".deleteQuote").click(function(){var Param = $(this).attr('data-param'); qID = $("div[id = params"+Param+"]").attr("data-qid");});
			$("#DelQuote").click(function(){location.href='<?=$baseurl;?>admin-panel/actions/qoute/delete/quoteid/'+qID;});
		});
	</script>
</body>
</html>

