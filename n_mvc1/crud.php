<?php

class n_crud
{
	static function create($table,$params)
	{
		$scripts = '';
		$paramstring = '';
		$valstring = '';
		$sep = '';
		foreach($params as $key=>$val)
		{
			$paramstring .= $sep . "`" . $key . "`";
			//$valstring .= $sep . "'" . n_common_res::db_prepare($val) . "'";
			$valstring .= $sep . "'" . $val . "'";
			$sep = ',';
		}
		$sql = "INSERT INTO $table (" . $paramstring. ")" . " VALUES (" . $valstring . ")";
		$query = mysql_query($sql);
		if($query)
		{
			$scripts = "Record added.";
		}
		else
		{
			$scripts = "An error has occurred.";
		}
		return $scripts;
	}
	static function read($table,$id)
	{
		$sql = "SELECT * FROM $table WHERE id=$id";
		$query = mysql_query($sql) or die(mysql_error());
		$far = mysql_fetch_assoc($query);
		return $far;
	}
	static function read_all($table)
	{
		$sql = "SELECT * FROM $table";
		$query = mysql_query($sql) or die(mysql_error());
		$rows = array();
		while($far = mysql_fetch_assoc($query))
		{
			$rows[] = $far;
		}
		$inputs = array();
		foreach($rows as $key=>$val)
		{
			foreach($val as $key2=>$val2)
			{
				if($key2 == 'image' && (trim($val2) != ''))
				{
					$inputs[$key][$key2] = "<a target='_blank' href='" . n_common_res::$home_url . "uploaded/" . $val2 . "' >Image Link</a>";
				}
				else
				{
					$inputs[$key][$key2] = htmlspecialchars($val2, ENT_QUOTES);
				}
			}
		}		
		return $rows;
	}
	static function update($table,$id,$params)
	{
		$scripts = '';
		$setstring = '';
		$sep = '';
		foreach($params as $key=>$val)
		{
			$setstring .= $sep . "`" . $key . "` = '" . $val . "'";
			$sep = ',';
		}
		$sql = "UPDATE $table SET $setstring WHERE `id` = '$id'";
		$query = mysql_query($sql);
		if($query)
		{
			$scripts = "Update successful.";
		}
		else
		{
			$scripst = "An error has occurred.";
		}
		return $scripts;
	}
	static function delete($table,$id)
	{
		$scripts = '';
		$setstring = '';
		$sep = '';
		$sql = "DELETE FROM $table WHERE `id` = '$id'";
		$query = mysql_query($sql);
		if($query)
		{
			$scripts = "Operation successful.";
		}
		else
		{
			$scripst = "An error has occurred.";
		}
		return $scripts;
	}
}

?>
