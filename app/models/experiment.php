<?php
class Experiment extends AppModel {
	var $name = 'Experiment';
	var $displayField = 'action';
	var $validate = array(
		'action' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Whoops! Sorry, we need one.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'noun' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Whoops! Sorry, we need one.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'verb' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Whoops! Sorry, we need one.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Whoops! Sorry, we need one.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'complete' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Not a boolean. If you see this error, its our fault',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	var $hasMany = array(
		'Step' => array(
			'className' => 'Step',
			'foreignKey' => 'experiment_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'Step.order ASC'
		)
	);
	
	
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function beforeSave($options){
		
		// If a task has been marked as completed, set the date
		// Otherwise blank it out
		if($this->data['Experiment']['completed'] == 1){
			$this->data['Experiment']['date_completed'] = date('Y-m-d H:i:s');
		}else{
			$this->data['Experiment']['date_completed'] = null;
		}
				
		return true;
	}
	
}
