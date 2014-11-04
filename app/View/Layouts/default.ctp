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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<html>
	<?php
		echo $this->Html->docType('html5');
		// Outputs: <!DOCTYPE html>
	?>
<head>
	<?php 
		echo $this->Html->charset(); 
		// Outputs: echo $this->Html->charset(); 
		echo $this->Html->meta('viewport', 'width=device-width, initial-scale=1.0');
		// Outputs: <meta name="viewport" content="width=device-width, initial-scale=1.0">
	?>
	
	<title><?php echo $title_for_layout . ' | Study Calculator'  ?></title>
	
	<?php
		echo '<link rel="shortcut icon" href="http://szkolywyzsze.edu.pl/img/icon/icon5.ico" />';

		if(isset($description_for_layout)){ 
			echo $this->Html->meta('description', $description_for_layout);
			// Outputs: <meta name='description' content='".$description_for_layout."' /> 
		}
		if(isset($keywords_for_layout)){ 
			echo $this->Html->meta('keywords', $keywords_for_layout);
			// Outputs: <meta name='keywords' content='".$keywords_for_layout."' />"; 
		} 
		//echo $this->Html->meta('favicon.ico', 'img/icon/favicon.ico', array('type' => 'icon'));
			// Outputs: <link href="http://example.com/favicon.ico" title="favicon.ico" type="image/x-icon"  rel="alternate" />
			// InSteadOf: 
		//echo '<link rel="shortcut icon" href="img/icon/favicon.ico" />';

		//Studeo LAYOUT
		echo $this->Html->css('bootstrap.css');
		echo $this->Html->css('style.css');
		//Responsive
		echo $this->Html->css('responsive.css');
		//Choose Layout
		echo $this->Html->css('layout-semiboxed.css');
		//Choose Skin
		echo $this->Html->css('skin-red.css', null, array('media' => 'screen', 'id' => 'main-color'));
		//<link rel="stylesheet" href="css/skin-red.css" rel="stylesheet" id="main-color" media="screen" />
		
		if ($tabele) 	{
			echo $this->Html->css('/js/datatables/css/jquery.dataTables.css', null, array('media' => 'screen'));
			echo $this->Html->css('jquery.dataTables_themeroller.css');
			echo $this->Html->css('table_chr1.css');
			echo $this->Html->css('table_nowrap.css');
			//responsive
			echo $this->Html->css('/css/display/rwd-table.css');
		}
		if ($this->name == 'Universities') {
			echo $this->Html->css('uni_v.css');
		}

		?>
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="/js/jquery.min.js"></script>
		<script src="/js/jquery.dropotron.min.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/init.js"></script>
			<link rel="stylesheet" href="/css/skel.css" />
			<link rel="stylesheet" href="/css/style_d.css" />
			<link rel="stylesheet" href="/css/style-desktop.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->

	
	<!-- IE -->
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	      <script src="js/html5shiv.js"></script>
	      <script src="js/respond.min.js"></script>	   
	<![endif]-->
	<!--[if lte IE 8]>
		<link href="css/ie8.css" rel="stylesheet">
	<![endif]-->
	<?php 
		echo $this->Html->css('http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css');
		echo $this->Html->css('jdy.css');
		if ($mapy) 	{
			//echo '<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>';
			echo '<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>';
		}
	?>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script><!--google chart-->

	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52209637-1', 'szkolywyzsze.edu.pl');
  ga('send', 'pageview');

</script>
</head>
<body class="homepage">

		<!-- Header -->
			<div id="header-wrapper">
				<div id="header">
					
					<!-- Logo -->
						<h1 class="logo"><a href="/"><img src="/img/logo_kwadrat.png"/></a></h1>
					
					<!-- Nav -->
					<?php echo $this->element('menu_top'); ?>

					<!-- Banner -->
					<?php
						if ($this->request->here == '/') 		{
							echo $this->element('slider');
						} 		else 		{
							echo $this->element('slider2');
						}  
					?>		
				</div>
			</div>

		<!-- Main -->
			<div id="main-wrapper">
				<div class="container">
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>

		<!-- Footer -->
			<?php echo $this->element('footer'); ?>

	<?php
		echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js');
		echo $this->Html->script('https://www.google.com/jsapi');
		if ($tabele) 		{
			echo $this->Html->script('/js/datatables/js/jquery.dataTables.min.js');
			//echo $this->Html->script('/js/datatables/js/jquery.dataTables.rowGrouping.js');
			echo $this->Html->script('/jquery.dataTables.yadcf.js');
			echo $this->Html->script('http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js');
			echo $this->Html->script('funkcje_tabele.js');
		}
		echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js');

		if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 	
			echo $this->Js->writeBuffer();
		// Writes cached scripts

		echo $this->Html->script('bootstrap.js');
		echo $this->Html->script('common.js');
		echo $this->Html->script('plugins.js');
		
		echo $this->Html->script('index_func.js');
	?>
	</body>
</html>
