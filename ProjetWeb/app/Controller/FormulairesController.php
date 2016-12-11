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
			throw new NotFoundException(__('Formulaire invalide'));
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
				$this->Flash->success(__('Le formulaire  a été sauvé.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__("Le formulaire n'a pas été sauvé."));
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
			throw new NotFoundException(__('Formulaire invalide'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Formulaire->save($this->request->data)) {
				$this->Flash->success(__('Le formulaire  a été sauvé.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__("Le formulaire n'a pas été sauvé."));
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
			throw new NotFoundException(__('Formulaire invalide'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Formulaire->delete()) {
			$this->Flash->success(__('Le formulaire  a été supprimé.'));
		} else {
			$this->Flash->error(__("Le formulaire n'a pas été supprimé."));
		}
		return $this->redirect(array('action' => 'index'));
	}




		public function displayvalidationform()
	{
			
			
			if ( $_SESSION['role'] == 'Scribe')
			{
				// recherche de la liste des formulaires
				$form = $this->Formulaire->find('all', array(
					'conditions' => array('scribe_check' => 0 , 'verif_check' => 0, 'directeur_check' => 0, 'error_check' => 0)));				
			}

			if ( $_SESSION['role'] == 'Vérificateur')
			{
				// recherche de la liste des formulaires
				$form = $this->Formulaire->find('all', array(
					'conditions' => array('scribe_check' => 1 , 'verif_check' => 0, 'directeur_check' => 0, 'error_check' => 0)));				
			}

			if ( $_SESSION['role'] == 'Direction')
			{
				// recherche de la liste des formulaires
				$form = $this->Formulaire->find('all', array(
					'conditions' => array('scribe_check' => 1 , 'verif_check' => 1, 'directeur_check' => 0, 'error_check' => 0)));				
			}



			// envoie vers la vue
			$this->set('form', $form);
	}


	public function valideform($id)
	{
		if (!$this->Formulaire->exists($id)) {
			throw new NotFoundException(__('Invalid formulaire'));
		}

		if ( $_SESSION['role'] == 'Scribe')
		{
			$data = $this->Formulaire->find('first', array(
				'conditions' =>array('id' => $id)));				
			$data['Formulaire']['scribe_check'] = true ; 
			$data['Formulaire']['date_scribe_check'] = date("Y-m-d");
			//$this->Formulaire->id = $id;
			$this->Formulaire->id = $id;

			if($this->Formulaire->save($data,true,array('scribe_check','date_scribe_check')))			
			{
				$this->redirect('../Formulaires/displayvalidationform');
			}
			else
			{					
				$this->Flash->error(__('Erreur lors de le validation'));
			}
		}

		if ( $_SESSION['role'] == 'Vérificateur')
		{
			$data = $this->Formulaire->find('first', array(
				'conditions' =>array('id' => $id)));				
			$data['Formulaire']['verif_check'] = true ; 
			$data['Formulaire']['date_verif_check'] = date("Y-m-d");
			
			$this->Formulaire->id = $id;

			if($this->Formulaire->save($data,true,array('verif_check','date_verif_check')))			
			{
				$this->redirect('../Formulaires/displayvalidationform');
			}
			else
			{					
				$this->Flash->error(__('Erreur lors de le validation'));
			}
		}

		if ( $_SESSION['role'] == 'Direction')
		{
			$data = $this->Formulaire->find('first', array(
				'conditions' =>array('id' => $id)));				
			$data['Formulaire']['directeur_check'] = true ;
			$data['Formulaire']['date_directeur_check'] = date("Y-m-d"); 
			
			$this->Formulaire->id = $id;

			if($this->Formulaire->save($data,true,array('directeur_check','date_directeur_check')))			
			{
				$this->redirect('../Formulaires/displayvalidationform');
			}
			else
			{					
				$this->Flash->error(__('Erreur lors de le validation'));
			}
		}

	}


	public function refuseform($id)
	{
		$form = $this->Formulaire->find('first', array(
					'conditions' => array('id' => $id)));
		

		$this->set('form', $form);

		if($this->request->is('post'))
		{
			if(!empty($this->request->data))
			{

				$text = $this->request->data;

				$form['Formulaire']['error_message'] =  $_SESSION['role']. ' : '. $text['Formulaire']['error_message'];
				$form['Formulaire']['error_check'] = 1;
				$form['Formulaire']['date_error'] = date("Y-m-d");

				$this->Formulaire->id = $id;

				if($this->Formulaire->save($form,true,array('error_message','error_check', 'date_error')))			
				{
					$this->redirect('../Formulaires/displayvalidationform');
				}
				else
				{					
					$this->Flash->error(__("Erreur lors de l'enregistrement du message"));
				}					
			}
		}
	}



	public function listrefused()
	{
		$form = $this->Formulaire->find('all', array(
			'conditions' => array('error_check' => 1)));

		$this->set('form', $form);

	}

}