<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_languages
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('stylesheet', 'mod_languages/template.css', array(), true);
?>
<ul class="nav pull-right">
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<?php echo JText::_('JFIELD_LANGUAGE_LABEL');?><b class="caret"></b>
		</a>
		<ul class="dropdown-menu">
			<?php foreach($list as $language):?>
				<?php if ($params->get('show_active', 0) || !$language->active):?>
					<li  dir="<?php echo JLanguage::getInstance($language->lang_code)->isRTL() ? 'rtl' : 'ltr' ?>">
					<a href="<?php echo $language->link;?>">
					<?php if ($params->get('image', 1)):?>
						<?php echo JHtml::_('image', 'mod_languages/'.$language->image.'.gif', $language->title_native, array('title'=>$language->title_native), true);?>
					<?php else : ?>
						<?php echo $params->get('full_name', 1) ? $language->title_native : strtoupper($language->sef);?>
					<?php endif; ?>
					</a>
					</li>
				<?php endif;?>
			<?php endforeach;?>
		</ul>
	</li>
</ul>

