<?php
function auth($login, $password) {
    if (!isset($login) || !isset($password))
        return FALSE;
    $folder = "../private";
    $file = $folder."/passwd";
    if (file_exists($file)) {
        $read = unserialize(file_get_contents($file));
        if (isset($read[$login]) && $read[$login]['passwd'] == hash('whirlpool', $password)) {
            return TRUE;
        }
    }
    return FALSE;
}
?>