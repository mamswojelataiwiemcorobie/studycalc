<?php
class StypendiumType extends AppModel {
	public $hasMany = 'University';
	public $displayField = 'name';
}