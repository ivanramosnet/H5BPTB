<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$data = $displayData;

$metatitle = JHtml::tooltipText(JText::_($data->tip ? $data->tip : $data->title), JText::_('JGLOBAL_CLICK_TO_SORT_THIS_COLUMN'), 0);
JHtml::_('bootstrap.tooltip');
?>
<a href="#" onclick="return false;" class="js-stools-column-order hasTooltip" data-order="<?php echo $data->order; ?>" data-direction="<?php echo strtoupper($data->direction); ?>" data-name="<?php echo JText::_($data->title); ?>" title="<?php echo $metatitle; ?>">
	<?php if (!empty($data->icon)) : ?>
		<i class="<?php echo $data->icon; ?>"></i>
	<?php endif; ?>
	<?php if (!empty($data->title)) : ?>
		<?php echo JText::_($data->title); ?>
	<?php endif; ?>
	<?php if ($data->order == $data->selected) : ?>
		<i class="<?php echo $data->orderIcon; ?>"></i>
	<?php endif; ?>
</a>
