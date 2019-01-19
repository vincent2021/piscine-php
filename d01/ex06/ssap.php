#!/usr/bin/php
<?php
$i = 1;
while ($i < $argc) {
  $tab[] = preg_split('/\s+/', $argv[$i], -1, PREG_SPLIT_NO_EMPTY);
  $i++;
}
sort($tab[0]);
print_r($tab);
echo join('<br>', $tab);
?>
