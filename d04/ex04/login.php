<?php
include "auth.php";
session_start();
if (auth($_POST['login'], $_POST['passwd'])) {
    $_SESSION['loggued_on_user'] = $_POST['login'];
    echo '<iframe id="chat" name="chat" title="42chat" width="100%" height="550px" src="chat.php"></iframe><br>';
    echo '<iframe id="msg" name="msg" title="Message" width="100%" height="50px" src="speak.php"></iframe>';
    echo '<a href="logout.php">Deconnexion</a><br>';
} else {
    $_SESSION['loggued_on_user'] = "";
    echo "ERROR\n";
 }
?>
