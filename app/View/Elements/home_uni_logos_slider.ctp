<?php 


	$universities = $this->requestAction(array(
												 'controller' => 'universities',
												 'action' => 'home_slider')); 
	$dt_recs = $this->requestAction(array(
												 'controller' => 'universities',
												 'action' => 'home_slider'));
	$il=0;
//znaleźć szybsza metode	
	foreach ($dt_recs as $d){
		$il++;
	} 
	$il=$il-1;
	$t=array();
	for ($i = 1; $i <= 20; $i++) {
		$nr = rand(0,$il);
		if (in_array($nr, $t)) {
			$i = $i - 1;
		}else{
			array_push($t,$nr);
		}
	}
	//print_r($t); 
	foreach($t as $t1){
	//for ($t1 = 0; $t1 <= $il; $t1i++) {
	if ($t1 != "189" && $t1 != "207" && $t1 != "430" && $t1 != "432"){

		$foto= $universities[$t1]['University']['photo'];
		$newfoto= substr($foto, 0, -4).".png";
?>
		<li>
			<div class="boxcontainer">
				<img src="img/uczelnie_min/<?php echo $newfoto; ?>" alt="" />
				<div class="roll">
					<div class="wrapcaption">
						<a href="<?php echo "universities/university_result/". $universities[$t1]['University']['id']. "/". $slug=Inflector::slug($universities[$t1]['University']['nazwa'],'-');?>">
						<i class="icon-link captionicons"></i></a>
					</div>
				</div>
				<h1></h1>
				<p>
					<a href="<?php echo "universities/university_result/". $universities[$t1]['University']['id']. "/". $slug=Inflector::slug($universities[$t1]['University']['nazwa'],'-');?>">
						<?php echo $universities[$t1]['University']['nazwa'];?>
					</a>
				
				</p>
				   <?php //echo $universities[$t1]['University']['university_type_id'];?> 
			</div>
		</li>
	<?php }} ?>