<div id="Basket" class="box">
	<header>
		<h2>Basket</h2>
	</header>
	<div>
	<?php foreach ($basket as $thing) : ?>
		<div class="row <?php if ($thing['Basket']['basket_type_id'] == 1) { echo "food"; } ?>">
			<div class="col-md-8"><?php echo $thing['Basket']['name'];?></div>
			<div class="col-md-4"><?php echo $thing['Basket']['quantity'];?></div>
		</div>
	<?php endforeach; ?>
	</div>
</div>