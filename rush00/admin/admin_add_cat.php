<?php
session_start();
foreach($_POST as $value) {
	$value = htmlspecialchars($value);
}
if ($_SESSION['loggued_on_user'] != "admin")
	header("Refresh:0; url=index.php");
if (isset($_POST['categorie']) &&  $_POST['submit'] === "OK") {
	$file = "../private/categories";
    file_put_contents($file, ";".$_POST['categorie'], FILE_APPEND);
	$_SESSION['addcat'] = "OK";
	header('Location: admin_product.php');
	exit();
} else {
	$_SESSION['addcat'] = "KO";
	header('Location: admin_product.php');
	exit();
}
?>
