<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_cahapublications
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

/**
 * Nationality Form Field class for the CAHA Publications component
 *
 * @since  0.0.1
 */
class JFormFieldNationality extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'Nationality';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
    WHERE TABLE_NAME ='" . $db->replacePrefix('#__cahapublications') . "' AND COLUMN_NAME = 'f_author'";
		$db->setQuery( $query );
		$nat_col = $db->loadRow();
		$nationalities = explode(",", str_replace("'", "", substr($nat_col[0], 5, (strlen($nat_col[0])-6))));
		$options  = array();

		if ($nat_col)
		{
			foreach ($nationalities as $nationality)
			{
			   	$options[] = JHtml::_('select.option', $nationality, $nationality);
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}