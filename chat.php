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
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Chat</title>
        <meta charset="utf-8" />
    </head>
	
	<body>
	<form method="post" action="chat_post.php">
 
	<p>
		Ton nom : <input type="text" name="nom"" /> <br/>
		<br/> Ton message : <input type="text" name="message" /><br/>
		<br/><input type="submit" value="Valider" /><br/>
	</p>
 
</form>	
	
	</body>
	
<?php

$basemessages = $bdd->query('SELECT pseudo, message, DAY(date_message) AS jour, MONTH(date_message) AS mois, HOUR(date_message) AS heure, MINUTE(date_message) AS minute FROM minichat ORDER BY id DESC');
	
	While ($message = $basemessages->fetch()) 
	{
		if ($message['pseudo'] != NULL OR $message['message'] != NULL)
		{
			echo $message['pseudo'] . " a écrit : " . $message['message'] . " le " . $message['jour'] . " / " . $message['mois'] . " a " . $message['heure'] . " : " . $message['minute'] . "<br/>";
		}
	}
	
	$basemessages->closeCursor();

?>