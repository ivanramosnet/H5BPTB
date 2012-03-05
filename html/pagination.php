<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	Templates.bluestork
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

/**
 * This is a file to add template specific chrome to pagination rendering.
 *
 * pagination_list_footer
 *	Input variable $list is an array with offsets:
 *		$list[prefix]		: string
 *		$list[limit]		: int
 *		$list[limitstart]	: int
 *		$list[total]		: int
 *		$list[limitfield]	: string
 *		$list[pagescounter]	: string
 *		$list[pageslinks]	: string
 *
 * pagination_list_render
 *	Input variable $list is an array with offsets:
 *		$list[all]
 *			[data]		: string
 *			[active]	: boolean
 *		$list[start]
 *			[data]		: string
 *			[active]	: boolean
 *		$list[previous]
 *			[data]		: string
 *			[active]	: boolean
 *		$list[next]
 *			[data]		: string
 *			[active]	: boolean
 *		$list[end]
 *			[data]		: string
 *			[active]	: boolean
 *		$list[pages]
 *			[{PAGE}][data]		: string
 *			[{PAGE}][active]	: boolean
 *
 * pagination_item_active
 *	Input variable $item is an object with fields:
 *		$item->base	: integer
 *		$item->prefix	: string
 *		$item->link	: string
 *		$item->text	: string
 *
 * pagination_item_inactive
 *	Input variable $item is an object with fields:
 *		$item->base	: integer
 *		$item->prefix	: string
 *		$item->link	: string
 *		$item->text	: string
 *
 * This gives template designers ultimate control over how pagination is rendered.
 *
 * NOTE: If you override pagination_item_active OR pagination_item_inactive you MUST override them both
 */

function pagination_list_footer($list)
{
	$html = "<div class=\"list-footer\">\n";

		$html .= "\n<div class=\"limit\">" . JText::_('JGLOBAL_DISPLAY_NUM') . $list['limitfield'] . "</div>";
		$html .= $list['pageslinks'];
		$html .= "\n<div class=\"counter\">" . $list['pagescounter'] . "</div>";

		$html .= "\n<input type=\"hidden\" name=\"" . $list['prefix'] . "limitstart\" value=\"" . $list['limitstart'] . "\" />";
		$html .= "\n</div>";

		return $html;
}

function pagination_list_render($list)
{
	// Reverse output rendering for right-to-left display.
	if (!$list['start']['active']) {
		$class_start = 'class="disabled"';
	}
	if (!$list['previous']['active']) {
		$class_previous = 'class="disabled"';
	}
	if (!$list['next']['active']) {
		$class_next = 'class="disabled"';
	}
	if (!$list['end']['active']) {
		$class_end = 'class="disabled"';
	}
		
		$html = '<ul>';
		$html .= '<li '.$class_start.'>' . $list['start']['data'] . '</li>';
		$html .= '<li '.$class_previous.'>' . $list['previous']['data'] . '</li>';
		foreach ($list['pages'] as $page)
		{
			$class = '';
			if (!$page['active']) {
				$class = 'class="disabled"';
			}
			$html .= '<li '.$class.'>' . $page['data'] . '</li>';
		}
		$html .= '<li '.$class_next.'>' . $list['next']['data'] . '</li>';
		$html .= '<li '.$class_end.'>' . $list['end']['data'] . '</li>';
		$html .= '</ul>';

		return $html;
}

function pagination_item_active(&$item)
{
$app = JFactory::getApplication();
		if ($app->isAdmin())
		{
			if ($item->base > 0)
			{
				return "<a class=\"pagenav\" title=\"" . $item->text . "\" onclick=\"document.adminForm." . $this->prefix . "limitstart.value=" . $item->base
					. "; Joomla.submitform();return false;\">" . $item->text . "</a>";
			}
			else
			{
				return "<a class=\"pagenav\" title=\"" . $item->text . "\" onclick=\"document.adminForm." . $this->prefix
					. "limitstart.value=0; Joomla.submitform();return false;\">" . $item->text . "</a>";
			}
		}
		else
		{
			return "<a title=\"" . $item->text . "\" href=\"" . $item->link . "\" class=\"pagenav\">" . $item->text . "</a>";
		}
}

function pagination_item_inactive(&$item)
{
$app = JFactory::getApplication();
		if ($app->isAdmin())
		{
			return "<a>" . $item->text . "</a>";
		}
		else
		{
			return "<a class=\"pagenav\">" . $item->text . "</a>";
		}
}
?>
