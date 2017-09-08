<?php

foreach ($produit->getComments() as $comment)
{
    require ('views/comment.phtml');
}

?>
