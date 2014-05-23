<?php

/**
 * @package		Joomla.Site
 * @subpackage	Templates.h5bptb
 * @copyright	Copyright (C) 2011 - 2014 Iván Ramos Jiménez. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * 
 */

defined('_JEXEC') or die;

// check modules
$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom			= ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showLeftColumn		= ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showLeftColumn==0) $showNoColumns = 1;
else $showNoColumns = 0;

/* The following line gets the application object for things like displaying the site name */
$app = JFactory::getApplication();

?>

<!DOCTYPE html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<jdoc:include type="head" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/bootstrap.min.css">
		<style>
            body {
                padding-top: 70px;
                padding-bottom: 20px;
            }
        </style>
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css">
		
		<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jui/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
	<body>
		<!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><?php echo $app->getCfg('sitename'); ?></a>
					</div>
					<div class="collapse navbar-collapse">
						<jdoc:include type="modules" name="position-1" style="none"/>
						<jdoc:include type="modules" name="position-0" style="navSearch"/>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		
		
		<div class="container">
					<div class="row">
						<?php if($showLeftColumn) : ?>
							<aside class="col-md-3">
								<jdoc:include type="modules" name="position-7" style="xhtml"/>
								<jdoc:include type="modules" name="position-4" style="xhtml"/>
								<jdoc:include type="modules" name="position-5" style="xhtml"/>
							</aside>
						<?php endif; ?>
						<section class="<?php echo ($showNoColumns ? 'col-md-12' : (($showLeftColumn==0 or $showRightColumn==0) ? 'col-md-9':'col-md-6')); ?>">
							<?php if ($this->countModules('position-12')): ?>
								<div id="top">
									<jdoc:include type="modules" name="position-12"/>
								</div>
							<?php endif; ?>
							<div>
								<jdoc:include type="message" />
								<jdoc:include type="component" />
								<jdoc:include type="modules" name="position-2" style="none" />
							</div>
						</section>
						<?php if($showRightColumn) : ?>
							<aside class="col-md-3">
								<jdoc:include type="modules" name="position-6" style="xhtml"/>
								<jdoc:include type="modules" name="position-8" style="xhtml"/>
								<jdoc:include type="modules" name="position-3" style="xhtml"/>
							</aside>
						<?php endif; ?>
					</div>
				
			<?php if ($showbottom) : ?>
				<div class="row">
					<div class="col-md-4">
						<jdoc:include type="modules" name="position-9" style="xhtml"/>
					</div>
					<div class="col-md-4">
						<jdoc:include type="modules" name="position-10" style="xhtml"/>
					</div>
					<div class="col-md-4">
						<jdoc:include type="modules" name="position-11" style="xhtml"/>
					</div>
				</div>
			<?php endif ; ?>
			
			<hr>
			
			<footer>
				<div class="row">
					<div class="col-md-3">
						<p>
							<?php echo JText::_('TPL_H5BPTB_POWERED_BY');?> <a href="http://www.joomla.org/">Joomla!&#174;</a>
						</p>
						
					</div>
					<div class="col-md-3 offset4">
						<jdoc:include type="modules" name="position-14" />
					</div>
				</div>
			</footer>
		</div>
		
		<jdoc:include type="modules" name="debug" />
		
		<?php JHtml::_('jquery.framework'); ?>
		
		<?php JHtml::_('bootstrap.framework'); ?>
		
		<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/script.js"></script>
		
	</body>
</html>