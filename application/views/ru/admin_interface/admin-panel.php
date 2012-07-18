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
						<?=anchor("admin-panel/management/markets","Биржи");?>
					</li>
				</ul>
				<?php $this->load->view($language."/alert_messages/alert-error");?>
				<?php $this->load->view($language."/alert_messages/alert-success");?>
			</div>
		<?php $this->load->view($language."/admin_interface/includes/rightbar");?>
		</div>
	</div>
	<?php $this->load->view($language."/admin_interface/includes/scripts");?>
</body>
</html>
