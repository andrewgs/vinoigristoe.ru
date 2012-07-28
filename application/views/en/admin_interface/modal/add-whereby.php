<?=form_open_multipart($this->uri->uri_string(),array('class'=>'form-horizontal')); ?>
	<div id="addMedal" class="modal hide fade">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Добавление магазина где купить товар</h3>
		</div>
		<div class="modal-body">
			<fieldset>
				<div class="control-group">
					<label for="content" class="control-label">Город, магазин: </label>
					<div class="controls">
						<select class="span4" name="magazine" id="SetMagazine">
						<?php for($i=0;$i<count($city);$i++):?>
							<optgroup label="<?=$city[$i]['title'];?>">
							<?php for($j=0;$j<count($magazines);$j++):?>
								<?php if($city[$i]['id'] == $magazines[$j]['city']):?>
								<option value="<?=$magazines[$j]['id'];?>" <?=set_select('magazines',$magazines[$j]['title']);?>><?=$magazines[$j]['title'];?></option>
								<?php endif;?>
							<?php endfor;?>	
							</optgroup>
						<?php endfor;?>	
						</select>
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