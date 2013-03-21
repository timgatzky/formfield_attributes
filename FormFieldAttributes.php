<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		formfield_attributes
 * @link		http://contao.org
 * @license		http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Class FormFieldAttributes
 */
class FormFieldAttributes extends Frontend
{
	/**
	 * Add attributes to form field
	 * @param object
	 * @param string
	 * @param array
	 * @return object
	 * called from loadFormField HOOK
	 */
	public function addAttributes(Widget $objWidget, $strForm, $arrForm)
	{
		if(strlen($objWidget->more_attributes) < 1)
		{
			return $objWidget;
		}
		
		// collect addiontional attributes
		foreach(deserialize($objWidget->more_attributes) as $attribute)
		{
			$attribute = html_entity_decode($attribute, ENT_QUOTES, $GLOBALS['TL_CONFIG']['characterSet']);
			
			$elem = explode('=', $attribute);
			
			$event = strtolower($elem[0]);
			$function = $elem[1];
			
			// append functions for the same event
			$arrAttributes[$event] .= $function;	
		}
		
		// set attributes
		foreach($arrAttributes as $event => $function)
		{
			$objWidget->__set($event,trim($function));
		}
		
		return $objWidget;		
	}
}