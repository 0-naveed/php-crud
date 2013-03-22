<?php

	define('acc','875');
	include_once('dbconn.php');	
	class n_util
	{
		static public function func_4($arg)
		{
			$x="SELECT COUNT(`id`) FROM " . dbconn::$db . "." . $arg[0] . " WHERE `" . $arg[1] . "` = '" . $arg[2] . "'";
			$x2=mysql_query($x) or die(mysql_error());
			$far=mysql_fetch_array($x2) or reg_error(array(mysql_error() . " to: " . __LINE__));
			$count=$far['COUNT(`id`)'];
			return $count;
		}
		static public function slug($input)
		{
			$string = html_entity_decode($input,ENT_COMPAT,"UTF-8");
			setlocale(LC_CTYPE, 'en_US.UTF-8');
			$string = iconv("UTF-8","ASCII//TRANSLIT",$string);
			return $string;
		}
		static function db_prepare($str)
		{
			$str = str_replace("'","\\'",$str);
			$str = str_replace("\"","\\\"",$str);
			$str = str_replace("`","\\`",$str);
		}
		static function upload($fn,$path,$url,$allowedExts,$allowedSize,$allowedMimes)//$fn = file field name
		{
			$newname = '';
			$successful = '1';
			$resp = '';
			if($_FILES)
			{
				if(isset($_FILES[$fn]))
				{
					if(file_exists($_FILES[$fn]['tmp_name']))
					{

					}
					else
					{
						$successful = '0';
						$resp .= 'Cannot Process File';
						return array($successful,$resp,$newname);
					}
				}
				else
				{
					$successful = '0';
					$resp .= 'No File Received';
					return array($successful,$resp,$newname);
				}
			}
			else
			{
				$successful = '0';
				$resp .= 'No Files Received';
				return array($successful,$resp,$newname);
			}
			$file_parts = explode(".", $_FILES[$fn]["name"]);
			$extension = end($file_parts);
			$allowedsMimes = array();
			if(in_array($_FILES[$fn]["type"],$allowedMimes))
			{
				
			}
			else
			{
				$successful = '0';
				$resp .= "This file does not have the correct MIME type.";
				return array($successful,$resp,$newname);
			}
			if(in_array($extension, $allowedExts))
			{
				
			}
			else
			{
				$successful = '0';
				$resp .= "This file extension is not allowed.";
				return array($successful,$resp,$newname);
			}
			if($_FILES[$fn]["size"] < $allowedSize)
			{
				
			}
			else
			{
				$successful = '0';
				$resp .= "File Size Too Large.";
				return array($successful,$resp,$newname);
			}
			if ($_FILES[$fn]["error"] > 0)
			{
				$resp .= "File upload failed, with error: " . $_FILES[$fn]["error"] . "<br />";
				$successful = '0';
				return array($successful,$resp,$newname);
			}
			$test = '';
			$test .= "Upload: " . $_FILES[$fn]["name"] . "<br />";
			$test .= "Type: " . $_FILES[$fn]["type"] . "<br />";
			$test .= "Size: " . ($_FILES[$fn]["size"] / 1024) . " Kb<br />";
			$test .= "Temp file: " . $_FILES[$fn]["tmp_name"] . "<br />";
			function name_allot($fn,$extension)
			{
				$name = str_replace('.' . $extension,'',$fn);
				$i=2;
				$newname=$fn;
				$num = 2;
				while (file_exists($upload_dir . "/" . $newname))
				{
					(string)$newname = (string)$name . (string)$num . '.' . (string)$extension;	
					(int)$num = (int)$num + 1;
				}
				return $newname;
			}
			$newname = name_allot($_FILES[$fn]["name"],$extension);
			if(move_uploaded_file($_FILES[$fn]["tmp_name"],"uploaded/" . $newname))
			{
				$resp .= "Uploaded File Link: <a href='" . $url . $newname . "' >Filelink</a>";
				chmod("uploaded/" . $newname,0755);
				return array($successful,$resp,$newname);
			}
			$successful = 0;
			return array($successful,$resp,$newname);
		}
	}
?>
