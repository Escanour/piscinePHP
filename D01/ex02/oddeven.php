#!/usr/bin/php
<?php
while (1)
{
	echo "Entrez un nombre: ";
	$n = fgets(STDIN);
	if (feof(STDIN))
	{
		echo "\n";
		break;
	}
	$n = trim($n);
	if (is_numeric($n))
	{	
		echo "Le chiffre $n est ";
		if ($n%2 == 0)
			echo "Pair\n";
		else
			echo "Impair\n";
	}
	else
		echo "'$n' n'est pas un chiffre\n";
}
