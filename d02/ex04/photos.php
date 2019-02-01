#!/usr/bin/php
<?php
if ($argv[1]) {
  error_reporting(E_ERROR | E_PARSE);
  $html = DOMDocument::loadHTMLFile($argv[1]);
  foreach ($html->getElementsByTagName("img") as $img) {
    $img_link = $img->getAttribute("src");
    $img_name = substr(strrchr($img_link, '/'), 1);
    $folder_name = substr($argv[1], 7);
    if (!is_dir($folder_name)) {
      mkdir($folder_name);
    }
    if ($img_link[0] == '/') {
      file_put_contents($folder_name.'/'.$img_name, file_get_contents($argv[1].$img_link));
    } else {
      file_put_contents($folder_name.'/'.$img_name, file_get_contents($img_link));
    }
  }
}
?>
