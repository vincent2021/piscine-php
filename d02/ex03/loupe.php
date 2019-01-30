#!/usr/bin/php
<?php
function ft_get_elem($elem) {
  $elem[0] = preg_replace_callback("/(?<=title=\")(.*?)\"/is", ft_upper, $elem[0]);
  $elem[0] = preg_replace_callback("/(?<=>)(.*?)(?=<)/is", ft_upper, $elem[0]);
  return $elem[0];
}
function ft_upper($elem) {
  return mb_strtoupper($elem[0]);
}
if ($argv[1]) {
  echo preg_replace_callback("/(?<=<a)(.*?)(?=\/a>)/is", ft_get_elem, file_get_contents($argv[1]));
}
 ?>
