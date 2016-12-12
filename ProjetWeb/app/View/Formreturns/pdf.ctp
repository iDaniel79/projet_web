<style type="text/css">
<!--
table {
  border-spacing: 0;
  border-collapse: collapse;
}


th
{
    text-align: center;
    border: solid 1px;
    padding: 0;
}

td
{
    text-align: left;
    border: solid 1px;
    padding: 0;
}

td1
{
    text-align: left;
    border: solid 1px;
    padding: 0;
}


end_last_page div
{
    border: solid 1mm;
    height: 27mm;
    margin: 0;
    padding: 0;
    text-align: center;
    font-weight: bold;
}
-->
</style>
<?php //Connexion à la DB
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=db_formulaires;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        
        //Récupération du patron formulaire
        $queryform = $bdd->query("SELECT `id`, `version`,`name`,`titre_1`,`titre_2`,`titre_3`,`titre_4`,`titre_5`,`titre_6`,`titre_7` FROM `formulaires` order by id desc limit 1");
        $titre = $queryform->fetch();
        
        //Récupération de la classe liée à l'UF
        $queryclasse = $bdd->query("select distinct classrooms.code FROM `classrooms` LEFT JOIN `users` ON `users`.`classrooms_id` = `classrooms`.`id` "
                . "LEFT JOIN `users_ufs` ON `users_ufs`.`user_id` = `users`.`id` LEFT JOIN `ufs` ON `users_ufs`.`uf_id` = `ufs`.`id` where ufs.name = '".$_GET['fUF']."'" );
                                
        //$queryprof = $bdd->query("select users.name, users.firstname FROM `users` LEFT JOIN `users_ufs` ON `users_ufs`.`user_id` = `users`.`id` LEFT JOIN `ufs` ON `users_ufs`.`uf_id` = `ufs`.`id` where ufs.name = '".$_GET['fUF']."'" );
        $queryprof = $bdd->query("select users.name, users.firstname FROM `users` LEFT JOIN `users_ufs` ON `users_ufs`.`user_id` = `users`.`id` LEFT JOIN `ufs` ON `users_ufs`.`uf_id` = `ufs`.`id` "
                . "LEFT JOIN `users_roles` ON `users_roles`.`user_id` = `users`.`id` LEFT JOIN `roles` ON `users_roles`.`role_id` = `roles`.`id` where ufs.name = '".$_GET['fUF']."' and roles.role = 'professeur' ");
        $prof = $queryprof->fetch()
?>

<div class="formreturns pdf">
 
     <table>
        <col style="width: 15%">
        <col style="width: 55%">
        <col style="width: 30%">
        <!--LOGO-->
        <tr>
            <th>
            <?php echo $this->Html->image('Logo_IEPSA/IEPSA_PDF.png', array('fullBase' => true));?>
            </th>
            <th>
                 <h2>Résumé des évaluations pour l'uf "<?php echo $_GET['fUF']?>" </h2>
            </th>
            
            <td>
                Version du formulaire : <?php echo $titre['version']; ?> <br>
                Nom : <?php echo $titre['name']; ?>               
            </td>
            
            
        </tr>
    </table>
   
 
    <h2>Identification   de l'unité de formation évaluée</h2>
 
    <table>
        <col style="width: 20%">
        <col style="width: 80%">
        <tr>			
                <td>Section</td>
                <td>
                <?php while ($classe = $queryclasse->fetch()){
                    echo $classe['code']." ";
                }
                
                ?>               
                </td>
        </tr>
        <tr>			
                <td>Unité de formation</td>
                <td><?php echo $_GET['fUF']?></td>
        </tr>
        <tr>			
                <td>Chargé de cours</td>
                <td>
                    <?php echo $prof['name']." ".$prof['firstname']?>
                </td>
        </tr>
    </table>
 
 
    <h2>Degré de satisfaction</h2>
 
    <table>
        <col style="width: 20%">
        <col style="width: 20%">
        <col style="width: 20%">
        <col style="width: 20%">
        <col style="width: 20%">
         <thead>
             <tr>
                <th colspan="5" style="font-size: 16px;">
                   Degré de satisfaction concernant le point évalué
                </th>
            </tr>
            <tr>
                    <th> E </th>
                    <th> D </th>
                    <th> C </th>
                    <th> B </th>
                    <th> A </th>   
            </tr>
         </thead>
        <tr>			
                <td>
                        Je ne suis pas
                        satisfait. Il y a des
                        points qui doivent
                        être absolument 
                        améliorés.

                </td>
                <td>
                        Je ne suis pas 
                        entièrement 
                        satisfait.			
                </td>
                <td>
                        Je suis satisfait,
                        ni plus, ni moins.
                        Je ne me plains pas.						
                </td>
                <td>
                        Mes attentes sont
                        amplement
                        rencontrées.			
                </td>
                <td>
                        Excellent,
                        je suis très satisfait.			
                </td>
        </tr>
    </table>
<?php					//On récupère les données de la DB

        //Ecriture de la requete
        //Récupération des formulaires remplis selon l'UF
        //Nous récupérons uniquement la dernière version du formulaire pour le moment

        
        $queryevaluation = $bdd->query("SELECT round(avg(`evaluation_1`),0) as 'evaluation_1',"
                . "round(avg(`evaluation_2`),0) as 'evaluation_2',round(avg(`evaluation_3`),0) as 'evaluation_3',"
                . "round(avg(`evaluation_4`),0) as 'evaluation_4',round(avg(`evaluation_5`),0) as 'evaluation_5',"
                . "round(avg(`evaluation_6`),0) as 'evaluation_6',round(avg(`evaluation_7`),0) as 'evaluation_7' FROM `formreturns`"
                . " inner join `ufs` on `formreturns`.ufs_id=`ufs`.id WHERE ufs.name = '".$_GET['fUF']."'");
        $evaluation= $queryevaluation->fetch();
        
        for ($compteur=1;$compteur<=7;$compteur++){

            ?>
    <br>
        <table>
            <col style="width: 60%">
            <col style="width: 40%">
                <tr>
                    <td>
                        <?php echo $titre['titre_'.$compteur];?>
                    </td>
                    <td>
                        <?php 
                        $resultat ="";
                                
                        switch($evaluation['evaluation_'.$compteur])
                        {
                         case "1" :
                             $resultat = "E";
                             break;
                         case "2" :
                             $resultat = "D";
                             break;
                         case "3" :
                             $resultat = "C";
                             break;
                         case "4" :
                             $resultat = "B";
                             break;
                         case "5" :
                             $resultat = "A";
                             break;
                         default :
                             $resultat = "null";
                        }     
                        
                        ?>
                        Evaluation moyenne : <?php echo $resultat;?>
                        
                    </td>
                </tr>
        </table>
        <?php
        //Récupération de l'ensemble des commentaires classés selon le titre
        $querycommentaires = $bdd->query("SELECT `commentaire_".$compteur ."` FROM `formreturns` inner join `ufs` on `formreturns`.ufs_id=`ufs`.id WHERE ufs.name = '".$_GET['fUF']."'" );
        ?>
            <table>
                <col style="width: 100%">
                <tr>
                    <td>
                        <?php while ($commentaire = $querycommentaires->fetch()){?>         
                        <strong>Commentaire </strong>: <?php echo $commentaire['commentaire_'.$compteur]; ?><br>
                            <?php

                            }?><br>
                    </td>
                </tr>
            </table> 
            <?php
        }
        $querycommentaires->closeCursor(); // Termine le traitement de la requête
        $queryform->closeCursor();
        $queryevaluation->closeCursor();
        $queryclasse->closeCursor();
        $queryprof->closeCursor();
        ?>  
    
</div>