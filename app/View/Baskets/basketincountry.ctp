<div id="Basket" class="box">
	<header>
		<h2>Basket in <?php echo $basket[0]['Country']['name'];?></h2>
	</header>
	<div>
	<?php foreach ($basket as $thing) : ?>
		<div class="row <?php if ($thing['Basket']['basket_type_id'] == 1) { echo "food"; } ?>">
			<div class="col-md-6"><?php echo $thing['Basket']['name'];?></div>
			<div class="col-md-3"><?php echo $thing['Basket']['quantity'];?></div>
			<div class="col-md-3"><?php echo $thing['BasketinCountry']['price'];?></div>
		</div>
	<?php endforeach; ?>
	</div>
</div>