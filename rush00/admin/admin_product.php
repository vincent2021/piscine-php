<?PHP session_start();
include('admin_header.php');
?>
<h2>Liste des produits</h2>
<?PHP
$tab = file("../private/product.csv");
unset($tab[0]);
foreach ($tab as $value)
	$boutique[] = explode(",", $value);
$cat = explode(";", file_get_contents("../private/categories"));
echo "<div id='tab_admin'>";
echo "<table>";
echo "<tr>
	<th>Image</th>
	<th>Id</th>
	<th>Téléphone</th>
	<th>Catégorie</th>
	<th>Prix</th>
	<th>Quantité</th>
	<th>Img link</th>
	</tr>";
foreach ($boutique as $elem)
{
	echo '<form method="post" action="admin_mod_product.php"><tr>
		<td><img width="50px" height="50px" src=../'.$elem[5].'></img></td>	
		<td><input type="number" name="id" readonly="readonly" value='.$elem[0].'></td>
		<td><input type="text" name="telephone" value='.$elem[1].'></td>
		<td><input type="text" name="categorie" value="'.$elem[2].'"></td>
		<td><input type="number" name="prix" value="'.$elem[3].'"></td>
		<td><input type="number" name="quantite" value="'.$elem[4].'"></td>
		<td><input type="text" name="image" value="'.$elem[5].'"></td>
		<td><input type="submit" name="modifier" value="Mofifier le produit"></td>
		<td><input type="submit" name="supprimer" value="Supprimer le produit"></td>
		</tr></form>';
		if (isset($_SESSION['modproduct']) && $_SESSION['modproduct'] == "OK")
		{
			echo "<p>Produit correctement modifié.</p>";
			$_SESSION['modproduct'] = "";
		}
}
echo "</table></div>";
?>
<br/>
<h2>Ajouter un produit</h2>
<div id="add-user">
<p> Veuillez indiquer le téléphone à ajouter:</p>
<form method="post" action="admin_add_product.php" enctype="multipart/form-data">
Téléphone : <input type="text" name="telephone"/><br/>
Categorie : <select name = "categorie" size = "1"><?php 
foreach ($cat as $value) {
	if ($value != '')
		echo "<option>".$value;
}?> </select><br/>
Prix  : <input type="text" name="prix"/><br/>
Quantité  : <input type="text" name="quantite"/><br/>
Image     : <input type="file" name="image"/><br/>
<input type="submit" name = "submit" value="OK" />
</form>
</div>
<?php
if (isset($_SESSION['addproduct']) && $_SESSION['addproduct'] == "KO")
{
	echo "<p id='error'>Erreur : vous devez remplir tous les champs\n</p>";
	$_SESSION['addproduct'] = NULL;
}
else if (isset($_SESSION['addproduct']) && $_SESSION['addproduct'] == "OK")
{
	echo "<div id='addproduct'>Produit correctement ajouté !</div>";
	$_SESSION['addproduct'] = NULL;
}
?>
<table class='cat-admin'><tr><td>
<h2>Les catégories</h2>
<?PHP
$tab = explode( ";", file_get_contents('../private/categories'));
echo "<div style='text-align:center;'' id='cat-admin'>";
foreach ($tab as $value)
	echo $value."<br>";
echo "</div>";
?>
</td>
</tr><tr><td>
<h2>Ajouter une catégorie</h2>
<div id="add-user">
<p> Veuillez indiquer la catégorie à ajouter:</p>
<form method="post" action="admin_add_cat.php">
Catégorie: <input type="text" name="categorie"/>
<input type="submit" name = "submit" value="OK" />
</form>
</div>
<?php
if (isset($_SESSION['addcat']) && $_SESSION['addcat'] == "KO")
{
	echo "<p id='error'>Erreur : vous devez remplir tous les champs\n</p>";
	$_SESSION['addcat'] = NULL;
}
else if (isset($_SESSION['addcat']) && $_SESSION['addcat'] == "OK")
{
	echo "<div id='addcat'>Catégorie correctement ajouté !</div>";
	$_SESSION['addcat'] = NULL;
}
?>
</td><td>
<h2>Supprimer une catégorie</h2>
<p>Entrez le nom de la catégorie à supprimer :</p>
<form method="post" action="admin_delete_cat.php">
Categorie: <select name = "cat" size = "1"><?php 
foreach ($cat as $value) {
	if ($value != '')
		echo "<option>".$value;
}?> </select>
<input type="submit" name = "submit" value="OK" />
</form>

<?php
if (isset($_SESSION['delcat']) && $_SESSION['delcat'] == "OK")
{
	echo "<p id='inscription-ok'>Catégorie correctement supprimée.</p>";
	$_SESSION['delcat'] = "";
}
else if (isset($_SESSION['delcat']) && $_SESSION['delcat'] == "KO")
{
	echo "<p id='error'>Catégorie incorect</p>";
	$_SESSION['delcat'] = "";
}
?>
</td></tr>
</table>
<?php include('admin_footer.php'); ?>