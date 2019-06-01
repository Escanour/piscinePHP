<?PHP
function ft_split($s1)
{
	$tab = explode(" ", $s1);
	$tab = array_filter($tab, 'strlen');
	sort($tab);
	return($tab);
}
?>
