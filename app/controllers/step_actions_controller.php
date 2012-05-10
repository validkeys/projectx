<?php
// Handles non-REST Step controller functions
// Just keeps the direct model controllers cleaner
class StepActionsController extends AppController {
	var $name = "StepActions";
	var $uses = array('Step');
	var $requiresPost = array('complete');
	
	
	// When task is marked as complete
	// Update the step model
	// If the step was from a date in the future, find all tasks happening after that task and bump their due date back a day
	
	function toggle(){
		
		$fail = false;
		
		if(!empty($this->data)){
			if(isset($this->data['Step']['completed']) && isset($this->data['Step']['id'])){
				
				$step = $this->Step->find('first',array(
					'conditions'	=> array('Step.id'	=> $this->data['Step']['id']),
					'recursive'		=> -1
				));
				
				// Ensure that an already completed item isnt trying
				// to mark itself as completed again and vice versa
				$redundant = false;
				if($this->data['Step']['completed'] == $step['Step']['completed']){
					$redundant = true;
				}
				if(!$redundant){
					if($this->data['Step']['completed']){
						// Task is being marked as completed
						$this->Step->id = $this->data['Step']['id'];
						if($this->Step->save($this->data)){
							// Now check if the due date of this task is greater than todays date
							if(strtotime($step['Step']['due']) > strtotime(date('Y-m-d'))){
								// This task was due in the future
								// therefore move all due dates for tasks
								// meant to come after this, one day back
								$this->log('Step completed. De-Iterating remaining steps due dates', LOG_DEBUG);
								$query = "UPDATE steps as Step set Step.due = date_sub(date(Step.due), INTERVAL 1 Day) WHERE Step.order > {$step['Step']['id']} AND Step.experiment_id = {$step['Step']['experiment_id']}";

								if($this->Step->query($query)){
									$this->log("Mass due date update successful", LOG_DEBUG);
									$this->Session->setFlash('Step marked as complete!');
								}else{
									$this->log("Mass due date update !!NOT!! successful", LOG_DEBUG);
									$this->Session->setFlash('Step not marked as complete....');
								}

							}
						}
					}else{
						// Task is being marked as incomplete
						$this->Step->id = $this->data['Step']['id'];
						if($this->Step->save($this->data)){
							$this->log('Step un-completed. Iterating remaining steps due dates', LOG_DEBUG);
							$query = "UPDATE steps as Step set Step.due = date_sub(date(Step.due), INTERVAL -1 Day) WHERE Step.order > {$step['Step']['id']} AND Step.experiment_id = {$step['Step']['experiment_id']}";

							if($this->Step->query($query)){
								$this->log("Mass due date update successful", LOG_DEBUG);
								$this->Session->setFlash('Step marked as complete!');
							}else{
								$this->log("Mass due date update !!NOT!! successful", LOG_DEBUG);
								$this->Session->setFlash('Step not marked as complete....');
							}

						}
					}
					
				}
				
				$this->redirect($this->referer());
				
			}else{
				$this->log('Steps/complete called without completed or id variable');
				$fail = true;
			}
		}else{
			$this->log('Steps/complete called with empty $this->data');
			$fail = true;
		}
		
		if($fail){
			$this->log('Referring to:');
			$this->log($this->referer());
			$this->redirect($this->referer());
		}
		
	}
}
?>