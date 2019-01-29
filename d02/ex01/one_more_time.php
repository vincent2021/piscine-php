#!/usr/bin/php
<?php
date_default_timezone_set("Europe/Paris");
setlocale(LC_TIME, "fr_FR.UTF-8");

if ($argv[1]) {
  $d_parse = strptime($argv[1], "%A %d %B %Y %H:%M:%S");
  if (!$d_parse) {
    echo "Wrong Format\n";
  } else {
    echo mktime($d_parse[tm_hour], $d_parse[tm_min], $d_parse[tm_sec], 1 + $d_parse[tm_mon], $d_parse[tm_mday], 1900 + $d_parse[tm_year]), "\n";
  }
}

if ($argv[1]) {
  $tab = explode(" ", $argv[1]);
  $tab[4] = explode(":", $tab[4]);
  $tab[2] = $d_parse[tm_mon] + 1;
  //echo mktime($tab[4][0], $tab[4][1], $tab[4][2], $tab[2], $tab[1], $tab[3]), "\n";
  //print_r($tab);
}
 ?>
