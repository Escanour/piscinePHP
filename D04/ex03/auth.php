<?php
function auth($login, $passwd)
{
	$path = '../htdocs/private';
	$file = $path."/passwd";

	$non_serialize = unserialize(file_get_contents($file));
	$passwd_hash = hash("sha512", $passwd);
	foreach ($non_serialize as $key=>$item)
	{
		if ($item['login'] == $login)
		{
			if ($item['passwd'] == $passwd_hash)
			{
				$_SESSION['loggued_on_user'] = $login;
				return (TRUE);
			}
			else
			{
				$loggued_on_user = "";
				return (FALSE);
			}
		}
	}
	return (FALSE);
}
?>