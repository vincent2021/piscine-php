#!/usr/bin/php
<?php
if ($argv[1]) {
  //Fonction interdite
  $argv[1] = preg_replace("/\s\s+/", ' ', $argv[1]);
  echo $argv[1], "\n";
}
 ?>
