<?php
defined('_JEXEC') or die('Restricted access');

$doc =& JFactory::getDocument();
$doc->addStyleSheet( JURI::base(true)."/components/com_orderacc/css/orderman.css" );

JHTML::_('behavior.calendar');

$id	= JRequest::getInt( 'id',0,'post' );
$row = $this->row;

?>
<div style="border:1 solid; padding:20px 20px 20px 20px; text-align:center;"> 
<h2 style="text-align:center; ">Редактирование записи</h2><br/>

<form action="" name="order_admin" id="order_admin" method="post" >

<table  celpadding="10" border="1" width="100%">
	<tr>
		<td class="headersheet" >Время создания</td>
		<td class="datasheet" >
			<input class="inputbox" type="text" name="dateadd" id="dateadd" size="20" value="<?php if (@$row->dateadd) echo date('d.m.Y h:i:s', strtotime(@$row->dateadd)); else echo date('d.m.Y H:i:s'); ?>" readonly="readonly" />
		</td>
	</tr>
	<tr>
		<td class="headersheet">Описание</td>
		<td class="datasheet">
			<input class="inputbox" type="text" name="shortdesc" id="shortdesc" size="60" maxlength="200" value="<?php echo @$row->shortdesc; ?>" />	
		</td>
	</tr>
	<tr>
		<td class="headersheet">Время выполнения</td>
		<td class="datasheet">
			<?php echo JHTML::_('calendar', ( @$row->dateend ? date('d.m.Y h:i:s', strtotime(@$row->dateend)) : NULL), 'dateend', 'dateend', '%d.%m.%Y', array('class'=>'inputbox', 'size'=>'20',  'maxlength'=>'20')); ?>
		</td>
	</tr>
	<tr>
		<td class="headersheet">Фактическое время выполнения</td>
		<td class="datasheet">
			<?php echo JHTML::_('calendar', ( @$row->dateendfact ? date('d.m.Y h:i:s', strtotime(@$row->dateendfact)) : NULL), 'dateendfact', 'dateendfact', '%d.%m.%Y', array('class'=>'inputbox', 'size'=>'20',  'maxlength'=>'20')); ?>
		</td>
	</tr>
</table>

<input type="hidden" name="id" id="id" value="<?php echo @$row->id; ?>" />
<input type="hidden" name="option" value="com_orderacc" />
<input type="hidden" name="view" value="orderman" />
<input type="hidden" name="task" id="task" value="saveitem" />
<?php echo JHTML::_( 'form.token' ); ?>

</br>

<input type="submit" class="button" value="Сохранить" />
<input type="button" class="button" value="Отменить" onclick="javascript:this.form.task.value='cancelaction';  this.form.submit(); "  />
</form>

</div> 
