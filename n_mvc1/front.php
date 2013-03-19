<?php
	
	include_once('common_res.php');
	include_once('dbconn.php');
	include_once('crud.php');
	
	class n_main_barcode
	{
		public static $params = array();
		public static $req = array();
		public static $table = 'youbi_n_barcode';
		static function init()
		{
			self::start();
		}
		static function start()
		{
			self::$params = array('code');
			n_dbconn::init();
			n_common_res::init();
			self::receive_request();
		}
		static function receive_request()
		{
			if(isset($_GET['action']))
			{
				self::$req['action'] = trim($_GET['action']);
			}
			else
			{
				self::$req['action'] = '';
			}

			if(isset($_GET['id']))
			{
				self::$req['id'] = trim($_GET['id']);
			}
			else
			{
				self::$req['id'] = '';
			}
			foreach($_POST as $key=>$val)
			{
				self::$req['params'][$key] = $_POST[$key];
			}
		}		
		static function resolve_request_gift($row)
		{
			$file = 'read.php';
			$rows = n_crud::read_all(self::$table);
			$string = '';
			foreach($rows as $key=>$val)
			{
				$string .= "<input type='radio' name='bctype' value='" . $val['code'] . "'"; 
				if($row->giftcard_bctype==$val['code'])
				{
					$string .= "checked"; 
				}
				$string .= "/>" . $val['code'] . " &nbsp;&nbsp;";
			}
			return $string;
		}
		static function resolve_request($row)
		{
			$file = 'read.php';
			$rows = n_crud::read_all(self::$table);
			$string = '';
			foreach($rows as $key=>$val)
			{
				$string .= "<input type='radio' name='bctype' value='" . $val['code'] . "'"; 
				if($row->loyaltycard_bctype==$val['code'])
				{
					$string .= "checked"; 
				}
				$string .= "/>" . $val['code'] . " &nbsp;&nbsp;";
			}
			return $string;
		}
		function show_error()
		{
		
		}
	}
	n_main_barcode::init();
?>
