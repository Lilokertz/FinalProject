<?php
$error = '';
if (isset($_POST['pseudo'], $_POST['password']))
{
	$login = $_POST['pseudo'];

	$query = $pdo->prepare('SELECT id, password, pseudo FROM users WHERE pseudo = ?');


	$query->execute(array($login));

	$user = $query->fetch();

	if ($user)
	{
		if ($user['password'] == $_POST['pseudo'])
		{
			echo "ok";
		}
		else
			$error = "Mot de passe invalide";
	}
	else
		$error = "Utilisateur inconnu";
}
