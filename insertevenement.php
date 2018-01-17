<?php
include ("onglet.php");
?>

<?php
    session_start(); 
    if (isset($_SESSION['Mail'])) 
	{
   	$mail = $_SESSION['Mail'];
    } 
    ?>

<?php
include ("coBDD.php");
?>
	
	
	
<?php
 
 

	if (!empty($_POST['NomE']) AND !empty($_POST['DateE']) 
	AND !empty($_POST['LieuE']) AND !empty($_POST['HeureE']) AND !empty($_POST['Description']))		
	{			
				
				
$sql = "INSERT  INTO evenement ( NomE, DateE, LieuE, HeureE, Description )
            VALUES (  :NomE, :DateE, :LieuE, :HeureE, :Description) ";
			
			
                                          
$stmt = $bdd->prepare($sql);
                                              
$stmt->bindParam(':NomE', $_POST['NomE'], PDO::PARAM_STR);       
$stmt->bindParam(':DateE', $_POST['DateE'], PDO::PARAM_STR);
// use PARAM_STR although a number  
$stmt->bindParam(':LieuE', $_POST['LieuE'], PDO::PARAM_STR); 
$stmt->bindParam(':HeureE', $_POST['HeureE'], PDO::PARAM_STR);   
$stmt->bindParam(':Description', $_POST['Description'], PDO::PARAM_STR);


  
$stmt->execute(); 
header ('location:Evenements.php');
		
			}

else
			{
	
?>	
<table align="center"> <tr><td> Tous les champs ne sont pas complétés  </td></tr></table>
<?php			
			}

?>

</body>
</html>