<?php
include('header.php');
foreach($_POST as $value) {
	$value = htmlspecialchars($value);
}
if (isset($_POST['passwd']) && isset($_POST['passwd1']) && $_POST['submit'] == "OK")
{
    $account = unserialize(file_get_contents("private/account"));
    $i = 0;
    foreach ($account as $key => $value)
    {
        if ($value['mail'] == $_SESSION['mail'] && $value['passwd'] == hash('whirlpool', $_POST['passwd']))
        {
            $account[$key]['passwd'] = hash('whirlpool', $_POST['passwd1']);
            file_put_contents("private/account", serialize($account));
            $_SESSION['modifypw'] = "OK";
        }
        $i++;
    }
    if ($_SESSION['modifypw'] == "OK")
        echo "<p id='create'>\nVotre mot de pass a été correctement modifié.<br /></p>";
    else
        echo "<p id='create'>\nIl y a un petit probleme.<br /></p>";
    $_SESSION['modifypw'] == "";
}
?>

<div id="connect">
	<form action="modifypasswd.php" method="post">
		Ancien mot de passe: <input type="text" name="passwd" value="" />
		<br />
		Nouveau mot de passe:  <input type="password" name="passwd1" value="" />
		<input type="submit" name="submit" value="OK" />
	</form>
</div>


<?php
include('footer.php');
?>
