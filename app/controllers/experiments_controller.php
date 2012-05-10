<?php
class ExperimentsController extends AppController {

	var $name 			= 'Experiments';
	var $requiresPost 	= array('delete');

	// function setdates($id){
	// 	$experiment = $this->Experiment->read(null, $id);
	// 	$start_date = $experiment['Experiment']['start_date'];
	// 	
	// 	$steps = $this->Experiment->steps($id);
	// 	
	// 	$changes = array();
	// 	
	// 	$due = date("Y-m-d",strtotime(date("Y-m-d", strtotime($start_date)) . " +1 Day"));
	// 	
	// 	foreach ($steps as $step) {
	// 		$change = array(
	// 			'id'	=> $step['Step']['id'],
	// 			'due'	=> $due
	// 		);
	// 		
	// 		$changes[] = $change;
	// 		
	// 		$due = date("Y-m-d",strtotime(date("Y-m-d", strtotime($due)) . " +1 Day"));
	// 	}
	// 	
	// 	$this->Experiment->Step->saveAll($changes);
	// 	
	// 	$this->log($changes, LOG_DEBUG);
	// 	
	// }


	function index() {
		// $this->layout = 'html5';
		$this->Experiment->recursive = 0;
		$this->set('experiments', $this->paginate());
	}

	function view($id = null) {
		
		$this->layout = 'minimal';
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid experiment', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('status',		$this->Experiment->status($id));
		
		$this->Experiment->recursive = -1;
		$this->set('experiment', 	$this->Experiment->read(null, $id));
		
		$this->set('steps',			$this->Experiment->steps($id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Experiment->create();

			// Add user_id to created experiment
			$this->data['Experiment']['user_id'] = $this->Auth->User('id');

			if ($this->Experiment->save($this->data)) {
				$this->Session->setFlash(__('The experiment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The experiment could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Experiment->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid experiment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Experiment->save($this->data)) {
				$this->Session->setFlash(__('The experiment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The experiment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Experiment->read(null, $id);
		}
		$users = $this->Experiment->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for experiment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Experiment->delete($id)) {
			$this->Session->setFlash(__('Experiment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Experiment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
