<?php
/**
 * @version		$Id$
 * @author		Iván Ramos Jiménez
 * @package		Joomla.Site
 * @subpackage	com_coopag
 * @copyright	Copyright (C) 2011 Iván Ramos Jiménez. All rights reserved.
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
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	<head>
		<!-- The following JDOC Head tag loads all the header and meta information from your site config and content. -->
		<jdoc:include type="head" />
		
		<meta charset="utf-8">
			
		<!-- Use the .htaccess and remove these lines to avoid edge case issues.
			More info: h5bp.com/b/378 -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<!-- Mobile viewport optimized: j.mp/bplateviewport -->
		<meta name="viewport" content="width=device-width,initial-scale=1">
		
		<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
		
		<!-- The following five lines load the Blueprint CSS Framework (http://blueprintcss.org). If you don't want to use this framework, delete these lines. -->
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/screen.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/blueprint/print.css" type="text/css" media="print" />
		<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
    	
		<!-- CSS: implied media=all -->
		<!-- CSS concatenated and minified via ant build script-->
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.css">
		<!-- end CSS-->
		
		<!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->
		
		<!-- All JavaScript at the bottom, except for Modernizr / Respond.
			Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
			For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
		<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/libs/modernizr-2.0.6.min.js"></script>

	</head>
	
	<body>
		<div id="container" class="container">
			<header>
				<hr class="space" />
				<h1 class="joomla-header span-16 append-1"><?php echo $app->getCfg('sitename'); ?></h1>
				<?php if($this->countModules('h5bp-search')) : ?>
					<div class="joomla-search span-7 last">
		  	 			<jdoc:include type="modules" name="h5bp-search" style="none" />
					</div>
				<?php endif; ?>
				
			</header>
			<?php if($this->countModules('h5bp-topmenu')) : ?>
				<nav class="span-24">
					<jdoc:include type="modules" name="h5bp-topmenu" style="container" />
				</nav>
			<?php endif; ?>
			
			<div id="main" role="main" class="span-16 append-1">
				<?php if($this->countModules('h5bp-topquote')) : ?>
					<jdoc:include type="modules" name="h5bp-topquote" style="none" />
				<?php endif; ?>
				<jdoc:include type="message" />
				<jdoc:include type="component" />
				<hr />
				<?php if($this->countModules('h5bp-bottomleft')) : ?>
				 	<div class="span-7 colborder">
						<jdoc:include type="modules" name="h5bp-bottomleft" style="bottommodule" />
		        	</div>
		        <?php endif; ?>
	
		        <?php if($this->countModules('h5bp-bottommiddle')) : ?>
					<div class="span-7 last">
		        		<jdoc:include type="modules" name="h5bp-bottommiddle" style="bottommodule" />
					</div>
				<?php endif; ?>
			</div>
			
			<?php if($this->countModules('h5bp-sidebar')) : ?>
				<aside class="span-7 last">
					<jdoc:include type="modules" name="h5bp-sidebar" style="sidebar" />
				</aside>
			<?php endif; ?>
			
			<footer class="joomla-footer span-16 append-1">
				<hr />
				&copy;<?php echo date('Y'); ?> <?php echo $app->getCfg('sitename'); ?>
			</footer>
		</div> <!--! end of #container -->
		
		<jdoc:include type="modules" name="debug" />
		
		<!-- JavaScript at the bottom for fast page loading -->
		
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/libs/jquery-1.6.2.min.js"><\/script>')</script>
		
		<!-- scripts concatenated and minified via ant build script-->
			<script defer src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/plugins.js"></script>
			<script defer src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/script.js"></script>
		<!-- end scripts-->
		
		<!-- Change UA-XXXXX-X to be your site's ID -->
		<script>
			window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
			Modernizr.load({
				load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
			});
		</script>
		
		<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
			chromium.org/developers/how-tos/chrome-frame-getting-started -->
		<!--[if lt IE 7 ]>
			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
	</body>
</html>
