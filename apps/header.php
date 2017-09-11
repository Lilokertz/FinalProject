<?php

$manager = new UserManager($pdo);
$user = $manager->findById($_SESSION['id']);

require('views/header.phtml');

?>
