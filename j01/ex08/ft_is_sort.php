<?php
function ft_is_sort($tab)
{
$i = 0;
$sort = 0;
while ($tab[$i + 1])
{
  if ($tab[$i] <= $tab[$i + 1]) {
    $sort--;
  }
  if ($tab[$i] >= $tab[$i + 1]) {
    $sort++;
  }
  $i++;
}
return ($i == abs($sort));
}
?>
