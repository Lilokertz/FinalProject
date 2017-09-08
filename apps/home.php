<?php

    $manager = new ProduitManager($pdo);

    $produits = $manager->findByRandom();
    $bestProduit = $manager->findByBest();

    require('views/home.phtml');
?>
