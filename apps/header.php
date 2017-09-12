<?php
if (isset($_SESSION['id']))
{
    $manager = new UserManager($pdo);
    $user = $manager->findById($_SESSION['id']);
	if ($user->getId() == '4')
	    require('views/header_admin.phtml');
	else
    	require('views/header.phtml');
}
else
{
    require('views/header_out.phtml');
}

?>
