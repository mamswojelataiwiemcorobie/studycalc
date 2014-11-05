<?php 
	$universities = $this->requestAction(array(

													 'controller' => 'universities',

													 'action' => 'home_slider'));
	foreach ($universities as $university) :
?>
	<li>
		<div class="boxcontainer">
			<div class="wrap"><img src="img/uczelnie_min/<?php echo $university['University']['photo']; ?>" alt="Logo" /></div>
			<div class="roll">
				<div class="wrapcaption">
					<a href="<?php echo "universities/university_result/". $university['University']['id']. "/". $slug=Inflector::slug($university['University']['nazwa'],'-');?>">
					<i class="icon-link captionicons"></i></a>
				</div>
			</div>
			<h1></h1>
			<p>
				<a href="<?php echo "universities/university_result/". $university['University']['id']. "/". $slug=Inflector::slug($university['University']['nazwa'],'-');?>">
					<?php echo $university['University']['nazwa'];?>
				</a>
			
			</p>
			   <?php //echo $universities[$t1]['University']['university_type_id'];?> 
		</div>
	</li>
<?php endforeach;?>