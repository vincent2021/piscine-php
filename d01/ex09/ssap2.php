#!/usr/bin/php
<?php
function ft_isalpha($str)
{
  $i = 0;
  while ($str[$i]) {
    if (ord($str[$i]) < 65 || ord($str[$i]) > 122 || (ord($str[$i]) >= 91 && ord($str[$i]) <= 96))
      return 0;
    $i++;
  }
  return 1;
}
function ft_cmp($a, $b)
{
  $a = strtolower($a);
  $b = strtolower($b);
  if ($a == $b)
    return 0;
  $i = 0;
  while ($a[$i] == $b[$i])
    $i++;
  if (ft_isalpha($a[$i]) && ft_isalpha($b[$i]))
    return (ord($a[$i]) - ord($b[$i]));
  else if (is_numeric($a[$i]) && is_numeric($b[$i]))
    return (ord($a[$i]) - ord($b[$i]));
  else if (ft_isalpha($a[$i]) && is_numeric($b[$i]))
    return (-1);
  else if (ft_isalpha($b[$i]) && is_numeric($a[$i]))
    return (1);
  else if ((ft_isalpha($a[$i]) || is_numeric($a[$i]) && !ft_isalpha($b[$i]) && !is_numeric($b[$i])))
    return (-1);
  else if ((ft_isalpha($b[$i]) || is_numeric($b[$i]) && !ft_isalpha($a[$i]) && !is_numeric($a[$i])))
    return (1);
  else
    return (ord($a[$i]) - ord($b[$i]));
}

$i = 1;
$j = 0;
while ($i < $argc) {
  $tmp = explode(" ", trim($argv[$i]));
  $x = 0;
  while ($tmp[$x]) {
    $tab[$j++] = $tmp[$x++];
  }
  $i++;
}
usort($tab, "ft_cmp");
foreach ($tab as $val) {
    echo $val, "\n";
}
?>
