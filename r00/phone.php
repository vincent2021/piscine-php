<?php
include('header.php');
include('getcsv.php');
foreach($_GET as $value) {
	$value = htmlspecialchars($value);
}
isset($_GET['cat']) ? $display_cat = $_GET['cat'] : $display_cat = 'Promotion';
$boutique = ft_getcsv();
echo "<table id='boutique'>";
foreach ($boutique as $value) {
	$cat = explode(';', $value[2]);
	foreach ($cat as $cat_val) {
		if ($cat_val == $display_cat) {
			echo "<tr><td><img class='img_prod' src='" . $value[5] . "'/></td>";
			echo "<td class='phone-name'>" . $value[1];
			echo "<br><p class ='prix'> Prix: ". $value[3] . "€</p>";
			if ($value[4] >= 1) {
				echo "<a class='button' href='addtobasket.php?tel=".$value[0]."'>Add to basket !</a></td></tr>";
			} else {
				echo "<p class='outofstock'>Plus de stock.<br/>
				Ce produit revient très vite.</p></td></tr>";
			}
		}
	}
}
echo "</table>";	
include('footer.php');
?>