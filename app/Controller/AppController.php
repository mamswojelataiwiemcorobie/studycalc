<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array('Js', 'Html', 'Form', 'Captcha');
	public $components = array(
		'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'users',
                'action' => 'dashboard'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            )
        ),
        'RequestHandler',
		'Paginator',
		'Cookie',
    );
	
	public function resize_image($file, $w, $h, $crop=FALSE) {
		list($width, $height) = getimagesize($file['tmp_name']);
		$r = $width / $height;
		if ($crop) {
			if ($width > $height) {
				$width = ceil($width-($width*abs($r-$w/$h)));
			} else {
				$height = ceil($height-($height*abs($r-$w/$h)));
			}
			$newwidth = $w;
			$newheight = $h;
		} else {
			if ($w/$h > $r) {
				$newwidth = $h*$r;
				$newheight = $h;
			} else {
				$newheight = $w/$r;
				$newwidth = $w;
			}
		}
		
		if (in_array($file['type'], array('image/jpeg','image/pjpeg'))) {
			$src = imagecreatefromjpeg($file['tmp_name']);
		} else {
			$src = imagecreatefrompng($file['tmp_name']);
		}
		$dst = imagecreatetruecolor($newwidth, $newheight);
		imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		return $dst;
	}


	function beforeFilter() {
        parent::beforeFilter();
		if ((isset($this->params['prefix']) && ($this->params['prefix'] == 'admin')) || ($this->params['controller'] == 'users')) {
			$this->layout = 'admin';
			$this->Auth->allow('login');
		} else {
			$this->Auth->allow();
		}
		
        //$this->set('tracks', ClassRegistry::init('Track')->find('first');
		$this->set('init', false);
		$this->set('tabele', false);
		$this->set('mapy', false);
    }

	public function beforeRender(){
        parent::beforeFilter();
        if($this->RequestHandler->responseType() == 'json'){
            $this->RequestHandler->setContent('json', 'application/json' );
        }
		//$this->Cookie->httpOnly = true;
		//$cookie = $this->Cookie->read('rememberMe');
		
		$this->Cookie->httpOnly = true;
		$cookie = $this->Cookie->read('New'); 		
	}	
}
