<section>

	<h2>CITIES</h2>

	<?php $cities = $this->requestAction(array(

													 'controller' => 'cities',

													 'action' => 'top')); ?>

	<ul class="list-group">

	<?php foreach ($cities as $city): ?>

		<li class="list-group-item"><?php echo $this->Html->link($city['City']['nazwa'],

					   array( 'controller' => 'universities',

							  'action' => 'city_result',

							  $city['City']['nazwa']

					   )

			); ?></li>

	<?php endforeach; ?>

	</ul>

	<p><a class="button alt" href="#">See &raquo;</a></p>

</section><!-- /.col-lg-4 -->