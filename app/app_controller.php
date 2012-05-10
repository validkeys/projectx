<?php
class AppController extends Controller {
	
	// Holds an array of controller actions
	// requiring POST vs. GET
	var $requiresPost 	= array();
	var $helpers 		= array('Html','Javascript','Form','Session','Number');
	var $components 	= array(
		'RequestHandler',
		'Session',
		// 'DebugKit.Toolbar',
		'Auth'			=> array(
			'userModel'		=> 'User',
			'fields'		=> array(
				'username'		=> 'email',
				'password'		=> 'password'
			),
			'authError'		=> 'You are required to login first',
			'autoRedirect'	=> true,
			'loginAction'	=> array(
				'admin'			=> false,
				'controller'	=> 'labs',
				'action'		=> 'login'
			),
			'loginRedirect'		=> array(
				'controller'	=> 'experiments',
				'action'		=> 'index'
			)
		));
	
	
	function beforeFilter(){
		// Requires Post
		if(isset($this->requiresPost) && in_array($this->action,$this->requiresPost) && !$this->RequestHandler->isPost()){
			$this->log('This action can not be accessed using GET', LOG_DEBUG);
			$this->redirect($this->referer());
		}		
		
	}
}
