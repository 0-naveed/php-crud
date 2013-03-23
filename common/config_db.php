<?php

class n_config_db
{
	public static $host = '';	
	public static $db = '';	
	public static $table_prefix = '';	
	public static $un = '';
	public static $pwd = '';
	public static $conn;
	static function init()
	{
		if($_SERVER['SERVER_NAME'] == 'localhost')
		{
			self::$host = 'localhost';
			self::$db = 'smart_wallet';
			self::$table_prefix = '';
			self::$un = 'root';
			self::$pwd = 'jackal';
			self::$conn = mysql_connect(self::$host,self::$un,self::$pwd);
		}
		else
		{
			self::$host = 'localhost';
			self::$db = 'smart_wallet';
			self::$table_prefix = '';
			self::$un = 'root';
			self::$pwd = 'jackal';
			self::$conn = mysql_connect(self::$host,self::$un,self::$pwd);
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
	static function finish()
	{
		mysql_close(self::$conn);
	}
}
?>
