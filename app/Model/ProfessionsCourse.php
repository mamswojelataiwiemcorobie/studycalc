<?php
class ProfessionsCourse extends AppModel {
    public $belongsTo = array('Profession','Course');
	public function sredniazapisz($course_id) {
		/*wartosci wspólczynników wp-placa*/
		$wp=5;
		$sum = $wp;
		$course = $this->findById($course_id);	
		Debugger::dump($course);
			$c=array();
			$srednias=0;
			foreach ($course['Profession'] as $profession) array_push($c,$profession['placa']);
			if (count($c)>0) {
				$srednias= array_sum($c)/count(array_filter($c));
				$sr=($srednias/1000)*$wp;
				$srednia= $sr/ $sum;
			}
		return $srednia;
	}
}