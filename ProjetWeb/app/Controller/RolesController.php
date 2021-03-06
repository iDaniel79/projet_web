<?php
App::uses('AppController', 'Controller');
/**
 * Roles Controller
 *
 * @property Role $Role
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class RolesController extends AppController {

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
		$this->Role->recursive = 0;
		$this->set('roles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Role->exists($id)) {
			throw new NotFoundException(__('Role invalide'));
		}
		$options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
		$this->set('role', $this->Role->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Role->create();
			if ($this->Role->save($this->request->data)) {
				$this->Flash->success(__('Le role a été sauvé.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__("Le role n'a pas été sauvé."));
			}
		}
		$zones = $this->Role->Zone->find('list');
		$users = $this->Role->User->find('list');
		$this->set(compact('zones', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Role->exists($id)) {
			throw new NotFoundException(__('Role invalide'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Role->save($this->request->data)) {
				$this->Flash->success(__('Le role a été sauvé.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__("Le role n'a pas été sauvé."));
			}
		} else {
			$options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
			$this->request->data = $this->Role->find('first', $options);
		}
		$zones = $this->Role->Zone->find('list');
		$users = $this->Role->User->find('list');
		$this->set(compact('zones', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Role->id = $id;
		if (!$this->Role->exists()) {
			throw new NotFoundException(__('Role invalide'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Role->delete()) {
			$this->Flash->success(__('Le role a été supprimé.'));
		} else {
			$this->Flash->error(__("Le role n'a pas été supprimé."));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
