<?php
class StypendiumType extends AppModel {
	public $hasMany = 'Scholarship';
	public $displayField = 'name';
}