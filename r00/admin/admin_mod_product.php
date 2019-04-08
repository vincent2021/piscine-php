<?php
session_start();
include('../getcsv.php');
if ($_SESSION['loggued_on_user'] != "admin")
	header("Refresh:0; url=index.php");
foreach($_POST as $value) {
	$value = htmlspecialchars($value);
}
if (isset($_POST['modifier']) && isset($_POST['id']) && isset($_POST['telephone']) && isset($_POST['categorie']) && isset($_POST['prix']) && isset($_POST['quantite']) && isset($_POST['image'])) {
		$new = $_POST['id'].','.$_POST['telephone'].','.$_POST['categorie'].','.$_POST['prix'].','.$_POST['quantite'].','.$_POST['image'];
	ft_delcsv($_POST['id']);
	$file = "../private/product.csv";
    file_put_contents($file, $new, FILE_APPEND);
	$_SESSION['modproduct'] = "OK";
} else if (isset($_POST['supprimer']) && isset($_POST['id'])) {
	if (ft_delcsv($_POST['id']) == 1) {
		$_SESSION['delproduct'] = "OK";
	}
} else {
	$_SESSION['modproduct'] = "KO";
}
header('Location: admin_product.php');
exit();
?>
