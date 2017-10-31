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
 * CahaPublications View
 *
 * @since  0.0.1
 */
class CahaPublicationsViewCahaPublications extends JViewLegacy
{
	/**
	 * Display the CAHA Publications Administrator view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
	    // Get application
	    $app = JFactory::getApplication();
	    $context = "cahapublications.list.admin.cahapublications";
		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state			= $this->get('State');
		$this->filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'year', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'desc', 'cmd');
		$this->filterForm    	= $this->get('FilterForm');
		$this->activeFilters 	= $this->get('ActiveFilters');
		
		// What Access Permissions does this user have? What can (s)he do?
		$this->canDo = CahaPublicationsHelper::getActions();
		
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}
		
		// Set the submenu
		CahaPublicationsHelper::addSubmenu('helloworlds');
		
		// Set the toolbar
		$this->addToolbar();

		// Display the template
		parent::display($tpl);
		
		// Set the document
		$this->setDocument();
	}
	
	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolBar()
	{
	    $title = JText::_('COM_CAHAPUBLICATIONS_MANAGER_CAHAPUBLICATIONS');
	    
	    if ($this->pagination->total)
	    {
	        $title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
	    }
	    
	    JToolBarHelper::title($title, 'cahapublications_title');
	     JToolbarHelper::title(JText::_('COM_CAHAPUBLICATIONS_MANAGER_CAHAPUBLICATIONS'));
	    JToolbarHelper::addNew('cahapublication.add');
	    JToolbarHelper::editList('cahapublication.edit');
	   // JToolbarHelper::deleteList('COM_CAHAPUBLICATIONS_MANAGER_CAHAPUBLICATIONS_DELETE', 'cahapublications.delete');
	    if ($this->canDo->get('core.delete'))
	    {
	        JToolBarHelper::deleteList('', 'cahapublications.delete', 'JTOOLBAR_DELETE');
	    }
	    // Options button.
	    if (JFactory::getUser()->authorise('core.admin', 'com_cahapublications'))
	    {
	        JToolBarHelper::preferences('com_cahapublications');
	    }
	}
	
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument()
	{
	    $document = JFactory::getDocument();
	    $document->setTitle(JText::_('COM_CAHAPUBLICATIONS_ADMINISTRATION'));
	}
	
}