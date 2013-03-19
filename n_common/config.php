<?php
	class n_config
	{
		public static $home_url = "";
		public static $home_path = "";
		public static $upload_url = "";
		public static $upload_path = "";
		static function init()
		{
			if($_SERVER['SERVER_NAME']=='localhost')
			{
				self::$home_url = "http://localhost/crud";
				self::$home_path = "/var/www/crud";
				self::$upload_url = "http://localhost/crud/upload";
				self::$upload_path = "/var/www/crud/upload";
			}
			else
			{
				self::$home_url = "http://pnjunction.in/crud";
				self::$home_path = "/public_html/crud";
				self::$upload_url = "http://pnjunction.in/crud/upload";
				self::$upload_path = "/public_html/crud/upload";
			}
		}
	}
?>
