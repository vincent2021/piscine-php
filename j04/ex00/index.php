<?php
session_start();
if ($_GET['submit'] == 'OK') {
    $_SESSION['login'] = $_GET['login'];
    $_SESSION['passwd'] = $_GET['passwd'];
}
$login = isset($_SESSION['login']) ? $_SESSION['login'] : '';
$password = isset($_SESSION['passwd']) ? $_SESSION['passwd'] : '';
?>
<html><body>
<form method="get" action="index.php">
  <p>
    Identifiant: <input id="1" type="text" name="login" value="<?= $login?>"/> <br>
    Mot de passe: <input id="2" type="password" name="passwd" value="<?= $password?>"/><br>
    <input id="3" type="submit" name="submit" value="OK">
 </p>
 </form>
</body></html>
 