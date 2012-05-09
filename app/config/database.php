<?php
class DATABASE_CONFIG {
	var $default = array();
	var $local = array(
		// 'driver' => 'mysql_with_log',
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'projectxusr',
		'password' => 'martini77',
		'database' => 'projectx',
		'prefix' => '',
		'port'	=> '/Applications/MAMP/tmp/mysql/mysql.sock'
	);


	var $test = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'user',
		'password' => 'password',
		'database' => 'test_database_name',
		'prefix' => '',
		//'encoding' => 'utf8',
	);
	
	function __construct(){
		if(isset($_SERVER['SHELL'])){
			$this->default = $this->local;
		}else{
			if(!isset($_SERVER['HTTP_HOST'])){
				$this->log($_SERVER, LOG_DEBUG);
			}
			switch($_SERVER['HTTP_HOST']){
				case 'localhost':
						$this->default = $this->local;
					break;
				default:
						$this->default = $this->local;
					break;
			}			
		}
	}
}
