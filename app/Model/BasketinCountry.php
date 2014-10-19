<?php
class BasketinCountry extends AppModel {
	public $belongsTo = array('Basket', 'Country');
	public $actsAs = array('Containable');
}