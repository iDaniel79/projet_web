<p>
	<strong>Bonjours <?php echo $email; ?></strong>
</p>

<p>
	Vous avez demandé à changer le mot de passe : 
</p>

<p>
		
	<?php echo $this->Html->link('Me rappeller mon mdp',$this->Html->url($link,true)); ?>	
		
</p>