<?php foreach ($transport as $key => $value): ?>
	<div class="radio">
		<label>
			<input name="transport" value="<?php echo $key; ?>" type="radio" /><?php echo $value; ?>
		</label>
	</div>
<?php endforeach; ?>