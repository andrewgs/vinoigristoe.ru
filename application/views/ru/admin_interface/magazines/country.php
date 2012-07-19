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
							<th class="w400"><center>Название</center></th>
							<th class="w400"><center>Города</center></th>
							<th class="w50">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php for($i=0;$i<count($country);$i++):?>
						<tr class="align-center">
							<td class="w400"><i><b><?=$country[$i]['title'];?></b></i></td>
							<td>
								<ol>
							<?php for($j=0;$j<count($city);$j++):?>
								<?php if($series[$j]['category'] == $category[$i]['id']):?>
									<li><?=$series[$j]['title'];?> (<?=anchor('admin-panel/actions/series/'.$category[$i]['translit'].'/'.$series[$j]['translit'],'<i class="icon-edit"></i>');?>)</li>
								<?php endif;?>
							<?php endfor;?>
								</ol>
							</td>
							<td class="w50">
								<div id="params<?=$i;?>" style="display:none" data-cid="<?=$country[$i]['id'];?>"></div>
								<?=anchor('admin-panel/actions/country/countryid/edit/'.$country[$i]['translit'],'<nobr>&nbsp;&nbsp;<i class="icon-edit icon-white"></i>&nbsp;&nbsp;</nobr>',array('class'=>'btn btn-success','title'=>'Редактировать'));?>
								<?=anchor('admin-panel/actions/country/countryid/'.$country[$i]['id'].'/add-city','<nobr>&nbsp;&nbsp;<i class="icon-plus icon-white"></i>&nbsp;&nbsp;</nobr>',array('class'=>'btn btn-info','title'=>'Добавить город'));?>
								<a class="btn btn-danger deleteCountry" data-param="<?=$i;?>" data-toggle="modal" href="#deleteCountry" title="Удалить"><nobr>&nbsp;&nbsp;<i class="icon-trash icon-white"></i>&nbsp;&nbsp;</nobr></a>
							</td>
						</tr>
					<?php endfor; ?>
					</tbody>
				</table>
				<a class="btn btn-info" data-param="<?=$i;?>" data-toggle="modal" href="#addCountry" title="Добавить страну"><nobr><i class="icon-plus icon-white"></i> Добавить</nobr></a>
			</div>
		<?php $this->load->view($language."/admin_interface/includes/rightbar");?>
		<?php $this->load->view($language."/admin_interface/modal/add-country");?>
		<?php $this->load->view($language."/admin_interface/modal/delete-country");?>
		</div>
	</div>
	<?php $this->load->view($language."/admin_interface/includes/scripts");?>
	<script type="text/javascript">
		$(document).ready(function(){
			var cID = 0;
			
			$(".addSeries").click(function(){var Param = $(this).attr('data-param'); cID = $("div[id = params"+Param+"]").attr("data-cid"); $("#idCategory").val(cID)});
			$(".deleteCountry").click(function(){var Param = $(this).attr('data-param'); cID = $("div[id = params"+Param+"]").attr("data-cid");});
			$("#DelCountry").click(function(){location.href='<?=$baseurl;?>admin-panel/actions/country/delete/countryid/'+cID;});
		});
	</script>
</body>
</html>

