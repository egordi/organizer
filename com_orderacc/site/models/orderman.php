<?php

defined('_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.model');


class OrderaccModelOrderman extends JModel
{

function getOrderacc($limit = 0, $limitstart = 0, $sort=1)
{
	$db = JFactory::getDBO();
	
	$this->setState('limit', $limit);
	$this->setState('limitstart', $limitstart);	
	
	$query = 'SELECT * FROM #__organizer ORDER BY id';
	$db->setQuery($query, $limitstart, $limit);
	$row = $db->loadObjectlist();
	return $row;	
	
}

function deleteItems($ids)
{
	$db = JFactory::getDBO();
	$query = 'delete from #__organizer where id in ('.$ids.')';
	$db->setQuery($query);
	if (!$db->query()) {
		JError::raiseError( 500, $db->stderr());
		return false;
	}
	return true;	
	
}

function getTotal()
{
	$db = JFactory::getDBO();
	$query = 'SELECT count(*) FROM #__organizer';
	$db->setQuery($query);
	$_total = $db->loadResult(); 
	return $_total;
}
	  
function getPagination()
{

	if (empty($this->_pagination)) {
		jimport('joomla.html.pagination');
		$this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
	}
	return $this->_pagination;
}


}
?>