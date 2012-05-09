<?php
// Handles sessions
class LabsController extends AppController {

	var $name = 'Labs';
	var $uses = array('User');
	
	function beforeFilter(){
		parent::beforeFilter();
	}
	
	function login(){
		if($this->Auth->User()){
			$this->redirect($this->Auth->loginRedirect);
		}
		// debug($this->data); die();
		
	}
	
	function logout(){
		$this->redirect($this->Auth->logout());
	}
}
?>