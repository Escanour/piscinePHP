#!/usr/bin/php
<?php
if ($argc > 1)
{
	$trimmed = trim ($argv[1]);
	while (strpos($trimmed, "  "))
		$trimmed = str_replace("  "," ", $trimmed);
	echo ("$trimmed\n");
}
?>
