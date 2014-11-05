<?php
/**
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
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/*if (!Configure::read('debug')):
	throw new NotFoundException();
endif;
App::uses('Debugger', 'Utility');*/
?>


<div class="row">
    <div class="12u">
      <?php echo $this->element('cities_popular'); ?>
    </div>
  </div>
  <div class="row">
    <div class="12u">

      <!-- Blog -->
        <section>
          <header class="major">
            <h2>Popular universities</h2>
          </header>
          <div class="row">
            <div class="6u">
              <section class="box">
                <a href="#" class="image featured"><img src="img/ucl.jpg" alt="" /></a>
                <header>
                  <h3>University College London</h3>
                </header>
                <p>UCL was established in 1826 to open up education in England for the first time to students of any race, class or religion. UCL was also the first university to welcome female students on equal terms with men. 
                Academic excellence and conducting research that addresses real-world problems inform our ethos to this day.</p>
                <footer>
                  <ul class="actions">
                    <li><a href="universities/university_result/1213/University College London" class="button icon fa-file-text">Costs</a></li>
                  </ul>
                </footer>
              </section>
            </div>
            <div class="6u">
              <section class="box">
                <a href="#" class="image featured"><img src="img/glasgow.jpg" alt="" /></a>
                <header>
                  <h3>University of Glasgow</h3>
                </header>
                <p>The University of Glasgow (Scottish Gaelic: Oilthigh Ghlaschu, Latin: Universitas Glasguensis) is the fourth-oldest university in the English-speaking world and one of Scotland's four ancient universities. The university was founded in 1451 and is often ranked in the world's top 100 universities in tables compiled by various bodies. In 2013, Glasgow moved to its highest ever position, placing 51st in the world and 9th in the UK in the QS World University Rankings.</p>
                <footer>
                  <ul class="actions">
                    <li><a href="#" class="button icon fa-file-text">Costs</a></li>
                  </ul>
                </footer>
              </section>
            </div>
          </div>
        </section>
      
    </div>
  </div>

    <!-- SERVICE BOXES
================================================== -->
   <section class="service-box box topspace30" id="service-top">
    <div>
      <div class="row" id="tops">
        <div class="col-md-4 text-center animated fadeInLeftNow notransition">
          <div class="icon-box-top">
            <i class="fontawesome-icon medium circle-white center icon-book"></i>            
               <?php echo $this->element('uczelnie_top'); ?>            
          </div>
        </div>
        <div class="col-md-4 text-center animated fadeInLeftNow notransition">
          <div class="icon-box-top">
            <i class="fontawesome-icon medium circle-white center icon-arrow-right"></i>            
               <?php echo $this->element('kierunki_top'); ?>            
          </div>
        </div>
        <div class="col-md-4 text-center animated fadeInRightNow notransition">
          <div class="icon-box-top">
            <i class="fontawesome-icon medium circle-white center icon-home"></i>
              <?php echo $this->element('miasta_top'); ?>
          </div>
        </div>
      </div>
    </div>
   </section>
    <!-- /.service-box end-->
	
	
  