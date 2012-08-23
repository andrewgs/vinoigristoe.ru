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
						<?=anchor($this->uri->uri_string(),"Дополнительные действия");?>
					</li>
				</ul>
				<?php $this->load->view($language."/alert_messages/alert-error");?>
				<?php $this->load->view($language."/alert_messages/alert-success");?>
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<td class="short" style="width:5px;">1</td>
							<td style="width:160px;"><i>Загрузить каталог</i></td>
							<td>
							<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
								<input type="file" id="DocumentFile" class="input-file linput" name="document" size="64"><br/>
								<div style="float:left; margin-top:10px;">
									<strong><em>Документ заменит старый</em></strong><br/>
									<i><u>Документ должен быть книгой MS Excel 2003</u></i>
								</div>
								<div style="float:right; margin-top:10px;">
									<button class="btn btn-success" type="submit" id="catproducts" name="catproducts" value="catproducts">Загрузить</button>
								</div>
							<?= form_close(); ?>
							</td>
						</tr>
						<tr>
							<td class="short" style="width:5px;">2</td>
							<td style="width:160px;"><i>Картинка "Наша новинка"</i></td>
							<td>
							<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
								<input type="file" id="PhotoFile1" class="input-file linput" name="phnews" size="64"><br/>
								<div style="float:left; margin-top:10px;">
									<strong><em>Файл заменит старый</em></strong><br/>
									<i><u>Поддерживаемый формат: JPG</u></i>
								</div>
								<div style="float:right; margin-top:10px;">
									<button class="btn btn-success" type="submit" id="phnews" name="sphnews" value="phnews">Загрузить</button>
								</div>
							<?= form_close(); ?>
							</td>
						</tr>
						<tr>
							<td class="short" style="width:5px;">3</td>
							<td style="width:160px;"><i>Картинка "Выставка и акции"</i></td>
							<td>
							<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
								<input type="file" id="PhotoFile2" class="input-file linput" name="phevent" size="64"><br/>
								<div style="float:left; margin-top:10px;">
									<strong><em>Файл заменит старый</em></strong><br/>
									<i><u>Поддерживаемый формат: JPG</u></i>
								</div>
								<div style="float:right; margin-top:10px;">
									<button class="btn btn-success" type="submit" id="phevent" name="sphevent" value="phevent">Загрузить</button>
								</div>
							<?= form_close(); ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		<?php $this->load->view($language."/admin_interface/includes/rightbar");?>
		</div>
	</div>
	<?php $this->load->view($language."/admin_interface/includes/scripts");?>
</body>
</html>
