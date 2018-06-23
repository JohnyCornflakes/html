
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

// requete a variable 1 -- GET

$nomJV_ownerVar = $bdd->prepare('SELECT nom, possesseur, prix FROM jeux_video WHERE possesseur = ? AND prix <= ? ORDER BY prix DESC');
$nomJV_ownerVar->execute(array($_GET['possesseur'], $_GET['prix_max']));

While ($jeu = $nomJV_ownerVar->fetch()) {
	echo "le jeu " . $jeu['nom'] . " possédé par " . $jeu['possesseur'] . " vaut " . $jeu['prix'] . " euros<br/>";
}

?>

