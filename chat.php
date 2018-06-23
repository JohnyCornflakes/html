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
		<input type="text" name="nom"" /> <br/>
		<br/><input type="text" name="message" /><br/>
		<br/><input type="submit" value="Valider" /><br/>
	</p>
 
</form>	
	
	</body>
	
<?php

$basemessages = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY id DESC');
	
	While ($message = $basemessages->fetch()) 
	{
		echo $message['pseudo'] . " : " . $message['message'] . "<br/>";
	}
	
	$basemessages->closeCursor();

?>