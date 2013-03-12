<?php

defined('_JEXEC') or die( 'Restricted access' );

class JTableOrderacc_organizer extends JTable
{
	var $id					= null;
	var $dateadd			= null;
	var $dateend			= null;
	var $dateendfact		= null;
	var $shortdesc 			= null;

	
	function __construct(&$db)
	{
		parent::__construct( '#__organizer', 'id', $db );
	}

	function check()
	{
		return true;
	}

}

?>