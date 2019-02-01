#!/usr/bin/php
<?php
$i = 1;
$j = 0;
while ($i < $argc) {
  $tmp = array_filter(explode(" ", trim($argv[$i])));
  $x = 0;
  while ($tmp[$x]) {
    $tab[$j++] = $tmp[$x++];
  }
  $i++;
}
array_multisort($tab, SORT_ASC, SORT_STRING);
echo implode("\n", $tab),"\n";
?>
