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

/**
 * HTML View class for the HelloWorld Component
 *
 * @since  0.0.1
 */
class CahaPublicationsViewCahaPublications extends JViewLegacy
{
    
    protected $items;
    
	/**
	 * Display the CAHA Publications view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
	    // Get application
	        $app = JFactory::getApplication();
	       $context = "cahapublications.list.site.cahapublications";
	       
	       $items = $this->get('Items');        
	        $pagination = $this->get('Pagination');
	        $state			= $this->get('State');
	        $filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'year', 'cmd');
	        $filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'desc', 'cmd');
	        $filterForm    	= $this->get('FilterForm');
	        $activeFilters 	= $this->get('ActiveFilters');
	        
	        
	        // Check for errors.
	        if (count($errors = $this->get('Errors')))
	        {
	            JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
	            
	            return false;
	        }
	        //Assign data to the view
	        $this->items = $items;
	        $this->pagination = $pagination;
	        $this->state			= $state;
	        $this->filter_order 	= $filter_order;
	        $this->filter_order_Dir = $filter_order_Dir;
	        $this->filterForm    	= $filterForm;
	        $this->activeFilters 	= $activeFilters;
	        
	        // Display the view
	        parent::display($tpl);
	   }
}