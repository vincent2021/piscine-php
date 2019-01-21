#!/usr/bin/php
<?php
if ($argc > 1) {
  $tab = preg_split('/\s+/', $argv[1], 0, PREG_SPLIT_NO_EMPTY);
  $nb = count($tab);
  $i = 0;
  print($tab[$nb - 1]);
  while ($tab[$i] && $i < ($nb - 1)) {
    echo " ", $tab[$i++];
  }
  echo "\n";
}
?>
