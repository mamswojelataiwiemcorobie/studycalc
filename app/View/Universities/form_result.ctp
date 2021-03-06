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
						<li>Sport <span><?php echo $result['sport'];?></span></li>
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
								foreach ($uczelnie as $university) :

										$slug = Inflector::slug($university['University']['nazwa'],'-');
								?>

								<li class="li_">
									<div class="boxcontainer" style="height:270px">

										<div class="wrap"><img src="/img/uczelnie_min/<?php echo $university['University']['photo']; ?>" alt="Logo" /></div>

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
				<?php $current_url = $_SERVER["REQUEST_URI"];
					$query= $this->request->query;
					$params ='';
					if (isset($query['transport'])) {
						$params .= '&transport=' .$query['transport'];
					} 
					if (isset($query['Accomodation'])) {
						$params .= '&Accomodation=' .$query['Accomodation']; 
					}
					if (isset($query['Sport'])) {
						$params .= '&Sport=' .$query['Sport']; 
					} 
					if (isset($query['Entertainment'])) {
						$params .= '&Entertainment=' .$query['Entertainment']; 
					} 
					if (isset($query['dinig'])) {
						$params .= '&dinig=' .$query['dinig']; 
					}
				?>
					<fieldset>
						<h3>Country</h3>
						<ul>
						<?php foreach ($countries as $id => $country):?>
						 	<li>
								<input type="checkbox" name="country_id" value="<?php echo $id; ?>">
								<label for="country_id"><a class="param-toggle <?php if ($result['conditions']['country'] == $country) : echo 'checked'; ?>" href="/
									<?php else : ?>" href="<?php echo '/universities/form_result?country_id='. $id. $params;	endif; ?>">
									<span><?php echo $country; ?></span></a></label>
							</li>
						<?php endforeach; ?>
						</ul>
					</fieldset>
					<?php if (isset($cities)) : ?>
					<fieldset>
						<h3>City</h3>
						<ul>
							<?php foreach ($cities as $city):?>
						 	<li>
								<input type="checkbox" name="city_id" value="<?php echo $city['City']['id']; ?>">
								<label for="city_id"><a class="param-toggle <?php if (isset($city['City']['selected'])) : echo 'checked'; ?>" href="<?php 
									$pattern = '/&city_id='. $city['City']['id'] . '/';
									echo preg_replace($pattern, '',$current_url); 
									else : ?>" href="<?php $pattern = '/&city_id=\d+/'; $sub = '&city_id='. $city['City']['id'];
										$pg= preg_replace($pattern, $sub,$current_url);
										if ($pg ==  $current_url) {
											echo $current_url.'&city_id='. $city['City']['id'];
										} else  {
											echo $pg;
										}

								endif; ?>"><span><?php echo $city['City']['nazwa']; ?>
								</span></a></label>
							</li>
						<?php endforeach; ?>
						</ul>
					</fieldset>
					<?php endif; ?>
					<?php if (isset($result['conditions']['transport'])) : ?>
					<fieldset>
						<h3>Transport</h3>
						<ul>
							
						 	<li>
								<input type="checkbox" name="city_id" value="<?php echo $city['City']['id']; ?>">
								<label for="city_id"><a class="param-toggle <?php if (isset($result['conditions']['transport'] )) : echo 'checked'; ?>" href="<?php 
									$pattern = '/&transport=\w+/';
									echo preg_replace($pattern, '',$current_url); 
								endif; ?>"><span><?php echo $result['conditions']['transport'] ; ?>
								</span></a></label>
							</li>

						</ul>
					</fieldset>
					<?php endif; ?>
					<?php if (isset($result['conditions']['Sport'])) : ?>
					<fieldset>
						<h3>Sport</h3>
						<ul>							
						 	<li>
								<input type="checkbox" name="Sport" value="<?php echo $result['conditions']['Sport']; ?>">
								<label for="city_id"><a class="param-toggle <?php if (isset($result['conditions']['Sport'] )) : echo 'checked'; ?>" href="<?php 
									$pattern = '/&Sport=\w+/';
									echo preg_replace($pattern, '',$current_url); 
								endif; ?>"><span><?php echo $result['conditions']['Sport'] ; ?>
								</span></a></label>
							</li>

						</ul>
					</fieldset>
					<?php endif; ?>
					<?php if (isset($result['conditions']['accomodation'])) : ?>
					<fieldset>
						<h3>Accomodation</h3>
						<ul>							
						 	<li>
								<input type="checkbox" name="accomodation" value="<?php echo $result['conditions']['accomodation']; ?>">
								<label for="city_id"><a class="param-toggle <?php if (isset($result['conditions']['accomodation'] )) : echo 'checked'; ?>" href="<?php 
									$pattern = '/&Accomodation=\w+/';
									echo preg_replace($pattern, '',$current_url); 
								endif; ?>"><span><?php echo $result['conditions']['accomodation'] ; ?>
								</span></a></label>
							</li>

						</ul>
					</fieldset>
					<?php endif; ?>
					<?php if (isset($scholarships)) : ?>
					<!-- <fieldset>
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
					</fieldset> -->
					<?php endif; ?>
				</form>
				<footer>
					<a href="#" class="button alt">Filter</a>
				</footer>
			</section>
	</div>
</div>
<?php unset($result); ?>