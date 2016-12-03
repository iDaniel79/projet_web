<div class="formreturns rapport">
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
</div>
        <?php //} ?>
