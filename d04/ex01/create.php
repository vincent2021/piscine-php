<?php
if ($_POST['submit'] == 'OK' && isset($_POST['login']) && isset($_POST['passwd'])) {
    $login = $_POST['login'];
    $passwd = hash('whirlpool', $_POST['passwd']);
    $folder = "../private";
    $file = $folder."/passwd";
    if (!file_exists($folder))
        mkdir($folder);
    if (file_exists($file))
        $read = unserialize(file_get_contents($file));
    if (isset($read[$login])) {
        echo("ERROR\n");
    } else {
        $read[$login] = array(
            'login' => $login,
            'passwd' => $passwd
        );
        file_put_contents($file, serialize($read), LOCK_EX);
        echo "OK\n";
    }
} else {
    echo "ERROR\n";
}
?>