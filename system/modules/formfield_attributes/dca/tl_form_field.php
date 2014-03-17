<?php

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
 * Palettes
 */ 
foreach($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as $type => $palette)
{
	if($type == '__selector__' || $type == 'default')
	{
		continue;
	}
	
	$palette =  str_replace('accesskey','more_attributes',$palette);

	$GLOBALS['TL_DCA']['tl_form_field']['palettes'][$type] = $palette;
}


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['more_attributes'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['more_attributes'],
	'exclude'                 => true,
	'inputType'               => 'listWizard',
	'eval'                    => array('tl_class'=>'clr long','decodeEntities'=>false),
	'sql'					  => "blob NULL",
);