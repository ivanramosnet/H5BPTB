<?php

/**
 * @package		Joomla.Site
 * @subpackage	Templates.h5bptb
 * @copyright	Copyright (C) 2011 - 2014 Iván Ramos Jiménez. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * 
 */

defined('_JEXEC') or die;
if (!isset($this->error)) {
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}
?>
<!DOCTYPE html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.min.css">
		
		<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jui/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="span12">
					<div class="jumbotron center">
						<h1><?php echo $this->error->getMessage(); ?> <small><font face="Tahoma" color="red"><?php echo $this->error->getCode(); ?></font></small></h1>
						<br />
						<p><strong><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></strong></p>
						<ol>
							<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
							<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
							<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
							<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
							<li><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
							<li><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
						</ol>
						<p><strong><?php echo JText::_('JERROR_LAYOUT_PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?></strong></p>
						<ul>
							<li><a href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></li>
							<li><a href="<?php echo $this->baseurl; ?>/index.php?option=com_search" title="<?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?></a></li>
						</ul>
						<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?>.</p>
						<div>
							<p><?php echo $this->error->getMessage(); ?></p>
							<p>
								<?php if ($this->debug) :
									echo $this->renderBacktrace();
								endif; ?>
							</p>
						</div>
					</div>
					<br />
				</div>
			</div>
		</div>
		<?php JHtml::_('jquery.framework'); ?>
		<?php JHtml::_('bootstrap.framework'); ?>
		<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/script.js"></script>
	</body>
</html>
