<p><?php  
    include_once '/navigation.php';
?></p>

    <!--// AFFICHAGE DES FROMULAIRES PAS ENCORE VERIFIES-->


<h1>Liste structure formulaires</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Version</th>
        <th>Questions</th>
        <th>Créé le</th>
        <th>Modifié le</th>
        <th>Vérifié</th>
        <th>Validé</th>
    </tr>
    <!-- Here is where we loop through our $posts array, printing out post info -->
    <?php
        foreach ($forms as $form): // boucle sur tous les formulaires trouvés
    ?>
            <tr>
                <td> <?php echo $form['Form']['id']; ?> </td> <!-- affiche l'élément id -->
                <td> 
                    <?php echo $this->Html->link($form['Form']['titre'], // affiche le titre du formulaire et créé un lien en GET avec l'id du formulaire
                        array ('controller' => 'forms', 'action' => 'modify', $form['Form']['id']));
                    ?>
                </td>
                <td> <?php echo 'V.' . $form['Form']['version']; ?> </td>
                <td> <?php echo $form['Form']['nb_question']; ?> </td>
                <td> <?php echo $form['Form']['created']; ?> </td> <!-- affiche la date de création du formulaire -->
                <td> <?php echo $form['Form']['modified']; ?> </td>
                <td> <?php echo ouiNon(($form['Form']['statut_verifie'])); ?> </td>
                <td> <?php echo ouiNon(($form['Form']['statut_valide'])); ?> </td>
            </tr>
    <?php
        endforeach;
    ?>
    <?php unset($form); ?> <!-- détruit la variable -->
</table>

<?php 

function ouiNon($statut)
{
    if($statut == 1)
    {
        return 'oui';
    }
    else
    {
        return 'non';
    }
    return 'erreur';
}

?>

