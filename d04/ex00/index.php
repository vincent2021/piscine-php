<?php
session_start();
if (isset($_GET['submit']) &&  $_GET['submit'] == "OK") {
    $_SESSION['login'] = $_GET['login'];
    $_SESSION['passwd'] = $_GET['passwd'];
}
$login = isset($_SESSION['login']) ? $_SESSION['login'] : '';
$password = isset($_SESSION['passwd']) ? $_SESSION['passwd'] : '';
?>
<html><body>
<form method="get" action="index.php">
    Identifiant: <input id="login" type="text" name="login" value="<?= $login?>"/>
    <br>
    Mot de passe: <input id="passwd" type="password" name="passwd" value="<?= $password?>"/>
    <input id="submit" type="submit" name="submit" value="OK">
 </form>
</body></html>
 