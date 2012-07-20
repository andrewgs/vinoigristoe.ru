<?=form_open($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<legend>Форма добавления магазина</legend>
	<fieldset>
		<div class="control-group">
			<label for="title" class="control-label">Название: </label>
			<div class="controls">
				<input type="text" class="span5 input-valid" name="title" value="<?=set_value('title');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="content" class="control-label">Страна, города: </label>
			<div class="controls">
				<select class="span4" name="city" id="SetCity">
				<?php for($i=0;$i<count($country);$i++):?>
					<optgroup label="<?=$country[$i]['title'];?>">
					<?php for($j=0;$j<count($city);$j++):?>
						<?php if($country[$i]['id'] == $city[$j]['country']):?>
						<option value="<?=$city[$j]['id'];?>" <?=set_select('city',$city[$j]['title']);?>><?=$city[$j]['title'];?></option>
						<?php endif;?>
					<?php endfor;?>	
					</optgroup>
				<?php endfor;?>	
				</select>
			</div>
		</div>
		<div class="control-group">
			<label for="address" class="control-label">Адрес: </label>
			<div class="controls">
				<input type="text" class="span5 input-valid" name="address" value="<?=set_value('address');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
		<div class="control-group">
			<label for="phones" class="control-label">Телефоны: </label>
			<div class="controls">
				<input type="text" class="span5 input-valid" name="phones" value="<?=set_value('phones');?>">
				<span class="help-inline" style="display:none;">&nbsp;</span>
			</div>
		</div>
	</fieldset>
	<div class="form-actions">
		<button class="btn btn-success" type="submit" id="send" name="submit" value="send">Сохранить</button>
		<button class="btn btn-inverse backpath" type="button">Отменить</button>
	</div>
<?= form_close(); ?>