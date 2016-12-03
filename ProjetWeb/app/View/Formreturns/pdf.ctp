<div class="formreturns pdf">
    
 <h1>Liste des évaluations pour l'uf : <?php echo $_GET['fUF']?></h1>
<?php					//On récupère les données de la DB
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=db_formulaires;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        //Ecriture de la requete
        $queryreturn = $bdd->query("SELECT * FROM `formreturns` inner join `ufs` on `formreturns`.ufs_id=`ufs`.id WHERE ufs.name = '".$_GET['fUF']."'" );
        $queryform = $bdd->query("SELECT * FROM `formulaires` WHERE 1");
        $titre = $queryform->fetch();
        $i = 1;
        
            while ($donnees = $queryreturn->fetch())
            {
                for ($compteur=1;$compteur<=6;$compteur++){

            ?>

                <p>
                <?php echo $i;?><br />
                <?php echo $titre['titre_'.$compteur];?><br />

                <strong>Evaluation </strong>: <?php echo $donnees['evaluation_'.$compteur]; ?><br />

                <strong>Commentaire </strong>: <?php echo $donnees['commentaire_'.$compteur]; ?> <br /> <br />

               </p>

            <?php

            }
            $i++;
        }
        $queryreturn->closeCursor(); // Termine le traitement de la requête
        $queryform->closeCursor();
        ?>   
    
</div>