<?php

    $page = 'registered';

    $access = ["registered"];
/*
    if (in_array($_GET['page'], $access)) // http://php.net/manual/fr/function.in-array.php
        {
            $page = $_GET['page'];
        }
        //Sinon on redirige vers la page HOME (Metre un 404 de preference)
        else
        {
            header('Location: index.php');
        }
*/
    require('apps/skel.php');
?>
