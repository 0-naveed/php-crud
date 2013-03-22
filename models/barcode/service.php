<?php
	
	include_once($_SERVER['DOCUMENT_ROOT'] . 'n_crud/common/util.php');//utilities; a = first set/set-a
	include_once($_SERVER['DOCUMENT_ROOT'] . 'n_crud/common/dbconn.php');
	include_once($_SERVER['DOCUMENT_ROOT'] . 'n_crud/common/crud.php');
	include_once('crud_barcode.php');
	
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
			n_util_a::init();
			self::receive_request();
			self::resolve_request(self::$req);
			include_once('views/main.php');
		}
		static function receive_request()
		{
			if(isset($_GET['n_action']))
			{
				self::$req['action'] = trim($_GET['n_action']);
			}
			else
			{
				self::$req['action'] = '';
			}

			if(isset($_GET['n_id']))
			{
				self::$req['id'] = trim($_GET['n_id']);
			}
			else
			{
				self::$req['id'] = '';
			}

			if(isset($_GET['n_mode']))
			{
				self::$req['mode'] = trim($_GET['n_mode']);
			}
			else
			{
				self::$req['n_mode'] = '';
			}

			foreach($_POST as $key=>$val)
			{
				self::$req['params'][$key] = $_POST[$key];
			}
		}		
		static function resolve_request($req)
		{
			if($req['action'] == 'create')
			{
				if($req['mode'] == '')
				{
					if($req['params'] == '')
					{
					
					}
					else
					{
						
					}
				}
				else
				{
					
				}
			}
			elseif($req['action'] == 'create')
			{
			
			}
		}
		static function resolve_request($req)
		{
			$rows = array();
			$file = "";
			$msg = "";
			if($req['action'] == 'create')
			{
				if(empty($req['params']))
				{
					$file = 'create.php';
					$rows = self::$params;
				}
				else
				{
					$file = 'read.php';
					$msg = n_crud::create(self::$table,self::$req['params']);
					$rows = n_crud::read_all(self::$table);
				}
			}
			elseif($req['action'] == 'read')
			{
				$file = 'read.php';
				$rows = n_crud::read_all(self::$table);
			}
			elseif($req['action'] == 'update')
			{
				if(empty($req['id']))
				{
					$file = 'read.php';
				}
				else
				{
					if($_POST)
					{
						$msg = n_crud::update(self::$table,self::$req['id'],self::$req['params']);
						$rows = n_crud::read_all(self::$table);
						$file = 'read.php';
					}
					else
					{
						$rows = n_crud::read(self::$table,self::$req['id']);
						$file = 'update.php';
					}
				}
			}
			elseif($req['action'] == 'delete')
			{
				$file = 'read.php';
				if(empty($req['id']))
				{

				}
				else
				{
					$msg = n_crud::delete(self::$table,self::$req['id']);
					$rows = n_crud::read_all(self::$table);
				}
			}
			else
			{
				$file = 'read.php';
				$rows = n_crud::read_all(self::$table);
			}
			include('views/main.php');
		}
		function show_error()
		{
		
		}
	}
	n_main_barcode::init();
?>
