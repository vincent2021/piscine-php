<?php
function ft_split($str)
{
	$ret = str_word_count($str, 1);
	sort($ret);
	return ($ret);
}
?>
