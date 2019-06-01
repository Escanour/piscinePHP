<?php
if (array_key_exists("action", $_GET))
{
	$get_info = $_GET;
	if (array_key_exists("name", $get_info))
	{
		if ($get_info['action'] == "set" && array_key_exists("value", $get_info))
			setcookie($get_info['name'], $get_info['value']);
		else if ($get_info['action'] == "get" && $_COOKIE[$get_info['name']] != NULL)
			echo ($_COOKIE[$get_info['name']])."\n";
		else if ($get_info['action'] == "del")
			setcookie($get_info['name'], "", -1);
	}
}
?>
