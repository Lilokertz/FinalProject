<?php

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', 'troiswa', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    $pdo->exec('SET NAMES UTF8');

    $page = 'home';

    $access = ["home", "registation", "login", "shop", "article", "panier", "logout"];

    if (isset($_GET['page']))
	{

		// On gere la verification des page
		if (in_array($_GET['page'], $access)) // http://php.net/manual/fr/function.in-array.php
		{
			$page = $_GET['page'];
		}
		//Sinon on redirige vers la page HOME (Metre un 404 de preference)
		else
		{
			header('Location: index.php');
            exit();
		}

	}

    require('models/User.class.php');
    require('models/UserManager.class.php');
    require('apps/traitements/traitementUser.php');
    require('apps/skel.php');
?>
