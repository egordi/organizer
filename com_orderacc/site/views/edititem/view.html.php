<?php

defined('_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.view');

class OrderaccViewEdititem extends JView
{

function display ($tpl = null)
	{
		$model = $this->getModel();
		$id = JRequest::getVar('id', 1, '', 'int');
		
		$row = $model->getItem( $id );
		

		$this->assignRef('row',$row);
		$this->assignRef('model',$model);
	
		parent::display($tpl);
	}
}

?>