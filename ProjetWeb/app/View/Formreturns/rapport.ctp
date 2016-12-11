<div class="formreturns index">
        <thead>
	<tr>
			
	</tr>
	</thead>
    <?php
    //    if(isset($_GET) && !empty($_GET['fUF'])){
    //        header('Location: ../pdf/');     
    //    }else{

            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=db_formulaires;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
            $query_uf = $bdd->query("SELECT * FROM `ufs`" );
    ?>
    <tbody>
       <dl>
            
            <fieldset>
                <legend><?= __("Sélectionner l'UF pour le rapport d'évaluation") ?></legend>
                <form method="GET" action ="/projet_web/ProjetWeb/formreturns/pdf">

                        UF Concernée : 

                                <select name="fUF"/>
                                <?php
                                 while ($donnees = $query_uf->fetch()){
                                    echo '<option value="'.$donnees['name'].'">'.$donnees['name'].'</option>' ;
                                 }      
                                ?>
                                </select>

                        </br>
                        </br>
                        <input type="submit" value ="Consulter le rapport" />

                </form>
            </fieldset>
                  
        </dl>
    </tbody>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('Nouveau formulaire de retour'), array('action' => 'add')); ?></li>
		<li><?php //echo $this->Html->link(__('Liste Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
