<!DOCTYPE html>
<html>
    <head>
        <title>Notre première instruction : echo</title>
        <meta charset="utf-8" />
    </head>
    <body>
	
	<?php
	if (isset($_GET['prenom']) AND isset($_GET['nom']) AND isset($_GET['repeter']))
	{
		// 1 : On force la conversion en nombre entier
		$_GET['repeter'] = (int) $_GET['repeter'];

		// 2 : Le nombre doit être compris entre 1 et 10
		if ($_GET['repeter'] >= 1 AND $_GET['repeter'] <= 10) 
		{	
			for ($i = 0 ; $i < $_GET['repeter'] ; $i++)
			{
				echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . ' !<br />';
			}
		}
	}
	else
	{	
   echo 'Bonjour';
	}
	?>
	
        <h2>Affichage de texte avec PHP</h2>
        
        <p>
            Cette ligne a été écrite entièrement en HTML.<br />
            <?php echo "Celle-ci a été écrite entièrement en PHP."; ?>
        </p>
		
		<h2>Affichage de date avec PHP</h2>
        
        <p>
            Nous sommes le <?php echo date('d/m/y h:i:s'); ?>
        </p>
		
		
		
		
		
    </body>
</html>
