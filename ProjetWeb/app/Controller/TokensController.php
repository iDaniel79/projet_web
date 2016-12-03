<?php
App::uses('AppController', 'Controller');
/**
 * Tokens Controller
 *
 * @property Token $Token
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TokensController extends AppController {

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
		$this->Token->recursive = 0;
		$this->set('tokens', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Token->exists($id)) {
			throw new NotFoundException(__('Invalid token'));
		}
		$options = array('conditions' => array('Token.' . $this->Token->primaryKey => $id));
		$this->set('token', $this->Token->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Token->create();
			if ($this->Token->save($this->request->data)) {
				$this->Flash->success(__('The token has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The token could not be saved. Please, try again.'));
			}
		}
		$ufs = $this->Token->Ufs->find('list');
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
		if (!$this->Token->exists($id)) {
			throw new NotFoundException(__('Invalid token'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Token->save($this->request->data)) {
				$this->Flash->success(__('The token has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The token could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Token.' . $this->Token->primaryKey => $id));
			$this->request->data = $this->Token->find('first', $options);
		}
		$ufs = $this->Token->Ufs->find('list');
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
		$this->Token->id = $id;
		if (!$this->Token->exists()) {
			throw new NotFoundException(__('Invalid token'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Token->delete()) {
			$this->Flash->success(__('The token has been deleted.'));
		} else {
			$this->Flash->error(__('The token could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
