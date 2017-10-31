<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_cahapublications
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Access check: is this user allowed to access the backend of this component?
if (!JFactory::getUser()->authorise('core.manage', 'com_cahapublications'))
{
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Require helper file
JLoader::register('CahaPublicationsHelper', JPATH_COMPONENT . '/helpers/cahapublications.php');

// Get an instance of the controller prefixed by HelloWorld
$controller = JControllerLegacy::getInstance('CahaPublications');

// Perform the Request task
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();