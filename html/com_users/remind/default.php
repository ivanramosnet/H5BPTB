<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
?>
<div class="remind <?php echo $this->pageclass_sfx?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
	<div class="page-header">
		<h1>
			<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
	</div>
	<?php endif; ?>

	<form id="user-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=remind.remind'); ?>" method="post" class="form-validate form-horizontal" role="form">

		<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
		<p><?php echo JText::_($fieldset->label); ?></p>

		<fieldset>
			<?php foreach ($this->form->getFieldset($fieldset->name) as $name => $field) : ?>
				<div class="form-group">
					<?php $field->labelclass .= " col-sm-3 control-label"; ?>
					<?php echo $field->label; ?>
					<div class="col-sm-9">
						<?php $field->class .= " form-control"; ?>
						<?php echo $field->input; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</fieldset>
		<?php endforeach; ?>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<button type="submit" class="btn btn-primary validate"><?php echo JText::_('JSUBMIT'); ?></button>
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</div>
	</form>
</div>
