<?php

if (isset($_SESSION['id']))
{
    $manager = new UserManager($pdo);
    $user = $manager->findById($_SESSION['id']);

    require('views/header.phtml');
}
else
{
    require('views/header_out.phtml');
}

?>
