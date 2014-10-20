<style>

/*form styles*/
#msform {
	margin: 50px auto;
	text-align: center;
	position: relative;
}
#msform fieldset {
	background: white;
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding: 20px 30px;
	
	box-sizing: border-box;
	width: 80%;
	margin: 0 10%;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
	display: none;
}


<!-- Progress with steps -->

    ol.progtrckr {
        margin: 0;
        padding: 0;
        list-style-type none;
    }

    ol.progtrckr li {
        display: inline-block;
        text-align: center;
        line-height: 3em;
    }

    ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
    ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
    ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
    ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
    ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
    ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
    ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
    ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

    ol.progtrckr li.active {
        color: black;
        border-bottom: 4px solid #1979AD;
    }
    ol.progtrckr li {
        color: silver; 
        border-bottom: 4px solid silver;
    }

    ol.progtrckr li:after {
        content: "\00a0\00a0";
    }
    ol.progtrckr li:before {
        position: relative;
        bottom: -2.5em;
        float: left;
        left: 50%;
        line-height: 1em;
    }
    ol.progtrckr li:before {
        content: "-";
		color: white;
		background-color: silver;
		font-size: 1.5em;
		font-weight: bold;
		bottom: -1.5em;
		height: 1.2em;
		width: 1.2em;
		/* line-height: 1.2em; */
		border: none;
		border-radius: 1.2em;
    }
    ol.progtrckr li.active:before {
        content: "+";
        color: white;
        background-color: #1979AD;
        height: 1.2em;
        width: 1.2em;
        line-height: 1.2em;
        border: none;
        border-radius: 1.2em;
    }
    

</style>
<article class="box post">
<!-- 	<a href="#" class="image featured"><img src="/images/16.jpg" alt="" /></a>
	<header>
		<h2>Check your wallet!</h2>
		<p>Please fill out the form</p>
	</header> -->
	<ol id="progressbar" class="progtrckr" data-progtrckr-steps="5">
	    <li class="active">Location</li>
	    <li class="">Courses</li>
	    <li class="">Living</li>
	    <li class="">Accommodation</li>
	    <li class="">Transport</li>
	</ol> 

	<form action="/universities/form_result" id="msform" method="get">
	 	<!-- fieldsets -->
	 	<fieldset>
			<h2 class="fs-title">Fild of study</h2>
			<h3 class="fs-subtitle">Which is the most interesting for you?</h3>
			<?php echo $this->Form->input('Course_type_id', array(
													'options' => $ctype,

													'name' => 'course_type_id',

													'class' => 'form-control',

													'size' => 7, 

													'type' => 'select' ,

													'security' => false));
			echo $this->Form->input('Course', array('name' => 'course_id',

											'class' => 'form-control',

											'size' => 7, 

											'type' => 'select' ,

											'security' => false));?>
			<div class="clearfix"></div>
			<input id="" type="button" name="next" class="next action-button" value="Next" />
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Are you interested in studing in some particular place?</h2>
			<h3 class="fs-subtitle">Please select</h3>
			<?php 
			echo $this->Form->create();
			echo $this->Form->input('country_id', array('options' => $kraje_v,

													'name' => 'country_id',

													'class' => 'form-control',

													'size' => 7, 

													'type' => 'select' ,

													'security' => false));	
			echo $this->Form->input('miasto', array('class' => 'form-control',

												'name' => 'city_id',

												'size' => 7, 

												'type' => 'select' ,

												'security' => false));

			echo $this->Form->input('id', array('name' => 'university_id',

												'class' => 'form-control',

												'size' => 7, 

												'type' => 'select' ));?>
			<div class="clearfix"></div>
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input id="nextLiving" type="button" name="next" class="next action-button" value="Next" />
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Living</h2>
			<h3 class="fs-subtitle">Tell us about your live style</h3>
			<div id="Dining">
				<p>Usually you:</p>
				<input name="dining" value="out" type="radio" /><label>eat outside/order sth</label>
				<input name="dining" value="self" type="radio" /><label>prepare sth to eat by yourself</label>
				<input name="dining" value="both" type="radio" /><label>50/50</label>
			</div>
			<div id="Enterteinment">
				<p>You like going out:</p>
				<input name="Enterteinment" value="hardly" type="radio" /><label>No, I'm not going out very often</label>
				<input name="Enterteinment" value="1x" type="radio" /><label>once a week</label>
				<input name="Enterteinment" value="2x" type="radio" /><label>two times a week</label>
			</div>
			<div id="Sport">
				<p>What sports do you practice?</p>
				<input name="Sport" value="jogging" type="radio" /><label>jogging</label>
				<input name="Sport" value="gym" type="radio" /><label>gym</label>
				<input name="Sport" value="no" type="radio" /><label>neither</label>
			</div>
			<div class="clearfix"></div>
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="button" name="next" class="next action-button" value="Next" />
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Place to stay</h2>
			<h3 class="fs-subtitle">Were do you want to live?</h3>
			<div id="Accommodation">
				<input name="Accommodation" value="dormitory" type="radio" /><label>in dormitory if possible</label>
				<input name="Accommodation" value="shareroom" type="radio" /><label>rent the room with other students</label>
				<input name="Accommodation" value="ownroom" type="radio" /><label>rent my own room</label>
			</div>
			<div class="clearfix"></div>
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input id="nextTransport" type="button" name="next" class="next action-button" value="Next" />
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Transport</h2>
			<h3 class="fs-subtitle">How do you preffer to move around city?</h3>
			<div id="Transport"></div>
			<div class="clearfix"></div>
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="submit" class="submit action-button" value="Submit" />
		</fieldset>
	</form>
</article>



<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script>
	//jQuery time
	var current_fs, next_fs, previous_fs; //fieldsets
	var left, opacity, scale; //fieldset properties which we will animate
	var animating; //flag to prevent quick multi-click glitches

	$(".next").click(function(){
		if(animating) return false;
		animating = true;
		
		current_fs = $(this).parent();
		next_fs = $(this).parent().next();
		
		//activate next step on progressbar using the index of next_fs
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		
		//show the next fieldset
		next_fs.show(); 

		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'transform': 'scale('+scale+')'});
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
			duration: 0, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	});

	$(".previous").click(function(){
		if(animating) return false;
		animating = true;
		
		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();
		
		//de-activate current step on progressbar
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
		
		//show the previous fieldset
		previous_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale previous_fs from 80% to 100%
				scale = 0.8 + (1 - now) * 0.2;
				//2. take current_fs to the right(50%) - from 0%
				left = ((1-now) * 50)+"%";
				//3. increase opacity of previous_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'left': left});
				previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
			}, 
			duration: 0, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	});

</script>
<?php
//lokalizacja
$this->Js->get('#UniversityCountryId')->event('change', 

	$this->Js->request(array(

		'controller'=>'Universities',

		'action'=>'getByKraj'

		), array(

			'update'=>'#UniversityMiasto',

			'async' => true,

			'method' => 'post',

			'dataExpression'=>true,

			'data'=> $this->Js->serializeForm(array(

				'isForm' => false,

				'inline' => true

				))

		))

	);

$this->Js->get('#UniversityMiasto')->event('click', 

	$this->Js->request(array(

		'controller'=>'Universities',

		'action'=>'getByMiasto'

		), array(

			'update'=>'#UniversityId',

			'async' => true,

			'method' => 'post',

			'dataExpression'=>true,

			'data'=> $this->Js->serializeForm(array(

				'isForm' => false,

				'inline' => true

				))

		))

	);

/*$this->Js->get('#nextCourse')->event('click', 

	$this->Js->request(array(

		'controller'=>'Universities',

		'action'=>'getCourseType'

		), array(

			'update'=>'#UniversityCourseTypeId',

			'async' => true,

			'method' => 'post',

			'dataExpression'=>true,

			'data'=> $this->Js->serializeForm(array(

				'isForm' => false,

				'inline' => true

				))

		))

	);*/
	
$this->Js->get('#Course_type_id')->event('click', 

	$this->Js->request(array(

		'controller'=>'Universities',

		'action'=>'getCourse'

		), array(

			'update'=>'#Course',

			'async' => true,

			'method' => 'post',

			'dataExpression'=>true,

			'data'=> $this->Js->serializeForm(array(

				'isForm' => false,

				'inline' => true

				))

		))

	);

	$this->Js->get('#nextTransport')->event('click', 

		$this->Js->request(array(

			'controller'=>'Universities',

			'action'=>'getTransport',

			), array(

				'update'=>'#Transport',

				'async' => true,

				'method' => 'post',

				'dataExpression'=>true,

				'data'=> $this->Js->serializeForm(array(

					'isForm' => false,

					'inline' => true

				))

		))

	);
?>