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
						<h3>Per year</h3>
						<li>Dinner(if you eat outside 2x per week) <?php echo $result['dinner'];?> </li>
						<?php if (isset($result['course_price'])) :?><li>Course Price <?php echo $result['course_price'];?></li><?php endif;?>
						<li>Transport(per year) <?php echo $result['transport'];?></li>
						<li>Accomodation <?php echo $result['accomodation'];?></li>
						<li>Entertainment(<?php if(isset($result['conditions']['Enterteinment'])) : 
													if ($result['conditions']['Enterteinment'] == 'hardly'):?>if you hardly ever go out 
												<?php elseif ($result['conditions']['Enterteinment'] == '2x'):?> if you go out twice a week <?php endif;?>
											<?php else :?> if you go out once a week<?php endif;?>) <?php echo $result['entertainment'];?>
						</li>
					</ul>
					<div class="clearfix"></div>
					<hr>
					<h3 class="sum">
						Total : <?php echo $result['sum']; ?>
					</h3>
				</div>
			</article>

			<!-- Podobne miejsca -->
			<?php if(isset($uczelnie)) : ?>
			<div id="uni_near" clss="caruosel">
				<h3>Universities similar to your search</h3>
				<section class=" recent-projects-home topspace30 animated fadeInUpNow notransition">

					<div class="text-center smalltitle"></div>	

					<div class="col-md-12">

						<div id="carousel" class="list_carousel text-center">

							<div class="carousel_nav">

								<a class="prev" id="car_prev" href="#"><span>prev</span></a>
								<a class="next" id="car_next" href="#"><span>next</span></a>

							</div>

							<div class="clearfix"></div>

							<ul id="carousel-projects">
							<?php 
								$i = 0;

								foreach ($uczelnie as $university) :

										$slug = Inflector::slug($university['University']['nazwa'],'-');

										$foto = $university['University']['photo'];

										$foto = substr($foto, 0, -4).".png";

										$i = $i+1;
								?>

								<li class="li_">
									<div class="boxcontainer" style="height:270px">

										<?php echo $this->Html->image('uczelnie_min/'.$foto, array('fullBase' => true)); ?>

										<div class="roll">

											<div class="wrapcaption">

												<a href="/universities/university_result/<?php echo $university['University']['nazwa']; ?>"></a>

												<i class="icon-link captionicons"></i></a>

											</div>

										</div>

										<h1></h1>
										
										<a href="/universities/university_result/<?php echo $university['University']['nazwa']; ?>"><?php echo $university['University']['nazwa']; ?></a>

									</div>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</section>				
			</div>
		<?php endif; ?>
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