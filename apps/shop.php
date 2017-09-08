<?php

$manager = new ProduitManager($pdo);

$produits = $manager->findAll();

require('views/shop.phtml');
?>
