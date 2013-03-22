<?php
if(isset($rows))
{
	if(isset($rows['code']))
	{
		
	}
	else
	{
		$rows['code'] = '';
	}
	if(isset($rows['order']))
	{
		
	}
	else
	{
		$rows['order'] = '';
	}
}
else
{
	$rows['code'] = '';
	$rows['order'] = '';
}
?>



<form method='post' action="<?php echo $form_action; ?>">
	<table>
	<tr>
		<td>Code</td>
		<td><input type='text' name='code' value='<?php echo $rows['code']; ?>' /></td>
	</tr>
	<tr>
		<td>Order</td>
		<td><input type='text' name='order' value='<?php echo $rows['order']; ?>' /></td>
	</tr>
	<tr>
		<td>
			<input type='submit' value='Submit' />
		</td>
		<td>
			&nbsp;
		</td>
	</tr>
	</table>
</form>

