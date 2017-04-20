<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Including fallback code for the placeholder attribute in the search field.
JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', false, true);

if ($width)
{
	$moduleclass_sfx .= ' ' . 'mod_search' . $module->id;
	$css = 'div.mod_search' . $module->id . ' input[type="search"]{ width:auto; }';
	JFactory::getDocument()->addStyleDeclaration($css);
	$width = ' size="' . $width . '"';
}
else
{
	$width = '';
}
?>
<div class="search<?php echo $moduleclass_sfx ?>">
	<form action="<?php echo JRoute::_('index.php');?>" method="post" class="form-inline">
        <?php
			$output = '<label for="mod-search-searchword" class="element-invisible sr-only">' . $label . '</label> ';
			$output .= '<input name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '"  class="inputbox search-query" type="search"' . $width;
			$output .= ' placeholder="' . $text . '" />';
			if ($button) :
				if ($imagebutton) :
					$btn_output = ' <input type="image" alt="' . $button_text . '" class="button" src="' . $img . '" onclick="this.form.searchword.focus();"/>';
				else :
					$btn_output = ' <button class="button btn btn-primary search-button" onclick="this.form.searchword.focus();"><svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 406 422" overflow="auto" role="presentation"><g><path d="M271.8 147.5c0-71.9-58.3-130.3-130.3-130.3-71.9 0-130.3 58.3-130.3 130.3 0 71.9 58.3 130.3 130.3 130.3 27.8 0 53.6-8.7 74.7-23.5l18.2 18.2 29.5-29.5-17.9-17.9c16.3-21.7 25.8-48.5 25.8-77.6zm-205 74.7c-20-20-31-46.5-31-74.7 0-28.2 11-54.8 31-74.7 20-20 46.5-31 74.7-31 28.2 0 54.8 11 74.7 31 20 20 31 46.5 31 74.7s-11 54.8-31 74.7c-20 20-46.5 31-74.7 31s-54.7-11-74.7-31zM368.5 404.7l-122.6-133 17.4-17.4 131.4 124.2"/></g></svg><span class="sr-only">Search</span></button>';
				endif;

				switch ($button_pos) :
					case 'top' :
						$output = $btn_output . '<br />' . $output;
						break;

					case 'bottom' :
						$output .= '<br />' . $btn_output;
						break;

					case 'right' :
						$output .= $btn_output;
						break;

					case 'left' :
					default :
						$output = $btn_output . $output;
						break;
				endswitch;
			endif;

			echo $output;
        ?>
		<input type="hidden" name="task" value="search" />
		<input type="hidden" name="option" value="com_search" />
		<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
	</form>
</div>
