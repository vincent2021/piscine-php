#!/usr/bin/php
<?php
if ($argv[1] && $argv[2])
{
  //File check incomplete
  if (mime_content_type($argv[1]) != "text/plain") {
    exit ();
  }
  $csv = str_getcsv($argv[1], ";");
  $cmd = readline("Entrez votre commande: ");
  preg_match('/".*?"|\'.*?\'/', $cmd, $key);
  $ret = array_column($csv, $argv[2], $key[0]);
  print $ret;
}
 ?>
