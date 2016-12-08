<?php
try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=db_formulaires;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        //Ecriture de la requete
        $queryreturn = $bdd->query("select * FROM `roles` LEFT JOIN `roles_zones` ON `roles_zones`.`role_id` = `roles`.`id` LEFT JOIN `zones` ON `roles_zones`.`zone_id` = `zones`.`id` where role = '".$_SESSION['role']."'");
        
        while ($roles = $queryreturn->fetch())
        {       
             ?>	
		<li><?php echo $this->Html->link(__($roles['name']), ($roles['path'])); ?> </li>
                
	<?php
        }
        $queryreturn->closeCursor(); // Termine le traitement de la requête
        ?>
