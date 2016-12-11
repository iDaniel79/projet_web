<?php
App::uses('AppController', 'Controller');
/**
 * Classrooms Controller
 *
 * @property Classroom $Classroom
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ClassroomsController extends AppController {

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
		$this->Classroom->recursive = 0;
		$this->set('classrooms', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Classroom->exists($id)) {
			throw new NotFoundException(__('Classe invalide'));
		}
		$options = array('conditions' => array('Classroom.' . $this->Classroom->primaryKey => $id));
		$this->set('classroom', $this->Classroom->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Classroom->create();
			if ($this->Classroom->save($this->request->data)) {
				$this->Flash->success(__('La classe a été sauvé.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__("La classe n'a pas été sauvé."));
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
		if (!$this->Classroom->exists($id)) {
			throw new NotFoundException(__('Classe invalide'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Classroom->save($this->request->data)) {
				$this->Flash->success(__('La classe a été sauvé.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__("La classe n'a pas été sauvé."));
			}
		} else {
			$options = array('conditions' => array('Classroom.' . $this->Classroom->primaryKey => $id));
			$this->request->data = $this->Classroom->find('first', $options);
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
		$this->Classroom->id = $id;
		if (!$this->Classroom->exists()) {
			throw new NotFoundException(__('Classe invalide'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Classroom->delete()) {
			$this->Flash->success(__('La classe a été supprimé.'));
		} else {
			$this->Flash->error(__("La classe n'a pas été supprimé."));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
