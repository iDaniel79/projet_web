<?php
App::uses('AppController', 'Controller');
/**
 * Zones Controller
 *
 * @property Zone $Zone
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ZonesController extends AppController {

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
		$this->Zone->recursive = 0;
		$this->set('zones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Zone->exists($id)) {
			throw new NotFoundException(__("Zone invalide"));
		}
		$options = array('conditions' => array('Zone.' . $this->Zone->primaryKey => $id));
		$this->set('zone', $this->Zone->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Zone->create();
			if ($this->Zone->save($this->request->data)) {
				$this->Flash->success(__("La zone a été sauvé."));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__("La zone n'a pas été sauvé."));
			}
		}
		$roles = $this->Zone->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Zone->exists($id)) {
			throw new NotFoundException(__("Zone invalide"));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Zone->save($this->request->data)) {
				$this->Flash->success(__("La zone a été sauvé."));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__("La zone n'a pas été sauvé."));
			}
		} else {
			$options = array('conditions' => array('Zone.' . $this->Zone->primaryKey => $id));
			$this->request->data = $this->Zone->find('first', $options);
		}
		$roles = $this->Zone->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Zone->id = $id;
		if (!$this->Zone->exists()) {
			throw new NotFoundException(__("Zone invalide"));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Zone->delete()) {
			$this->Flash->success(__("La zone a été supprimé."));
		} else {
			$this->Flash->error(__("La zone n'a pas été supprimé."));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
