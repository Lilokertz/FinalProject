<?php
    var_dump($_POST);
    if (isset($_GET['page']) && $page == 'logout')
    {
        $_SESSION = [];
        session_destroy();
        header('Location: index.php');
        exit;
    }

    if(isset($_POST['action']))
    {
        $action = $_POST['action'];
        if ($action == 'create')
        {
            if(isset($_POST['pseudo'], $_POST['password'], $_POST['email']))
            {
                $manager = new UserManager($pdo);
                $user = $manager->create($_POST['pseudo'],  $_POST['password'], $_POST['email']);
                header('Location: index.php?page=login');
                exit;
            }
        }
        elseif ($action == 'login')
        {
            if (isset($_POST['pseudo'] , $_POST['password']))
            {
                $manager = new UserManager($pdo);
                $user = $manager->findByPseudo($_POST['pseudo']);
                //$password = $manager->findByPseudo($_POST['password']);
                if ($user && $_POST['password'] == $user->getPassword())
                {
                    $_SESSION["id"] = $user->getId();
                    header('Location: index.php');
                    exit;
                }
                else
                {
                    $error = "Vous avez entrez de mauvaise infos !";
                }

            }
        }
    }

?>
