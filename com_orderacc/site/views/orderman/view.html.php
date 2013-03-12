<?php

defined('_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.view');

class OrderaccViewOrderman extends JView
{

function display ($tpl = null)
	{
		
		$model = $this->getModel();
		$sort = JRequest::getVar('sort', 1, '', 'int');
		$limitstart = JRequest::getVar('limitstart', 0, '', 'int');
		$limit = 10;
		$limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);		
		
		$rows = $model->getOrderacc( $limit, $limitstart,$sort);
		$pagination =& $this->get('Pagination');			

		$this->assignRef('rows',$rows);
		$this->assignRef('model',$model);
		$this->assignRef('pagination',$pagination);
		$this->assign('sort',$sort);
	
		parent::display($tpl);
	}


}

?>