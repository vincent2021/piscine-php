<?php
session_start();
foreach($_POST as $value) {
	$value = htmlspecialchars($value);
}
if ($_SESSION['loggued_on_user'] != "admin")
	header("Refresh:0; url=index.php");
if ($_POST['mail'] != "" && $_POST['mail'] != "admin" 
		&& $_POST['submit'] == "OK")
{
	$serialized = file_get_contents("../private/account");
	$account = unserialize($serialized);
	$i = 0;
	foreach ($account as $elem)
	{
		if ($elem['mail'] == $_POST['mail'])
		{
			unset($account[$i]);
			$account = array_values($account);
			$serialized = serialize($account);
			file_put_contents("../private/account", $serialized);
			$_SESSION['delete_user'] = "OK";
			header('Location: admin_user.php');
			exit();
		}
		$i++;
	}
}
$_SESSION['delete_user'] = "KO";
header('Location: admin_user.php');
?>
