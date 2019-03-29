<?php
$exp_time = time() + 48 * 3600;
if ($_GET['action'] == "set") {
    setcookie($_GET['name'], $_GET['value'], $exp_time);
}
else if ($_GET['action'] == "get") {
    echo $_COOKIE[$_GET['name']]."\n";
}
else if ($_GET['action'] == "del") {
    setcookie($_GET['name'], $_GET['value'], time() - 1);
}
?>