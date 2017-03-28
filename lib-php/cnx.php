<?php
try
{
	$bdd = new PDO('mysql:host=localhost;port=3306;dbname=ouinflib', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>