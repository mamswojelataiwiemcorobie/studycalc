<?php
class Basket extends AppModel {
	public $actsAs = array('Linkable','Containable');
	public $belongsTo = 'BasketType';
	public $displayField = 'name';
	public $hasMany = array( 'BasketinCountry');
	
}