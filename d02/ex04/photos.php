#!/usr/bin/php
<?php
function ft_getimg($url, $img_link, $folder_name) {
  $img_name = substr(strrchr($img_link, '/'), 1);
  if ($img_link[0] == '/') {
    file_put_contents($folder_name.'/'.$img_name, file_get_contents($url.$img_link));
  } else {
    file_put_contents($folder_name.'/'.$img_name, file_get_contents($img_link));
  }
}
error_reporting(E_ERROR);
if ($argc == 2) {
  if (substr($argv[1], 0 , 7) != "http://" && substr($argv[1], 0 , 8) != "https://") {
    $url = "http://".$argv[1];
  } else {
    $url = $argv[1];
  }
  if (!($site = file_get_contents($url)))
    exit("Incorrect URL\n");
  $folder_name = preg_split('/(http?.:\/\/)/', $url);
  if (!preg_match_all('/<img.*?src="([^"]+)".*?>/is', $site, $match, PREG_SET_ORDER)) {
    return 0;
  }
  if (!is_dir($folder_name[1])) {
    mkdir($folder_name[1]);
  }
  foreach ($match as $val) {
    ft_getimg($url, $val[1], $folder_name[1]);
  }
}
?>