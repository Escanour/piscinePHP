<?php
function	get_data()
{
	if ($_POST['login'] != NULL && $_POST['oldpw'] != NULL && $_POST['newpw'] != NULL && $_POST['submit'] && $_POST['submit'] === "OK")
	{
		$user['login'] = $_POST['login'];
		$user['newpw'] = hash(sha512, $_POST['newpw']);
		$user['oldpw'] = hash(sha512, $_POST['oldpw']);
	}
	else
	{
		echo "ERROR\n";
		exit();
	}
	return ($user);
}

$path = '../htdocs/private';
$file = $path."/passwd";

$user = get_data();

$non_serialize = unserialize(file_get_contents($file));
$modifier = 0;

foreach ($non_serialize as $key=>$item)
{
	if ($item['login'] == $user['login'])
	{
		if ($item['passwd'] == $user['oldpw'])
		{
			$non_serialize["$key"]['passwd'] = $user['newpw'];
			$modifier = 1;
		}
		else
		{
			echo "ERROR\n";
			exit();
		}
	}
}

if ($modifier == 1)
{
	$serialized = serialize($non_serialize);
	file_put_contents($file, $serialized);
	echo "OK\n";
}
else
	echo "ERROR\n";
?>
