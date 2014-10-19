<?php
	class AjaksController extends AppController {
	public $components = array('DataTable');
	
	public function index() {
		$uczelnie_erasmus = "Wybierz Kraj, do którego chcesz wyjechać na Erazmusa";
		
		//$this->Session->setFlash('Your stuff has been saved.');

		$this->set('title_for_layout', 'Gdzie na Erasmusa?');
		$this->set('description_for_layout', 'Gdzie na Erasmusa? Najlepsze miasta do studiowania za granicą  w ramach projektu Erasmus.');
		$this->set('keywords_for_layout', 'erasmus, kraj, miasta, uczelnia,');

		$kraje = $this-> Ajak-> find ('list', array(
			'fields' => array('Ajak.kraj', 'Ajak.kraj'),
			'group' => array('Ajak.kraj')
			));
		$this-> set ('kraje_v', $kraje);
		$this-> set ('uczelnie_erasmus', $uczelnie_erasmus);
		
		//$all = $this-> Ajak-> find ('all');
		//$this-> set ('uczelnie_erasmus', $all);
		
		
	}
	public function uczelnie_erasmus() {	
		$dane= $this->request->data;
		$uczelnie_erasmus = "Wybierz Kraj, do którego chcesz wyjechać na Erazmusa";
		$url = "no link";	
			if (isset($dane['Ajak']['uczelnia'])) {
				$uczelnie_erasmus = $this-> Ajak-> find ('all', array('conditions' => array('Ajak.nazwa_uczelni' => $dane['Ajak']['uczelnia'] )));
				$url = $this->Ajak->find('first', array('conditions' => array('Ajak.nazwa_uczelni' => $dane['Ajak']['uczelnia'] ), 'fields'=>array('Ajak.URL', )));
				$url = $url['Ajak']['URL'];
			} else if (isset($dane['Ajak']['miasto'])) {
				$uczelnie_erasmus = $this-> Ajak-> find ('all', array('conditions' => array('Ajak.miasto' => $dane['Ajak']['miasto'] )));
			
			} else if (isset($dane['Ajak']['kraj'])) {
				$uczelnie_erasmus = $this-> Ajak-> find ('all', array('conditions' => array('Ajak.kraj' => $dane['Ajak']['kraj'] )));
			} 
		$this-> set ('uczelnie_erasmus', $uczelnie_erasmus);
		$this-> set ('url', $url);
		
	}
	public function getByKraj() {		
		$kraj = $this->request->data['Ajak']['kraj'];
		//$kraj = 'Belgia';
		$miasta = $this->Ajak->find('list', array(
			'fields' => array('Ajak.miasto', 'Ajak.miasto'),
			'conditions' => array('Ajak.kraj' => $kraj),
			'recursive' => -1
			));
 
		$this->set('miasta',$miasta);
		$this->layout = false;
	}
	
	public function getByMiasto() {		
		$miasto = $this->request->data['Ajak']['miasto'];

		$uczelnie = $this->Ajak->find('list', array(
			'fields' => array('Ajak.nazwa_uczelni', 'Ajak.nazwa_uczelni'),
			'conditions' => array('Ajak.miasto' => $miasto),
			'recursive' => -1
			));
 
		$this->set('uczelnie',$uczelnie);
		$this->layout = false;
	}

	public function view($id = null) { //null=>1
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}
		$Ajak = $this->Ajak->findById($id);
		if (!$Ajak) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('Ajak', $Ajak);

		$this->set('title_for_slider2', 'Gdzie na Erasmusa?');

		$ucz = $this->Ajak->find('all', array(
						'conditions' => array('Ajak.URL' => $Ajak['Ajak']['URL'])));
		$cit =  $this->Ajak->find('all', array(
						'conditions' => array('Ajak.kraj' => $Ajak['Ajak']['kraj'])));		

		$this->set('ucz', $ucz);
		$this->set('cit', $cit);
	}

}