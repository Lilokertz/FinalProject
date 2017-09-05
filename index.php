<?php

    $page = 'home';

    $access = ["home", "registation", "login"];

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

    require('apps/skel.php');
    require('apps/traitements/user.php');
    require('apps/traitements/registation.php');
?>
