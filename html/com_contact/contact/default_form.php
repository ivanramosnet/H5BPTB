<?php

 /**
 * @package		Joomla.Site
 * @subpackage	com_contact
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.tooltip');
 if (isset($this->error)) : ?>
	<div class="contact-error">
		<?php echo $this->error; ?>
	</div>
<?php endif; ?>

<div class="contact-form">
	<form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate form-horizontal">
		<fieldset>
			<legend><?php echo JText::_('COM_CONTACT_FORM_LABEL'); ?></legend>
			<dl>
				<div class="control-group">
					<dt class="control-label"><?php echo $this->form->getLabel('contact_name'); ?></dt>
					<dd class="controls"><?php echo $this->form->getInput('contact_name'); ?></dd>
				</div>
				<div class="control-group">
					<dt class="control-label"><?php echo $this->form->getLabel('contact_email'); ?></dt>
					<dd class="controls"><?php echo $this->form->getInput('contact_email'); ?></dd>
				</div>
				<div class="control-group">
					<dt class="control-label"><?php echo $this->form->getLabel('contact_subject'); ?></dt>
					<dd class="controls"><?php echo $this->form->getInput('contact_subject'); ?></dd>
				</div>
				<div class="control-group">
					<dt class="control-label"><?php echo $this->form->getLabel('contact_message'); ?></dt>
					<dd class="controls"><?php echo $this->form->getInput('contact_message'); ?></dd>
				</div>
				<?php 	if ($this->params->get('show_email_copy')){ ?>
						<div class="control-group">
							<dt class="control-label"><?php echo $this->form->getLabel('contact_email_copy'); ?></dt>
							<dd class="controls"><?php echo $this->form->getInput('contact_email_copy'); ?></dd>
						</div>
				<?php 	} ?>
			<?php //Dynamically load any additional fields from plugins. ?>
			     <?php foreach ($this->form->getFieldsets() as $fieldset): ?>
			          <?php if ($fieldset->name != 'contact'):?>
			               <?php $fields = $this->form->getFieldset($fieldset->name);?>
			               <?php foreach($fields as $field): ?>
			                    <?php if ($field->hidden): ?>
			                         <?php echo $field->input;?>
			                    <?php else:?>
			                    	<div class="control-group">
			                         <dt class="control-label">
			                            <?php echo $field->label; ?>
			                            <?php if (!$field->required && $field->type != "Spacer"): ?>
			                               <span class="optional"><?php echo JText::_('COM_CONTACT_OPTIONAL');?></span>
			                            <?php endif; ?>
			                         </dt>
			                         <dd class="controls"><?php echo $field->input;?></dd>
			                        </div>
			                    <?php endif;?>
			               <?php endforeach;?>
			          <?php endif ?>
			     <?php endforeach;?>
				<dt></dt>
				<dd class="form-actions"><button class="button validate btn btn-primary" type="submit"><?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button>
					<input type="hidden" name="option" value="com_contact" />
					<input type="hidden" name="task" value="contact.submit" />
					<input type="hidden" name="return" value="<?php echo $this->return_page;?>" />
					<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
					<?php echo JHtml::_( 'form.token' ); ?>
				</dd>
			</dl>
		</fieldset>
	</form>
</div>
