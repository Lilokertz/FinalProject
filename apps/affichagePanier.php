<?php

foreach ($user->getPanier()->getArticles() AS $article)
{
    require('views/affichagePanier.phtml');
}

?>
