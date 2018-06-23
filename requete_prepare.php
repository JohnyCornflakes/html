
<?php

// Connexion à la base 
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'sqlKEY', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// requete a variable 1 -- GET
if (isset($_GET['possesseur']) AND isset($_GET['prix_max']) AND $_GET['prix_max'] > 0 AND $_GET['possesseur'] != NULL )
{
	$nomJV_ownerVar = $bdd->prepare('SELECT nom, possesseur, prix FROM jeux_video WHERE possesseur = ? AND prix <= ? ORDER BY prix DESC');
	$nomJV_ownerVar->execute(array($_GET['possesseur'], $_GET['prix_max']));

	While ($jeu = $nomJV_ownerVar->fetch()) 
	{
		echo "le jeu " . $jeu['nom'] . " possédé par " . $jeu['possesseur'] . " vaut " . $jeu['prix'] . " euros<br/>";
	}
	$nomJV_ownerVar->closeCursor(); 
}
else
{
	$nomJV = $bdd->query('SELECT nom, possesseur, prix FROM jeux_video ORDER BY prix DESC');
	
	While ($jeu = $nomJV->fetch()) 
	{
		echo "le jeu " . $jeu['nom'] . " possédé par " . $jeu['possesseur'] . " vaut " . $jeu['prix'] . " euros<br/>";
	}
	
	$nomJV->closeCursor();
}
/*  Requete avec marqueur au lieu des "?" --> plus clair
<?php
$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prixmax');
$req->execute(array('possesseur' => $_GET['possesseur'], 'prixmax' => $_GET['prix_max']));
?>
*/

?>

