<?php

class db {
    
    public function get_db_connection()
    {
        try
	{
            $connection = new PDO('mysql:host=localhost;dbname=db_test_formulaire', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            return $connection;
        }
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}    
    }
}