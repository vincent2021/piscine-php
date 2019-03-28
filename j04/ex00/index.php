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
    Identifiant: <input type="text" name="login" value="<?= $login?>"/> <br>
    Mot de passe: <input type="password" name="passwd" value="<?= $password?>"/><br>
    <input type="submit" name="submit" value="OK">
 </p>
 </form>
</body></html>
 