<div id="footer-wrapper">
	<section id="footer" class="container">
		<div class="row">
			<div class="8u">
				<section>
					<header>
						<h2>Usefull links</h2>
					</header>
					<ul class="dates">
						<li>
							<span class="date"><strong></strong></span>
							<h3><a href="#">Study calculator</a></h3>
							<p>Ipsum dolor sit amet veroeros consequat blandit ipsum phasellus lorem consequat etiam.</p>
						</li>
						<li>
							<span class="date"></span>
							<h3><a href="http://www.zostanstudentem.pl/">Zostań Studentem</a></h3>
							<p>Blandit phasellus lorem ipsum dolor tempor sapien tortor hendrerit adipiscing feugiat lorem.</p>
						</li>
						<li>
							<span class="date"></span>
							<h3><a href="http://blog.zostanstudentem.pl/">Blog</a></h3>
							<p>Dolore consequat sed phasellus lorem sed etiam nullam dolor etiam sed amet sit consequat.</p>
						</li>
						<li>
							<span class="date"></span>
							<h3><a href="http://blog.zostanstudentem.pl/kontakt/">Kontakt</a></h3>
							<p>Feugiat lorem dolor sed nullam tempus lorem ipsum dolor sit amet nullam consequat.</p>
						</li>
						<li>
							<span class="date"></span>
							<h3><a href="#">Blandit tempus aliquam?</a></h3>
							<p>Feugiat sed tempus blandit tempus adipiscing nisl lorem ipsum dolor sit amet dolore.</p>
						</li>
					</ul>
				</section>
			</div>
			<div class="4u">
				<section>
					<header>
						<h2>What's this all about?</h2>
					</header>
					<a href="#" class="image featured"><img src="/img/logo_kwadrat_b.png" alt="" /></a>
					<p>
						Dzięki naszemu serwisowi porównasz wybrane uczelnie, kierunki studiów, czesne, koszty, stypendia, możliwości wyjazdu w ramach programu Erasmus.
					</p>
					<footer>
						<a href="#" class="button">Find out more</a>
					</footer>
				</section>
			</div>
		</div>
		<div class="row">
			<div class="4u">
				<section>
					<header>
						<h2>Contact us</h2>
					</header>
					<ul class="social">
						<li><a class="icon fa-facebook" href="http://www.facebook.com/zostanstudentem"><span class="label">Facebook</span></a></li>
						<li><a class="icon fa-twitter" href="http://twitter.com/ZostanStudentem"><span class="label">Twitter</span></a></li>
						<li><a class="icon fa-linkedin" href="#"><span class="label">LinkedIn</span></a></li>
						<li><a class="icon fa-google-plus" href="http://plus.google.com/117566299125307739451"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="contact">
						<li>
							<h3>Address</h3>
							<p>
								<img src="/img/logoZS.png" width="242" height="29" alt="zs" longdesc="http://www.zostanstudentem.pl/" /><br />
								Królewska 65A,<br />
								30-081 Kraków
							</p>
						</li>
						<li>
							<h3>Mail</h3>
							<p><a href="#">redakcja@zostanstudentem.pl</a></p>
						</li>
					</ul>
				</section>
			</div>
			<div class="4u">
				<section>
					<h2 class="title"><span class="colortext">Z</span>głaszanie <span class="font100">uwag</span></h1>
					<div id="quotes">
						<div id="quote_wrap" style="height: 120px; width: 200px">
							<div class="textItem" style="display: block;">
								W razie zaistnienia błedów lub niepoprawnych danych prosimy o ich zgłoszenie przez Formularz Kontaktowy.
							</div>
						</div>
						
					</div>
					<div class="clearfix"></div>
				</section>
			</div>
			<div class="4u">
				<section>
					<div class="form" >
					<?php
						echo $this->Session->flash('flash');
						
						echo $this->Form->create('Contact', array('url' => '/contacts/index', 'name' => 'MYFORM', 'id' => 'MYFORM','required' => 'required'));

						echo $this->Form->input('name', array('div' => false, 'label' => false, 'name' => 'name', 'size' => '30', 'required' => 'required', 'type' => 'text', 'id' => 'name', 'class' => 'leftradius', 'placeholder' => 'Imie, Nazwisko' ));
						echo $this->Form->input('email', array('div' => false, 'label' => false, 'name' => 'email', 'required' => 'required', 'size' => '30', 'id' => 'email', 'class' => 'rightradius', 'placeholder' => 'Twój Mail' ));

						/*echo $this->Form->input('thema', array(
							'required' => 'required',
							'div' => false, 
							'label' => false, 							
							'class' => 'col-md-12 allradius',
						    'options' => array('Współpraca PR, materiały prasowe', 'Uzupełnienie profilu uczelni', 'Aktualizacja profilu'),
						    'empty' => '(Wybierz Temat)'
						));*/
						echo $this->Form->input('message', array('div' => false, 'required' => 'required', 'label' => false, 'type' => 'textarea', 'class' => 'col-md-12 allradius', 'name' => 'message', 'placeholder' => 'Wiadomość', 'rows'=>'3' ));
						/*echo $this->Form->input('IP', array('type' => 'hidden', 'value' => $ip));
						echo $this->Form->input('DATE_TIME', array('type' => 'hidden', 'value' => $date));
						echo $this->Form->input('PATH', array('type' => 'hidden', 'value' => $path));*/?>
						
						<div class="captcha"><?php //$this->Captcha->render($captchaSettings);?></div>
						
						<?php 
						echo $this->Form->submit('Wyślij', array('div' => true, 'label' => false, 'type' => 'submit', 'id' => 'Send', 'class' => 'btn btn-default btn-md', 'name'=>'button'));
						echo $this->Form->end();
					?>
					</div>
					<!-- <header>
						<h2>Ipsum et phasellus</h2>
					</header>
					<ul class="divided">
						<li><a href="#">Lorem ipsum dolor sit amet sit veroeros</a></li>
						<li><a href="#">Sed et blandit consequat sed tlorem blandit</a></li>
						<li><a href="#">Adipiscing feugiat phasellus sed tempus</a></li>
						<li><a href="#">Hendrerit tortor vitae mattis tempor sapien</a></li>
						<li><a href="#">Sem feugiat sapien id suscipit magna felis nec</a></li>
						<li><a href="#">Elit class aptent taciti sociosqu ad litora</a></li>
					</ul> -->
				</section>
			</div>
		</div>
		<div class="row">
			<div class="12u">
			
				<!-- Copyright -->
					<div id="copyright">
						<ul class="links">
							<li>&copy; Copyright 2014 PorownywarkaUczelni.pl All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>

			</div>
		</div>
	</section>
</div>