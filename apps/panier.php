<?php
if (isset($_SESSION['id']))
{
	$manager = new UserManager($pdo);
	$user = $manager->findById($_SESSION['id']);
    
	require('views/panier.phtml');
}
?>
