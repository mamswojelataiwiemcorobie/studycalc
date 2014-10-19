<?php foreach ($stypendia as $key => $value): ?>
	<input name="stypendium_id" value="<?php echo $key; ?>" type="radio" />
	<label><?php echo $value; ?></label>
<?php endforeach; ?>