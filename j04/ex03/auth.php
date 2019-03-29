<?php
function auth($login, $password) {
    if (!$login || !$password)
        return FALSE;
    $folder = "../private";
    $file = $folder."/passwd";
    if (file_exists($file)) {
        $read = unserialize(file_get_contents($file));
        if ($read[$login]['login'] == $login && $read[$login]['passwd'] == hash('whirlpool', $password)) {
            return TRUE;
        }
    }
    return FALSE;
}
?>