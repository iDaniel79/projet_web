<?php
App::uses('AppController', 'Controller');
/**
 * Formulaires Controller
 *
 * @property Formulaire $Formulaire
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class FormulairesController extends AppController {

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
		$this->Formulaire->recursive = 0;
		$this->set('formulaires', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Formulaire->exists($id)) {
			throw new NotFoundException(__('Invalid formulaire'));
		}
		$options = array('conditions' => array('Formulaire.' . $this->Formulaire->primaryKey => $id));
		$this->set('formulaire', $this->Formulaire->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Formulaire->create();
			if ($this->Formulaire->save($this->request->data)) {
				$this->Flash->success(__('The formulaire has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The formulaire could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Formulaire->exists($id)) {
			throw new NotFoundException(__('Invalid formulaire'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Formulaire->save($this->request->data)) {
				$this->Flash->success(__('The formulaire has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The formulaire could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Formulaire.' . $this->Formulaire->primaryKey => $id));
			$this->request->data = $this->Formulaire->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Formulaire->id = $id;
		if (!$this->Formulaire->exists()) {
			throw new NotFoundException(__('Invalid formulaire'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Formulaire->delete()) {
			$this->Flash->success(__('The formulaire has been deleted.'));
		} else {
			$this->Flash->error(__('The formulaire could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
