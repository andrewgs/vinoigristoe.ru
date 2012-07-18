<?=form_open($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<fieldset>
		<legend>Введите логин и пароль для входа в панель администрирования</legend>
		<?php $this->load->view($language."/alert_messages/alert-error");?>
		<?php $this->load->view($language."/alert_messages/alert-success");?>
		<div class="control-group">
			<label for="login" class="control-label">Логин</label>
			<div class="controls">
				<input type="text" id="login" class="input-xlarge input-valid" name="login">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="password" class="control-label">Пароль</label>
			<div class="controls">
				<input type="password" id="password" class="input-xlarge input-valid" name="password">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="form-actions">
			<button class="btn btn-primary" type="submit" id="send" name="submit" value="send">Войти на сайт</button>
			<button class="btn btn-inverse backpath" type="button">Отменить</button>
		</div>
	</fieldset>
<?= form_close(); ?>