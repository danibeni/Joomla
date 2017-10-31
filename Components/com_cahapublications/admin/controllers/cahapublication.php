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
 * CahaPublication Controller
 *
 * @package     Joomla.Administrator
 * @subpackage  com_cahapublications
 * @since       0.0.9
 */
class CahaPublicationsControllerCahaPublication extends JControllerForm
{
    /*
    public function add()
    {
        // Id = 0 means add action to Joomla
        $this->setRedirect(JRoute::_("index.php?option=com_cahapublications&view=cahapublication&layout=edit&id=0", false), "COM_CAHAPUBLICATIONS_CAHAPUBLICATION_ADD_REDIRECT");
    }
    
    public function edit()
    {
        $input = JFactory::getApplication()->input;
        $id = $input->get('id', 0, 'int');
        // If more than one item is selected to be edit
        if ($id == 0) 
        {
            $ids = $input->get('cid', array(), 'array');
            $id = $ids[0];
        }
        // Id != 0 means edit action to Joomla
        $this->setRedirect(JRoute::_("index.php?option=com_cahapublications&view=cahapublication&layout=edit&id=$id", false), 'COM_CAHAPUBLICATIONS_CAHAPUBLICATION_EDIT_REDIRECT');
        
    }
    
    public function save() {
        $input = JFactory::getApplication()->input;
        $data = $input->get('cahapubform', array(), 'array');
        $model = $this->getModel();
        $model->save($data);
        $this->setRedirect(JRoute::_("index.php?option=com_cahapublications", false), "COM_CAHAPUBLICATIONS_CAHAPUBLICATION_SAVE_REDIRECT");
    }
    
    public function cancel() {
        $this->setRedirect(JRoute::_("index.php?option=com_cahapublications", false), "COM_CAHAPUBLICATIONS_CAHAPUBLICATION_CANCEL_REDIRECT");
    }
    */
}