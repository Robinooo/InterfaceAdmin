
<!DOCTYPE html>
<html>
<head>
<title>UP START</title>
<!-- <link rel="Stylesheet" href="FichierCinéma2.css"> 
<script src="jquery-2.2.0.min.js"></script>
<script src="Projet.js"></script> -->



<link rel="Stylesheet" href="fichierstart.css"> 
</head>

<body>

<div id=entete>
<FORM ACTION="membre.php" method="POST"> 
<input type="image" name="validation" value="Voir les avis" src="logo.jpg" style="width:160px;height:160px;">


<div id=entete2>
</form>
<p> <br> <h1> UP START ! Le site de gestion de votre entreprise 
</h1> </p>
<div id=entete3>
<FORM ACTION="deconnexion.php" method="POST"> 
<input type="image" name="validation" value="Voir les avis" src="deco.jpg" style="width:160px;height:40px;">
</form>
</div>
</div>
</div>

	
<div id=menu2>
<ul id="menu">
<table>
<tr><td><li><a href="Projets.php"> Projets </a></li></td>
<td><li><a href="Employes.php"> Employés </a></li></td>
<td><li><a href="Finances.php"> Finances </a></li></td>
<td><li><a href="Rdv.php"> Rendez-vous/Réunions </a></li></td>
<td><li><div id="searchbar">
<td><li>
 <form action ="recherche.php" method="post" class="formulaire">
	<input type="text" id="recherche" name="recherche" placeholder="Rechercher un employé..." class="champ"/>
	




  </li></td>


<td> <li>
 

 <div id=loupe>
 <input type="image" name="validation" value=""alt="loupe" style="width:20px;height:20px;" src="loupe.png"  >

</form>

 </div> </a></li> 
</td>
</tr>
</table>
</ul>
</div>
<br>

</body>


<?php
    session_start(); 
	$mail='';
    if (isset($_SESSION['Mail'])) 
	{
	$mail = $_SESSION['Mail'];
 
    } 
    ?> 
	
<?php
try
{
$bdd = new PDO ('mysql:host=localhost;dbname=upstart;charset=utf8',             
				'root',
				'');   				// login : root , rien pour le mdp
		}
		catch(Exception $e)
		{
		die('Erreur : '.$e->getMessage());
		}
		
		
		
		$req2= $bdd->prepare('select count(NomEmp) as con from employe where Mail = ? ');
				if ($req2->execute (array($mail))){

			while ($row = $req2->fetch()){
				
				
					
		$nb = $row['con'] ;
				}}

				
				if ($nb == 0) {echo "Vous n'avez pas encore enregistré d'employés !";} 
	else {
	echo  "<div id='global'>
<div id='gauche'>

<table align='center'><tr><td>
<h3> Liste de vos Employés : </h3>
</td></tr>
<tr><td class='td1'>
<table cellpadding='10' id='tbody50' align='center' class='table1'>
<tr><th id='tableau50' class='th1'>Nom</th>
<th id='tableau50' class='th1'>Prénom</th>
<th id='tableau50' class='th1'>Date de naissance</th>
<th id='tableau50' class='th1'>Profession</th>
<th id='tableau50' class='th1'>Type de contrat</th>
<th id='tableau50' class='th1'>Date d'embauche</th>
<th id='tableau50' class='th1'>Adresse Mail</th></tr>	" ;
} 
	
?>
		
<?php
//connexion
try
{
$bdd = new PDO ('mysql:host=localhost;dbname=upstart;charset=utf8',             
				'root',
				'');   				// login : root , rien pour le mdp
		}
		catch(Exception $e)
		{
		die('Erreur : '.$e->getMessage());
		}
		$req = $bdd->prepare('select NomEmp, PrenomEmp,DatedenaissEmp, ProfessionEmp, ContratEmp, Date_embauche, MailEmp from employe where Mail = ? order by NomEmp ASC');
		if ($req->execute (array($mail))){
				while ($row = $req->fetch()){
				
				
				
	    echo '<tr><td class="td1">'.$row['NomEmp'].'</td>';
		echo '<td class="td1">'.$row['PrenomEmp'].'</td>';
		echo '<td class="td1">'.$row['DatedenaissEmp'].'</td>';
		echo '<td class="td1">'.$row['ProfessionEmp'].'</td>';
		echo '<td class="td1">'.$row['ContratEmp'].'</td>';
		echo '<td class="td1">'.$row['Date_embauche'].'</td>';
	    echo '<td class="td1">'.$row['MailEmp'].'</td></tr>';
				}}
?>	



     <?php


//foreach($bdd->query("select NomEmp, PrenomEmp,DatedenaissEmp, ProfessionEmp, ContratEmp, MailEmp from employe ") as $row) {    
	//	echo '<tr><td>'.$row['NomEmp'].'</td>';
		//echo '<td>'.$row['PrenomEmp'].'</td>';
		//echo '<td>'.$row['DatedenaissEmp'].'</td>';
		//echo '<td>'.$row['ProfessionEmp'].'</td>';
		//echo '<td>'.$row['ContratEmp'].'</td>';
		//echo '<td>'.$row['MailEmp'].'</td></tr>';
		
?>



 



</table> </td></tr></table>
</div>

<div id="droite">
<form name="insertion" action="insertemploye.php" method="POST">
<h4 align="center">Ajouter un employé : <br><br> </h4>
  <table  border="0"  cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>Nom : </td>
      <td><input type="text" name="NomEmp"></td>
    </tr>
    <tr align="center">
      <td>Prénom : </td>
      <td><input type="text" name="PrenomEmp"></td>
    </tr>
    <tr align="center">
      <td>Date de naissance : </td>
      <td><input type="date" placeholder="AAAA-MM-JJ" name="DatedenaissEmp"></td>
    </tr>
    <tr align="center">
      <td>Profession : </td>
      <td><input type="text" name="ProfessionEmp"></td>
    </tr>
	<tr align="center">
      <td>Type de contrat : </td>
      <td><input type="text" name="ContratEmp"></td>
    </tr>
	<tr align="center">
      <td>Date d'embauche : </td>
      <td><input type="date" placeholder="AAAA-MM-JJ" name="Date_embauche"></td>
    </tr>
	<tr align="center">
      <td>Adresse Mail : </td>
      <td><input type="email" name="MailEmp"></td>
    </tr>
	
 
    <tr align="center">
      <td colspan="2"><input type="submit" value="Ajouter"></td>
    </tr>
  </table>
</form>


<H4 align="center"> Modification d'un employé :<BR> </h4>
<h5 align="center">Vous pouvez modifier le contrat et la profession
de l'employé en indiquant son nom et son prénom : </h5>

<form  action="modifemploye.php" method="POST"> 
  <table  border="0"  cellspacing="2" cellpadding="2">

 <tr align="center">
      <td>  Nom : </td>
      <td><input type="text" name="NomEmp"></td>
    </tr>
    <tr align="center">
      <td>Prénom : </td>
      <td><input type="text" name="PrenomEmp"></td>
    </tr>
    <tr align="center">
      <td>Profession : </td>
      <td><input type="text" name="ProfessionEmp"></td>
    </tr>
	<tr align="center">
      <td>Contrat (CDI,...) : </td>
      <td><input type="text" name="ContratEmp"></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="Modifier"></td>
    </tr>
  </table>
</form>

<h4 align="center">Supprimer un employé : <br><br> </h4>
<form  action="supemploye.php" method="POST">
  <table  border="0"  cellspacing="2" cellpadding="2">

 <tr align="center">
      <td>Nom : </td>
      <td><input type="text" name="NomEmp"></td>
    </tr>
    <tr align="center">
      <td>Prénom : </td>
      <td><input type="text" name="PrenomEmp"></td>
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