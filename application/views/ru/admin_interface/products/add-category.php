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
						<?=anchor('',"Категории продуктов",array('class'=>'none backpath'));?><span class="divider">/</span>
					</li>
					<li class="active">
						Добавление
					</li>
				</ul>
				<?php $this->load->view($language."/alert_messages/alert-error");?>
				<?php $this->load->view($language."/alert_messages/alert-success");?>
				<?php $this->load->view($language."/forms/frmaddcategory");?>
			</div>
		<?php $this->load->view($language."/admin_interface/includes/rightbar");?>
		</div>
	</div>
	<?php $this->load->view($language."/admin_interface/includes/scripts");?>
</body>
</html>
