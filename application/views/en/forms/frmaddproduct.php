<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<legend>Форма добавления товара</legend>
	<fieldset>
		<div class="control-group">
			<label for="title" class="control-label">Название: </label>
			<div class="controls">
				<input type="text" class="span5 input-valid" name="title" value="<?=set_value('title');?>">
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
			<label for="type" class="control-label">Тип: </label>
			<div class="controls">
				<input type="text" class="span5 input-valid" name="type" value="<?=set_value('type');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
				<p class="help-block">(Сладкое, полусладкое и т.д.)</p>
			</div>
		</div>
		<div class="control-group">
			<label for="alcohol" class="control-label">Спирт: </label>
			<div class="controls">
				<input type="text" class="span3 input-valid" name="alcohol" value="<?=set_value('alcohol');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="sugar" class="control-label">Сахар: </label>
			<div class="controls">
				<input type="text" class="span3 input-valid" name="sugar" value="<?=set_value('sugar');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="content" class="control-label">Описание: </label>
			<div class="controls">
				<textarea rows="10" class="span7 input-valid redactor" name="content"><?=set_value('content');?></textarea>
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="content" class="control-label">Категория, серия: </label>
			<div class="controls">
				<select class="span4" name="series" id="SetSeries">
				<?php for($i=0;$i<count($category);$i++):?>
					<optgroup label="<?=$category[$i]['title'];?>">
					<?php for($j=0;$j<count($series);$j++):?>
						<?php if($category[$i]['id'] == $series[$j]['category']):?>
						<option value="<?=$series[$j]['id'];?>"><?=$series[$j]['title'];?></option>
						<?php endif;?>
					<?php endfor;?>	
					</optgroup>
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