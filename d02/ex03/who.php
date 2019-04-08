#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
function pad($str)
{
	return str_pad(substr(trim($str), 0, 8), 9, " ");
}

$file = fopen("/var/run/utmpx", "r");
while ($read = fread($file, 628)) {
  $who = unpack("a256name/a4id/a32terminal/isession/iactive/Itime", $read);
  if ($who['active'] == 7) {
    echo pad($who['name']);
    echo pad($who['terminal']);
    echo date("M j H:i", $who['time'])." \n";
  }
}
if ($file) {
  fclose($file);
}
 ?>