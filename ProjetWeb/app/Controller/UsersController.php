<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout','activate');
    }

/**
 * index method
 *
 * @return void

  */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			$data = $this->request->data;

			$data['User']['id'] = null;
			if(!empty($data['User']['password'])){

				$data['User']['password'] = Security::hash($data['User']['password'],null,true);
				$data['User']['active']	 = 0;		
			}
			if($this->User->save($data,true,array('email','password','active'))){
				$link = array('controller' =>'users', 'action'=>'activate',
					$this->User->id.'-'.md5($data['User']['password']));
				App::uses('CakeEmail','Network/Email');
				$email = new CakeEmail('smtp');
				$email->from('noreply@localhost.com')
						->to($data['User']['email'])
						->subject('Test email :: inscription')
						->emailFormat('html')
						->template('add')
						->viewvars(array('email' => $data['User']['email'], 'link' => $link))
						->send('mail de test');				
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		$classrooms = $this->User->Classrooms->find('list');
		$roles = $this->User->Role->find('list');
		$ufs = $this->User->Uf->find('list');
		$this->set(compact('classrooms', 'roles', 'ufs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {

				// envoi un email pour activer son compte
				$link = array('controller' =>'users', 'action'=>'activate',
					$this->User->id.'-'.md5($data['User']['password']));
				App::uses('CakeEmail','Network/Email');
				$email = new CakeEmail('default');
				$email->to($data['User']['email'])
						->subject('Test email :: inscription')
						->emailFormat('html')
						->template('add')
						->viewvars(array('email' => $data['User']['email'], 'link' => $link))
						->send();

				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$classrooms = $this->User->Classrooms->find('list');
		$roles = $this->User->Role->find('list');
		$ufs = $this->User->Uf->find('list');
		$this->set(compact('classrooms', 'roles', 'ufs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	// activer le compte pour pouvoir ce connecter
	public function activate($token){

		debug($token);

		$token = explode('-',$token);
		$user = $this->User->find('first',array(
				'conditions'=> array('User.id'=> $token[0],'MD5(User.password)'=> $token[1],'User.active'=> 0)		
			));
		debug($user);
		if(!empty($user)){
			$this->User->id = $user['User']['id'];
			$this->User->saveField('active',1);

			//$this->Session->setFlash("Votre compte est actif à partir de maintenant");
			$this->Auth->login($user['User']);
		}
		else{
			//$this->Session->setFlash("Lien d'ectivation est hors service");
		}
		$this->redirect('../users/index');
	}

	public function login(){

			if ($this->request->is('post'));{
				if($this->Auth->login()){					
					$this->Session->setFlash("Vous etes maintenant connecté");
					$this->redirect('../users/index');
				}
				else{					
					$this->Session->setFlash('Email ou mdp incorrect');
				}
			}
	}

	// déconnecter
	public function logout(){
		$this->Auth->logout();
		$this->redirect($this->referer());
	}

	// password oublié
	public function password()
	{
		if(!empty($this->request->params['named']['token']))
		{
			$token = $this->request->params['named']['token'];
			$token = explode('-',$token);
			$user = $this->User->find('first',array(
				'conditions'=> array('id'=> $token[0],'MD5(User.password)'=> $token[1],'active'=> 1)		
			));				
			if($user)
			{
				$this->User->id = $user['User']['id'];
				$newpassword = md5(uniqid(rand(),true));
				$newpassword = substr($newpassword,0,10);
				$this->User->saveField('password',Security::hash($newpassword, null,true));
				$this->Session->setFlash("Votre nouveau mot de passe : $newpassword");
			}
			else
			{
				$this->Session->setFlash("Le lien n'est pas valide");
			}

		}

		//envoyer le token mdp
		if($this->request->is('post'))
		{
			$d = current($this->request->data);
			$user = $this->User->find('first',array(
				'conditions' => array('email' => $d['email'],'active'=>1)));
			if(empty($user))
			{
				$this->Session->setFlash("Pas d'utilisateur à cette eamil");
			}
			else
			{

				$link = array('controller' =>'users', 'action'=>'password','token' =>
					$user['User']['id'].'-'.md5($user['User']['password']));

				App::uses('CakeEmail','Network/Email');
				$email = new CakeEmail('default');
				$email->to($user['User']['email'])
						->subject('Test email :: mot de passe oublié')
						->emailFormat('html')
						->template('password')
						->viewvars(array('email' => $data['User']['email'], 'link' => $link))
						->send();

			}

		}

	}


}
