<?php foreach ($transport as $key => $value): ?>
	<input name="transport" value="<?php echo $key; ?>" type="radio" />
	<label><?php echo $value; ?></label>
<?php endforeach; ?>