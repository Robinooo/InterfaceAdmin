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

	
		
		$req2= $bdd->prepare('select count(NomE) as con from evenement ');

				if ($req2->execute (array($mail))){

			while ($row = $req2->fetch()){
				
				
					
		$nb = $row['con'] ;
				}}

				
				if ($nb == 0) {echo "Vous n'avez pas encore enregistré d'employés !";} 
	else {
	echo  "<div id='global'>
<div id='gauche'>

<table align='center'><tr><td>
<h3> Liste de vos Evénements : </h3>
</td></tr>
<tr><td class='td1'>
<table cellpadding='10' id='tbody50' align='center' class='table1'>
<tr><th id='tableau50' class='th1'>Nom</th>
<th id='tableau50' class='th1'>Date</th>
<th id='tableau50' class='th1'>Lieu</th>
<th id='tableau50' class='th1'>Heure</th>
<th id='tableau50' class='th1'>Description</th></tr>	" ;
} 
	
?>	

<?php

		$req = $bdd->prepare('select NomE, DateE, LieuE, HeureE, Description from evenement order by DateE ASC');
if($req->execute (array($mail))){
				
				while ($row = $req->fetch()){
				
				
				
	    echo '<tr><td class="td1">'.$row['NomE'].'</td>';
		echo '<td class="td1">'.$row['DateE'].'</td>';
		echo '<td class="td1">'.$row['LieuE'].'</td>';
		echo '<td class="td1">'.$row['HeureE'].'</td>';
	    echo '<td class="td1">'.$row['Description'].'</td></tr>';
		
		$NomE = $row['NomE'];
		$DateE = $row['DateE'];
		$LieuE = $row['LieuE'];
		$HeureE = $row['HeureE'];
		$DescriptionE = $row['Description'];

}}
?>	





 



</table> </td></tr></table>
</div>

<div id="droite">
<form name="insertion" action="insertevenement.php" method="POST">
<h4 align="center">Ajouter un événement : <br><br> </h4>
  <table  border="0"  cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>Nom : </td>
      <td><input type="text" name="NomE"></td>
    </tr>
    
    <tr align="center">
      <td>Date: </td>
      <td><input type="date" placeholder="AAAA-MM-JJ" name="DateE"></td>
    </tr>
    <tr align="center">
      <td>Lieu : </td>
      <td><input type="text" name="LieuE"></td>
    </tr>
	<tr align="center">
      <td>Heure : </td>
      <td><input type="text" placeholder="hh-mm" name="HeureE"></td>
    </tr>
	<tr align="center">
      <td>Description : </td>
      <td><input type="text" name="Description"></td>
    </tr>
	
	
 
    <tr align="center">
      <td colspan="2"><input type="submit" value="Ajouter"></td>
    </tr>
  </table>
</form>



<h4 align="center">Supprimer un événement : <br><br> </h4>
<form  action="supevenement.php" method="POST">
  <table  border="0"  cellspacing="2" cellpadding="2">

 <tr align="center">
      <td>Nom : </td>
      <td><input type="text" name="NomE"></td>
    </tr>
    <tr align="center">
      <td>Date: </td>
      <td><input type="date" placeholder="AAAA-MM-JJ" name="DateE"></td>
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