<?php
include('header.php');
foreach($_POST as $value) {
	$value = htmlspecialchars($value);
}
if (file_exists("private/order")) {
    $tab = unserialize(file_get_contents("private/order"));
} else {
    $tab = file_put_contents("private/order", "");
}
$count = time();
if ($_POST['nom'] && $_POST['prenom'] && $_POST['adresse'] && $_POST['cp'] && $_POST['ville'] && $_POST['tel'])
{
    $tab[$count]['nom'] = $_POST['nom'];
    $tab[$count]['prenom'] = $_POST['prenom'];
    $tab[$count]['adresse'] = $_POST['adresse'];
    $tab[$count]['cp'] = $_POST['cp'];
    $tab[$count]['ville'] = $_POST['ville'];
    $tab[$count]['tel'] = $_POST['tel'];
	$serialized[] = serialize($tab);
    file_put_contents("private/order", $serialized);
    echo "<div class='admin'>Votre commande a été validée !";
    $_SESSION['order'] = $tab[$count];
    echo "</br><a href='print_order.php'>Imprimer votre facture</a></div>";
}
else
    echo "Erreur dans le formulaire.";
$_SESSION['fact_items'] = $_SESSION['nb_of_items'];
$_SESSION['fact_b'] = $_SESSION['basket'];
$_SESSION['nb_of_items'] = 0;
$_SESSION['basket'] = "";
include('footer.php');
?>
