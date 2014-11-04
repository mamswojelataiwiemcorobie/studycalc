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
						<li>Dinner (if you eat outside 2x per week) <?php echo $result['dinner'];?> </li>
						<?php if (isset($result['course_price'])) :?><li>Course Price <?php echo $result['course_price'];?></li><?php endif;?>
						<li>Transport <?php echo $result['transport'];?></li>
						<li>Accomodation <?php echo $result['accomodation'];?></li>
						<li>Entertainment(if you go out once a week) <?php echo $result['entertainment'];?></li>
						<li>Basic things to live for a week</li>
					</ul>
					<div class="clearfix"></div>
					<hr>
					<h3 class="sum">
						Total : <?php echo $result['sum']; ?>
					</h3>
				</div>
			</article>

			<!-- Podobne miejsca -->
			<div id="uni_near" clss="caruosel">
				<h3>Universities near <?php echo $result['conditions']['city']; ?></h3>
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

												<a href="/universities/university_result/<?php echo $slug; ?>"></a>

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
	</div>
	<div class="4u">
			<section id="filtry" class="box filters">
				<a href="#" class="image featured filter_img"><img src="/img/mono_filter.png" alt=""/></a>
				<!-- <header>
					<h3>Filter</h3>
				</header> -->
				<form>
					<fieldset>
						<h3>Country</h3>
						<ul>
						<?php //foreach ($cities as $city):?>
						 	<li>
								<input type="checkbox" name="city_id" value="<?php //echo $city['City']['id']; ?>">
								<label for="city_id"><a class="param-toggle <?php //if (isset($city['City']['selected'])) echo 'checked'; ?>" href="<?php //echo $current_url. '&city_id='. $city['City']['id']; ?>"><span><?php echo $result['conditions']['country']; ?></span></a></label>
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
								<label for="city_id"><a class="param-toggle <?php if (isset($city['City']['selected'])) echo 'checked'; ?>" href="<?php echo $url. '&city_id='. $city['City']['id']; ?>"><span><?php echo $city['City']['nazwa']; ?></span></a></label>
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
								echo preg_replace($pattern, ' ',$url); else :?>" href="<?php echo $url. '&scholarship_id='. $scholarship['Scholarship']['id']; endif; ?>"><span><?php echo $scholarship['Scholarship']['name']; ?></span></a></label>
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
	</div>
</div>