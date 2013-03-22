<?php
	class n_config_gen
	{
		public static $home_url = "";
		public static $home_path = "";
		public static $upload_url = "";
		public static $upload_path = "";
		public static $sub_path = "";
		static function init()
		{
			self::$home_url = "http://" . $_SERVER['SERVER_NAME'] . "/" . self::$sub_path;
			self::$home_path = $_SERVER['DOCUMENT_ROOT'] . "/" . self::$sub_path;
			self::$upload_url = "http://" . $_SERVER['SERVER_NAME'] . "/" . self::$sub_path . "/uploads";
			self::$upload_path = $_SERVER['DOCUMENT_ROOT'] . "/" . self::$sub_path . "/uploads";
			self::$sub_path = "/n_crud";
		}
	}
	/*
	n_config_gen::init();
	echo n_config_gen::$home_url;
	echo n_config_gen::$home_path;
	echo n_config_gen::$upload_url;
	echo n_config_gen::$upload_path;
	*/
?>
