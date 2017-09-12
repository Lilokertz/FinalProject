<?php
//var_dump($_POST);
if(isset($_POST['action']))
{
    $action = $_POST['action'];
    if ($action == 'create')
    {
        if(isset($_POST['content'],$_SESSION['id'], $_POST['id_article']))
        {
            $manager = new ProduitManager($pdo);
            $produit = $manager->findById($_POST["id_article"]);
            $manager = new UserManager($pdo);
            $user = $manager->findById($_SESSION['id']);
            $manager = new CommentManager($pdo);
            $comment = $manager->create($_POST['content'], $produit, $user);
            var_dump($comment);
            header('Location: index.php?page=article&id='.$comment->getArticle()->getId());
            exit;
        }
    }
}
?>
