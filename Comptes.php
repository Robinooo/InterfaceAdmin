<?php
include ("onglet.php");
?>
	
<?php
include ("coBDD.php");
?>
<?php
    session_start(); 
	$mail='';
    if (isset($_SESSION['Mail'])) 
	{
	$mail = $_SESSION['Mail'];
 
    } 
?> 