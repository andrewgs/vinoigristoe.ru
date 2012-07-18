<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<legend>Форма добавления новости или события</legend>
	<fieldset>
		<div class="control-group">
			<label for="title" class="control-label">Название: </label>
			<div class="controls">
				<input type="text" class="span7 input-valid" name="title" value="<?=set_value('title');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="content" class="control-label">Содержание: </label>
			<div class="controls">
				<textarea rows="10" class="span7 input-valid redactor" name="content"><?=set_value('content');?></textarea>
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="image" class="control-label">Картинка: </label>
			<div class="controls">
				<input type="file" class="input-file" name="image" size="50">
				<span class="help-inline" style="display:none;">&nbsp;</span>
				<p class="help-block">Поддерживаются форматы: JPG,PNG,GIF</p>
			</div>
		</div>
		<div class="control-group">
			<label for="image" class="control-label">Тип: </label>
			<div class="controls">
				<select id="type_events" name="type_event" class="span3">
				<?php for($i=0;$i<count($types_events);$i++):?>
					<option value="<?=$types_events[$i]['id'];?>"><?=$types_events[$i]['title'];?></option>
				<?php endfor;?>
				</select>
			</div>
		</div>
	</fieldset>
	<div class="form-actions">
		<button class="btn btn-success" type="submit" id="send" name="submit" value="send">Добавить</button>
		<button class="btn btn-inverse backpath" type="button">Отменить</button>
	</div>
<?= form_close(); ?>