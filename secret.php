<!DOCTYPE html>
<html>
    <head>
        <title>Notre première instruction : echo</title>
        <meta charset="utf-8" />
    </head>
    <body>
	
	<!-- page secrete-->
	
	<?php
	
	$bon_code = "kangourou";
	
	if (isset($_POST['code']) AND $_POST['code'] == $bon_code )
	{	
		echo 'page secrete de ouf';
	}
	else
	{
		echo 'naze';
	}
	?>