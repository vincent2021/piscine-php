<?php
$exp_time = time() + 48 * 3600;
if ($_GET['action'] == 'set') {
    setcookie($_GET['name'], $_GET['value'], $exp_time);
}
if ($_GET['action'] == 'get') {
    $name = $_GET['name'];
    echo $_COOKIE[$_GET['name']].'<br>';
}
if ($_GET['action'] == 'del') {
    setcookie($_GET['name'], $_GET['value'], time() - 1);
}
?>