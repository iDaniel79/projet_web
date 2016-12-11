<p>
	<strong>Bonjours <?php echo $email; ?></strong>
</p>

<p>
	Vous avez demandé à changer le mot de passe, veuillez suivre ce lien: 
</p>

<p>
		
	<?php echo $this->Html->link('Demande de nouveau mot de passe',$this->Html->url($link,true)); ?>	
		
</p>