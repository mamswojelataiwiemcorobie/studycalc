<?php
class Scholarship extends AppModel {
	public $actsAs = array('Containable',
	);
	public $belongsTo = array('StypendiumType', 'University');
	public $displayField = 'name';

}