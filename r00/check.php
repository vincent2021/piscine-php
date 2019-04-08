<?php session_start();
foreach($_POST as $value) {
	$value = htmlspecialchars($value);
}
if (!(isset($_POST['mail']) && isset($_POST['passwd']) &&
	isset($_POST['passwd1']) && $_POST['passwd'] != "" && $_POST['mail'] != ""
	&& $_POST['passwd1'] != "" && $_POST['passwd'] == $_POST['passwd1']))
{
	if ($_POST['passwd'] != $_POST['passwd1'])
	{
		$_SESSION['passwderror'] = "1";
		header('location: create.php');
		exit();
	}
	else
	{
		$_SESSION['formerror'] = "1";
		header('location: create.php');
		exit();
	}
}
$unserialized = unserialize(file_get_contents("private/account"));
foreach ($unserialized as $elem)
{
	foreach ($elem as $mail=>$value)
	{
		if ($value == $_POST['mail'])
		{
			$_SESSION['mailerror'] = "1";
			header('Location: create.php');
			exit();
		}
	}
}
$i = count($unserialized);
$unserialized[$i]['mail'] = $_POST['mail'];
$unserialized[$i]['passwd'] = hash(whirlpool, $_POST['passwd']);
$serialized = serialize($unserialized);
file_put_contents("private/account", $serialized);
$_SESSION['create'] = "1";
header('Location: create.php');
exit();
?>
