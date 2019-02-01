#!/usr/bin/php
<?php
function cmp($a, $b)
{
  if (is_numeric($a) && is_numeric($b)) {
    return strcasecmp($a, $b);
  }
  if (is_numeric($a) && ctype_alpha($b)) {
    return 1;
  }
  if (is_numeric($a) && ctype_alpha($b)) {
    return -1;
  }
  return 0;
}
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
natcasesort($tab);
usort($tab, "cmp");
echo implode("\n", $tab),"\n";
?>
