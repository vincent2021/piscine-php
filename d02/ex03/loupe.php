#!/usr/bin/php
<?php
if ($argv[1]) {
  $html = new DOMDocument();
  $html->loadHTMLFile($argv[1]);
  foreach ($html->getElementsByTagName('a') as $anchor) {
          if (!$anchor->hasAttribute('title')) {
              $anchor->setAttribute('title', $anchor->textContent);
          }
  }
    $html->loadHTMLFile(substr($argv[1], -3));
}
 ?>
