<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
jimport('joomla.application.component.modellist');
/**
 * This models supports retrieving a category, the articles associated with the category,
 * sibling, child and parent categories.
 *
 * @since  1.5
 */
class CahaPublicationsModelCahaPublications extends JModelList
{
    /**
     * Constructor.
     *
     * @param   array  $config  An optional associative array of configuration settings.
     *
     * @see     JController
     * @since   1.6
     */
    public function __construct($config = array())
    {
        if (empty($config['filter_fields']))
        {
            $config['filter_fields'] = array(
                'author',
                'title',
                'year'
            );
        }
        
        parent::__construct($config);
    }
    
    function getListQuery()
    {
       $query = parent::getListQuery();
        
       $db = JFactory::getDBO();
            
       $query = $db->getQuery(true);
       $query
           ->select('*')
            ->from($db->quoteName('#__cahapublications'));
        
        // Filter: like / search
        $search = $this->getState('filter.search');
            
        if (!empty($search))
        {
           $like = $db->quote('%' . $search . '%');
           $query->where(('title LIKE ' . $like), 'OR');
           $query->where(('author LIKE ' . $like), 'OR');
           $query->where(('year LIKE ' . $like), 'OR');
           $query->where('text LIKE ' . $like);
        }
       
        // Add the list ordering clause.
        $orderCol	= $this->state->get('list.ordering', 'year');
        $orderDirn 	= $this->state->get('list.direction', 'desc');
            
        $query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));
        return $query;
    }
        
}
