<?=form_open($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<legend>Форма редактирования города</legend>
	<fieldset>
		<div class="control-group">
			<label for="title" class="control-label">Название: </label>
			<div class="controls">
				<input type="text" class="span5 input-valid" name="title" value="<?=$city['title'];?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<label class="checkbox">
					<input type="checkbox" value="delete" id="deleteCity" name="delcity">
					Удалить город
				</label>
				<p class="help-block">(Удалятся товары и магазины продаваемые в этом городе)</p>
			</div>
		</div>
	</fieldset>
	<div class="form-actions">
		<button class="btn btn-success" type="submit" id="send" name="submit" value="send">Сохранить</button>
		<button class="btn btn-inverse backpath" type="button">Отменить</button>
	</div>
<?= form_close(); ?>