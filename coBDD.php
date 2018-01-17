<?php
try
{
$bdd = new PDO ('mysql:host=localhost;dbname=teeesr;charset=utf8',             
				'root',
				'');   				// login : root , rien pour le mdp
		}
		catch(Exception $e)
		{
		die('Erreur : '.$e->getMessage());
		}
?>