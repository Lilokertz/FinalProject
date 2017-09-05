<?php

    $page = 'login';

    $access = ["home, registation, login"];

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

    require('apps/skel.php');
?>
