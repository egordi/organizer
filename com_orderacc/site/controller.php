<?php

//Защита от прямого обращения к скрипту
defined('_JEXEC') or die ('Restricted access');

jimport('joomla.application.component.controller');
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_orderacc'.DS.'tables');
require_once( JPATH_SITE.DS.'components'.DS.'com_orderacc'.DS.'models'.DS.'orderman.php');	

class OrderaccController extends JController
{

function display ()
{
		parent::display();
}
 
 
function additem()
{
	JRequest::checkToken() or jexit( 'Invalid Token' );
	
	$link = 'index.php?option=com_orderacc&view=edititem';	
	$this->setRedirect(JRoute::_($link),$msg);
} 

function edititem()
{
	JRequest::checkToken() or jexit( 'Invalid Token' );
	$id	= JRequest::getInt( 'id',0,'post' );
	
	$link = 'index.php?option=com_orderacc&view=edititem&id='.$id;	
	$this->setRedirect(JRoute::_($link),$msg);
} 

function saveitem()
{
	$row	=& JTable::getInstance('organizer', 'JTableOrderacc_');
	$post = JRequest::get( 'post' );
	if (!$row->bind( $post )) {
			JError::raiseError(500, $row->getError() );
	}
	
	if (!$row->id)
		$row->dateadd = date('Y-m-d H:i:s');
	
	
	if ($row->dateend) {
		$dat = new JDate($row->dateend);
		$row->dateend = $dat->toMySQL();
	}
	
	if ($row->dateendfact) {
		$dat = new JDate($row->dateendfact);
		$row->dateendfact = $dat->toMySQL();
	}
	
	
	if (!$row->store()) {
		JError::raiseError(500, $row->getError() );
	}
	$row->checkin();	
	
	$link = 'index.php?option=com_orderacc&view=orderman';	
	$this->setRedirect(JRoute::_($link),'Записи успешно добавлены.');
}

function cancelaction()
{
	
	$link = 'index.php?option=com_orderacc&view=orderman';	
	$this->setRedirect(JRoute::_($link),'Операция отменена.');
}


function deleteitem()
{

	JRequest::checkToken() or jexit( 'Invalid Token' );
	
	$mainframe = &JFactory::getApplication();
	$countitems	= JRequest::getInt( 'countitems',0,'post' );
	$ids = '';
	for ($i=0;$i<$countitems;$i++) {
		$chkcomp = JRequest::getVar( 'i_comp_'.$i,'','post' );
		if ($chkcomp === 'on') 
			$ids = $ids . ($ids ? ',' : ''). JRequest::getVar( 'id_'.$i,'','post' );
	}
	
	if (OrderaccModelOrderman::deleteItems($ids))
		$msg = "Записи удалены.";
	else
		$msg = "Произошла ошибка при удалении записей.";
	$link = 'index.php?option=com_orderacc&view=orderman';	
	$this->setRedirect(JRoute::_($link),$msg);
	
}


}

?>