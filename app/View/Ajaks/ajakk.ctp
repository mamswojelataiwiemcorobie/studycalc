<style type="text/css">
	#ucz_{
		padding-left: 25;
	}
	#list_{
		padding-left: 25;
	}
	#lista_erazmusy{
		clear:both !important;
	}
	a.prev, a.next {
		display: block !important;
		float: left !important;
		margin-left: 3px !important;
	}
</style>
<div id="lista_erasmusy">
	<?php if (!isset($this->request->data['Ajak']['kraj'])):?>
		<?php echo $uczelnie_erasmus; ?>
	<?php endif;?>
	<?php if (isset($this->request->data['Ajak']['kraj'])):?>
	<h2 style="clear: both;">Uczelnia Zagraniczna:</h2>
		<div id="ucz_">
			<h4> Kraj: <?php echo $this->request->data['Ajak']['kraj']; ?></h4>

			<?php if (isset($this->request->data['Ajak']['miasto'])):?>
				<h4> Miasto: <?php echo $this->request->data['Ajak']['miasto']; ?></h4>

				<?php 	if (isset($this->request->data['Ajak']['uczelnia'])) :?>
					<h4> Uczelnia: 
					<?php 
						$name = $this->request->data['Ajak']['uczelnia'];
						echo '<a href="'.$url.'">'.$name.'</a>';
					?>
					</h4>
					<!--
					<ul class="icons handlist">
						<li>
							<b>
							<?php 
								$slug = Inflector::slug($this->request->data['Ajak']['uczelnia'],'-');
								$idd = $uczelnie_erasmus[0]['Ajak']['id'];


								/*
								pr($this->data['submit']);

								pr($this->request->data);
								pr($_POST);
								pr($this->request);
								pr($this->params);
								pr($this->data);
								*/

								echo $this->Html->link($this->request->data['Ajak']['uczelnia'],
									array( 'controller' => 'Ajaks',
										  'action' => 'view',
										  'id' => $idd,
										  'slug'=>$slug
									)); 
							?>
							</b>
							<?php 
							/*
								echo 'www ';
								echo $this->Html->link('erasmus','http://www.erasmus.org.pl/',
									array('class' => 'button', 'target' => '_blank','style' => 'color:#39c;')); 
							*/
							?>
						</li>
					</ul>
					-->
				<?php endif;?>
			
		<?php endif;?>
		</div>
		<h2>Lista uczelni które mają podpisane umowy w ramach programu Erasmus:</h2>
			<div id="list_">
				<ul id="uczelnie_lista" class="icons arrowlist">

					<?php /*
						//pr($uczelnie_erasmus);
						$uni_list = array();
						foreach ($uczelnie_erasmus as $u){
							$uni = $u['University']['id'];
							if (in_array($uni, $uni_list)){
							
							}else{
								array_push($uni_list, $uni);
					//?>
						<li>
							<?php $slug = Inflector::slug($u['University']['nazwa'],'-');?>
							<?php 
								echo $this->Html->link($u['University']['nazwa'],
									   array( 'controller' => 'universities',
											  'action' => 'view',
											  'id' => $u['University']['id'],
											  'slug'=>$slug
									   )); 
							}
							?>
						</li>
					//<?php  
						}
						//pr($uni_list);
					*/ ?>
				</ul>
			</div>
	<?php endif ?>
</div>


<section class=" recent-projects-home topspace30 animated fadeInUpNow notransition">
	<div class="text-center smalltitle">
	</div>	
	<div class="col-md-12">
		<div id="carousel" class="list_carousel text-center">
			<div class="carousel_nav">
				<a class="prev" id="car_prev" href="#"><span>prev</span></a>
				<a class="next" id="car_next" href="#"><span>next</span></a>
			</div>
			<div class="clearfix">
			</div>
			<ul id="carousel-projects">
<?php 
	$i = 0;
	$uni_list = array();
		foreach ($uczelnie_erasmus as $university){
			$uni = $university['University']['id'];
			if (in_array($uni, $uni_list)){
			
			}else{
				array_push($uni_list, $uni);


		$university= $university['University'];
		$slug = Inflector::slug($university['nazwa'],'-');
		$foto = $university['photo'];
		$foto = substr($foto, 0, -4).".png";
		$i = $i+1;
?>
				<li class="li_">
					<div class="boxcontainer" style="height:270px">
						<?php echo $this->Html->image('uczelnie_min/'.$foto, array('fullBase' => true)); ?>
						<div class="roll">
							<div class="wrapcaption">
								<?php echo $this->Html->link("", '/uczelnia/'.$slug.'-'.$university['id'] ); ?>
								<i class="icon-link captionicons"></i></a>
							</div>
						</div>
						<h1></h1>
							<?php echo $this->Html->link( $university['nazwa'], '/uczelnia/'.$slug.'-'.$university['id'] ); ?>
					</div>
				</li>
<?php
	}}
	if ($i<4){ 
		echo '  <style type="text/css">
					.li_{
						width: 24% !important;
					}
				</style>';
	}
?>
			</ul>
		</div>
	</div>
</section>















