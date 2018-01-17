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

if (!empty($_POST['NomE']) AND !empty($_POST['DateE']))		{


 $sql = "DELETE FROM evenement WHERE NomE =  :NomE and DateE = :DateE";
$stmt = $bdd->prepare($sql);
$stmt->bindParam(':NomE', $_POST['NomE'], PDO::PARAM_INT);   
$stmt->bindParam(':DateE', $_POST['DateE'], PDO::PARAM_INT);   

$stmt->execute();
header ('location:Evenements.php');

  }
else {
?>	
<table align="center"> <tr><td> Tous les champs ne sont pas complétés  </td></tr></table>
<?php	}

?>
