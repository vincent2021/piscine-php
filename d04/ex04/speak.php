<?php
session_start();
date_default_timezone_set('Europe/Paris');
if (!isset($_SESSION['loggued_on_user'])) {
    echo 'Merci de vous connecter <a href="index.html">par ici.</a><br>';
} else if (isset($_POST['send_msg']) && $_POST['send_msg'] == 'OK') {
    $folder = "../private";
    $file = $folder."/chat";
    if (!file_exists($folder))
        mkdir($folder);
    if (file_exists($file))
        $read = unserialize(file_get_contents($file));
    $read[] = array(
                'login' => $_SESSION['loggued_on_user'],
                'time' => time(),
                'msg' => $_POST['msg']
            );
    file_put_contents($file, serialize($read), LOCK_EX);
    }
?>
<html><head>
<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<body><form method="post" action="speak.php">
    Message: <input id="msg" type="textarea" name="msg" value=""/>
    <input id="send_msg" type="submit" name="send_msg" value="OK"/>
</form></body>
</html>