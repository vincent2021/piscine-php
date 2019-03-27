#!/usr/bin/php
<?php
while (true) {
	echo "Entrez un nombre: ";
	$nb = trim(fgets(STDIN));
	if (feof(STDIN))
		exit("\n");
	if (!is_numeric($nb)) {
		echo "'$nb' n'est pas un chiffre\n";
	} else if (substr($nb, -1) % 2 == 0) {
		echo "Le chiffre $nb est Pair\n";
	} else if (substr($nb, -1) % 2 == 1) {
		echo "Le chiffre $nb est Impair\n";
	}
}
?>

