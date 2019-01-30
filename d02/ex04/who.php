#!/usr/bin/php
<?php
if ($output = shell_exec("who")) {
  echo $output;
}
 ?>
