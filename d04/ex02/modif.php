<?php
if ($_POST['submit'] == 'OK' && isset($_POST['login']) && isset($_POST['oldpw']) && isset($_POST['newpw'])) {
    $login = $_POST['login'];
    $oldpw = hash('whirlpool', $_POST['oldpw']);
    $newpw = hash('whirlpool', $_POST['newpw']);
    $file = "../private/passwd";
    if (file_exists($file))
        $read = unserialize(file_get_contents($file));
    if (@!$read[$login]) {
        echo("ERROR\n");
    } else {
        if ($read[$login]['passwd'] == $oldpw) {
            $read[$login] = array(
                'login' => $login,
                'passwd' => $newpw
            );
            file_put_contents($file, serialize($read), LOCK_EX);
            echo "OK\n";
        } else {
            echo "ERROR\n";
        }
    }
} else {
    echo "ERROR\n";
}
?>