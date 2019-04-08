<?php
include('header.php');
echo "<div class='admin'>Bonjour ".$_SESSION['mail']." vous souhaitez acheter les produits suivants:";
include('getcsv.php');
$boutique = ft_getcsv();
if ($_SESSION['nb_of_items'] != 0)
{
	foreach ($_SESSION['basket'] as $value1)
	{
		$value = $value1 - 1;
		echo "</br><strong>".$boutique[$value][1]."</strong></br>";
	}
}
echo "<br>Pour vous livrer nous avons besoin des informations suivantes:"
?>
<form action="addorder.php" method="post">
		Nom: <input type="text" name="nom" value="" /> 
        Prénom: <input type="text" name="prenom" value="" /> <br>
        Adresse: <input type="text" size="80" name="adresse" value="" />
		<br />
        Code postal: <input type="text" name="cp" value="" />
        Ville: <input type="text" name="ville" value="" />
		<br />
		Numéro de téléphone:  <input type="text" name="tel" value="" />
		<br />
		<input type="submit" name="submit" value="OK" />
</form></div>

<?php
include('footer.php');
?>