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

    public function basketincountry($country) {
    	 $basket = $this-> Basket-> BasketinCountry-> find('all', array('conditions' => array('BasketinCountry.country_id'=> $country),
    	 																'order'=> array('Basket.basket_type_id')));
        Debugger:: dump($basket);
        $this->set('basket', $basket);
    }
}