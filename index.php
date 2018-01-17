
 <?php
//connexion
$bdd = new PDO ('mysql:host=localhost;dbname=teeesr;charset=utf8',             
				'root',
				'');   				// login : root , rien pour le mdp
		
?>	


<div id="droite">


<br>
<form name="insertpromo" action="insertpromo.php" method="POST">
<h4 align="center">Insérer une promo:</h4>
  <table  border="0"  cellspacing="2" cellpadding="2">
  <tr align="right">
  <td>
  <label for="DescriptionPromo">Description  :</label>
  </td>
  <td>
  <input type="text" name="DescriptionPromo">
  </td>
  </tr>
	<tr align="center">
      <td colspan="2"><input type="submit" value="Insérer"></td>
    </tr>
</table>

<br>


</form>

</div>
</div>
