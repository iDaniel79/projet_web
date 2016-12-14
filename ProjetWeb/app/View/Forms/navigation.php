<?php
    echo $this->Html->link
    (
        'Liste complète',
        array('controller' => 'forms', 'action' => 'index')
    );
    echo ' - ';
    echo $this->Html->link
    (
        'Ajouter',
        array('controller' => 'forms', 'action' => 'add')
    );
    echo ' - ';
    echo $this->Html->link
    (
        'Formulaires à vérifier',
        array('controller' => 'forms', 'action' => 'to_verify_list')
    );
    echo ' - ';
    echo $this->Html->link
    (
        'Formulaires à valider',
        array('controller' => 'forms', 'action' => 'to_valid_list')
    );
    echo ' - ';
    echo $this->Html->link
    (
        'Formulaires à modifier',
        array('controller' => 'forms', 'action' => 'to_modify_list')
    );
    echo ' - ';
    echo $this->Html->link
    (
        'Formulaires à remplir',
        array('controller' => 'forms', 'action' => 'to_fill_list')
    );
?>