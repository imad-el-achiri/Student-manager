<table border="1" align="center">
 <form action="ctrl.php?action=add" method="post">
 <tr><th colspan="2">Nouveau Materiel</th></tr>
<tr><td>Intitulé: </td><td><input type="text" name="intitule"></td></tr>
<tr><td>Description :</td><td> <textarea name="description" ></textarea></td></tr>
<tr><td>Type: </td><td>Electronique<input type="radio" name="type" value="E" checked="yes">
 Mécanique<input type="radio" name="type" value="M"></td></td>
<tr><td>Date de fabrication:</td><td> <input type="date" name="datedefabrication"> </p>
<tr><td>Prix: </td><td><input type="number" name="prix"></td></tr>
<tr><td>Categorie:</td><td> <select name="categorie"> 
 	<option value="0"> Choisir ICI </option>
 	<?php
 	foreach($cats as $cat)
 	{ ?>
 	<option value="<?php echo $cat[0];?>"> <?php echo $cat[1];?> </option>
 	<?php } ?>
 </select></td></tr>
<tr align="center"><td><input type="submit" value="Valider"> </td><td><input type="reset" value="Reset"></td></tr>
</form>
</table>
