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
                <a href="#" class="image featured"><img src="images/pic08.jpg" alt="" /></a>
                <header>
                  <h3>Magna tempus consequat lorem</h3>
                  <p>Posted 45 minutes ago</p>
                </header>
                <p>Lorem ipsum dolor sit amet sit veroeros sed et blandit consequat sed veroeros lorem et blandit  adipiscing feugiat phasellus tempus hendrerit, tortor vitae mattis tempor, sapien sem feugiat sapien, id suscipit magna felis nec elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos lorem ipsum dolor sit amet.</p>
                <footer>
                  <ul class="actions">
                    <li><a href="#" class="button icon fa-file-text">Continue Reading</a></li>
                    <li><a href="#" class="button alt icon fa-comment">33 comments</a></li>
                  </ul>
                </footer>
              </section>
            </div>
            <div class="6u">
              <section class="box">
                <a href="#" class="image featured"><img src="images/pic09.jpg" alt="" /></a>
                <header>
                  <h3>Aptent veroeros et aliquam</h3>
                  <p>Posted 45 minutes ago</p>
                </header>
                <p>Lorem ipsum dolor sit amet sit veroeros sed et blandit consequat sed veroeros lorem et blandit  adipiscing feugiat phasellus tempus hendrerit, tortor vitae mattis tempor, sapien sem feugiat sapien, id suscipit magna felis nec elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos lorem ipsum dolor sit amet.</p>
                <footer>
                  <ul class="actions">
                    <li><a href="#" class="button icon fa-file-text">Continue Reading</a></li>
                    <li><a href="#" class="button alt icon fa-comment">33 comments</a></li>
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
   <section class="service-box topspace30" id="service-top">
    <div class="container">
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
	
	
  