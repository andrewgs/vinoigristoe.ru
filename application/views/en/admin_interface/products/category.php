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
						<?=anchor($this->uri->uri_string(),"Категории и серии");?>
					</li>
				</ul>
				<?php $this->load->view($language."/alert_messages/alert-error");?>
				<?php $this->load->view($language."/alert_messages/alert-success");?>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<!--<th class="w50"><center>Фото</center></th>-->
							<th class="w600"><center>Название</center></th>
							<th class="w50">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php for($i=0;$i<count($category);$i++):?>
						<tr class="align-center">
							<!--<td class="w50"><img src="<?=$baseurl;?>category/viewimage/<?=$category[$i]['id'];?>" alt="" /></td>-->
							<td class="w500">
								<i><b><?=$category[$i]['title'];?></b></i>
								<ol>
							<?php for($j=0;$j<count($series);$j++):?>
								<?php if($series[$j]['category'] == $category[$i]['id']):?>
									<li><?=$series[$j]['title'];?> (<?=anchor('admin-panel/actions/category/categoryid/'.$category[$i]['id'].'/seriesid/'.$series[$j]['id'].'/edit','Изменить');?>)</li>
								<?php endif;?>
							<?php endfor;?>
								</ol>
							</td>
							<td class="w50">
								<div id="params<?=$i;?>" style="display:none" data-cid="<?=$category[$i]['id'];?>"></div>
								<?=anchor('admin-panel/actions/category/edit/'.$category[$i]['translit'],'Редактировать',array('title'=>'Редактировать'));?>
								<a class="addSeries" data-param="<?=$i;?>" data-toggle="modal" href="#addSeries" title="Добавить серию">Добавить</a>
								<a class="deleteCategory" data-param="<?=$i;?>" data-toggle="modal" href="#deleteCategory" title="Удалить">Удалить</a>
							</td>
						</tr>
					<?php endfor; ?>
					</tbody>
				</table>
				<?=anchor('admin-panel/actions/category/add','<nobr><i class="icon-plus icon-white"></i> Добавить</nobr>',array('class'=>'btn btn-info'));?>
			</div>
		<?php $this->load->view($language."/admin_interface/includes/rightbar");?>
		<?php $this->load->view($language."/admin_interface/modal/add-series");?>
		<?php $this->load->view($language."/admin_interface/modal/delete-category");?>
		</div>
	</div>
	<?php $this->load->view($language."/admin_interface/includes/scripts");?>
	<script type="text/javascript">
		$(document).ready(function(){
			var cID = 0;
			
			$(".addSeries").click(function(){var Param = $(this).attr('data-param'); cID = $("div[id = params"+Param+"]").attr("data-cid"); $("#idCategory").val(cID)});
			$(".deleteCategory").click(function(){var Param = $(this).attr('data-param'); cID = $("div[id = params"+Param+"]").attr("data-cid");});
			$("#DelCategory").click(function(){location.href='<?=$baseurl;?>admin-panel/actions/category/delete/categoryid/'+cID;});
		});
	</script>
</body>
</html>

