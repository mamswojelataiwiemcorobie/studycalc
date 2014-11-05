<?php
App::uses('Controller', 'Controller');

class UniversitiesController extends AppController {
	public $components = array('DataTable');

	public function index() {
	
		$this->set('title_for_layout', 'Ranking uniwersytetów');
		$this->set('description_for_layout', 'Ranking uniwersytetów. Najlepsze szkoły wyższe.');
		$this->set('keywords_for_layout', 'uniwersytety, szkoły, ranking');
		$this->set('tabele', true);
		
		if($this->RequestHandler->responseType() == 'json') {
			$this->paginate = array(
				'order' => array('University.rank' => 'asc'),//'order' => array('University.srednia' => 'desc'),
				'contain' => array('City', 'UniversityType'),
				'fields' => array(  'University.rank',
									'University.photo',
									'University.nazwa',
									'University.publiczna',
									'City.nazwa',
									'UniversityType.nazwa',
									'University.srednia',
									'University.id',
									'University.all_courses_names'),
			);
			$this->DataTable->emptyElements = 1;
			$this->set('universities', $this->DataTable->getResponse());
			$this->set('_serialize','universities');
		}
	}
	
	public function view($id = null) {
		if (empty($this->request->data)) {
			if (!$id) {
				throw new NotFoundException(__('Invalid post'));
			}
			$this->University->contain('City', 'UniversityType', 'UniversitiesParameter', 'Exchange');
			$university = $this->University->findById($id);
			//Debugger::dump($university);
			if (!$university) {
				throw new NotFoundException(__('Invalid post'));
			}
			$this->University->CourseonUniversity->contain('Course');
			$db = $this->University->CourseonUniversity->find('all', 
				array('fields'=>array('Course.id','Course.nazwa', 'Course.courses_type_id'), 
					'order' => array('Course.courses_type_id'), 
					'group' => array('Course.id'), 
					'conditions' => array('CourseonUniversity.university_id' => $id)
				));
			foreach ($db as $d) {
				switch ($d['Course']['courses_type_id']) {
					case 1:
						$typ='Artystyczne'; break;
					case 2:
						$typ='Ekonomiczne'; break;
					case 3:
						$typ='Humanistyczne'; break;
					case 4:
						$typ='Przyrodnicze'; break;
					case 5:
						$typ='Techniczne'; break;
					case 6:
						$typ='Inne'; break;
					case 7:
						$typ='Filologiczne'; break;
					default:
						$typ = ''; break;
				}
				$kursy[$d['Course']['courses_type_id']]['nazwa_typ']= $typ;
				$kursy[$d['Course']['courses_type_id']][$d['Course']['id']]['id']= $d['Course']['id'];
				$kursy[$d['Course']['courses_type_id']][$d['Course']['id']]['nazwa']= $d['Course']['nazwa'];
				//Debugger::dump($d['Course']['courses_type_id']);
			}
			
			$this->University->contain('City', 'UniversityType', 'UniversitiesParameter', 'Exchange');
			$university2 = $this->University->find('first', array(
							'conditions' =>	array('University.id !=' => $university['University']['id'],
												'University.university_type_id' => $university['University']['university_type_id']))
							);
			$db2 = $this->University->CourseonUniversity->find('all', array('fields'=>array('Course.id','Course.nazwa', 'Course.courses_type_id'), 'order' => array('Course.courses_type_id'), 'group' => array('Course.id'), 'conditions' => array('CourseonUniversity.university_id' => $university2['University']['id'])));
			foreach ($db2 as $d2) {
				switch ($d2['Course']['courses_type_id']) {
					case 1:
						$typ='Artystyczne'; break;
					case 2:
						$typ='Ekonomiczne'; break;
					case 3:
						$typ='Humanistyczne'; break;
					case 4:
						$typ='Przyrodnicze'; break;
					case 5:
						$typ='Techniczne'; break;
					case 6:
						$typ='Inne'; break;
					case 7:
						$typ='Filologiczne'; break;
					default:
						$typ = 'Różne'; break;
				}
				$kursy2[$d2['Course']['courses_type_id']]['nazwa_typ']= $typ;
				$kursy2[$d2['Course']['courses_type_id']][$d2['Course']['id']]['id']= $d2['Course']['id'];
				$kursy2[$d2['Course']['courses_type_id']][$d2['Course']['id']]['nazwa']= $d2['Course']['nazwa'];
				//Debugger::dump($d['Course']['courses_type_id']);
			}
			
		} else {
			if(empty($this->request->data['University'])){
				
			}else{
				$dane= $this->request->data;
				$id = $dane['University']['id'];
				$id2 = $dane['University']['id2'];
				
				if (!$id) {
					throw new NotFoundException(__('Invalid post'));
				}
				$this->University->contain('City', 'UniversityType', 'UniversitiesParameter', 'Exchange');
				$university = $this->University->findById($id);
				if (!$university) {
					throw new NotFoundException(__('Invalid post'));
				}
				$this->University->CourseonUniversity->contain('Course');
				$db = $this->University->CourseonUniversity->find('all', array('fields'=>array('Course.id','Course.nazwa', 'Course.courses_type_id'), 'order' => array('Course.courses_type_id'), 'group' => array('Course.id'), 'conditions' => array('CourseonUniversity.university_id' => $id)));
				foreach ($db as $d) {
					switch ($d['Course']['courses_type_id']) {
						case 1:
							$typ='Artystyczne'; break;
						case 2:
							$typ='Ekonomiczne'; break;
						case 3:
							$typ='Humanistyczne'; break;
						case 4:
							$typ='Przyrodnicze'; break;
						case 5:
							$typ='Techniczne'; break;
						case 6:
							$typ='Inne'; break;
						case 7:
							$typ='Filologiczne'; break;
						default:
							$typ = ''; break;
					}
					$kursy[$d['Course']['courses_type_id']]['nazwa_typ']= $typ;
					$kursy[$d['Course']['courses_type_id']][$d['Course']['id']]['id']= $d['Course']['id'];
					$kursy[$d['Course']['courses_type_id']][$d['Course']['id']]['nazwa']= $d['Course']['nazwa'];
					//Debugger::dump($d['Course']['courses_type_id']);
				}
				if (!$id2) {
					throw new NotFoundException(__('Invalid post'));
				}
				$this->University->contain('City', 'UniversityType', 'UniversitiesParameter', 'Exchange');
				$university2 = $this->University->findById($id2);
				//Debugger::dump($university2);
				$db2 = $this->University->CourseonUniversity->find('all', array('fields'=>array('Course.id','Course.nazwa', 'Course.courses_type_id'), 'order' => array('Course.courses_type_id'), 'group' => array('Course.id'), 'conditions' => array('CourseonUniversity.university_id' => $id2)));
				foreach ($db2 as $d2) {
					switch ($d2['Course']['courses_type_id']) {
						case 1:
							$typ='Artystyczne'; break;
						case 2:
							$typ='Ekonomiczne'; break;
						case 3:
							$typ='Humanistyczne'; break;
						case 4:
							$typ='Przyrodnicze'; break;
						case 5:
							$typ='Techniczne'; break;
						case 6:
							$typ='Inne'; break;
						case 7:
							$typ='Filologiczne'; break;
						default:
							$typ = 'Różne'; break;
					}
					$kursy2[$d2['Course']['courses_type_id']]['nazwa_typ']= $typ;
					$kursy2[$d2['Course']['courses_type_id']][$d2['Course']['id']]['id']= $d2['Course']['id'];
					$kursy2[$d2['Course']['courses_type_id']][$d2['Course']['id']]['nazwa']= $d2['Course']['nazwa'];
					//Debugger::dump($d['Course']['courses_type_id']);
				}
			}
		}	
		
		

		$this->University->contain('UniversityType');
		$universityo = $this->University->find('all', array('fields' => array('University.id', 'University.nazwa', 'UniversityType.nazwa'),
			'order' => array('University.nazwa')));
		//Debugger::dump($university2);
		foreach ($universityo as $o) {
			$options[$o['UniversityType']['nazwa']][$o['University']['id']] = $o['University']['nazwa'];
		}
			
			/*meta*/
			$this->set('title_for_layout', $university['University']['nazwa']);
			$this->set('description_for_layout', $university['University']['nazwa']. ' - Najlepsza szkoła wyższa.');
			$this->set('keywords_for_layout', $university['University']['nazwa']. ', uniwersytety, szkoły, ranking');
			
			$this->set('title_for_slider2', 'Porównaj Uniwersytety:');
			$this->set('options', $options);
			$this->set('university', $university);
			$this->set('u', $kursy);
			$this->set('university2', $university2);
			$this->set('u2', $kursy2);
	}
	
	//bez id
	public function view2($nazwa = null) {
		if (empty($this->request->data)) {
			if (!$nazwa) {
				throw new NotFoundException(__('Invalid post'));
			}
			$this->University->contain('City', 'UniversityType', 'UniversitiesParameter', 'Exchange');
			$university = $this->University->find('first',array('conditions'=> array('University.nazwa'=> $nazwa)));
			$id = $university['University']['id'];
			//Debugger::dump($university);
			if (!$university) {
				throw new NotFoundException(__('Invalid post'));
			}
			$this->University->CourseonUniversity->contain('Course');
			$db = $this->University->CourseonUniversity->find('all', 
				array('fields'=>array('Course.id','Course.nazwa', 'Course.courses_type_id'), 
					'order' => array('Course.courses_type_id'), 
					'group' => array('Course.id'), 
					'conditions' => array('CourseonUniversity.university_id' => $id)
				));
			foreach ($db as $d) {
				switch ($d['Course']['courses_type_id']) {
					case 1:
						$typ='Artystyczne'; break;
					case 2:
						$typ='Ekonomiczne'; break;
					case 3:
						$typ='Humanistyczne'; break;
					case 4:
						$typ='Przyrodnicze'; break;
					case 5:
						$typ='Techniczne'; break;
					case 6:
						$typ='Inne'; break;
					case 7:
						$typ='Filologiczne'; break;
					default:
						$typ = ''; break;
				}
				$kursy[$d['Course']['courses_type_id']]['nazwa_typ']= $typ;
				$kursy[$d['Course']['courses_type_id']][$d['Course']['id']]['id']= $d['Course']['id'];
				$kursy[$d['Course']['courses_type_id']][$d['Course']['id']]['nazwa']= $d['Course']['nazwa'];
				//Debugger::dump($d['Course']['courses_type_id']);
			}
			
			$this->University->contain('City', 'UniversityType', 'UniversitiesParameter', 'Exchange');
			$university2 = $this->University->find('first', array(
							'conditions' =>	array('University.id !=' => $university['University']['id'],
												'University.university_type_id' => $university['University']['university_type_id']))
							);
			$db2 = $this->University->CourseonUniversity->find('all', array('fields'=>array('Course.id','Course.nazwa', 'Course.courses_type_id'), 'order' => array('Course.courses_type_id'), 'group' => array('Course.id'), 'conditions' => array('CourseonUniversity.university_id' => $university2['University']['id'])));
			foreach ($db2 as $d2) {
				switch ($d2['Course']['courses_type_id']) {
					case 1:
						$typ='Artystyczne'; break;
					case 2:
						$typ='Ekonomiczne'; break;
					case 3:
						$typ='Humanistyczne'; break;
					case 4:
						$typ='Przyrodnicze'; break;
					case 5:
						$typ='Techniczne'; break;
					case 6:
						$typ='Inne'; break;
					case 7:
						$typ='Filologiczne'; break;
					default:
						$typ = 'Różne'; break;
				}
				$kursy2[$d2['Course']['courses_type_id']]['nazwa_typ']= $typ;
				$kursy2[$d2['Course']['courses_type_id']][$d2['Course']['id']]['id']= $d2['Course']['id'];
				$kursy2[$d2['Course']['courses_type_id']][$d2['Course']['id']]['nazwa']= $d2['Course']['nazwa'];
				//Debugger::dump($d['Course']['courses_type_id']);
			}
			
		} else {
			if(empty($this->request->data['University'])){
				
			}else{
				$dane= $this->request->data;
				$id = $dane['University']['id'];
				$id2 = $dane['University']['id2'];
				
				if (!$id) {
					throw new NotFoundException(__('Invalid post'));
				}
				$this->University->contain('City', 'UniversityType', 'UniversitiesParameter', 'Exchange');
				$university = $this->University->findById($id);
				if (!$university) {
					throw new NotFoundException(__('Invalid post'));
				}
				$this->University->CourseonUniversity->contain('Course');
				$db = $this->University->CourseonUniversity->find('all', array('fields'=>array('Course.id','Course.nazwa', 'Course.courses_type_id'), 'order' => array('Course.courses_type_id'), 'group' => array('Course.id'), 'conditions' => array('CourseonUniversity.university_id' => $id)));
				foreach ($db as $d) {
					switch ($d['Course']['courses_type_id']) {
						case 1:
							$typ='Artystyczne'; break;
						case 2:
							$typ='Ekonomiczne'; break;
						case 3:
							$typ='Humanistyczne'; break;
						case 4:
							$typ='Przyrodnicze'; break;
						case 5:
							$typ='Techniczne'; break;
						case 6:
							$typ='Inne'; break;
						case 7:
							$typ='Filologiczne'; break;
						default:
							$typ = ''; break;
					}
					$kursy[$d['Course']['courses_type_id']]['nazwa_typ']= $typ;
					$kursy[$d['Course']['courses_type_id']][$d['Course']['id']]['id']= $d['Course']['id'];
					$kursy[$d['Course']['courses_type_id']][$d['Course']['id']]['nazwa']= $d['Course']['nazwa'];
					//Debugger::dump($d['Course']['courses_type_id']);
				}
				if (!$id2) {
					throw new NotFoundException(__('Invalid post'));
				}
				$this->University->contain('City', 'UniversityType', 'UniversitiesParameter', 'Exchange');
				$university2 = $this->University->findById($id2);
				//Debugger::dump($university2);
				$db2 = $this->University->CourseonUniversity->find('all', array('fields'=>array('Course.id','Course.nazwa', 'Course.courses_type_id'), 'order' => array('Course.courses_type_id'), 'group' => array('Course.id'), 'conditions' => array('CourseonUniversity.university_id' => $id2)));
				foreach ($db2 as $d2) {
					switch ($d2['Course']['courses_type_id']) {
						case 1:
							$typ='Artystyczne'; break;
						case 2:
							$typ='Ekonomiczne'; break;
						case 3:
							$typ='Humanistyczne'; break;
						case 4:
							$typ='Przyrodnicze'; break;
						case 5:
							$typ='Techniczne'; break;
						case 6:
							$typ='Inne'; break;
						case 7:
							$typ='Filologiczne'; break;
						default:
							$typ = 'Różne'; break;
					}
					$kursy2[$d2['Course']['courses_type_id']]['nazwa_typ']= $typ;
					$kursy2[$d2['Course']['courses_type_id']][$d2['Course']['id']]['id']= $d2['Course']['id'];
					$kursy2[$d2['Course']['courses_type_id']][$d2['Course']['id']]['nazwa']= $d2['Course']['nazwa'];
					//Debugger::dump($d['Course']['courses_type_id']);
				}
			}
		}
			$this->University->contain('UniversityType');
		$universityo = $this->University->find('all', array('fields' => array('University.id', 'University.nazwa', 'UniversityType.nazwa'),
			'order' => array('University.nazwa')));
		//Debugger::dump($university2);
		foreach ($universityo as $o) {
			$options[$o['UniversityType']['nazwa']][$o['University']['id']] = $o['University']['nazwa'];
		}
			
			/*meta*/
			$this->set('title_for_layout', $university['University']['nazwa']. ' | Porównywarka uczelni');
			$this->set('description_for_layout', $university['University']['nazwa']. ' - Najlepsza szkoła wyższa.');
			$this->set('keywords_for_layout', $university['University']['nazwa']. ', uniwersytety, szkoły, ranking');
			
			$this->set('title_for_slider2', 'Porównaj Uniwersytety:');
			$this->set('options', $options);
			$this->set('university', $university);
			$this->set('u', $kursy);
			$this->set('university2', $university2);
			$this->set('u2', $kursy2);
	}
	
	public function ranking() {
		$this->University->contain();
		$universities = $this->University->find('all');

		//$ranking = $this->University->query("SELECT Ranking.miejsce, Ranking.nazwa, Ranking.typ FROM ranking AS Ranking");
		foreach ($universities as $university) {
			//foreach ($ranking as $r) {
				if(!empty($university['University']['photo'])) {
					$file= $university['University']['photo'];
					$src='C:\Users\Administrator\Documents\klu\cakephp-2.3.8\app\webroot\img\uploads/'.$file;
					$dest='C:\Users\Administrator\Documents\klu\cakephp-2.3.8\app\webroot\img\uczelnie/'.$file;
					if (!copy($src,$dest)) {
						echo "failed to copy $file...\n";
					} 
					/*if($university['University']['ranking'] == 0) {
						$this->University->updateAll( 
							array( //'University.ranking' => $r['Ranking']['miejsce'],
									'University.university_type_id' => 32), 
							array( 'University.id' => $university['University']['id']));
					} else $this->University->updateAll( 
							array('University.university_type_id' => 32), 
							array( 'University.id' => $university['University']['id']));*/
				}
			//}
		}
	}
	public function url($id = null) {
		if (empty($this->request->data)) {
			if (!$id) {
				throw new NotFoundException(__('Invalid post'));
			}
			$this->University->contain('City', 'UniversityType', 'UniversitiesParameter', 'Exchange');
			$university = $this->University->findById($id);
			//Debugger::dump($university);
			if (!$university) {
				throw new NotFoundException(__('Invalid post'));
			}
			$this->University->CourseonUniversity->contain('Course');
			$db = $this->University->CourseonUniversity->find('all', 
				array('fields'=>array('Course.id','Course.nazwa', 'Course.courses_type_id'), 
					'order' => array('Course.courses_type_id'), 
					'group' => array('Course.id'), 
					'conditions' => array('CourseonUniversity.university_id' => $id)
				));
			foreach ($db as $d) {
				switch ($d['Course']['courses_type_id']) {
					case 1:
						$typ='Artystyczne'; break;
					case 2:
						$typ='Ekonomiczne'; break;
					case 3:
						$typ='Humanistyczne'; break;
					case 4:
						$typ='Przyrodnicze'; break;
					case 5:
						$typ='Techniczne'; break;
					case 6:
						$typ='Inne'; break;
					default:
						$typ = ''; break;
				}
				$kursy[$d['Course']['courses_type_id']]['nazwa_typ']= $typ;
				$kursy[$d['Course']['courses_type_id']][$d['Course']['id']]['id']= $d['Course']['id'];
				$kursy[$d['Course']['courses_type_id']][$d['Course']['id']]['nazwa']= $d['Course']['nazwa'];
				//Debugger::dump($d['Course']['courses_type_id']);
			}
			
			$this->University->contain('City', 'UniversityType', 'UniversitiesParameter', 'Exchange');
			$university2 = $this->University->find('first', array(
							'conditions' =>	array('University.id !=' => $university['University']['id'],
												'University.university_type_id' => $university['University']['university_type_id']))
							);
			$db2 = $this->University->CourseonUniversity->find('all', array('fields'=>array('Course.id','Course.nazwa', 'Course.courses_type_id'), 'order' => array('Course.courses_type_id'), 'group' => array('Course.id'), 'conditions' => array('CourseonUniversity.university_id' => $university2['University']['id'])));
			foreach ($db2 as $d2) {
				switch ($d2['Course']['courses_type_id']) {
					case 1:
						$typ='Artystyczne'; break;
					case 2:
						$typ='Ekonomiczne'; break;
					case 3:
						$typ='Humanistyczne'; break;
					case 4:
						$typ='Przyrodnicze'; break;
					case 5:
						$typ='Techniczne'; break;
					case 6:
						$typ='Inne'; break;
					default:
						$typ = 'Różne'; break;
				}
				$kursy2[$d2['Course']['courses_type_id']]['nazwa_typ']= $typ;
				$kursy2[$d2['Course']['courses_type_id']][$d2['Course']['id']]['id']= $d2['Course']['id'];
				$kursy2[$d2['Course']['courses_type_id']][$d2['Course']['id']]['nazwa']= $d2['Course']['nazwa'];
				//Debugger::dump($d['Course']['courses_type_id']);
			}
			
		} else {
			
				$dane= $this->request->data;
				$id = $dane['University']['id'];
				$id2 = $dane['University']['id2'];
				
				if (!$id) {
					throw new NotFoundException(__('Invalid post'));
				}
				$this->University->contain('City', 'UniversityType', 'UniversitiesParameter', 'Exchange');
				$university = $this->University->findById($id);
				if (!$university) {
					throw new NotFoundException(__('Invalid post'));
				}
				$this->University->CourseonUniversity->contain('Course');
				$db = $this->University->CourseonUniversity->find('all', array('fields'=>array('Course.id','Course.nazwa', 'Course.courses_type_id'), 'order' => array('Course.courses_type_id'), 'group' => array('Course.id'), 'conditions' => array('CourseonUniversity.university_id' => $id)));
				foreach ($db as $d) {
					switch ($d['Course']['courses_type_id']) {
						case 1:
							$typ='Artystyczne'; break;
						case 2:
							$typ='Ekonomiczne'; break;
						case 3:
							$typ='Humanistyczne'; break;
						case 4:
							$typ='Przyrodnicze'; break;
						case 5:
							$typ='Techniczne'; break;
						case 6:
							$typ='Inne'; break;
						default:
							$typ = ''; break;
					}
					$kursy[$d['Course']['courses_type_id']]['nazwa_typ']= $typ;
					$kursy[$d['Course']['courses_type_id']][$d['Course']['id']]['id']= $d['Course']['id'];
					$kursy[$d['Course']['courses_type_id']][$d['Course']['id']]['nazwa']= $d['Course']['nazwa'];
					//Debugger::dump($d['Course']['courses_type_id']);
				}
				if (!$id2) {
					throw new NotFoundException(__('Invalid post'));
				}
				$this->University->contain('City', 'UniversityType', 'UniversitiesParameter', 'Exchange');
				$university2 = $this->University->findById($id2);
				//Debugger::dump($university2);
				$db2 = $this->University->CourseonUniversity->find('all', array('fields'=>array('Course.id','Course.nazwa', 'Course.courses_type_id'), 'order' => array('Course.courses_type_id'), 'group' => array('Course.id'), 'conditions' => array('CourseonUniversity.university_id' => $id2)));
				foreach ($db2 as $d2) {
					switch ($d2['Course']['courses_type_id']) {
						case 1:
							$typ='Artystyczne'; break;
						case 2:
							$typ='Ekonomiczne'; break;
						case 3:
							$typ='Humanistyczne'; break;
						case 4:
							$typ='Przyrodnicze'; break;
						case 5:
							$typ='Techniczne'; break;
						case 6:
							$typ='Inne'; break;
						default:
							$typ = 'Różne'; break;
					}
					$kursy2[$d2['Course']['courses_type_id']]['nazwa_typ']= $typ;
					$kursy2[$d2['Course']['courses_type_id']][$d2['Course']['id']]['id']= $d2['Course']['id'];
					$kursy2[$d2['Course']['courses_type_id']][$d2['Course']['id']]['nazwa']= $d2['Course']['nazwa'];
					//Debugger::dump($d['Course']['courses_type_id']);
				}
			
		}		

		$this->University->contain('UniversityType');
		$universityo = $this->University->find('all', array('fields' => array('University.id', 'University.nazwa', 'UniversityType.nazwa'),
			'order' => array('University.nazwa')));
		//Debugger::dump($universityo);
		foreach ($universityo as $o) {
			$options[$o['UniversityType']['nazwa']][$o['University']['id']] = $o['University']['nazwa'];
		}
			
			$this->set('title_for_layout', $university['University']['nazwa']);
			$this->set('title_for_slider2', 'Porównaj Uniwersytety:');
			$this->set('options', $options);
			$this->set('university', $university);
			$this->set('u', $kursy);
			$this->set('university2', $university2);
			$this->set('u2', $kursy2);
	}
	
	public function mm() {
		$this->University->contain();
		$universities = $this->University->find('all');

		foreach ($universities as $university) {
			if(!empty($university['University']['photo'])) {
				$filename = 'C:\Users\Administrator\Documents\klu\cakephp-2.3.8\app\webroot\img\uczelnie/'.$university['University']['photo'];
				$image = new Imagick( $filename );
				$imageprops = $image->getImageGeometry();
				if ($imageprops['width'] <= 500) {
					// don't upscale
				} else {
					$image->resizeImage(500,0, imagick::FILTER_LANCZOS, 0.9);
					$image->writeImage($filename);
				}
			}
		}
	}
	public function home_slider() {
		$this->University->contain();
		$universities = $this->University->find('all', array('conditions' => array('University.photo !=' => ''),
															'order' => array('University.srednia' => 'desc'),
															'limit' => 8));
		if (!empty($this -> request -> params['requested'])) {
		   return $universities;
		} else {
			$this->set('universities', $universities);
		}

	}
	public function top() {
		$this->University->contain();
		$universities = $this->University->find('all', array(
															'order' => array('University.srednia' => 'desc'),
															'limit' => 5));
		if (!empty($this -> request -> params['requested'])) {
		   return $universities;
		} else {
			$this->set('universities', $universities);
		}
		
	}

	public function form() {
		/*Formularz obliczania ile kosztują studia*/
		$this->set('title_for_layout', 'Calculate your study!');
		$this->set('description_for_layout', 'See how much do you have to pay for your studies.');
		$this->set('keywords_for_layout', 'cost, of, study');

		$kraje = $this-> University-> find ('list', array(
			'fields' => array('University.country_id', 'Country.name'),
			'group' => array('University.country_id'),
			'contain' => array('Country')));

		$this-> set ('kraje_v', $kraje);

		$ctype = $this-> University->CourseonUniversity->Course->CoursesType->find('list', array(
			'fields' => array('CoursesType.id', 'CoursesType.nazwa')));

		$this-> set ('ctype', $ctype);
	}

	public function getByKraj() {	
		$kraj = $this->request->data['country_id'];
		//$kraj = 'Belgia';
		$miasta = $this->University->find('list', array(
			'fields' => array('University.city_id', 'City.nazwa'),
			'conditions' => array('University.country_id' => $kraj),
			'group' => array('University.city_id'),
			'contain' => array('City')
			));
		$this->set('miasta',$miasta);
		$this->layout = false;
	}

	public function getByMiasto() {		
		$miasto = $this->request->data['city_id'];

		$uczelnie = $this->University->find('list', array(
			'fields' => array('University.id', 'University.nazwa'),
			'conditions' => array('University.city_id' => $miasto),
			'recursive' => -1
			));
 
		$this->set('uczelnie',$uczelnie);
		$this->layout = false;
	}
	public function getCourseType() {	
		if (!empty($this->request->data['university_id'])) {
			$id = $this->request->data['university_id'];

			$this->University->CourseonUniversity->contain('Course');
			$ctype = $this->University->CourseonUniversity->find('list', 
				array('fields'=>array('Course.courses_type_id', 'Course.courses_type_id'), 
					'group' => array('Course.courses_type_id'), 
					'conditions' => array('CourseonUniversity.university_id' => $id)
				));
		} else {
			$ctype = $this->University->CourseonUniversity->Course->CoursesType->find('list', 
				array('fields'=>array('CoursesType.id', 'CoursesType.nazwa')));
		}
		
		$this-> set ('ctype', $ctype);
		$this->layout = false;
	}


	public function getCourse() {	
		if (!empty($this->request->data['university_id'])) {
			$ucz = $this->request->data['university_id'];

			$kursy = $this->University->CourseonUniversity->find('list', array(
				'fields' => array('CourseonUniversity.course_id', 'Course.nazwa'),
				'conditions' => array('CourseonUniversity.university_id' => $ucz),
				'group' => array('CourseonUniversity.course_id'),
				'contain' => array('Course')
				));
		} else if (!empty($this->request->data['course_type_id'])) {
			$kursy = $this->University->CourseonUniversity->Course->find('list', array(
				'fields' => array('Course.id', 'Course.nazwa'),
				'conditions' => array('Course.courses_type_id' => $this->request->data['course_type_id']),
				));
		} else {
			$kursy = $this->University->CourseonUniversity->Course->find('list', array(
				'fields' => array('Course.id', 'Course.nazwa')
				));
		}
 		
 		Debugger::log($kursy);
		$this->set('kursy',$kursy);
		$this->layout = false;
	}

	public function getStypendium() {	
		if (!empty($this->request->data['university_id'])) {
			$ucz = $this->request->data['university_id'];

			$stypendium = $this->University->UniversitiesParameter->find('first', array(
				'fields' => array('s_socj', 's_nauk', 's_sport', 's_rektora'),
				'conditions' => array('UniversitiesParameter.university_id' => $ucz)
				));
			if ($stypendium['UniversitiesParameter']['s_socj']>0) {
				$stypendia['socjalne'] = 'financial aid';
			} else if ($stypendium['UniversitiesParameter']['s_nauk']>0) {
				$stypendia['naukowe'] = 'scientific';
			} else if ($stypendium['UniversitiesParameter']['s_sport']>0) {
				$stypendia['sportowe'] = 'athletic';
			} else if ($stypendium['UniversitiesParameter']['s_rektora']>0) {
				$stypendia['rektora'] = 'rector scholarship';
			} else {
				$stypendia['other'] = 'other';
			}
		} else {
			$stypendia = $this->University->StypendiumType->find('list', array(
				'fields' => array('StypendiumType.id', 'StypendiumType.name')
			));
		}	
 
		$this->set('stypendia',$stypendia);
		$this->layout = false;
	}

	public function getTransport() {
		$transport = array(
			'public' => 'by public transport',
			'bike' => 'on bike, per foot',
			'foot' => 'per foot, ocassionally by bus',
			'car' => 'by car'
		);

		$this->set('transport',$transport);
		$this->layout = false;
	}

	public function form_result() {
		$this->set('title_for_layout', 'See how much you will pay');
		$this->set('description_for_layout', 'See how much do you have to pay for your studies.');
		$this->set('keywords_for_layout', 'cost, of, study');

		//Debugger::dump($this->request->query);

		if($this->request->query) {

			$country_id = $this->request->query['country_id'];
			$this->University->Country->contain('BasketinCountry');
			$kraj = $this-> University-> Country-> find ('first', array('conditions' => array('id' => $country_id)));
			$result['conditions']['country'] = $kraj['Country'];

			//kilka mista do filtra
			$this->University->City-> contain();
			$cities = $this-> University-> City-> find ('all', array('conditions' => array('country_id' => $country_id),
																		'order' => array('City.srednia DESC'),
																		'limit' => 5));

			//kraje do filtra
			$kraje = $this-> University-> find ('list', array(
															'fields' => array('University.country_id', 'Country.name'),
															'group' => array('University.country_id'),
															'contain' => array('Country')));

			// uczelnie w mieście
			$this->University->contain('UniversitiesParameter');
			$uczelnie = $this->University->find('all', array('conditions' => array('country_id' => $country_id,
																					'University.photo !=' => ''),
																'limit' => 6));
			$this-> set ('uczelnie', $uczelnie);

			//rozrywka
			$result['entertainment'] = 0;
			$result['sport'] = 0; 
			foreach ($kraj['BasketinCountry'] as $entertainment) {
				if ($entertainment['basket_id'] == 2) { //id wyjścia do kina
					$result['entertainment'] = $result['entertainment'] + $entertainment['price'];
				} elseif ($entertainment['basket_id'] == 3) //gym
					$result['sport'] = $result['sport'] + $entertainment['price'];
			}
			if (isset($this->request->query['Enterteinment'])) {
				$entertain = $this->request->query['Enterteinment'];
				$result['conditions']['Enterteinment'] = $entertain;
				switch ($entertain) {
					case 'hardly':
						$result['entertainment'] = $result['entertainment']; //tylko raz
						break;
					case '1x': 
						$result['entertainment'] = round($result['entertainment']*52); break;
					case '2x':
						$result['entertainment'] = round($result['entertainment']*104); break;
				}
			} else {
				$result['entertainment']= round($result['entertainment']*52); //1x w tygodniu
			}

			if (isset($this->request->query['Sport'])) {
				$sport = $this->request->query['Sport'];
				$result['conditions']['Sport'] = $sport;
				switch ($sport) {
					case 'jogging':
						$result['sport'] = $result['sport']; break;
						break;
					case 'gym': 
						$result['sport'] = round($result['sport']*52); break;
					case 'no':
						$result['sport'] = 0; break;
				}
			} else {
				$result['sport']=$result['sport']; 
			}

			//zakupy

			if (!isset($this->request->query['city_id'])) {
				/*jeżeli nie wybrano miasta to oblicz średnią ze wszystkich w kraju*/
				$miasta = $this-> University-> City-> find ('all', array('condition' => array('country_id' => $country_id)));

				$obiady = $pokoj = $bilety = $bilety_m = 0;
				$miasta_a = $miasta_b = $miasta_bm = $miasta_d =0 ; 
				foreach ($miasta as $miasto) {
					if (!empty($miasto['City']['obiad'])) {
						$obiady = $obiady + $miasto['City']['obiad'];
						++$miasta_d; 
					}
					if (!empty($miasto['City']['pokoj'])) {
						$pokoj = $pokoj + $miasto['City']['pokoj'];
						++$miasta_a; 
					}
					if (!empty($miasto['City']['bilet_m'])) {
						$bilety_m = $bilety_m + $miasto['City']['bilet_m'];
						++$miasta_bm; 
					}
					if (!empty($miasto['City']['bilet'])) {
						$bilety = $bilety + $miasto['City']['bilet'];
						++$miasta_b; 
					}
				}
				$result['dinner'] = round(($obiady/$miasta_d) * 104); //2x w tygodniu poza domem 
				$result['accomodation'] = round(($pokoj/$miasta_a) *12);

				if (isset($this->request->query['transport'])) {
					$transport = $this->request->query['transport'];
					switch ($transport) {
						case 'public':
							$result['transport'] = round(($bilety_m/$miasta_bm) * 12);
							$result['conditions']['transport'] = 'Public transport';
							break;
						case 'bike':
							$result['transport'] = 0;
							$result['conditions']['transport'] = 'Bike';
							break;
						case 'foot':
							$result['transport'] = round(($bilety/$miasta_b) * 100); //zakładamy że czasem zdarzy nam się pojechać autobusem
							$result['conditions']['transport'] = 'Foot';
							break;
						case 'car':
							$result['transport'] = 50*12; //ceny benzyny
							$result['conditions']['transport'] = 'Car';
							break;
					}
				} else {
					$result['transport'] = round(($bilety_m/$miasta_bm) * 12);
					$result['conditions']['transport'] = 'Public transport';
				}
				/*dodawanie kosztów życia w mieście  
				+ koszt studió*/
			} else {
				$city_id = $this->request->query['city_id'];

				$this->University->City->contain();
				$miasto = $this->University->City->find('first', array('conditions' => array('City.id' => $city_id)));

				foreach ($cities as $key => $city) {
					if ($city['City']['id'] == $city_id) {
						$cities[$key]['City']['selected'] = 1;
					}
				}

				$result['conditions']['city'] = $miasto['City']['nazwa'];
				$result['dinner'] = round($miasto['City']['obiad']* 104); //2x w tygodniu poza domem 

				if (isset($this->request->query['transport'])) {
					$transport = $this->request->query['transport'];
					switch ($transport) {
						case 'public':
							$result['transport'] = $miasto['City']['bilet_m'] * 12;
							$result['conditions']['transport'] = 'Public transport';
							break;
						case 'bike':
							$result['transport'] = 0;
							$result['conditions']['transport'] = 'Bike';
							break;
						case 'foot':
							$result['transport'] = $miasto['City']['bilet'] * 100; //zakładamy że czasem zdarzy nam się pojechać autobusem
							$result['conditions']['transport'] = 'Foot';
							break;
						case 'car':
							$result['transport'] = 50*12; //ceny benzyny
							$result['conditions']['transport'] = 'Car';
							break;
					}
				} else {
					$result['transport'] = $miasto['City']['bilet_m'] * 12;
				}

				if (isset($this->request->query['university_id'])) {

					$university_id = $this->request->query['university_id'];

					$this->University->contain();
					$uczelnia = $this->University->find('first', array('conditions' => array('id' => $university_id)));

					$result['conditions']['university'] = $uczelnia['University']['nazwa'];

					if (isset($this->request->query['Accommodation'])) {
						$accomodation = $this->request->query['Accommodation'];
						switch ($accomodation) {
							case 'dormitory':
								$result['accomodation'] = $uczelnia['UniversitiesParameter']['akademik']*12;
								$result['conditions']['accomodation'] = 'Dormitory';
								break;
							case 'shareroom':
								$result['accomodation'] = $miasto['City']['pokoj_miejsce']*12;
								$result['conditions']['accomodation'] = 'Shareroom';
								break;

							default:
								$result['accomodation'] = $miasto['City']['pokoj']*12;
								$result['conditions']['accomodation'] = 'Studio';
								break;
						}
					} else {
						$result['accomodation'] = $miasto['City']['pokoj'] *12;
					}

					if (isset($this->request->query['course_type_id'])) {
						if (isset($this->request->query['course_id'])) {

							$course_id = $this->request->query['course_id'];
							$this->University->CourseonUniversity->contain('Course');
							$kurs = $this->University->CourseonUniversity->find('first', array(
										'fields' => array('CourseonUniversity.cena', 'Course.nazwa'),
										'condition' => array('course_id' => $course_id, 'university_id' => $university_id)
										));
							$result['course_price'] = $kurs['CourseonUniversity']['cena'];
							$result['conditions']['course'] = $kurs['Course']['nazwa'];
						}
					}

					// uczelnie w mieście
					$this->University->contain('UniversitiesParameter');
					$uczelnie = $this->University->find('all', array('conditions' => array('city_id' => $city_id)));
					$this-> set ('uczelnie', $uczelnie);

					//stypendia do filtrów
					$this->University->Scholarship->contain('StypendiumType');
					$scholarships = $this->University->Scholarship->find('all', array('conditions' => array('university_id' => $university_id)));
					if (isset($this->request->query['scholarship_id'])) {
						$scholarship_id = $this->request->query['scholarship_id'];
						$scholarship = $this->University->Scholarship->find('first', array('conditions' => array('scholarship_id' => $scholarship_id)));
						$result['scholarship'] = $scholarship['Scholarship']['value']*12;
						foreach ($scholarships as $key => $s) {
							if ($s['Scholarship']['id'] == $scholarship_id) {
								$scholarships[$key]['Scholarship']['selected'] = 1;
							}
						}
					}
					$this-> set ('scholarships', $scholarships);
					//Debugger::dump($scholarships);


				} else {
					if (isset($this->request->query['Accomodation'])) {
						$accomodation = $this->request->query['Accomodation'];
						if ($accomodation == 'dormitory' || $accomodation == 'shareroom') {
							$result['accomodation'] = $miasto['City']['pokoj_miejsce']*12;
						} else {
							$result['accomodation'] = $miasto['City']['pokoj']*12;
						}
					} else {
						$result['accomodation'] = $miasto['City']['pokoj'] * 12;
					}
				}

			}
			$result['sum'] = $result['dinner'] + $result['transport'] + $result['accomodation'] + $result['entertainment'] + $result['sport'];
			if (isset($result['course_price'])) {
				$result['sum'] = $result['sum'] + $result['course_price'];
			}
			if (isset($result['scholarship'])) {
				$result['sum'] = $result['sum'] - $result['scholarship'];
			}
			$this-> set ('result', $result);
			$this-> set ('cities', $cities);
			$this-> set ('countries', $kraje);
		} 
	}

	public function city_result($name) {
		$this->set('title_for_layout', 'See how much you will pay in '. $name);
		$this->set('description_for_layout', 'See how much do you have to pay for your studies.');
		$this->set('keywords_for_layout', 'cost, of, study'.$name);

		$this->University->City->contain();
		$miasto = $this-> University-> City-> find ('first', array('conditions' => array('City.nazwa' => $name)));
		$city_id = $miasto['City']['id'];

		$this->University->Country->contain('BasketinCountry');
		$kraj = $this-> University-> Country-> find ('first', array('fields' => array('name'), 
																		'conditions' => array('Country.id' => $miasto['City']['country_id'])));


		$result['conditions']['country'] = $kraj['Country']['name'];
		$result['conditions']['city'] = $name;

		// uczelnie w mieście
			$this->University->contain('UniversitiesParameter');
			$uczelnie = $this->University->find('all', array('conditions' => array('city_id' => $city_id,
																					'University.photo !=' => ''),
																));
			$this-> set ('uczelnie', $uczelnie);

			//rozrywka
			$result['entertainment'] = 0;
			$result['sport'] = 0; 
			foreach ($kraj['BasketinCountry'] as $entertainment) {
				if ($entertainment['basket_id'] == 2) { //id wyjścia do kina
					$result['entertainment'] = $result['entertainment'] + $entertainment['price'];
				} elseif ($entertainment['basket_id'] == 3) //gym
					$result['sport'] = $result['sport'] + $entertainment['price'];
			}
			if (isset($this->request->query['Enterteinment'])) {
				$entertain = $this->request->query['Enterteinment'];
				$result['conditions']['Enterteinment'] = $entertain;
				switch ($entertain) {
					case 'hardly':
						$result['entertainment'] = $result['entertainment']; //tylko raz
						break;
					case '1x': 
						$result['entertainment'] = round($result['entertainment']*52); break;
					case '2x':
						$result['entertainment'] = round($result['entertainment']*104); break;
				}
			} else {
				$result['entertainment']= round($result['entertainment']*52); //1x w tygodniu
			}

			if (isset($this->request->query['Sport'])) {
				$sport = $this->request->query['Sport'];
				$result['conditions']['Sport'] = $sport;
				switch ($sport) {
					case 'jogging':
						$result['sport'] = $result['sport']; break;
						break;
					case 'gym': 
						$result['sport'] = round($result['sport']*52); break;
					case 'no':
						$result['sport'] = 0; break;
				}
			} else {
				$result['sport']=$result['sport']; 
			}

		//obiad 2 x w tygodniu na mieście
		$result['dinner'] = $miasto['City']['obiad']*120; //+koszty obiadu
		$result['transport'] = $miasto['City']['bilet_m'] * 12;
		$result['accomodation'] = $miasto['City']['pokoj'] *12;
		//koszty rozrywki (np. wyjście do kina), default 2x w tygodniu
		$result['entertainment'] = 0;
		foreach ($kraj['BasketinCountry'] as $entertainment) {
			if ($entertainment['basket_id'] == 2) { //id wyjścia do kina
				$result['entertainment'] = $result['entertainment'] + $entertainment['price'];
			}
		}
		$result['entertainment']= $result['entertainment']*52; //1x w tygodniu
		//koszty uczelni
		//koszty zakupów
		//koszty życia:
		//			sport

		$result['sum'] = $result['dinner'] + $result['transport'] + $result['accomodation'] + $result['entertainment'] +$result['sport'];
		$this-> set ('result', $result);

		//url
		$country_id = $kraj['Country']['id'];
		$url= "http://calc.stdclc.com/universities/form_result?country_id=". $country_id;
		//kilka mista do filtra
		$this->University->City-> contain();
		$cities = $this-> University-> City-> find ('all', array('conditions' => array('country_id' => $country_id),
																	'order' => array('City.srednia DESC'),
																	'limit' => 5));
		foreach ($cities as $key => $city) {
					if ($city['City']['id'] == $city_id) {
						$cities[$key]['City']['selected'] = 1;
					}
				}
		$this -> set('url', $url);
		$this-> set ('cities', $cities);
	}

	public function university_result($university_id) {

		$uczelnia = $this-> University-> find ('first', array('conditions' => array('University.id' => $university_id)));

		$this->University->Country->contain('BasketinCountry');
		$kraj = $this-> University-> Country-> find ('first', array('fields' => array('Country.name', 'Country.id'), 
																		'conditions' => array('id' => $uczelnia['University']['country_id'])));
		$this->University->City->contain();
		$miasto = $this-> University-> City-> find ('first', array('conditions' => array('City.id' => $uczelnia['University']['city_id'])));
		
		$result['conditions']['country'] = $kraj['Country']['name'];
		$result['conditions']['country_id'] = $kraj['Country']['id'];
		$result['conditions']['city'] = $miasto['City']['nazwa'];
		$result['conditions']['city_id'] = $miasto['City']['id'];
		$result['conditions']['university'] = $uczelnia['University']['nazwa'];
		$result['conditions']['university_id'] = $uczelnia['University']['id'];

		$this->set('title_for_layout', 'See how much you will pay on '. $uczelnia['University']['nazwa']);
		$this->set('description_for_layout', 'See how much do you have to pay for your studies.');
		$this->set('keywords_for_layout', 'cost, of, study');

		//obiad 2 x w tygodniu na mieście
		$result['dinner'] = $miasto['City']['obiad']*120; //+koszty obiadu
		$result['transport'] = $miasto['City']['bilet_m'] * 12;

		if (!empty($uczelnia['UniversityParameter']['akademik'])) {
			//
			$result['accomodation'] = $uczelnia['UniversityParameter']['akademik'] *12; //zakładamy że mieszkamy cały rok
		} else {
			$result['accomodation'] = $miasto['City']['pokoj'] *12;
		}
		
		// uczelnie w mieście
			$this->University->contain('UniversitiesParameter');
			$uczelnie = $this->University->find('all', array('conditions' => array('University.city_id' => $miasto['City']['id'],
																					'University.photo !=' => ''),
																'limit' => 6));
			$this-> set ('uczelnie', $uczelnie);

			//rozrywka
			$result['entertainment'] = 0;
			$result['sport'] = 0; 
			foreach ($kraj['BasketinCountry'] as $entertainment) {
				if ($entertainment['basket_id'] == 2) { //id wyjścia do kina
					$result['entertainment'] = $result['entertainment'] + $entertainment['price'];
				} elseif ($entertainment['basket_id'] == 3) //gym
					$result['sport'] = $result['sport'] + $entertainment['price'];
			}
			if (isset($this->request->query['Enterteinment'])) {
				$entertain = $this->request->query['Enterteinment'];
				$result['conditions']['Enterteinment'] = $entertain;
				switch ($entertain) {
					case 'hardly':
						$result['entertainment'] = $result['entertainment']; //tylko raz
						break;
					case '1x': 
						$result['entertainment'] = round($result['entertainment']*52); break;
					case '2x':
						$result['entertainment'] = round($result['entertainment']*104); break;
				}
			} else {
				$result['entertainment']= round($result['entertainment']*52); //1x w tygodniu
			}

			if (isset($this->request->query['Sport'])) {
				$sport = $this->request->query['Sport'];
				$result['conditions']['Sport'] = $sport;
				switch ($sport) {
					case 'jogging':
						$result['sport'] = $result['sport']; break;
						break;
					case 'gym': 
						$result['sport'] = round($result['sport']*52); break;
					case 'no':
						$result['sport'] = 0; break;
				}
			} else {
				$result['sport']=$result['sport']; 
			}


		//kilka mista do filtra
			$this->University->City-> contain();
			$cities = $this-> University-> City-> find ('all', array('conditions' => array('country_id' =>$uczelnia['University']['country_id']),
																		'order' => array('City.srednia DESC'),
																		'limit' => 5));

			//kraje do filtra
			$kraje = $this-> University-> find ('list', array(
															'fields' => array('University.country_id', 'Country.name'),
															'group' => array('University.country_id'),
															'contain' => array('Country')));

		//koszty uczelni
		//koszty zakupów
		//koszty życia:
		//			sport

		$result['sum'] = $result['dinner'] + $result['transport'] + $result['accomodation'] + $result['entertainment'] + $result['sport'];
		$this-> set ('result', $result);
		$this-> set ('cities', $cities);
		$this-> set ('countries', $kraje);
	}

	public function srednia() {
		/*wartosci wspólczynników dla m-miasta r-ranking perspektyw*/
		$wm=3;
		$wr=6;
		
		$sum = $wm+$wr;
		$this->University->contain('City');
		$universities = $this->University->find('all');	
		foreach ($universities as $university) {
			if ($university['University']['ranking'] != 0) {
				$srednias= (($university['City']['srednia'])/100*$wm)+((1/$university['University']['ranking'])*$wr);
			} else $srednias= (($university['City']['srednia'])/100*$wm);
			
			$srednia = $srednias/ $sum;
			
			if ($university['University']['pakiet'] = 1) {
				$srednia = $srednia + 100 - $university['University']['waga_pakietu'];
				//$session->setFlash("message");
			}
			$this->University->updateAll( 
										array( 'University.srednia' => $srednia), 
										array( 'University.id' => $university['University']['id']));
			
		}
		$this->redirect(array('action' => 'index'));
	}
	public function order() {
		$x = $this->University->find('all',array ('fields' => array('University.nazwa', 'University.srednia'),'order' => array('University.srednia' => 'desc')));
		$i=0;
		foreach ($x as $University) {
			echo $i=$i + 1;
			echo $University['University']['nazwa'];
			echo $University['University']['srednia'].'<br>';

			

			$this->University->updateAll( 
						array( 'University.sortx' => $i), 
						array( 'University.id' => $University['University']['id']));
		}
	}
	public function srednia2() {
				
				
		$universities = $this->University->find('all');	
		//$session->setFlash("ddd");
		
		foreach ($universities as $university) {
		echo $university['University']['pakiet'];
		echo $university['University']['PAKIET'];
		echo $university['University']['Pakiet'];
		echo $university['University']['srednia']."<br>";
		/*	
				
			if ($university['University']['pakiet'] = 1 or $university['University']['pakiet'] =  "1") {
				$srednia = $university['University']['srednia'] - 2100 - $university['University']['waga_pakietu'];
			
			$this->University->updateAll( 
										array( 'University.srednia' => $srednia), 
										array( 'University.id' => $university['University']['id']));
			}
		}
		$this->redirect(array('action' => 'index'));
		*/}
	}
	public function q() {
		$w = 9;
		//$session->setFlash("message");
		//print $session->flash("flash", );
		//echo "ddd";
	}
	public function delateSzkoly() {
		$this->University->deleteAll(array('University.university_type_id' => 20), true);
		$this->redirect(array('action' => 'index'));
	}
	public function fotoSmAll2() {
		$this->University->contain();
		$universities = $this->University->find('all');
		if (!empty($this -> request -> params['requested'])) {
		   return $universities;
		} else {
			$this->set('universities', $universities);
		}
		$dt_recs = $this->University->find('all');

	} 
	
	public function zapis() {
		# Open the File.
		if (($handle = fopen("uczelnie_foto.csv", "r")) !== FALSE) {
			# Set the parent multidimensional array key to 0.
			$nn = 0;
			while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
				# Count the total keys in the row.
				$c = count($data);
				# Populate the multidimensional array.
				for ($x=0;$x<$c;$x++)
				{
					$csvarray[$nn][$x] = $data[$x];
				}
				$nn++;
			}
			# Close the File.
			fclose($handle);
		}

		foreach ($csvarray as $uni) {
			$this->University->contain();
			$c = $this->University->find('all');
			foreach ($c as $c2) {		
				if ($c2['University']['id'] == $uni[1]) {
					if($uni[2]=='logo') {
						Debugger::dump($uni);
						$this->University->updateAll(	array('University.photo' => "'".$uni[3]."'"),  													array('University.id' => $c2['University']['id']));
					}
				}
			}
		}
	}

	public function promoxxx(){
		//$unv = $this->University->find('count');
		//$unv = $this->University->find('first', array('fields' => array('University.nazwa', 'University.srednia')));
		//$unv = $this->University->find('list', array('fields' => array('University.srednia','University.promonr', 'University.id' ),'order' => array('University.srednia' => 'desc','University.srednia' => 'asc')));
		
		//copy to ABONAMENT srednia
		$unv1 = $this->University->find('list', 
			array(
				'fields' => array('University.id','University.srednia','University.ABONAMENT'),
				'order' => array('University.srednia' => 'desc'), 
			)
		);

		foreach($unv1 as $abo => $unv2){
			foreach($unv2 as $id => $sr){

				$this->University->id = $id; 
				$this->University->saveField('ABONAMENT_srednia', $sr);
			}
		}

		//updating ABONAMENT srednia
		$unv1 = $this->University->find('list', 
			array(
				'fields' => array('University.id','University.srednia','University.ABONAMENT'),
				'order' => array('University.ABONAMENT' => 'desc'), 
				'conditions' => array('NOT' => array('University.ABONAMENT' => array(0, 4, 5)))
			)
		);

		foreach($unv1 as $abo => $unv2){
			foreach($unv2 as $id => $sr){

				$ABONAMENT_srednia = $abo * $sr/10;
				$this->University->id = $id; 
				$this->University->saveField('ABONAMENT_srednia', $ABONAMENT_srednia);
			}
		}
		
		$this->set('unv1',$unv1);

		//make ABONAMENT rank
		$unv3 = $this->University->find('list', 
			array(
				'fields' => array('University.id','University.ABONAMENT_srednia'),
				'order' => array('University.ABONAMENT_srednia' => 'desc'), 
			)
		);
		$this->set('unv3',$unv3);

		$i=0;
		foreach($unv3 as $id => $ABONAMENT_srednia){
				$i++;
				$this->University->id = $id; 
				$this->University->saveField('ABONAMENT_rank', $i);
		}
	}
	public function sredniauniversities() {
		$this->Rank = ClassRegistry::init('Rank');
			$wagi = $this->Rank->find('all', array('fields'=>array('Rank.weight_value')));
				$this->Rank->id = 12;
				$this->Rank->saveField('weight_value', 0);
				$start =  date("d-m-Y h:i:s");
				$this->Rank->saveField('start', $start);
				$this->Rank->saveField('end', 'not ready');

				$wag_miasto = $wagi[8]['Rank']['weight_value'];
				$wag_kier = $wagi[9]['Rank']['weight_value'];
				$wag_il_kier = 5;	

		echo '<br><br><br><br><br><br><br><br>';

		$this->Course = ClassRegistry::init('Course');
		$this->CourseonUniversity = ClassRegistry::init('CourseonUniversity');
		$this->City = ClassRegistry::init('City');

		$LIST_IDs = $this->University->find('list', array( 'order' => array('id' => 'ASC'), 'fields'=>array('University.id', )));
		
		$MAX_il_kierunkow = 0;
		foreach ($LIST_IDs as $ID) {
			$university_id = $ID;
			//echo " | ";
			$LISTA_KIERUNKI = $this->CourseonUniversity->find('list', array('conditions' => array('CourseonUniversity.university_id' => $university_id ), 'fields' => array('CourseonUniversity.course_id')));
			$i = 0; 
			$suma = 0;
			foreach ($LISTA_KIERUNKI as $key => $kierunek) {
				$i = $i + 1;
				//echo $i." | ";
			}
			if ($MAX_il_kierunkow < $i ){
				$MAX_il_kierunkow = $i;
			}
			//echo "<br>";
			//echo "<br>";
		}
		echo 'MAX_il_kierunkow:  '.$MAX_il_kierunkow;
		echo "<br>";
		echo "<br>";

		$LIST_IDs = $this->University->find('list', array( 'order' => array('id' => 'ASC'), 'fields'=>array('University.id', )));
		foreach ($LIST_IDs as $ID) {
		$university_id = $ID;
			echo '{{{ '.$university_id. ' [ '; 


			$LISTA_KIERUNKI = $this->CourseonUniversity->find('list', array('conditions' => array('CourseonUniversity.university_id' => $university_id ), 'fields' => array('CourseonUniversity.course_id')));
			//pr($LISTA_KIERUNKI);
			$i = 0;
			$suma = 0;
			foreach ($LISTA_KIERUNKI as $key => $kierunek) {
				
				echo ' $';
				$i = $i + 1;
				echo $i." | ";
				$sr_placa = $this->Course->find('list', array('conditions' => array('Course.id' => $kierunek), 'fields' => array('Course.srednia')));
				//pr($sr_placa);
				foreach ($sr_placa as $key => $sr_new) {
					if (isset($sr_placa)){
						echo $sr_placa = $sr_new;
						$suma = $suma + $sr_placa;
					}else{
						//pr($placa);
						//echo $sr_placa = $sr_placa[0]['Course']['srednia'];
						echo 'nie ma tego kierunku';
					}
				}
			}
			echo '] ';
			if ($i==0){
				echo '!!!!!!!!!!!!!'.$suma;
				echo $sr_kier = 0;
				echo " | ";
				echo $sr_il_kier = 0;
			}else{
				echo $sr_kier = $suma/$i;
				echo " | ";
				echo $sr_il_kier = (($i/( $MAX_il_kierunkow - 1 )) * 10);

			}
			echo'}{';

			$CITY_OF_UNI = $this->University->find('first', array('conditions' => array('University.id' => $university_id ), 'fields'=>array('University.city_id', )));
			//pr($CITY_OF_UNI);
			echo  $city_id = $CITY_OF_UNI['University']['city_id'].' | ';

			$LIST_MIASTA = $this->City->find('list', array('conditions' => array('City.id' => $city_id ), 'fields' => array('City.srednia', 'City.nazwa')));
			//pr($LIST_MIASTA);
			foreach ($LIST_MIASTA as $sr_miasto => $miasto) {
				echo $miasto;
				echo $sr_miasto;
			}
			
			echo'}{';

			if (($wag_kier + $wag_miasto) == 0 ){
				echo $sr_uni = 0;
			}else{
				echo $sr_uni = ($sr_kier * $wag_kier + $sr_il_kier * $wag_il_kier + $sr_miasto * $wag_miasto) / ($wag_kier + $wag_miasto);
			}
			

			$this->University->id = $ID;
			$this->University->saveField('srednia', $sr_uni);
			$this->Rank->saveField('weight_value', 1);
			$end =  date("d-m-Y h:i:s");  
			$this->Rank->saveField('end', $end);
			$duration = (strtotime($end) - strtotime($start));
			$this->Rank->saveField('duration', $duration);

			//abo
		}
		$this->Rank->id = 12;
		$this->Rank->saveField('weight_value', 1);
	}
	public function abonament() {
		$this->Rank = ClassRegistry::init('Rank');
			$wagi = $this->Rank->find('all', array('fields'=>array('Rank.weight_value')));
				$this->Rank->id = 13;
				$this->Rank->saveField('weight_value', 0);
				$start =  date("d-m-Y h:i:s");
				$this->Rank->saveField('start', $start);

		$LIST_IDs = $this->University->find('list', array ('order' => array('id' => 'ASC'), 'fields'=>array('University.id', )));
		foreach ($LIST_IDs as $ID) {
			$university_id = $ID;

			$SREDNIA = $this->University->find('first', array('conditions' => array('University.id' => $university_id ), 'fields'=>array('University.srednia', )));
			echo $sr_uni = $SREDNIA['University']['srednia'];

			$ABONAMENT = $this->University->find('first', array('conditions' => array('University.id' => $university_id ), 'fields'=>array('University.ABONAMENT', )));
			echo $abo = $ABONAMENT['University']['ABONAMENT'];
			switch ($abo) {
			   case "standard":
				 $sr_uni = ($sr_uni + 100);
				 break;
			   case "premium":
				 $sr_uni = ($sr_uni + 200);
				 break;
			   case "gold":
				 $sr_uni = ($sr_uni + 300);
				 break;
			   default:
				 $sr_uni = $sr_uni;
			}
			$this->University->id = $ID;
			$this->University->saveField('ABONAMENT_srednia', $sr_uni );

		}
		$this->Rank->id = 13;
		$this->Rank->saveField('weight_value', 1);
		$end =  date("d-m-Y h:i:s");  
		$this->Rank->saveField('end', $end);
		$duration = (strtotime($end) - strtotime($start));
		$this->Rank->saveField('duration', $duration);

	}
	public function rank() {
		///$this->Rank = ClassRegistry::init('Rank');
		//	$wagi = $this->Rank->find('all', array('fields'=>array('Rank.weight_value')));
		//		$this->Rank->id = 14;
		//        $this->Rank->saveField('weight_value', 0);

		$Model = 'University';

		echo '<br><br><br><br><br><br><br><br>';
		echo 'id | srednia | rank<br>';
		$PartArray = $this->$Model->find('list', array ('fields' => array($Model.'.id',$Model.'.srednia'),'order' => array($Model.'.srednia' => 'desc')));
		pr($PartArray);
		//$this->Rank->id = 14;
		//$this->Rank->saveField('weight_value', 1);    
	}
	public function rank_with_abo() {
		$Model = 'University';
		$PartArray = $this->$Model->find('list', array(
			'fields' => array($Model.'.id',$Model.'.ABONAMENT_srednia'),
			'order' => array($Model.'.ABONAMENT_srednia' => 'desc')));
		$i = 0;
		foreach ($PartArray as $id => $ABONAMENT_srednia) {
			$i = $i + 1;
			echo $id.' | '.$ABONAMENT_srednia.'<br>';

			$this->$Model->id = $id;
			$this->$Model->saveField('rank', $i);

		}

	}
		public function rank_rank() {
		$this->Rank = ClassRegistry::init('Rank');
			$wagi = $this->Rank->find('all', array('fields'=>array('Rank.weight_value')));
				$this->Rank->id = 14;
				$this->Rank->saveField('weight_value', 0);
				$start = date("d-m-Y h:i:s");
				$this->Rank->saveField('start', $start);

		$Model = 'University';

		echo '<br><br><br><br><br><br><br><br>';
		echo 'nr | id | srednia | rank<br>';
		$PartArray1 = $this->$Model->find('list', array ('fields' => array($Model.'.id',$Model.'.srednia'),'order' => array($Model.'.srednia' => 'desc')));
		foreach ($PartArray1 as $id1 => $srednia1) {

			$this->$Model->id = $id1;
			$this->$Model->saveField('rank', $id1/1100);
		}
		$PartArray = $this->$Model->find('list', array ('fields' => array($Model.'.id',$Model.'.srednia'),'order' => array($Model.'.srednia' => 'desc')));
		$i=0;
		foreach ($PartArray as $id => $srednia) {
		
			echo $i = ($i + 1).' | ';
			echo $id.' | ';
			echo $srednia.' | ';
			echo $i . '<br>';
			$this->$Model->id = $id;
			$this->$Model->saveField('rank', $i);
		} 
				$this->Rank->id = 14;
				$this->Rank->saveField('weight_value', 1);
				$end =  date("d-m-Y h:i:s");  
				$this->Rank->saveField('end', $end);
				$duration = (strtotime($end) - strtotime($start));
				$this->Rank->saveField('duration', $duration);
	}

	public function rank_abo() {
		$this->Rank = ClassRegistry::init('Rank');
			$wagi = $this->Rank->find('all', array('fields'=>array('Rank.weight_value')));
				$this->Rank->id = 14;
				$this->Rank->saveField('weight_value', 0);
				$start = date("d-m-Y h:i:s");
				$this->Rank->saveField('start', $start);

		$Model = 'University';

		echo '<br><br><br><br><br><br><br><br>';
		echo 'nr | id | ABONAMENT_srednia | rank<br>';
		$PartArray1 = $this->$Model->find('list', array ('fields' => array($Model.'.id',$Model.'.ABONAMENT_srednia'),'order' => array($Model.'.ABONAMENT_srednia' => 'desc')));
		foreach ($PartArray1 as $id1 => $ABONAMENT_srednia1) {

			$this->$Model->id = $id1;
			$this->$Model->saveField('rank', $id1/1100);
		}
		$PartArray = $this->$Model->find('list', array ('fields' => array($Model.'.id',$Model.'.ABONAMENT_srednia'),'order' => array($Model.'.ABONAMENT_srednia' => 'desc')));
		$i=0;
		foreach ($PartArray as $id => $ABONAMENT_srednia) {
		
			echo $i = ($i + 1).' | ';
			echo $id.' | ';
			echo $ABONAMENT_srednia.' | ';
			echo $i . '<br>';
			$this->$Model->id = $id;
			$this->$Model->saveField('rank', $i);
		} 
				$this->Rank->id = 14;
				$this->Rank->saveField('weight_value', 1);
				$end =  date("d-m-Y h:i:s");  
				$this->Rank->saveField('end', $end);
				$duration = (strtotime($end) - strtotime($start));
				$this->Rank->saveField('duration', $duration);
	}
	public function time() {
		echo '<br><br><br><br><br><br><br><br>';
		echo date("d-m-Y h:i:s");echo '<br>';
		$this->Rank = ClassRegistry::init('Rank');
			$wagi = $this->Rank->find('all', array('fields'=>array('Rank.weight_value')));
				$this->Rank->id = 19;
				$this->Rank->saveField('weight_value', 202);
				$this->Rank->id = 19;
				$this->Rank->saveField('start', date("d-m-Y h:i:s"));

		$this->requestAction('cities/time');
		echo date("d-m-Y h:i:s");echo '<br>';
		$this->requestAction('cities/time2');
		echo date("d-m-Y h:i:s");echo '<br>';

		/*
		echo $ready1 = $wagi[15]['Rank']['weight_value'];
		echo '<br>';
		echo $ready2 = $wagi[16]['Rank']['weight_value'];
		

		do {

		   echo $ready1 = $wagi[15]['Rank']['weight_value'];
		   echo ' | ';
		   echo date("d-m-Y h:i:s");
		   echo '<br>';
		   sleep(1);
		} while ($ready1 = 1);
	
		*/

				$this->Rank->id = 19;
				$this->Rank->saveField('weight_value', 1);
				$this->Rank->id = 19;
				$this->Rank->saveField('end', date("d-m-Y h:i:s"));
				

	}
	public function auctualisation(){
		$this->Rank = ClassRegistry::init('Rank');
			$wagi = $this->Rank->find('all', array('fields'=>array('Rank.weight_value')));
				$this->Rank->id = 20;
				$this->Rank->saveField('weight_value', 0);
				$start = date("d-m-Y h:i:s");
				$this->Rank->saveField('start', $start);

				for ($i=11; $i <= 15; $i++) { 
					$nr = 'not ready';
					$this->Rank->id = $i;
					$this->Rank->saveField('weight_value', $nr);
					$this->Rank->saveField('start', $nr);
					$this->Rank->saveField('end', $nr);
					$this->Rank->saveField('duration', $nr);
				}
					$this->Rank->id = 20;
					$this->Rank->saveField('end', $nr);
					$this->Rank->saveField('duration', $nr);

				
				$this->Rank->id = 12;
				$this->Rank->id = 13;
				$this->Rank->id = 14;
				$this->Rank->id = 15;


			$this->requestAction('cities/sredniacities');
			$this->requestAction('universities/sredniauniversities');
			$this->requestAction('universities/abonament');
			//$this->requestAction('universities/rank');
			$this->requestAction('universities/rank_abo');
			$this->requestAction('cities/rank');
		
				$this->Rank->id = 20;
				$this->Rank->saveField('weight_value', 1);
				$end =  date("d-m-Y h:i:s");  
				$this->Rank->saveField('end', $end);
				$duration = (strtotime($end) - strtotime($start));
				$this->Rank->saveField('duration', $duration);
	}
	public function update_all_courses_name(){
				echo '<br><br><br><br><br><br><br><br>';
		$this->Course = ClassRegistry::init('Course');
		$this->CourseonUniversity = ClassRegistry::init('CourseonUniversity');
		$this->City = ClassRegistry::init('City');

		$LIST_IDs = $this->University->find('list', array( 'order' => array('id' => 'ASC'), 'fields'=>array('University.id', )));
		
		$MAX_il_kierunkow = 0;
		foreach ($LIST_IDs as $ID) {
			echo $university_id = $ID;
			echo " | ";
			$LISTA_KIERUNKI = $this->CourseonUniversity->find('list', array('conditions' => array('CourseonUniversity.university_id' => $university_id ), 'fields' => array('CourseonUniversity.course_id')));
			$i = 0; 
			$suma = 0;
			$kier = array();
			$lista_kier = "";
			foreach ($LISTA_KIERUNKI as $key => $kierunek) {
				$i = $i + 1;
				//echo $kierunek." | ";
				if (in_array($kierunek, $kier)){
				}else{
					array_push($kier, $kierunek);
					

					$nazwy_kier = $this->Course->find('list', array(
						'conditions' => array('Course.id' => $kierunek ), 
						'fields' => array('Course.nazwa')));
					echo pr($nazwy_kier);
					echo " |k ";
					echo  $kierunek;
					echo " | ";
					echo $nazwy_kier[$kierunek];
					echo " | ";
					echo $lista_kier = $lista_kier.$nazwy_kier[$kierunek].', ';
					//echo '<br>'.$nazwy_kier[$kierunek].', ';
				}
				
			
			}
			echo 'v'.$lista_kier;
			$this->University->id = $university_id;
			$this->University->saveField('all_courses_names', $lista_kier);
			//pr($kier);
				echo "<br>";
				echo "<br>";
		}
	}
	public function porownanie($id1 = null, $id2 = null){
		echo $id1;
		pr($id2);
	}
	
	 function admin_search() {
        // the page we will redirect to
        $url['action'] = 'index';
         
        // build a URL will all the search elements in it
        // the resulting URL will be
        // example.com/cake/posts/index/Search.keywords:mykeyword/Search.tag_id:3
        foreach ($this->data as $k=>$v){
            foreach ($v as $kk=>$vv){
                $url[$k.'.'.$kk]=$vv;
            }
        }
 
        // redirect the user to the url
        $this->redirect($url, null, true);
    }
	
	public function admin_index() {
		if(isset($this->passedArgs['Search.keywords'])) {
            $keywords = mb_strtolower($this->passedArgs['Search.keywords'], 'UTF-8');
			//Debugger::dump($keywords);
            $this->paginate = array(
                'conditions' => array(
                    'LOWER(University.nazwa) LIKE' => "%$keywords%",
                )
            );
        } else { 
			$this->paginate = array(
				'limit' => 30,
				'order' => array('University.nazwa' => 'asc' ),
				'contain' => array('City.nazwa', 'UniversitiesParameter', 'UniversityType')
			);
		}
        $universities = $this->paginate('University');
		//Debugger::dump($universities);
        $this->set('universities', $universities);
	}
	
	public function admin_edit($id = null) {
 
            if (!$id) {
                $this->Session->setFlash('Please provide a user id');
                $this->redirect(array('action'=>'index'));
            }
			$this->University->contain('UniversitiesParameter' , 'City.id', 'City.nazwa', 'UniversityType');
            $university = $this->University->findById($id);
			$this->set('cities', $this->University->City->find('list'));
			$this->set('type', $this->University->UniversityType->find('list'));

			//Debugger::dump($university);
			
            if ($this->request->is('post') || $this->request->is('put')) {
				//Debugger::dump($this->request->data);
                $filename = strtotime('now');
				$photo = $this->request->data['University']['photo'];
				
				
				$path = "/img/uczelnie_min/";
				$dir = getcwd().$path;
				
				if(!empty($photo['name'])) {
					if (in_array($photo['type'], array('image/jpeg','image/pjpeg','image/png'))) {
					
						$img = $this->University->resize_image($photo, 400, 400);
						$photoFile = "$dir$id.png";
						imagepng($img, $photoFile);	
						$this->request->data['University']['photo'] = $id.'.png';				
					} else {
						$this->Session->setFlash(__('Proszę przesłać plik w formacie JPG albo PNG'));
					}
				} else { 
					$this->request->data['University']['photo'] = $university['University']['photo'];
				}
				//unlink($photo['tmp_name']); 

                if ($this->University->saveAssociated($this->request->data)) {
                    $this->Session->setFlash(__('The user has been updated'));
                    $this->redirect(array('action' => 'edit', $id));
                }else{
                    $this->Session->setFlash(__('Unable to update your user.'));
                }
            } 
           
            $this->request->data = $university;
    }
	
	public function admin_add() {
		//Debugger::dump($this->request->data);
        if ($this->request->is('post')) {
			$filename = strtotime('now');
			$photo = $this->request->data['University']['photo'];
			
			$path = "/img/uczelnie_min/";
				$dir = getcwd().$path;
			if (in_array($photo['type'], array('image/jpeg','image/pjpeg','image/png'))) {

				$img = $this->University->resize_image($photo['tmp_name'], 400, 400);
				$photoFile = "$dir$id.png";
				imagepng($img, $photoFile);	
				$this->request->data['University']['photo'] = $id.'.png';			
			
			} else {
				$this->University->invalidate('photo', __("Only JPG or PNG accepted.",true));
			}
			
			$this->University->create();
            if ($this->University->save($this->request->data, array('validate' => 'only'))) {
                $this->Session->setFlash(__('Utworzono kierunek'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be created. Please, try again.'));
            }   
        }
		//$this->set('coursesTypes', $this->Course->CoursesType->find('list'));
    }
	
	public function admin_delete($kierunek_id) {
         
        if (!$kierunek_id) {
            $this->Session->setFlash('Please provide a user id');
            $this->redirect(array('action'=>'index'));
        }

        if ($this->University->deleteAll(array('University.id' => $kierunek_id), true)) {
            $this->Session->setFlash(__('Uczelnia usunięta'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Kierunek nie mógł być usunięty'));
        $this->redirect(array('action' => 'index'));
    }

    public function save_cities() {
    	$this->University->contain();
		$universities = $this->University->find('all');

		foreach ($universities as $university) {
				$city = $this->University->City->find('first', array('conditions' => array('City.nazwa' =>$university['University']['city_id'] )));

				if (!empty($city)) {
					Debugger::dump($university['University']['id']);

					$this->University->id = $university['University']['id'];
					$this->University->saveField('city_id', $city['City']['id']);
				}
		}
    }
 
}