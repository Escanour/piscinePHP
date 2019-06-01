<?php
function	get_data()
{
	if ($_POST['login'] != NULL && $_POST['passwd'] != NULL && ($_POST['submit'] && $_POST['submit'] === "OK"))
	{
		$user['login'] = $_POST['login'];
		$user['passwd'] = hash(sha512, $_POST['passwd']);
	}
	else
	{
		echo "ERROR\n";
		exit();
	}
	return ($user);
}

$emplacement = "../htdocs/private";
$file = $emplacement."/passwd";

$user = get_data();
if (!file_exists($emplacement))
{
	mkdir ("../htdocs/");
	mkdir ($emplacement);
}

if (!file_exists($file))
{
	$non_serialize[] = $user;
	$serialized[] = serialize($non_serialize);
	file_put_contents($file, $serialized);
}
else
{
	$non_serialize = unserialize(file_get_contents($file));
	foreach ($non_serialize as $item)
	{
		foreach ($item as $login=>$value)
		{
			if ($value == $user['login'])
			{
				echo "ERROR\n";
				exit();
			}
		}
	}
	$non_serialize[] = $user;
	$serialized = serialize($non_serialize);
	file_put_contents($file, $serialized);
}
echo "OK\n";
?>
