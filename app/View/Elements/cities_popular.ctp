<!-- Portfolio -->
<section id="popular_cities">
  <header class="major">
    <h2>Popular cities</h2>
  </header>
  <?php $cities = $this->requestAction(array(

													 'controller' => 'cities',

													 'action' => 'topCalc')); ?>
  <div class="row">
  	<?php foreach ($cities as $city): ?>

		<?php $slug = Inflector::slug($city['City']['nazwa'],'-');?>

		<div class="4u">
		      <section class="box">
		        <a href="#" class="image featured"><div class="wrap"><img src="/img/miasta/<?php echo $city['City']['photo']; ?>" alt="Logo of <?php echo $city['City']['nazwa']; ?>" /></div></a>
		        <header>
		          <h3><?php echo $city['City']['nazwa']; ?></h3>
		        </header>
		        <p>Lorem ipsum dolor sit amet sit veroeros sed amet blandit consequat veroeros lorem blandit  adipiscing et feugiat phasellus tempus dolore ipsum lorem dolore.</p>
		        <footer>
		        	<a href="/universities/city_result/<?php echo $city['City']['nazwa']; ?>" class="button alt">Find out more</a>
		        </footer>
		      </section>
		</div>
	<?php endforeach; ?>
  </div>
</section>