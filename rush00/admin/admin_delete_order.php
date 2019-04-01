<?php
session_start();
foreach($_POST as $value) {
	$value = htmlspecialchars($value);
}
if ($_SESSION['loggued_on_user'] != "admin")
	header("Refresh:0; url=index.php");
if ($_POST['id'] != "" && $_POST['submit'] == "OK")
{
	$serialized = file_get_contents("../private/order");
	$order = unserialize($serialized);
	$i = 0;
	foreach ($order as $key =>$elem)
	{
		if ($key == $_POST['id'])
		{
			unset($order[$key]);
			$serialized = serialize($order);
			file_put_contents("../private/order", $serialized);
			$_SESSION['delete_order'] = "OK";
			header('Location: admin_order.php');
			exit();
		}
		$i++;
	}
}
$_SESSION['delete_order'] = "KO";
header('Location: admin_order.php');
?>