



<?php


				
				

                                          



  $bdd = new PDO ('mysql:host=localhost;dbname=teeesr;charset=utf8',             
				'root',
				'');  
				
		
					
			
$sql = "INSERT  INTO promotion ( DescriptionPromo)
            VALUES (  :DescriptionPromo) ";

						  
$stmt = $bdd->prepare($sql);
                                              
$stmt->bindParam(':DescriptionPromo', $_POST['DescriptionPromo'], PDO::PARAM_STR);       

$stmt->execute(); 


$req_emp = $bdd->prepare('select DescriptionPromo from promotion');
if($req_emp->execute (array($_POST['DescriptionPromo']))){
	while ($row = $req_emp->fetch()){
				echo '<h4>'.$row['DescriptionPromo'].'</h4>';
				$DescriptionPromo = $row['DescriptionPromo'];
	}
}
                                          
?>	

</body>
</html>

