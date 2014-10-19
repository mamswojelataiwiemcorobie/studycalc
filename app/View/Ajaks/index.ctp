<style type="text/css">
	.buttoncolor{
		float: right;
	}
</style>
<div id="erasmus">
<?php echo $this->html->link('Original', '#', 
                array('onclick'=>'return false;', 'id'=>'remanufactured-link', 'class'=>'get-type-product-link')); ?>   


<?php

echo $this->Js->link(
    'Original',
    '#',
    array('async' => true,
          'update' => 'content',
                  'id' => 'remanufactured-link'
        )
);
?>
<div id="content">
</div>
	<!--<h1 id='sss'>Gdzie na Erasmusa?</h1>-->

	<?php
	//echo $this->Session->flash();

		echo $this->Form->create();
		echo $this->Form->input('kraj', array(	'options' => $kraje_v,
												'class' => 'form-control',
												'size' => 7, 
												'type' => 'select' ,
												'security' => false));
		echo $this->Form->input('miasto', array('class' => 'form-control',
												'size' => 7, 
												'type' => 'select' ,
												'security' => false));
		echo $this->Form->input('uczelnia', array('class' => 'form-control',
												'size' => 7, 
												'type' => 'select' ));
		echo $this->Form->submit('szukaj', array('div'=>true, 'name'=>'submit', 'class' => 'buttoncolor'));
	
		echo $this->element('ajakk', array("uczelnie_erasmus" => $uczelnie_erasmus));

		

		echo $this->Form->end(); 
	?>
</div>
<?php
$this->Js->get('#AjakKraj')->event('change', 
	$this->Js->request(array(
		'controller'=>'Ajaks',
		'action'=>'getByKraj'
		), array(
			'update'=>'#AjakMiasto',
			'async' => true,
			'method' => 'post',
			'dataExpression'=>true,
			'data'=> $this->Js->serializeForm(array(
				'isForm' => true,
				'inline' => true
				))
		))
	);
$this->Js->get('#AjakMiasto')->event('click', 
	$this->Js->request(
		array(
			'controller'=>'Ajaks',
			'action'=>'getByMiasto'
		), array(
			'update'=>'#AjakUczelnia',
			'async' => true,
			'method' => 'post',
			'dataExpression'=>true,
			'data'=> $this->Js->serializeForm(array(
				'isForm' => true,
				'inline' => true
				))
		))
	);
$this->Js->get('#AjakIndexForm')->event(
          'submit',
          $this->Js->request(
            array(
            	'controller'=>'Ajaks',
            	'action' => 'uczelnie_erasmus'),
            array(
                    'update' => '#lista_erasmusy',
                    'data'=> $this->Js->serializeForm(array(
				'isForm' => true,
				'inline' => true
				)),
                    'async' => true,    
                    'dataExpression'=>true,
                    'method' => 'POST'
                )
            )
        );

?>
<?php
	pr($this->request->data);
	//pr($this->Js->writeBuffer());
?>