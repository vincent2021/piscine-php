#!/usr/bin/php
<?php
if ($argc > 1 && $argv[1] != '') {
  $tab = preg_split('/\s+/', $argv[1], 0, PREG_SPLIT_NO_EMPTY);
  $nb = count($tab);
  $tab[$nb] = $tab[0];
  $i = 0;
  while ($tab[$i]) {
    $tab[$i] = $tab[$i + 1];
    $i++;
  }
  $i = 0;
  while ($i < $nb - 1) {
    echo $tab[$i++], " ";
  }
  echo $tab[$i], "\n";
}
?>
