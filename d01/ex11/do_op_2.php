#!/usr/bin/php
<?php
if ($argc != 2) {
  echo "Incorrect Parameters\n";
} else {
  preg_match_all('/-\d+|\d|-|\+|\/|\*|\%/', $argv[1], $tab);
  if (is_numeric($tab[0][0]) && is_numeric($tab[0][2])) {
      if ($tab[0][1] == "+") {
        echo $tab[0][0] + $tab[0][2],"\n";
      } else if ($tab[1] == "-") {
        echo $tab[0][0] - $tab[0][2],"\n";
      } else if ($tab[1] == "/") {
        echo $tab[0][0] / $tab[0][2],"\n";
      } else if ($tab[1] == "*") {
        echo $tab[0][0] * $tab[0][2],"\n";
      } else if ($tab[1] == "%") {
        echo $tab[0][0] % $tab[0][2],"\n";
      } else {
        echo "Syntax Error", "\n";
      }
    } else {
        echo "Syntax Error\n";
    }
}
?>
