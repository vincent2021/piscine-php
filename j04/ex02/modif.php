<?php
if ($_POST['submit'] == 'OK' && $_POST['login'] && $_POST['oldpw'] && $_POST['newpw']) {
    $login = $_POST['login'];
    $oldpw = hash('whirlpool', $_POST['oldpw']);
    $newpw = hash('whirlpool', $_POST['newpw']);
    $folder = "../private";
    $file = $folder."/passwd";
    if (!file_exists($folder))
        mkdir($folder);
    if (file_exists($file))
        $read = unserialize(file_get_contents($file));
    if (@!$read[$login]) {
        echo("ERROR\n");
        echo "User doesn't exist<br>";
    } else {
        if ($read[$login]['passwd'] == $oldpw) {
            $read[$login] = array(
                'login' => $login,
                'passwd' => $newpw
            );
            file_put_contents($file, serialize($read), LOCK_EX);
            echo "OK\n";
            echo "Password changed<br>";
            print_r($read[$login]);
        } else {
            echo "ERROR\n";
            echo "Wrong password<br>";
            print_r($read[$login]);
        }
    }
} else {
    echo "ERROR\n";
}
?>