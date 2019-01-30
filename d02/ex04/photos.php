#!/usr/bin/php
<?php
if ($argv[1]) {
  error_reporting(E_ERROR | E_PARSE);
  $html = DOMDocument::loadHTMLFile($argv[1]);
  foreach ($html->getElementsByTagName("img") as $img) {
    $img_link = $img->getAttribute("src");
    echo $img_link."\n";
  }
}
?>
