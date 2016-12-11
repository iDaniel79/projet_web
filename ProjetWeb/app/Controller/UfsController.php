<?php
App::uses('AppController', 'Controller');
/**
 * Ufs Controller
 *
 * @property Uf $Uf
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UfsController extends AppController {

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
		$this->Uf->recursive = 0;
		$this->set('ufs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Uf->exists($id)) {
			throw new NotFoundException(__("Uf invalide"));
		}
		$options = array('conditions' => array('Uf.' . $this->Uf->primaryKey => $id));
		$this->set('uf', $this->Uf->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Uf->create();
			if ($this->Uf->save($this->request->data)) {
				$this->Flash->success(__("L'uf a été sauvé."));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__("L'uf n'a pas été sauvé."));
			}
		}
		$users = $this->Uf->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Uf->exists($id)) {
			throw new NotFoundException(__("Uf invalide"));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Uf->save($this->request->data)) {
				$this->Flash->success(__("L'uf a été sauvé."));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__("L'uf n'a pas été sauvé."));
			}
		} else {
			$options = array('conditions' => array('Uf.' . $this->Uf->primaryKey => $id));
			$this->request->data = $this->Uf->find('first', $options);
		}
		$users = $this->Uf->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Uf->id = $id;
		if (!$this->Uf->exists()) {
			throw new NotFoundException(__("Uf invalide"));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Uf->delete()) {
			$this->Flash->success(__("L'uf a été supprimé."));
		} else {
			$this->Flash->error(__("L'uf n'a pas été supprimé."));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
