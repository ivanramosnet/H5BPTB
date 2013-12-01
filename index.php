<?php
/**
 * @package		Joomla.Site
 * @subpackage	Templates.h5bptb
 * @copyright	Copyright (C) 2011 - 2013 Iván Ramos Jiménez. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * 
 */
defined('_JEXEC') or die;

// check modules
$showRightColumn = ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom = ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showLeftColumn = ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn == 0 and $showLeftColumn == 0)
    $showNoColumns = 1;
else
    $showNoColumns = 0;

/* The following line gets the application object for things like displaying the site name */
$app = JFactory::getApplication();
$params = $app->getParams();
$menu = $app->getMenu();
$pageclass = $params->get('pageclass_sfx');
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
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/bootstrap.min.css">
<!--    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/bootstrap-theme.min.css">-->
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css">
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/vendor/modernizr2.7.0.min.js"></script>
</head>
<body id="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('page')) . ' ' . $pageclass; ?>">
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
                    <div class="nav-collapse">
                        <jdoc:include type="modules" name="position-1" style="none"/>
                        <jdoc:include type="modules" name="position-0" style="none"/>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="span12">
                <div id="breadcrumbs">
                    <jdoc:include type="modules" name="position-2" style="none"/>
                </div>
                <div class="row">
                    <?php if ($showLeftColumn) : ?>
                        <aside class="span3">
                            <jdoc:include type="modules" name="position-7" style="xhtml"/>
                            <jdoc:include type="modules" name="position-4" style="xhtml"/>
                            <jdoc:include type="modules" name="position-5" style="xhtml"/>
                        </aside>
                    <?php endif; ?>
                    <section class="<?php echo ($showNoColumns ? 'span12' : (($showLeftColumn == 0 or $showRightColumn == 0) ? 'span9' : 'span6')); ?>">
                        <?php if ($this->countModules('position-12')): ?>
                            <div id="top">
                                <jdoc:include type="modules" name="position-12"/>
                            </div>
                        <?php endif; ?>
                        <div>
                            <jdoc:include type="message" />
                            <jdoc:include type="component" />
                        </div>
                    </section>
                    <?php if ($showRightColumn) : ?>
                        <aside class="span3">
                            <jdoc:include type="modules" name="position-6" style="xhtml"/>
                            <jdoc:include type="modules" name="position-8" style="xhtml"/>
                            <jdoc:include type="modules" name="position-3" style="xhtml"/>
                        </aside>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if ($showbottom) : ?>
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
        <?php endif; ?>
        <hr>
        <footer>
            <div class="row">
                <div class="span4">
                    <p>
                        <?php echo JText::_('TPL_H5BPTB_POWERED_BY'); ?> <a href="http://www.joomla.org/">Joomla!&#174;</a>
                    </p>
                </div>
                <div class="span4 offset4">
                    <jdoc:include type="modules" name="position-14" />
                </div>
            </div>
        </footer>
    </div>
<jdoc:include type="modules" name="debug" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>')</script>
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/vendor/bootstrap.min.js"></script>
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/script.js"></script>
<script>
    var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
    (function(d, t) {
        var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
        g.src = '//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g, s)
    }(document, 'script'));
</script>
</body>
</html>