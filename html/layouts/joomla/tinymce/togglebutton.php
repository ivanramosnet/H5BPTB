<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$name = $displayData;

?>
<div class="toggle-editor btn-toolbar pull-right clearfix">
	<div class="btn-group">
		<a class="btn btn-default" href="#"
			onclick="tinyMCE.execCommand('mceToggleEditor', false, '<?php echo $name; ?>');return false;"
			title="<?php echo JText::_('PLG_TINY_BUTTON_TOGGLE_EDITOR'); ?>"
		>
			<i class="glyphicon glyphicon-eye"></i> <?php echo JText::_('PLG_TINY_BUTTON_TOGGLE_EDITOR'); ?>
		</a>
	</div>
</div>