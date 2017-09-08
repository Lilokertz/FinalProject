<?php
/*
$query = $pdo->prepare('SELECT * FROM produits WHERE id = ?');

$query->execute(array($_GET['id']));

$produit = $query->fetch();
*/

$manager = new ProduitManager($pdo);
$produit = $manager->findById($_GET["id"]);



require('views/article.phtml');


?>

<!--ORDER BY RAND-->
