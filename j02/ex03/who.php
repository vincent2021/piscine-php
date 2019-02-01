#!/usr/bin/php
<?php
//Rechercher dans:#php utmpx
if ($output = shell_exec("who")) {
  echo $output;
}
 ?>
