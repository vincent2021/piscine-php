#!/usr/bin/php
<?php
if ($argv[1]) {
  $argv[1] = trim(preg_replace("/\ +|\t+/", ' ', $argv[1])," \t");
  echo $argv[1], "\n";
}
 ?>