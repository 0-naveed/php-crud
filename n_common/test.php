<?php
			$allowedsMimes = array();

$allowedExts = array('jpg','doc');
$mimes = simplexml_load_file('mimes.xml');
			foreach($allowedExts as $key=>$val)
			{
				foreach($mimes->mime_mapping as $key2=>$val2)
				{
					if($val2->extension == $val)
					{
						$allowedMimes[] = $val2->mime_type;
					}
				}
			}

print_r($allowedMimes);


?>
