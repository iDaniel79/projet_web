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

public $uses = array('User','Classroom','Role');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','logout','activate','password');
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

			$newpassword = md5(uniqid(rand(),true));
			$newpassword = substr($newpassword,0,10);
			$data['User']['password'] = Security::hash($newpassword,null,true);			
			$data['User']['active']	 = 0;		
			
			if($this->User->save($data,true,array('email','password','active'))){
				$link = array('controller' =>'users', 'action'=>'activate',
					$this->User->id.'-'.md5($data['User']['password']));
				App::uses('CakeEmail','Network/Email');
				$email = new CakeEmail('smtp');
				$email->from('noreply@localhost.com')
						->to($data['User']['email'])
						->subject('Test email : inscription')
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
	public function edit($id = null) 	
	{
				//if (!$this->User->exists($id)) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}		
		$error = false;
		if ($this->request->is(array('post', 'put'))) {

			//changer le mdp avec confirmation
			$data = $this->request->data;			
			//$data['User']['id'] =$d['User']['id'];
			
			if(!empty($data['User']['password1']))
			{
				if($data['User']['password1'] == $data['User']['password2'])
				{					
					$data['User']['password'] =  Security::hash($data['User']['password1'],null,true);					
				}
				else
				{
					$error = true;						
				}
			}	

			if ($this->User->save($data)) {			
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
			if($error){$this->User->validationErrors['password2'] = array('Les mots de passe ne sont pas identique');}
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
		$this->redirect('../users/changepassword');
	}

	public function login(){

			if ($this->request->is('post'));
			{
				if(!empty($this->request->data))
				{
					if($this->Auth->login())
					{	
						$this->Flash->success(__('Vous etes maintenant connecté'));			
	                                        $data = $this->Auth->user();
	                                        $_SESSION['email'] = $data['email'];                                       
	                                        $_SESSION['id_user'] = $data['id'];
	                                        $sql = 'select role FROM `roles` LEFT JOIN `users_roles` ON `users_roles`.`role_id` = `roles`.`id` '
	                                                . 'LEFT JOIN `users` ON `users_roles`.`user_id` = `users`.`id` '
	                                                . 'where users.id = "'.$_SESSION['id_user'].'"';
	                                        $roleliste = $this->User->query($sql);
	                                        $_SESSION['role'] = $roleliste[0]['roles']['role'];
	                                        
	                                        $this->redirect('../users/index');
					}
					else
					{					
						$this->Flash->error(__('Email ou mdp incorrect'));
					}
				}
			}
	}

	// déconnecter
	public function logout(){
		$this->Auth->logout();
		$this->redirect($this->referer());
	}

	// password oublié
// password oublié
	public function password()
	{
		if(!empty($this->request->params['named']['token']))
		{
			$token = $this->request->params['named']['token'];
			$token = explode('-',$token);
			$user = $this->User->find('first',array(
				'conditions'=> array('User.id'=> $token[0],'MD5(User.password)'=> $token[1],'User.active'=> 1)		
			));				
			if($user)
			{
				$this->User->id = $user['User']['id'];
				$newpassword = md5(uniqid(rand(),true));
				$newpassword = substr($newpassword,0,10);
				$this->User->saveField('password',Security::hash($newpassword, null,true));					
				$this->Flash->success(__("Votre nouveau mot de passe : $newpassword"));	

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
				$email = new CakeEmail('smtp');
				$email->from('noreply@localhost.com')
						->to($user['User']['email'])
						->subject('Test email :: mot de passe oublié')
						->emailFormat('html')
						->template('password')
						->viewvars(array('email' => $user['User']['email'], 'link' => $link))
						->send();

			}

		}

	}


	public function changepassword()
	{
		if ($this->request->is('post')) {

			$data = $this->request->data;			
						
			if(!empty($data['User']['password1']))
			{
				if($data['User']['password1'] == $data['User']['password2'])
				{					
					$psw =  $data['User']['password2'];
					debug($this->Auth->user());
					$d = $this->Auth->user();
					
					$this->User->id = $d['id'];
					$this->User->saveField('password',Security::hash($psw, null,true));
					$this->Flash->success(__('Vous etes maintenant connecté'));	
				
					$this->redirect('../users/index');						
				}
				else
				{
					$this->Flash->error(__('Les mots de passe ne sont pas identique'));	
					
				}
			}	
		}
	}
	public function import()
	{

		// On test si on recoit bien quelque chose 
		if (!empty($this->request->data)) 
		{

			$extension = strtolower(pathinfo($this->request->data['User']['csv_file']['name'] , PATHINFO_EXTENSION));


			// On test si c'est bien une extension .csv 
		    if(!empty($this->request->data['User']['csv_file']['tmp_name']) && 
		    	in_array($extension, array('csv'))) 
		    {
		    	// On déplace le fichier uploader du dossier tmp vers un dossier qui va contenir un fichier eleves.csv
		    	move_uploaded_file($this->request->data['User']['csv_file']['tmp_name'],
		    		WWW_ROOT . 'csv' . DS . 'eleves' . '.' . $extension);

		    	// Ouverture du fichier .csv
		    	$file = fopen(WWW_ROOT . 'csv' . DS . 'eleves.csv', 'r');
		        $first = 1;
		        // Compteur de ligne
		        $r = 0;
		        while ($row = fgetcsv($file,1000,";")) 
		        {
					// Si premier passage, passe le HEADER fichier csv
		        	if($first)
		        	{
		        		$first = 0;
		        	}
		        	else
		        	{
			        	// preg_remplace car un caractère invisible est présent, même après un trim
			        	$email = preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$row[5]);
						$firstname = preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$row[2]);
						$name = preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$row[3]);
						$birthdate = preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$row[4]);
						$phone = preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$row[6]);
						$mobile = preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$row[7]);
						$street = preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$row[8]);
						$city = preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$row[10]);
						$postal_code = preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$row[9]);
						$code = preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$row[12]);
						// Suppression du # dans CID du CSV.
						$string = explode('#',$row[11]);
						$classrooms_id = $string[0];

						// génération d'un mot de passe aléatoire afin de tester la validation du compte.
						$token = md5(uniqid(rand(),true));
						$token = substr($token,0,10);
						$password = Security::hash($token, null,true);
						
						// Si la classe n'existe pas, en crée une en DB
						if(!$this->Classroom->find('count',array(
							'conditions' => array('id'=> $classrooms_id )
							))){

							$this->Classroom->save(array('id' => $classrooms_id,
														'code' => $code));

						}

						// Si email n'existe pas, crée le nouvel user, sinon passe au suivant.
						if(!$this->User->find('count',array(
							'conditions' => array('email'=> $email )
							))){

							$id_elv = $this->Role->find('first',array(
								'conditions' => array('role'=> 'Eleve')));
							$role_id = $id_elv['Role']['id'];
							//debug($id_eleve['Role']['id']);
							//die();
							$this->User->query("INSERT INTO `users`(`email`,`password`,`firstname`,`birthdate`,`name`,`phone`,`mobile`,`street`,`city`,`postal_code`,`classrooms_id`) VALUES 
								('$email','$password','$firstname','$birthdate','$name','$phone','$mobile','$street','$city','$postal_code','$classrooms_id');");
							
							// Récupère l'id du dernier USER inséré
							$id_uti = $this->User->find('first', array(
								'order' => array('User.id' => 'desc')));

							$user_id = $id_uti['User']['id'];

							$this->User->query("INSERT INTO `users_roles`(`user_id`,`role_id`) VALUES ('$user_id','$role_id');");
	
							$link = array('controller' =>'users', 'action'=>'activate',
								$user_id.'-'.md5($password));
							App::uses('CakeEmail','Network/Email');
							$cakemail = new CakeEmail('smtp');
							$cakemail->from('noreply@localhost.com')
									->to($email)
									->subject('Test email : inscription')
									->emailFormat('html')
									->template('add')
									->viewvars(array('email' => $email, 'link' => $link))
									->send('mail de test');	
							
						}
						$r++;
		        	}
		    	}
		    	// Fermeture du fichier
		    	fclose($file);

		    // Si la requête renvoie bien quelque chose, mais pas un fichier csv, affiche cette erreur	
		    }else if(!empty($this->request->data['User']['csv_file']['tmp_name']))
		    {
		    	$this->Flash->error(__('Vous ne pouvez pas envoyer ce type de fichier'));
		    }

		}
	}

	public function requestativate($id)
	{
		// recherche d'un ligne en fonction de l'id demandé et que le champ active soit à 0
		$data = $this->User->find('first', array(
			'conditions' => array('User.id' => $id, 'user.active' => '0')));
		
		$link = array('controller' =>'users', 'action'=>'activate',$id.'-'.md5($data['User']['password']));
		App::uses('CakeEmail','Network/Email');
		$email = new CakeEmail('smtp');
		$email->from('noreply@localhost.com')
				->to($data['User']['email'])
				->subject('Test email : inscription')
				->emailFormat('html')
				->template('add')
				->viewvars(array('email' => $data['User']['email'], 'link' => $link))
				->send('mail de test');				
		$this->Flash->success(__("L'email à bien été envoyé"));
		return $this->redirect(array('action' => 'view/'.$id));
	}





}
