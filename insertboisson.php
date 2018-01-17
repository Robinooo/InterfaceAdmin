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
 
 

	if (!empty($_POST['NomP']) AND !empty($_POST['PaysP']) AND !empty($_POST['DegreP']) 
	AND !empty($_POST['DescriptionP']) AND !empty($_POST['PhotoP']) 
	AND !empty($_POST['TypeP']) AND !empty($_POST['CategorieP']))		
	{			
				
				
$sql = "INSERT  INTO produit ( NomP, PaysP, DegreP, DescriptionP, PhotoP, TypeP, CategorieP )
            VALUES ( :NomP, :PaysP, :DegreP, :DescriptionP, :PhotoP, :TypeP, :CategorieP) ";
			
			
                                          
$stmt = $bdd->prepare($sql);
                                              
$stmt->bindParam(':NomP', $_POST['NomP'], PDO::PARAM_STR);       
$stmt->bindParam(':PaysP', $_POST['PaysP'], PDO::PARAM_STR);
// use PARAM_STR although a number  
$stmt->bindParam(':DegreP', $_POST['DegreP'], PDO::PARAM_STR); 
$stmt->bindParam(':DescriptionP', $_POST['DescriptionP'], PDO::PARAM_STR);   
$stmt->bindParam(':PhotoP', $_POST['PhotoP'], PDO::PARAM_STR);
$stmt->bindParam(':TypeP', $_POST['TypeP'], PDO::PARAM_STR);
$stmt->bindParam(':CategorieP', $_POST['CategorieP'], PDO::PARAM_STR);



  
$stmt->execute(); 
header ('location:Boissons.php');
		
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