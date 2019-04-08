<?php
include('header.php');
include('getcsv.php');
$boutique = ft_getcsv();
if ($_SESSION['nb_of_items'] != 0)
{
	$total = 0;
	echo "<div class='panier'><table class='tab'>";
	echo "<tr><th>Article</th><th>Quantité</th><th>Prix</th><tr/>";	
	foreach ($_SESSION['basket'] as $value)
	{
		foreach ($boutique as $key => $data) {
			if ($data[0] == $value) {
				echo "<tr><td>".$boutique[$key][1]."</td><td>1</td><td>".$boutique[$key][3]."</td><td><form action='delbasket.php?tel=".$value."' method='post'><input type='submit' name='delbasket' value='Supprimer du panier'></form></td></tr>";
				$total += $boutique[$key][3];
			}
		}
	}
	echo "<tr><td></td><td>Total</td><td>".$total."</td><tr/><tr><td>";

	if ($_SESSION['loggued_on_user'] != "")
	{
		echo "<form action='delivery.php' method='post'>";
		echo "<input type='submit' name='compte' value='Acheter' />";
		echo "</form></div>";
	}
	else if ($_SESSION['logged_on_user'] == "")
	{
		echo "<form action='create.php' method='post'>";
		echo "<input type='submit' name='noaccount' value='Vous devez créer un compte.' />";
		echo "</form></div>";
	}
	echo "</td></tr></table>";
}
else
{
	echo "<div class='panier'><p>Votre panier est vide</p></div>";
}
include('footer.php');
?>
