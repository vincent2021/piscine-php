<?php
session_start();
foreach($_POST as $value) {
	$value = htmlspecialchars($value);
}
if ($_SESSION['loggued_on_user'] != "admin")
	header("Refresh:0; url=index.php");
include('../getcsv.php');
if (isset($_POST['telephone']) && isset($_POST['categorie']) && isset($_POST['prix']) && isset($_POST['quantite']) && isset($_FILES['image']) && $_POST['submit'] === "OK") {
	$new = time().','.$_POST['telephone'].','.$_POST['categorie'].','.$_POST['prix'].','.$_POST['quantite'].',img/'.$_FILES['image']['name']."\n";
	$file = "../private/product.csv";
	file_put_contents($file, $new, FILE_APPEND);
	move_uploaded_file($_FILES['image']['tmp_name'],"../img/".$_FILES['image']['name']);
	$_SESSION['addproduct'] = "OK";
	header('Location: admin_product.php');
	exit();
} else {
	$_SESSION['addproduct'] = "KO";
	header('Location: admin_product.php');
	exit();
}
?>