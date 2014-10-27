<div id="form_result" class="row">
	<div class="8u">							
		<!-- Content -->
			<article class="box post">
				<header>
					<h2>Summary</h2>
					<p>
						If you choose to study in <?php if (isset($result['conditions']['city'])) echo $result['conditions']['city']; ?><?php if (isset($result['conditions']['country']['name'])) echo ', '. $result['conditions']['country']['name']; ?> - <?php if (isset($result['conditions']['course'])) echo $result['conditions']['course']; ?><?php if (isset($result['conditions']['university'])) echo ' on '. $result['conditions']['university']; ?> you will pay:
					</p>
				</header>
				<div class ="recipe">
					<ul>
						<h3>Per year</h3>
						<li>
							Dinner(if you eat outside 2x per week) <span><?php echo $result['dinner'];?></span></li>
						<?php if (isset($result['course_price'])) :?><li>Course Price <span><?php echo $result['course_price'];?></span></li><?php endif;?>
						<li>Transport(per year) <span><?php echo $result['transport'];?></span></li>
						<li>Accomodation <span><?php echo $result['accomodation'];?></span></li>
						<li>Entertainment(<?php if(isset($result['conditions']['Enterteinment'])) : 
													if ($result['conditions']['Enterteinment'] == 'hardly'):?>if you hardly ever go out 
												<?php elseif ($result['conditions']['Enterteinment'] == '2x'):?> if you go out twice a week <?php endif;?>
											<?php else :?> if you go out once a week<?php endif;?>) <span><?php echo $result['entertainment'];?></span>
						</li>
						<?php if (isset($result['scholarship'])) :?><li>Scholarship <span><?php echo $result['scholarship'];?></span></li><?php endif;?>
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

												<a href="/universities/university_result/<?php echo $university['University']['id'].'/'. $slug; ?>"></a>

												<i class="icon-link captionicons"></i></a>

											</div>

										</div>

										<h1></h1>
										
										<a href="/universities/university_result/<?php echo $university['University']['id'].'/'. $slug; ?>"><?php echo $university['University']['nazwa']; ?></a>

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
			<section id="filtry" class="box filters">
				<a href="#" class="image featured filter_img"><img src="/img/mono_filter.png" alt=""/></a>
				<!-- <header>
					<h3>Filter</h3>
				</header> -->
				<form>
				<?php $current_url = $_SERVER["REQUEST_URI"];?>
					<fieldset>
						<h3>Country</h3>
						<ul>
						<?php //foreach ($cities as $city):?>
						 	<li>
								<input type="checkbox" name="city_id" value="<?php //echo $city['City']['id']; ?>">
								<label for="city_id"><a class="param-toggle <?php //if (isset($city['City']['selected'])) echo 'checked'; ?>" href="<?php //echo $current_url. '&city_id='. $city['City']['id']; ?>"><span><?php echo $result['conditions']['country']['name']; ?></span></a></label>
							</li>
						<?php //endforeach; ?>
						</ul>
					</fieldset>
					<?php if (isset($cities)) : ?>
					<fieldset>
						<h3>City</h3>
						<ul>
							<?php foreach ($cities as $city):?>
						 	<li>
								<input type="checkbox" name="city_id" value="<?php echo $city['City']['id']; ?>">
								<label for="city_id"><a class="param-toggle <?php if (isset($city['City']['selected'])) echo 'checked'; ?>" href="<?php echo $current_url. '&city_id='. $city['City']['id']; ?>"><span><?php echo $city['City']['nazwa']; ?></span></a></label>
							</li>
						<?php endforeach; ?>
						</ul>
					</fieldset>
					<?php endif; ?>
					<?php if (isset($scholarships)) : ?>
					<fieldset>
						<h3>Scholarship</h3>
						<p>Do you think you have a chance for one?</p>
						<ul>
							<?php foreach ($scholarships as $scholarship):?>
						 	<li>
								<input type="checkbox" name="city_id" value="<?php echo $scholarship['Scholarship']['id']; ?>">
								<label for="city_id"><a class="param-toggle <?php if (isset($scholarship['Scholarship']['selected'])) : echo 'checked'; ?>" href="<?php 
								$pattern = '/&scholarship_id='. $scholarship['Scholarship']['id'] . '/';
								echo preg_replace($pattern, ' ',$current_url); else :?>" href="<?php echo $current_url. '&scholarship_id='. $scholarship['Scholarship']['id']; endif; ?>"><span><?php echo $scholarship['Scholarship']['name']; ?></span></a></label>
							</li>
						<?php endforeach; ?>
						</ul>
					</fieldset>
					<?php endif; ?>
				</form>
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