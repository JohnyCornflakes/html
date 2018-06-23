
<a href="requete_prepare.php?possesseur=michel&amp;prix_max=25">Tri par prix et possesseur</a> <br/>


<?php

// Connexion à la base 
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'sqlKEY');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Les jeux videos</title>
        <meta charset="utf-8" />
    </head>
	
<?php

// requete noms

$nom_jv=$bdd->query('SELECT nom FROM jeux_video');

While ($jeu = $nom_jv->fetch())
{
		echo $jeu['nom'] . "<br/>";
}
$nom_jv->closeCursor();


 // requete totale 

$table_jv=$bdd->query('SELECT * FROM jeux_video');

While ($entree = $table_jv->fetch())
{
?>
    <p>
    <strong>Jeu</strong> : <?php echo $entree['nom']; ?><br />
    Le possesseur de ce jeu est : <?php echo $entree['possesseur']; ?>, et il le vend à <?php echo $entree['prix']; ?> euros !<br />
    Ce jeu fonctionne sur <?php echo $entree['console']; ?> et on peut y jouer à <?php echo $entree['nbre_joueurs_max']; ?> au maximum<br />
    <?php echo $entree['possesseur']; ?> a laissé ces commentaires sur <?php echo $entree['nom']; ?> : <em><?php echo $entree['commentaires']; ?></em>
   </p>
<?php
}

$table_jv->closeCursor(); 

// SELECT nom, possesseur, console, prix FROM jeux_video WHERE console='Xbox' OR console='PS2' ORDER BY prix DESC LIMIT 0,10

?>

