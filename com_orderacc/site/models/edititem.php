<?php

defined('_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.model');


class OrderaccModelEdititem extends JModel
{

	function getItem($id)
	{
		$db = JFactory::getDBO();
		$query = 'SELECT * FROM #__organizer where id='.$id;
		$db->setQuery($query);
		$row = $db->loadObject();
		return $row;	
	}

}
?>