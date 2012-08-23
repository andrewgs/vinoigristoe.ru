<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<legend>Форма добавления цитаты</legend>
	<fieldset>
		<div class="control-group">
			<label for="name" class="control-label">Инициалы: </label>
			<div class="controls">
				<input type="text" class="span5 input-valid" name="name" value="<?=set_value('name');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="image" class="control-label">Картинка: </label>
			<div class="controls">
				<input type="file" class="input-file" name="image" size="47">
				<span class="help-inline" style="display:none;">&nbsp;</span>
				<p class="help-block">Поддерживаются форматы: JPG,PNG,GIF</p>
			</div>
		</div>
		<div class="control-group">
			<label for="text" class="control-label">Цитата: </label>
			<div class="controls">
				<textarea rows="10" class="span7 input-valid redactor" name="text"><?=set_value('text');?></textarea>
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
	</fieldset>
	<div class="form-actions">
		<button class="btn btn-success" type="submit" id="send" name="submit" value="send">Добавить</button>
		<button class="btn btn-inverse backpath" type="button">Отменить</button>
	</div>
<?= form_close(); ?>