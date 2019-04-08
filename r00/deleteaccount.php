<?php
include('header.php');
$account = unserialize(file_get_contents("private/account"));
$i = 0;
foreach ($account as $value)
{
	if ($value['mail'] == $_SESSION['mail'])
	{
		unset($account[$i]);
		$account = array_values($account);
		$serialized = serialize($account);
		file_put_contents("private/account", $serialized);
		$flag = 1;
	}
	$i++;
}
unset($_SESSION['loggued_on_user']);
unset($_SESSION['mail']);
unset($_SESSION['passwd']);
if ($flag == 1)
	echo "<p id='create'>\nVotre compte a été correctement supprimé.<br /></p>";
else
	echo "<p id='create'>\nIl y a un petit probleme.<br /></p>";
include('footer.php')
?>
