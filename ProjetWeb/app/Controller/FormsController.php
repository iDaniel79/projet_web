<?php
App::import('Controller','DbManual');

class FormsController extends AppController 
{
    public $components = array('RequestHandler');
    
    public function index() // lister les formulaires existants
    {
        $this->set('forms', $this->Form->find('all')); // affiche tous les formulaires dans la db
    }
    
    public function view($id = null) // afficher le formulaire selon son id
    {
        if (!$id) // si id n'existe pas renvoi erreur
        {
            throw new NotFoundException(__('Structure non existante'));
        }
        
        $form = $this->Form->findById($id); // trouve un formulaire avec l'id indiqué
        
        if (!$form) // si selon id le formulaire trouvé est vide renvoie une erreur
        {
            throw new NotFoundException(__('Structure non existante'));
        }
        
        $this->set('form', $form); // renvoi le formulaire trouvé
    }
    
    public function add()
    {
        if ($this->request->is('post'))
        {
            $this->Form->create();
            
            if ($this->Form->save($this->request->data))
            {
                //$this->Flash->success(__('Your form has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            
            //$this->Flash->error(__('Unable to add your form.'));
        }
    }
    
    public function to_verify_list() 
    {
        $this->set('forms', $this->Form->find('all', array('conditions' => array('statut_verifie' => 0) )));
    }
    
   public function verify($id = null)
    {
        if(!$id)
        {
          throw new NotFoundException(__('Structure non existante'));
        }
        
        $form = $this->Form->findById($id);
        
        if(!$form)
        {
            throw new NotFoundException(__('Structure non existante'));
        }
        
        if($this->request->is(array('post', 'put')))
        {
            $this->Form->id = $id;
            
            if($this->Form->save($this->request->data))
            {
                $this->Flash->success(__('Le formulaire a été validé'));
                return $this->redirect(array('action' => 'to_verify_list'));
            }
            $this->Flash->error(__('Le formulaire n\'a pas pu être validé'));
        }
        
        if (!$this->request->data)
        {
            $this->request->data = $form;
        }
        
        $this->set('form', $form);
    }
    
    
    public function to_modify_list() 
    {
        $this->set('forms', $this->Form->find('all', array('conditions' => array('statut_verifie' => 0) )));
    }
    
    public function modify($id = null)
    {
        if(!$id)
        {
          throw new NotFoundException(__('Structure non existante'));
        }
        
        $form = $this->Form->findById($id);
        
        if(!$form)
        {
            throw new NotFoundException(__('Structure non existante'));
        }
        
        if($this->request->is(array('post', 'put')))
        {
            $this->Form->id = $id;
            
            if($this->Form->save($this->request->data))
            {
                //$this->Flash->success(__('Le formulaire a été validé'));
                return $this->redirect(array('action' => 'to_verify_list'));
            }
            $this->Flash->error(__('Le formulaire n\'a pas pu être validé'));
        }
        
        if (!$this->request->data)
        {
            $this->request->data = $form;
        }
        
        $this->set('form', $form);
    }
    
    public function to_valid_list() 
    {
        $this->set('forms', $this->Form->find('all', array('conditions' => array('statut_verifie' => 1, 'statut_valide' => 0) )));
    }
    
    public function valider($id = null)
    {
        if(!$id)
        {
          throw new NotFoundException(__('Structure non existante'));
        }
        
        $form = $this->Form->findById($id);
        
        if(!$form)
        {
            throw new NotFoundException(__('Structure non existante'));
        }
        
        if($this->request->is(array('post', 'put')))
        {
            $this->Form->id = $id;
            
            if($this->Form->save($this->request->data))
            {
                $connection = new DbManual();
                $db = $connection->get_db_connection();
                $count= 0; /* comptage de nombre de questions */
                
                /* fill up question table */
                $element = $this->request->data['Form']['structure'];
                $elements = explode(",", $element);
                $limit = sizeof($elements);
                $query_array = array();
                $query_table = 'CREATE TABLE IF NOT EXISTS `blog`.`reponse'.$id.'` '
                        . ' (`id` INT(11) NOT NULL AUTO_INCREMENT,'
                        . '`id_UF` INT(11) NOT NULL,'
                        . '`id_form` INT (11) NOT NULL,'
                        . '`created` DATE NOT NULL, ';      
                $query_table_end = 'PRIMARY KEY (`id`)) ENGINE = InnoDB AUTO_INCREMENT = 27 DEFAULT CHARACTER SET = utf8;';

                for ($i = 0; $i < $limit; $i++)
                {
                    if (strpos($elements[$i], 'type="paragraph"') !== false) 
                    {
                        $x = strpos($elements[$i], 'label') + 7;
                        $y = strpos($elements[$i], 'class') -2;
                        $query = 'INSERT INTO questions VALUES ( null, \'' . substr($elements[$i], $x, $y - $x) . '\' );' ;
                        $db->query($query);
                        $count++;
                        $query_table = $query_table . '`id_question_'.$count.'` INT(11) NOT NULL, ';
                    }  
                    if (strpos($elements[$i], 'type="radio-group"') !== false)
                    {
                        $query_table = $query_table . '`evaluation_'.$count.'` TINYINT(4), ';
                    }
                            
                    if (strpos($elements[$i], 'type="text"') !== false)
                    {
                        $query_table = $query_table . '`ligne_'.$count.'` VARCHAR(400), ';
                    }
                    
                    if (strpos($elements[$i],'type="textarea"') !== false)
                    {
                        $query_table = $query_table . '`commentaire_'.$count.'` VARCHAR(400), ';
                    }
                }
                $query_table = $query_table . $query_table_end;
                
                /* la position de la premiere question */
                $position = $db->lastInsertId() - ($count - 1);
                $save_position = 'UPDATE `forms` SET `ref_question` = ' . $position . ' WHERE id = ' . $id . ' ;';
                $db->query($save_position);
                
                /* create formular table */
                $db->query($query_table);
                /* set up relations */
                $query_links = 'ALTER TABLE `reponse'.$id.'` ADD CONSTRAINT `fk_forms` FOREIGN KEY (`id_form`) REFERENCES `forms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION, ADD CONSTRAINT `fk_questions` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION, ADD CONSTRAINT `fk_uf` FOREIGN KEY (`id_uf`) REFERENCES `ufs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;';
                 $db->query($query_links);

                /* disable connection to db */
                $db = null;
                
                //$this->Flash->success(__('Le formulaire a été validé'));
                return $this->redirect(array('action' => 'to_valid_list'));
            }
            $this->Flash->error(__('Le formulaire n\'a pas pu être validé'));
        }
        
        if (!$this->request->data)
        {
            $this->request->data = $form;
        }
        
        $this->set('form', $form);
    }
    
    public function to_fill_list() 
    {
        $this->set('forms', $this->Form->find('all', array('conditions' => array('statut_verifie' => 1, 'statut_valide' => 1) )));
    }

    public function fill($id = null) // afficher le formulaire selon son id
    {
        
        if(!$id)
        {
          throw new NotFoundException(__('Structure non existante'));
        }
        
        $form = $this->Form->findById($id);
        
        if(!$form)
        {
            throw new NotFoundException(__('Structure non existante'));
        }
        
        if ($this->request->is('post', 'put'))
        {            
            $formresult = $this->request->data;
            
            $query = 'INSERT INTO `reponse' . $formresult['question']['id_form'] . '` VALUES '
                    . '( null, '
                    . '\'' . $formresult['question']['id_uf'] . '\', '
                    . $formresult['question']['id_form'] . ', '
                    . '\'' . date('Y-m-d') .'\'' ; 
                
            for ($i = 1; $i <= $formresult['question']['count']; $i++) 
            {
                if ($formresult['question']['id_question_' . $i])
                {
                    $query = $query . ', ' . $formresult['question']['id_question_' . $i];
                }                
                if ($formresult['question']['evaluation_' . $i])
                {
                    $query = $query . ', ' . $formresult['question']['evaluation_' . $i];
                } 
                if ($formresult['question']['ligne_' . $i])
                {
                    $query = $query . ', \'' . $formresult['question']['ligne_' . $i] . '\'';
                }  
                if ($formresult['question']['commentaire_' . $i])
                {
                    $query = $query . ', \'' . $formresult['question']['commentaire_' . $i] . '\'';
                }  
            } 
            $query = $query . ');';
            
            $connection = new DbManual();
            $db = $connection->get_db_connection();
            $db->query($query);
            $db = null;
            //$this->Flash->success(__('Your form has been saved.'));
            return $this->redirect(array('action' => 'index'));

        }
        
        $this->set('form', $form);
    }
}
