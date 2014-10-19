<div id="form_result" class="row">
	<div class="8u">							
		<!-- Content -->
			<article class="box post">
				<header>
					<h2>Summary</h2>
					<p>
						If you choose to study in <?php if (isset($result['conditions']['city'])) echo $result['conditions']['city']; ?><?php if (isset($result['conditions']['country'])) echo ', '. $result['conditions']['country']; ?> - <?php if (isset($result['conditions']['course'])) echo $result['conditions']['course']; ?><?php if (isset($result['conditions']['university'])) echo ' on '. $result['conditions']['university']; ?> you will pay:
					</p>
				</header>
				<div class ="recipe">
					<ul>
						<li>Dinner(if you eat outside 2x per week) <?php echo $result['dinner'];?> </li>
						<?php if (isset($result['course_price'])) :?><li>Course Price <?php echo $result['course_price'];?></li><?php endif;?>
						<li>Transport(per year) <?php echo $result['transport'];?></li>
						<li>Accomodation <?php echo $result['accomodation'];?></li>
					</ul>
					<div class="clearfix"></div>
					<hr>
					<h3 class="sum">
						Total : <?php echo $result['sum']; ?>
					</h3>
				</div>
			</article>

			<!-- Podobne miejsca -->

	</div>
	<div class="4u">
	
		<!-- Sidebar -->
			<section id="filtry" class="box">
				<a href="#" class="image featured filter_img"><img src="/img/mono_filter.png" alt=""/></a>
				<header>
					<h3>Filter</h3>
				</header>
				<ul>
					<?php foreach ($result['conditions'] as $condition):?>
						<li><?php echo $condition; ?></li>
					<?php endforeach; ?>
				</ul>
				<p></p>
				<footer>
					<a href="#" class="button alt">Filter</a>
				</footer>
			</section>
			<section class="box">
				<header>
					<h3>Feugiat consequat</h3>
				</header>
				<p>Veroeros sed amet blandit consequat veroeros lorem blandit adipiscing et feugiat sed lorem consequat feugiat lorem dolore.</p>
				<ul class="divided">
					<li><a href="#">Sed et blandit consequat sed</a></li>
					<li><a href="#">Hendrerit tortor vitae sapien dolore</a></li>
					<li><a href="#">Sapien id suscipit magna sed felis</a></li>
					<li><a href="#">Aptent taciti sociosqu ad litora</a></li>
				</ul>
				<footer>
					<a href="#" class="button alt">Ipsum consequat</a>
				</footer>
			</section>

	</div>
</div>