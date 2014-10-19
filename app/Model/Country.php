<?php
class Country extends AppModel {
	public $actsAs = array('Linkable','Containable');
	public $hasMany = array('University', 'City', 'BasketinCountry');
	public $displayField = 'name';
}