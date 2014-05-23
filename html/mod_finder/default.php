<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_finder
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_SITE . '/components/com_finder/helpers/html');

JHtml::_('bootstrap.tooltip');

// Load the smart search component language file.
$lang = JFactory::getLanguage();
$lang->load('com_finder', JPATH_SITE);

$suffix = $params->get('moduleclass_sfx');
$output = '<input type="text" name="q" id="mod-finder-searchword" class="search-query input-sm form-control" size="' . $params->get('field_size', 20) . '" value="' . htmlspecialchars(JFactory::getApplication()->input->get('q', '', 'string')) . '" />';

if ($params->get('show_label', 1))
{
	$label = '<label for="mod-finder-searchword" class="finder' . $suffix . '">' . $params->get('alt_label', JText::_('JSEARCH_FILTER_SUBMIT')) . '</label>';

	switch ($params->get('label_pos', 'left'))
	{
		case 'top' :
			$output = $label . '<br />' . $output;
			break;

		case 'bottom' :
			$output .= '<br />' . $label;
			break;

		case 'right' :
			$output .= $label;
			break;

		case 'left' :
		default :
			$output = $label . $output;
			break;
	}
}

if ($params->get('show_button'))
{
	$button = '<button class="btn btn-primary hasTooltip ' . $suffix . ' finder' . $suffix . '" type="submit" title="' . JText::_('MOD_FINDER_SEARCH_BUTTON') . '"><i class="icon-search icon-white"></i></button>';

	switch ($params->get('button_pos', 'left'))
	{
		case 'top' :
			$output = $button . '<br />' . $output;
			break;

		case 'bottom' :
			$output .= '<br />' . $button;
			break;

		case 'right' :
			$output .= $button;
			break;

		case 'left' :
		default :
			$output = $button . $output;
			break;
	}
}

JHtml::stylesheet('com_finder/finder.css', false, true, false);
?>

<script type="text/javascript">
//<![CDATA[
	jQuery(function($)
	{
		var value, $searchword = $('#mod-finder-searchword');

		// Set the input value if not already set.
		if (!$searchword.val())
		{
			$searchword.val('<?php echo JText::_('MOD_FINDER_SEARCH_VALUE', true); ?>');
		}

		// Get the current value.
		value = $searchword.val();

		// If the current value equals the default value, clear it.
		$searchword.on('focus', function()
		{	var $el = $(this);
			if ($el.val() === '<?php echo JText::_('MOD_FINDER_SEARCH_VALUE', true); ?>')
			{
				$el.val('');
			}
		});

		// If the current value is empty, set the previous value.
		$searchword.on('blur', function()
		{	var $el = $(this);
			if (!$el.val())
			{
				$el.val(value);
			}
		});

		$('#mod-finder-searchform').on('submit', function(e){
			e.stopPropagation();
			var $advanced = $('#mod-finder-advanced');
			// Disable select boxes with no value selected.
			if ( $advanced.length)
			{
				 $advanced.find('select').each(function(index, el) {
					var $el = $(el);
					if(!$el.val()){
						$el.attr('disabled', 'disabled');
					}
				});
			}
		});

		/*
		 * This segment of code sets up the autocompleter.
		 */
		<?php if ($params->get('show_autosuggest', 1)) : ?>
			<?php JHtml::_('script', 'com_finder/autocompleter.js', false, true); ?>
			var url = '<?php echo JRoute::_('index.php?option=com_finder&task=suggestions.display&format=json&tmpl=component', false); ?>';
			var ModCompleter = new Autocompleter.Request.JSON(document.getElementById('mod-finder-searchword'), url, {'postVar': 'q'});
		<?php endif; ?>
	});
//]]>
</script>

<form id="mod-finder-searchform" action="<?php echo JRoute::_($route); ?>" method="get" class="form-search">
	<div class="finder<?php echo $suffix; ?>">
		<?php
		// Show the form fields.
		echo $output;
		?>

		<?php $show_advanced = $params->get('show_advanced'); ?>
		<?php if ($show_advanced == 2) : ?>
			<br />
			<a href="<?php echo JRoute::_($route); ?>"><?php echo JText::_('COM_FINDER_ADVANCED_SEARCH'); ?></a>
		<?php elseif ($show_advanced == 1) : ?>
			<div id="mod-finder-advanced">
				<?php echo JHtml::_('filter.select', $query, $params); ?>
			</div>
		<?php endif; ?>
		<?php echo modFinderHelper::getGetFields($route, (int) $params->get('set_itemid')); ?>
	</div>
</form>
