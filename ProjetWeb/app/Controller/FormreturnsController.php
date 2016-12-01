<?php
App::uses('AppController', 'Controller');
/**
 * Formreturns Controller
 *
 * @property Formreturn $Formreturn
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class FormreturnsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Formreturn->recursive = 0;
		$this->set('formreturns', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Formreturn->exists($id)) {
			throw new NotFoundException(__('Invalid formreturn'));
		}
		$options = array('conditions' => array('Formreturn.' . $this->Formreturn->primaryKey => $id));
		$this->set('formreturn', $this->Formreturn->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Formreturn->create();
			if ($this->Formreturn->save($this->request->data)) {
				$this->Flash->success(__('The formreturn has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The formreturn could not be saved. Please, try again.'));
			}
		}
		$ufs = $this->Formreturn->Ufs->find('list');
		$this->set(compact('ufs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Formreturn->exists($id)) {
			throw new NotFoundException(__('Invalid formreturn'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Formreturn->save($this->request->data)) {
				$this->Flash->success(__('The formreturn has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The formreturn could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Formreturn.' . $this->Formreturn->primaryKey => $id));
			$this->request->data = $this->Formreturn->find('first', $options);
		}
		$ufs = $this->Formreturn->Ufs->find('list');
		$this->set(compact('ufs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Formreturn->id = $id;
		if (!$this->Formreturn->exists()) {
			throw new NotFoundException(__('Invalid formreturn'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Formreturn->delete()) {
			$this->Flash->success(__('The formreturn has been deleted.'));
		} else {
			$this->Flash->error(__('The formreturn could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function pdf(){}
}
