<?php

//include_once ('./db.class.php');

/* instance de classe db */
//$linkToDb = new db();
/* récupération du gabarit du formulaire transmis en post */
$canvas = $_POST['formData'];

echo '**************************************************************';
$canvas_array = explode("\n", $canvas);
    $limit = sizeof($canvas_array);
    $question_count = 0;
    /* parcourir le gabarit ligne par ligne */
    for ($i = 0; $i < $limit; $i++){
        if (strpos($canvas_array[$i], 'type="header"') !== false) {
            $count = $question_count + 1;
            $canvas_array[$i] = str_replace('></field>', ' ' . 'name="titre-' . $count . '" ></field>', $canvas_array[$i]);
        }
        if (strpos($canvas_array[$i], 'type="paragraph"') !== false) {
            $question_count++;
            $canvas_array[$i] = str_replace('></field>', ' ' . 'name="question-' . $question_count . '" ></field>', $canvas_array[$i]);
        }
        if (strpos($canvas_array[$i], 'type="radio-group"') !== false) {
            $pos = strpos($canvas_array[$i], 'name=');
            $canvas_array[$i] = str_replace(substr($canvas_array[$i],$pos),'name="radio-group-' . $question_count . '">', $canvas_array[$i]);
        }
        if (strpos($canvas_array[$i], 'type="text"') !== false) {
            $pos = strpos($canvas_array[$i], 'name=');
            $canvas_array[$i] = str_replace(substr($canvas_array[$i],$pos),'name="ligne-' . $question_count . '">', $canvas_array[$i]);
        }
        if (strpos($canvas_array[$i], 'type="textarea"') !== false) {
            $pos = strpos($canvas_array[$i], 'name=');
            $canvas_array[$i] = str_replace(substr($canvas_array[$i],$pos),'name="commentaire-' . $question_count . '">', $canvas_array[$i]);
        }     
    }
    /* réinitiliser le gabarit */
    $canvas = "";
    /* reconstruire le gabarit */
    for ($i = 0; $i < $limit; $i++){
        $canvas = $canvas . $canvas_array[$i];
    }
//echo $canvas;
echo '**************************************************************';
//$this->User->save(array('first_name' => 'Melon', 'last_name' => 'Head'));
$this->Form->save(array('titre' => 'exemple', 'structure' => $canvas));
//try
//{
//    /* connection vers la base de données*/
//    //$dbConnection = $linkToDb->get_db_connection(); 
//    $dbconnection = new PDO('mysql:host=localhost;dbname=db_test_formulaire', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//    
//    /* décortiquer le gabarit et adapter l'attribut name des éléments */
//    $canvas_array = explode("\n", $canvas);
//    $limit = sizeof($canvas_array);
//    $question_count = 0;
//    /* parcourir le gabarit ligne par ligne */
//    for ($i = 0; $i < $limit; $i++){
//        if (strpos($canvas_array[$i], 'type="header"') !== false) {
//            $count = $question_count + 1;
//            $canvas_array[$i] = str_replace('></field>', ' ' . 'name="titre-' . $count . '" ></field>', $canvas_array[$i]);
//        }
//        if (strpos($canvas_array[$i], 'type="paragraph"') !== false) {
//            $question_count++;
//            $canvas_array[$i] = str_replace('></field>', ' ' . 'name="question-' . $question_count . '" ></field>', $canvas_array[$i]);
//        }
//        if (strpos($canvas_array[$i], 'type="radio-group"') !== false) {
//            $pos = strpos($canvas_array[$i], 'name=');
//            $canvas_array[$i] = str_replace(substr($canvas_array[$i],$pos),'name="radio-group-' . $question_count . '">', $canvas_array[$i]);
//        }
//        if (strpos($canvas_array[$i], 'type="text"') !== false) {
//            $pos = strpos($canvas_array[$i], 'name=');
//            $canvas_array[$i] = str_replace(substr($canvas_array[$i],$pos),'name="ligne-' . $question_count . '">', $canvas_array[$i]);
//        }
//        if (strpos($canvas_array[$i], 'type="textarea"') !== false) {
//            $pos = strpos($canvas_array[$i], 'name=');
//            $canvas_array[$i] = str_replace(substr($canvas_array[$i],$pos),'name="commentaire-' . $question_count . '">', $canvas_array[$i]);
//        }     
//    }
//    /* réinitiliser le gabarit */
//    $canvas = "";
//    /* reconstruire le gabarit */
//    for ($i = 0; $i < $limit; $i++){
//        $canvas = $canvas . $canvas_array[$i];
//    }
//
//    /* SAUVEGARDER LE GABARIT DANS LA DB */
//    /* préparation de la requête sql */
//    $query = $dbConnection->prepare('INSERT INTO formulaires VALUES ( null, :canvas)');
//    /* exécution de la requêtte */
//    $query->execute(array( 'canvas' => $canvas ));
//}
//catch(Exception $e)
//{
//        die('Erreur : '.$e->getMessage());
//}    
//
//$dbConnection = null;


