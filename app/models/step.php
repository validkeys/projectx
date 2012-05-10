<?php
class Step extends AppModel {
	var $name 			= 'Step';
	var $displayField 	= 'title';
	var $actsAs 		= array('Containable');
	var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ya need a title, pal!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		// 'order' => array(
		// 	'numeric' => array(
		// 		'rule' => array('numeric'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		'completed' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'due'	=> array(
			'isDate'	=> array(
				'rule'		=> array('date','ymd'),
				'message'	=> 'This is not a valid due date'
			),
			// 'isUniqueInProject'	=> array(
			// 	'rule'		=> array('is_unique_in_project'),
			// 	'message'	=> 'You cant have two items with the same due date in one project'
			// )
		)
	);
	

	var $belongsTo = array(
		'Experiment' => array(
			'className' => 'Experiment',
			'foreignKey' => 'experiment_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	
	function beforeSave($options){
		
		// If a task has been marked as completed, set the date
		// Otherwise blank it out
		if(isset($this->data['Step']['completed'])){
			if($this->data['Step']['completed'] == 1){
				$this->data['Step']['date_completed'] = date('Y-m-d H:i:s');
			}else{
				$this->data['Step']['date_completed'] = null;
			}			
		}
		
		// If no order is available set it to 999
		if(isset($this->data['Step']['Order'])){
			if(empty($this->data['Step']['order']) || $this->data['Step']['order'] == 0){
				$this->data['Step']['order'] = 999;
			}			
		}
		
		return true;
	}
	
}
