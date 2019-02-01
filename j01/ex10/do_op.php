#!/usr/bin/php
<?php
if ($argc != 4) {
  echo "Incorrect Parameters\n";
} else {
  $i = 1;
  while ($i < $argc) {
      $tab[] = trim($argv[$i]);
      $i++;
  }
  //Tester avec les - et +
  if ($tab[1] == "+") {
    echo $tab[0] + $tab[2],"\n";
  }
  if ($tab[1] == "-") {
    echo $tab[0] - $tab[2], "\n";
  }
  if ($tab[1] == "/") {
    echo $tab[0] / $tab[2], "\n";
  }
  //Gestion dans zsh hasardeuse
  if ($tab[1] == "*") {
    echo $tab[0] * $tab[2], "\n";
  }
  if ($tab[1] == "%") {
    echo $tab[0] % $tab[2], "\n";
  }
}
?>
