<?PHP
function ft_is_sort($array)
{
	$count = count($array) - 1;
	$arr = $array;
	sort($array);
	//print_r($arr);
	$i = 0;
	while ($i != $count)
	{
		if ($arr[$i] != $array[$i])
			return false;
		$i++;
	}
	return true;
}
?>
