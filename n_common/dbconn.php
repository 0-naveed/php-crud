<?php
	if ( ! defined('acc')) exit('No direct script access allowed');

class n_dbconn
{
	public static $host = '';	
	public static $db = '';	
	public static $table_prefix = '';	
	public static $un = '';
	public static $pwd = '';
	public static $conn = '';
	static function init()
	{
		if($_SERVER['SERVER_NAME'] == 'localhost')
		{

		}
		else
		{
			self::$un = 'root';
			self::$pwd = 'jackal';
			self::$db = 'parshwa';
			self::$host = 'localhost';
		}
		if(self::$conn == '')
		{

		}
		else
		{
			
		}
		if(1)
		{
			mysql_select_db(self::$db);
		}
		else
		{
		
		}
	}
}
?>
