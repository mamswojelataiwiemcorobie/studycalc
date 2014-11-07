<?php
// app/Controller/BasketsController.php
App::uses('AppController', 'Controller');

class BasketsController extends AppController {

    public function index() {
    	$this->Basket->contain();
        $basket = $this-> Basket-> find('all', array('order'=> array('basket_type_id', 'name')));
        Debugger:: dump($basket);
        $this->set('basket', $basket);
    }
}