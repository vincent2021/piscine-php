php -r '
while ($nb=readline("Entrez un nombre: ")) {
	if ($nb == EOF) {
		break;
	}
	if (substr($nb, -1) % 2 == 0 && is_numeric($nb)) {
		echo "Le chiffre $nb est Pair\n";
	} elseif (is_numeric($nb)) {
		echo "Le chiffre $nb est Impair\n";
	}
}'
