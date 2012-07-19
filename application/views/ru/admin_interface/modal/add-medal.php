<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<div id="addMedal" class="modal hide fade">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Добавление награды</h3>
		</div>
		<div class="modal-body">
			<fieldset>
				<div class="control-group">
					<label for="title" class="control-label">Название: </label>
					<div class="controls">
						<input type="text" class="input-xlarge input-valid" name="title" value="">
						<span class="help-inline" style="display:none;">&nbsp;</span>
					</div>
				</div>
				<div class="control-group">
					<label for="image" class="control-label">Картинка: </label>
					<div class="controls">
						<input type="file" class="input-file input-valid" name="image" size="30">
						<span class="help-inline" style="display:none;">&nbsp;</span>
						<p class="help-block">Поддерживаются форматы: JPG,PNG,GIF</p>
					</div>
				</div>
			</fieldset>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Отменить</button>
			<button class="btn btn-success" type="submit" id="send" name="submit" value="send">Добавить</button>
		</div>
	</div>
<?= form_close(); ?>