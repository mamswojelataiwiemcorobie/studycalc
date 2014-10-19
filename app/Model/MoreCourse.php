<?php
class MoreCourse extends AppModel {
	public $actsAs = array('Linkable','Containable');
	public $belongsTo = 'Course';
	public $displayField = 'name';
	/*public $hasAndBelongsToMany = array(
        'Profession' =>
            array(
                'className' => 'Profession',
                'joinTable' => 'professions_courses',
                'foreignKey' => 'course_id',
                'associationForeignKey' => 'profession_id',
                'unique' => true,
            )
    );
	public $hasMany = array( 'CourseonUniversity');*/
	
	/*public function srednia($course_id) {
		/*wartosci wspólczynników wp-placa*/
		$wp=5;
		$sum = $wp;
		$course = $this->findById($course_id);	
			$c=array();
			$srednias=0;
			foreach ($course['Profession'] as $profession) array_push($c,$profession['placa']);
			if (count($c)>0) {
				$srednias= array_sum($c)/count(array_filter($c));
				$sr=($srednias/1000)*$wp;
				$srednia= $sr/ $sum;
			}
		return $srednia;
	}*/
}