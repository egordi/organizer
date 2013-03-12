<?php
defined('_JEXEC') or die('Restricted access');

$doc =& JFactory::getDocument();
$doc->addStyleSheet( JURI::base(true)."/components/com_orderacc/css/orderman.css" );


?>
<div style="border:1 solid; padding:20px 20px 20px 20px; text-align:center;"> 
<h2 style="text-align:center; ">Органайзер</h2><br/>

<form action="" name="order_admin" id="order_admin" method="post" >

<table  celpadding="10" border="1" align="center" >
	<tr>
		<td class="header" >&nbsp;</td>
		<td class="header">Номер задачи</td>
		<td class="header">Время создания</td>
		<td class="header">Описание</td>
		<td class="header">Время выполнения</td>
		<td class="header">Фактическое время выполнения</td>		
		<td class="header">&nbsp;</td>		
	</tr>


<?php 
$i=0;
foreach ($this->rows as $row ) {
?>

	<tr>
		<td class="sheet"><input type="checkbox" id="i_comp_<?php echo ($i);?>" name="i_comp_<?php echo ($i);?>"  /></td>
		<td class="sheet"><?php echo $row->id; ?></td>
		<td class="sheet"><?php echo date('d.m.Y h:i:s', strtotime($row->dateadd));  ?></td>	
		<td class="sheet"><?php echo $row->shortdesc; ?></td>
		<td class="sheet"><?php echo date('d.m.Y h:i:s', strtotime($row->dateend)); ?></td>
		<td class="sheet">
			<?php echo date('d.m.Y h:i:s', strtotime($row->dateendfact)); ?>
			<input type="hidden" id="id_<?php echo ($i);?>" name="id_<?php echo ($i);?>"  value="<?php echo $row->id;?>" />	
		</td>	
		<td class="sheet">
			<input type="image" name="editbtn" style="width:18px; height:14px; position:static;" src="<?php echo JURI::root()."components/com_orderacc/views/orderman/tmpl/brick_edit.png"; ?>" 
				title="Редактировать" onclick="javascript:this.form.task.value='edititem'; this.form.id.value='<?php echo $row->id;?>'; this.form.submit(); " />
		</td>
		
	</tr>
<?php
	$i++;
}
?> 

</table>

<br/>
	<?php echo $this->pagination->getPagesLinks();?>
	<p class="counter">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</p>
	
<br/>

<input type="hidden" name="countitems" value="<?php echo count($this->rows)?>" />
<input type="hidden" name="redir" value="<?php $uri = JFactory::getURI(); echo urlencode($uri->toString());?>" />
<input type="hidden" name="option" value="com_orderacc" />
<input type="hidden" name="view" value="orderman" />
<input type="hidden" name="task" id="task" value="" />
<input type="hidden" name="id" id="id" value="" />
<?php echo JHTML::_( 'form.token' ); ?>


<input type="button" class="button"  name="bt3" value="Добавить" onclick="javascript:this.form.task.value='additem';  this.form.submit(); " />
<input type="button" class="button"  name="bt1" value="Удалить выбранные" onclick="javascript:this.form.task.value='deleteitem'; this.form.submit();" />
</form>


</div> 
