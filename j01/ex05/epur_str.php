#!/usr/bin/php
<?php
$str = preg_split('/\s+/', $argv[1], 0, PREG_SPLIT_NO_EMPTY);
echo implode(" ", $str), "\n";
?>
