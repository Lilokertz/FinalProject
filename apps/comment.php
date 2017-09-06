<?php

$query = $pdo->prepare('SELECT comments.author, comments.content FROM comments INNER JOIN articles ON articles.id = comments.id_article WHERE id_article = ?');

$query->execute([$_GET['id']]);

$comments = $query->fetchAll();

foreach ($comments as $comment)
{
    require ('views/comment.phtml');
}

A MODIFIER (COPIER COLLER !!!!!!!!!!!!)
