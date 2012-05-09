<?php
class StepsController extends AppController {

	var $name 			= 'Steps';
	var $requiresPost 	= array('delete');

	function index() {
		$this->Step->recursive = 0;
		$this->set('steps', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid step', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('step', $this->Step->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Step->create();
			if ($this->Step->save($this->data)) {
				$this->Session->setFlash(__('The step has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The step could not be saved. Please, try again.', true));
			}
		}
		$experiments = $this->Step->Experiment->find('list');
		$this->set(compact('experiments'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid step', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Step->save($this->data)) {
				$this->Session->setFlash(__('The step has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The step could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Step->read(null, $id);
		}
		$experiments = $this->Step->Experiment->find('list');
		$this->set(compact('experiments'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for step', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Step->delete($id)) {
			$this->Session->setFlash(__('Step deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Step was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
