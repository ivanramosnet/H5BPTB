<?php

/**
 * @package		Joomla.Site
 * @subpackage	Templates.h5bp
 * @copyright	Copyright (C) 2011 - 2012 Iván Ramos Jiménez. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * 
 */

defined('_JEXEC') or die;

/* The following line loads the MooTools JavaScript Library */
JHtml::_('behavior.framework', true);

/* The following line gets the application object for things like displaying the site name */
$app = JFactory::getApplication();
?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <!-- The following JDOC Head tag loads all the header and meta information from your site config and content. -->
	<jdoc:include type="head" />
    
    <!-- Mobile viewport optimized: h5bp.com/viewport -->
    <meta name="viewport" content="width=device-width">
    
    <link rel="stylesheet/less" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/less/style.less">
	<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/libs/less-1.2.1.min.js"></script>
    
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>
</head>
<body>
	<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
	<header>
	
		<div class="navbar navbar-fixed-top">
	      <div class="navbar-inner">
	        <div class="container">
	          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </a>
	          <a class="brand" href="#"><?php echo $app->getCfg('sitename'); ?></a>
	          <nav class="nav-collapse">
	            <jdoc:include type="modules" name="position-1" style="none" />
	          </nav><!--/.nav-collapse -->
	        </div>
	      </div>
	    </div>
	
	</header>
	<div class="container">
		
		<div class="row">
		
			<?php if($this->countModules('left')) : ?>
				<aside class="span3">
					<jdoc:include type="modules" name="position-7" style="xhtml"/>
				</aside>
			<?php endif; ?>
			<section class="<?php echo $this->countModules('left') ? 'span9' : 'span12'; ?>">
				<div class="hero-unit">
					<jdoc:include type="message" />
					<jdoc:include type="component" />
				</div>
			</section>
		
		</div>
			
			<div class="row">
				<div class="span4">
					<jdoc:include type="modules" name="position-9" style="xhtml"/>
				</div>
				<div class="span4">
					<jdoc:include type="modules" name="position-10" style="xhtml"/>
				</div>
				<div class="span4">
					<jdoc:include type="modules" name="position-11" style="xhtml"/>
				</div>
			</div>
		
		<hr>
		
		<footer>
			<p>
				<?php echo JText::_('TPL_H5BP_POWERED_BY');?> <a href="http://www.joomla.org/">Joomla!&#174;</a>
			</p>
		</footer>
	</div>
	
	<jdoc:include type="modules" name="debug" />
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/libs/jquery-1.7.1.min.js"><\/script>')</script>
	
	<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/libs/bootstrap/transition.js"></script>
	<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/libs/bootstrap/collapse.js"></script>
	
	<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/script.js"></script>
	<script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
	
</body>
</html>
		