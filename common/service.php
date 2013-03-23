<?php
	
	
	class n_service
	{
		public $param_list = array();
		public $req = array();
		public $table = '';
		function __construct($table,$param_list)
		{
			$this->table = $table;
			$this->receive_request();
		}
		function receive_request()
		{

			if(isset($_GET['n_entity']))
			{
				$this->req['entity'] = trim($_GET['n_entity']);
			}
			else
			{
				$this->req['n_entity'] = '';
			}

			if(isset($_GET['n_action']))
			{
				$this->req['action'] = trim($_GET['n_action']);
			}
			else
			{
				$this->req['action'] = '';
			}

			if(isset($_GET['n_id']))
			{
				$this->req['id'] = trim($_GET['n_id']);
			}
			else
			{
				$this->req['id'] = '';
			}


			if(isset($_POST['n_confirm']))
			{
				$this->req['confirm'] = trim($_POST['n_confirm']);
			}
			else
			{
				$this->req['confirm'] = '';
			}

			foreach($this->param_list as $key=>$val)
			{
				if(isset($_POST[$val]))
				{
					$this->req['params'][$key] = $_POST[$key];
				}
				else
				{
					$this->req['params'][$key] = "";
				}
			}

		}		
		function resolve_request($req)
		{
			if($req['action'] == 'create')
			{
				if($req['params'] == '')
				{
					
				}
				else
				{
					n_crud::create($this->table,$this->req['params']);
				}
			}
			elseif($req['action'] == 'read')
			{
				if($req['id'] == '')
				{
					n_crud::read($this->table);
				}
				else
				{
					n_crud::read($this->table,$this->req['params']);
				}
			}
			elseif($req['action'] == 'update')
			{
				if($req['id'] == '')
				{
				
				}
				else
				{
					if($req['params'] == '')
					{
					
					}
					else
					{
						n_crud::read($this->table,$this->req['id'],$this->req['params']);
					}									
				}

			}
			elseif($req['action'] == 'delete')
			{
				if($req['id'] == '')
				{
					
				}
				else
				{
					if($req['confirm'] == '')
					{
						
					}
					else
					{
						n_crud::read($this->table,$this->req['id']);
					}						
				}
			}
		}
		function show_error()
		{
		
		}
		function __destruct()
		{
			n_config_db::finish();
		}
	}
?>
