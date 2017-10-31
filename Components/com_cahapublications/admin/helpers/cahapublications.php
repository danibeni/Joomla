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

/**
 * CahaPublications component helper.
 *
 * @param   string  $submenu  The name of the active view.
 *
 * @return  void
 *
 * @since   1.6
 */
abstract class CahaPublicationsHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @return Bool
	 */

	public static function addSubmenu($submenu) 
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_HELLOWORLD_SUBMENU_MESSAGES'),
			'index.php?option=com_cahapublications',
			$submenu == 'cahapublications'
		);

		// Set some global property
		$document = JFactory::getDocument();
		
	}
	
	/**
	 * Get the actions
	 */
	public static function getActions($messageId = 0)
	{
	    $result	= new JObject;
	    
	    if (empty($messageId)) {
	        $assetName = 'com_cahapublications';
	    }
	    else {
	        $assetName = 'com_cahapublications.message.'.(int) $messageId;
	    }
	    
	    $actions = JAccess::getActions('com_cahapublications', 'component');
	    
	    foreach ($actions as $action) {
	        $result->set($action->name, JFactory::getUser()->authorise($action->name, $assetName));
	    }
	    
	    return $result;
	}
}