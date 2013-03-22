<?php
	
	if(self::$req['id'] == '')
	{
		echo 'No ID Provided.';	
	}
	else
	{
		$form_action = n_common_res::$home_url . '?action=update&id=' . self::$req['id'];
		include_once('input.php');
	}

?>

