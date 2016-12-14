<?php

class DbManual extends AppController 
{
    public function get_db_connection()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=db_formulaires;charset=utf8', 'root', '');
            return $db;
        } 
        catch (Exception $ex) 
        {
            die('Erreur : '.$ex);
        }
        
    }
    
}