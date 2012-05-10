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
	
	// This returns an array of a projects status
	// Based on steps taken out of the total created
	function status($id){
		
		$steps = $this->Step->find('all',array(
			'conditions'	=> array(
				'Step.experiment_id'		=> $id
			),
			'fields'		=> array(
				'Step.id',
				'Step.completed'
			),
			'recursive'		=> -1
		));
		
		// % Completed
		// Total steps completed
		// Total Number of Steps
		// Total Steps Remaining
		// Total Days Remaining
		$returnArray = array();
		
		// Total Number of Steps
		$returnArray['total_steps'] = count($steps);

		$completed = 0;
		foreach ($steps as $step) {
			if($step['Step']['completed']){
				$completed++;
			}
		}
		
		$returnArray['completed_steps'] 		= $completed;
		$returnArray['percentage_completed']	= ($completed / $returnArray['total_steps']) * 100;
		$returnArray['steps_remaining']			= $returnArray['total_steps'] - $completed;
		$returnArray['days_remaining']			= $returnArray['total_steps'] - $completed;

		return $returnArray;
		
	}
	
	function steps($id){
		return $this->Step->find('all',array(
			'conditions'	=> array(
				'Step.experiment_id'	=> $id
			),
			'order'			=> 'Step.order ASC',
			'contain'		=> array()
		));
	}
	
}
