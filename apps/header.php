<?php

if ($_SESSION['id'] == '4')
{
    $manager = new UserManager($pdo);
    $user = $manager->findById($_SESSION['id']);
    require('views/header_admin.phtml');
}
else if (isset($_SESSION['id']))
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
