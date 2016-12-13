<?php

$cakeDescription = __d('cake_dev', 'IEPS ARLON');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('cake.generic','iepsa', 'form-builder', 'form-render', 'custom'));
                echo $this->Html->script(array('jquery', 'jquery-ui', 'form-builder', 'form-render' ));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head> 
<body>
	<div id="container">

		<div id="banniere">			
            <?php echo $this->Html->image('bandeau-iepsa-2.png', array('alt' => 'IEPS ARLON', 'border' => '0', 'data-src' => 'holder.js/100%x100', 'align' => 'left')); ?>
            <?php echo $this->Html->image('logo-enseignement-wb-5.png', array('alt' => 'ENSEIGNEMENT WALLONIE-BRUXELLES', 'border' => '0', 'data-src' => 'holder.js/100%x100', 'align' => 'right')); ?>
        </div>
		<div id="header">
                    <table>
                        <tr>
                            <td style="width: 88%">
                            <?php if(AuthComponent::user('id')){ ?>
                                <h1><?php echo 'Connecté en tant que : '.$_SESSION['role'];?></h1>
                            </td>
                            <td style="width: 12%">                            		
                                    <h1><?php echo $this->Html->link( "Se déconnecter",array('action'=> "logout", 'controller'=>'users')); ?></h1>

                            <?php }else{ ?>
                                    <h1><?php echo $this->Html->link( "Se connecter",array('action'=> "login", 'controller'=>'users')); ?></h1>				
                            <?php } ?> 
                            </td>
                        </tr>
                    </table>
		</div>
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>

		 <div id="pieddepage">
                <span class='gauche'>© I.E.P.S.C.F. A.M.A.V. | Mentions légales </span>
                <span class='droite'><?php echo ('Retrouvez-nous sur ').$this->Html->image('facebook-02.png', array('alt' => 'IEPS ARLON', 'url' => 'https://www.facebook.com/promsocarlon', 'border' => '0', 'data-src' => 'holder.js/100%x100')); ?></span>
                
            </div>


	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
