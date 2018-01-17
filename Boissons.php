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

<?php

	
		
		$req2= $bdd->prepare('select count(NomP) as con from produit where categorieP = "Biere" ');

				if ($req2->execute (array($mail))){

			while ($row = $req2->fetch()){
				
				
					
		$nb = $row['con'] ;
				}}

				
				if ($nb == 0) {echo "Vous n'avez pas encore enregistré de boissons !";} 
	else {
	echo  "<div id='global'>
<div id='gauche'>

<table align='center'><tr><td>
<h3> Liste de vos Boissons : </h3>
</td></tr>
<tr><td class='td1'>
<table cellpadding='10' id='tbody50' align='center' class='table1'>
<tr><th id='tableau50' class='th1'>Nom</th>
<th id='tableau50' class='th1'>Pays</th>
<th id='tableau50' class='th1'>Degrès</th>
<th id='tableau50' class='th1'>Description</th>
<th id='tableau50' class='th1'>Type</th>
<th id='tableau50' class='th1'>Catégorie</th></tr>	" ;
} 
	
?>	

<?php

		$req = $bdd->prepare('select NomP, PaysP, DegreP, DescriptionP, TypeP, CategorieP from produit order by NomP ASC');
if($req->execute (array($mail))){
				
				while ($row = $req->fetch()){
				
				
				
	    echo '<tr><td class="td1">'.$row['NomP'].'</td>';
		echo '<td class="td1">'.$row['PaysP'].'</td>';
		echo '<td class="td1">'.$row['DegreP'].'</td>';
		echo '<td class="td1">'.$row['DescriptionP'].'</td>';
		echo '<td class="td1">'.$row['TypeP'].'</td>';
	    echo '<td class="td1">'.$row['CategorieP'].'</td></tr>';
	
		$NomP = $row['NomP'];
		$PaysP = $row['PaysP'];
		$DegresP = $row['DegreP'];
		$DescriptionP = $row['DescriptionP'];
		$TypeP = $row['TypeP'];
		$CategorieP = $row['CategorieP'];

}}
?>	





 



</table> </td></tr></table>
</div>

<div id="droite">
<form name="insertion" action="insertboisson.php" method="POST">
<h4 align="center">Ajouter une boisson : <br><br> </h4>
  <table  border="0"  cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>Nom : </td>
      <td><input type="text" name="NomP"></td>
    </tr>
    <tr align="center">
      <td>Pays: </td>
      <td><input type="text" name="PaysP"></td>
    </tr>
    <tr align="center">
      <td>Degrès: </td>
      <td><input type="text" name="DegreP"></td>
    </tr>
    <tr align="center">
      <td>Description : </td>
      <td><input type="text" name="DescriptionP"></td>
    </tr>
	<tr align="center">
      <td>Photo : </td>
      <td><input type="text" name="PhotoP"></td>
    </tr>
	<tr align="center">
      <td>Type : </td>
      <td><input type="text" name="TypeP"></td>
    </tr>
	<tr align="center">
      <td>Catégorie </td>
      <td><input type="text" name="CategorieP"></td>
    </tr>
	
 
    <tr align="center">
      <td colspan="2"><input type="submit" value="Ajouter"></td>
    </tr>
  </table>
</form>


<H4 align="center"> Modification d'une boisson :<BR> </h4>
<h5 align="center">Vous pouvez modifier le pays d'origine, le degrès, 
la description,le type ou encore la catégorie de la boisson
en indiquant son nom : </h5>

<form  action="modifboisson.php" method="POST"> 
  <table  border="0"  cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>Nom : </td>
      <td><input type="text" name="NomP"></td>
    </tr>
    <tr align="center">
      <td>Pays: </td>
      <td><input type="text" name="PaysP"></td>
    </tr>
    <tr align="center">
      <td>Degrès: </td>
      <td><input type="text" name="DegreP"></td>
    </tr>
    <tr align="center">
      <td>Description : </td>
      <td><input type="text" name="DescriptionP"></td>
    </tr>
	<tr align="center">
      <td>Photo : </td>
      <td><input type="text" name="PhotoP"></td>
    </tr>
	<tr align="center">
      <td>Type : </td>
      <td><input type="text" name="TypeP"></td>
    </tr>
	<tr align="center">
      <td>Catégorie </td>
      <td><input type="text" name="CategorieP"></td>
    </tr>
	
	
	<tr align="center">
      <td colspan="2"><input type="submit" value="Modifier"></td>
    </tr>
  </table>
</form>

<h4 align="center">Supprimer une boisson : <br><br> </h4>
<form  action="supboisson.php" method="POST">
  <table  border="0"  cellspacing="2" cellpadding="2">

 <tr align="center">
      <td>Nom : </td>
      <td><input type="text" name="NomP"></td>
    </tr>
  <tr align="center">
      <td colspan="2"><input type="submit" value="Supprimer"></td>
    </tr>
  </table>
</form>

</div>
</div>


<br>
<br>