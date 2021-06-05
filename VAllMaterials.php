
<?php 
echo "<H1 align='center'> liste des produits </H1>";

$nb=count($materials);
if($nb==0) echo "<center>Aucun produit</center>";
else
{
echo "<table border=\"1\" align='center'>
	<tr><td colspan=2 align=center><a href='ctrl.php?action=formmat'><img src=images/add.png width=20 height=20></a></td><td>Numéro</td><td>Intitulé</td> <td>Description</td> <td>Type</td> <td>Date de Fabrication</td> <td>Prix</td> <td>Catégorie</td></tr>";	
foreach($materials as $mat)
{
	echo "<tr><td><a href=ctrl.php?num=$mat[0]><img src=images/drop.png width=\"20\" height=\"20\"></a></td>";
	echo "<td><a href=editmateriel.php?num=$mat[0]><img src=images/update.png width=\"20\" height=\"20\"></a></td>";
	echo "<td>$mat[0]</td><td>$mat[1]</td><td>$mat[2]</td>";
	if($mat[3]=='E') echo "<td> Electronique </td>";
	 else  echo "<td> Mecanique </td>";
	echo"<td>$mat[4]</td><td>$mat[5]</td>";
	echo "<td> $mat[6]</td> </tr>";

}
	echo "<tr><th colspan=7>Nombre total</th><th colspan=2>$nb</th></tr>";
}
?>

</table>