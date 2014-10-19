<?php
class BasketType extends AppModel {
	public $hasMany = 'Basket';
	public $displayField = 'name';
}