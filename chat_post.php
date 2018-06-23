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
if (isset ($_POST['nom']) AND $_POST['nom'] != NULL AND isset ($_POST['message']) AND $_POST['message'] != NULL)
{
	echo "boucle";
	
	$insert = $bdd->prepare('INSERT INTO minichat(pseudo, message, date_message) VALUES (?, ?, ?)');  
	$insert->execute(array($_POST['nom'], $_POST['message'], date('y/m/d h:i:s')));
	
}

// redirection ver chat.php
header('Location: chat.php');
?>