<?php session_start();
$account = unserialize(file_get_contents("private/account"));
foreach($_POST as $value) {
	$value = htmlspecialchars($value);
}
foreach ($account as $elem)
{
	if (($elem['mail'] == $_POST['mail'])
		&& (hash(whirlpool, $_POST['passwd']) == $elem['passwd']))
	{
		$_SESSION['mail'] = $_POST['mail'];
		$_SESSION['passwd'] = hash('whirlpool', $_POST['passwd']);
		$_SESSION['log'] = "1";
		if ($elem['admin'] == "Y")
			$_SESSION['loggued_on_user'] = "admin";
		else
			$_SESSION['loggued_on_user'] = $elem['mail'];
		header('location: connect.php');
		exit();
	}
}
$_SESSION['logerror'] = "1";
header('location: connect.php');
?>
