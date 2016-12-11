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
			throw new NotFoundException(__('Formulaire de retour invalide.'));
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
				$this->Flash->success(__('Formulaire de retour a été sauvé.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__("Formulaire de retour n'a pas été sauvé."));
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
			throw new NotFoundException(__('Formulaire de retour invalide.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Formreturn->save($this->request->data)) {
				$this->Flash->success(__('Formulaire de retour a été sauvé.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__("Formulaire de retour n'a pas été sauvé."));
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
			throw new NotFoundException(__('Formulaire de retour invalide.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Formreturn->delete()) {
			$this->Flash->success(__('Formulaire de retour a été supprimé.'));
		} else {
			$this->Flash->error(__("Formulaire de retour n'a pas été supprimé."));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
//        public function exportpdf(){
//            //pour éviter les outputs du debug de cake
//            //Configure::write('debug',0);
//            //la solution depuis cakephp 2
//            $this->response->type('pdf');
//            $this->layout='pdf';
//        }
        
        public function pdf() {
            $this->autoRender = false;
            $this->layout = null;
            $view = new View($this, false);
            $view->set('variable', true);
            $view_output = $view->render('pdf');
            // Load from Vendors dir
            App::import('Vendor', 'html2pdf', array('file' => 'html2pdf' .DS . 'html2pdf.php'));
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($view_output);
            $html2pdf->Output('test.pdf', 'D');
	}
        
         public function rapport(){
         }

}
