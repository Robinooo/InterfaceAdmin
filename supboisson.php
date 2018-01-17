<?php
include ("onglet.php");
?>

<?php
    session_start(); 
    if (isset($_SESSION['Mail'])) {
       	$mail = $_SESSION['Mail'];
 
    } 
    ?>
	
	
<?php
include ("coBDD.php");
?>	
	
<?php

if (!empty($_POST['NomP']))		{


 $sql = "DELETE FROM produit WHERE NomP =  :NomP";
$stmt = $bdd->prepare($sql);
$stmt->bindParam(':NomP', $_POST['NomP'], PDO::PARAM_INT);   

$stmt->execute();
header ('location:Boissons.php');

  }
else {
?>	
<table align="center"> <tr><td> Tous les champs ne sont pas complétés  </td></tr></table>
<?php	}

?>
