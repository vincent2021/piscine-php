#!/usr/bin/php
<?php
if ($argv[1]) {
  $html = new DOMDocument();
  $html->loadHTMLFile($argv[1]);
  foreach ($html->getElementsByTagName('a') as $a) {
    $a_title = $a->getAttribute("title");
    $a_title = mb_strtoupper($a_title);
    echo $a_title."\n";
    $a_title = $a->setAttribute("title", $a_title);
  }
  $new_name = substr($argv[1], 0, -5)._new.".html";
  $html->saveHTML();
}
 ?>
