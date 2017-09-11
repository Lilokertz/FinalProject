<?php

session_start();
//var_dump($_SESSION);

$pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', 'troiswa', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    $pdo->exec('SET NAMES UTF8');

    function __autoload($classname)
    {
	    require('models/'.$classname.'.class.php');
    }

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


    $accessTraitement = ["login" => "traitementUser", "logout" => "traitementUser", "article" => "comments", "registation" => "traitementUser"];
    if (isset($accessTraitement[$page]))
    {
	    require('apps/traitements/'.$accessTraitement[$page].'.php');
    }

    require('apps/skel.php');
?>
