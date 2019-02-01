#!/usr/bin/php
<?php
$i = 2;
while ($i < $argc) {
  $tab[strstr($argv[$i], ":", -1)] = substr(strstr($argv[$i], ":"), 1);
  $i++;
}
  if ($tab[$argv[1]]) {
    echo $tab[$argv[1]], "\n";
}
 ?>
