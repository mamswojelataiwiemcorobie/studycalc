<?php
class Country extends AppModel {
	public $hasMany = 'University, City';
	public $displayField = 'name';
}