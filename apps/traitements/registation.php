<?php

    $email = '';
    $pseudoInsc = '';
    $passwordInsc = '';

    if (isset($_POST['email'], $_POST['pseudoInsc'], $_POST['passwordInsc']))
    {
        $errors = [];
        if (strlen($_POST['email']) < 3)
        {
		    $errors[] = 'Votre email est trop court (< 3)';
        }
	    else if (strlen($_POST['email']) > 63)
        {
		    $errors[] = 'Votre email est trop long (< 63)';
        }
	    else
        {
		    $email = $_POST['email'];
        }

        $errors = [];
        if (strlen($_POST['pseudoInsc']) < 3)
    		$errors[] = 'Votre pseudo est trop court (< 3)';
    	else if (strlen($_POST['pseudoInsc']) > 63)
    		$errors[] = 'Votre pseudo est trop long (< 63)';
    	else
    		$pseudoInsc = $_POST['pseudoInsc'];

        $errors = [];
        if (strlen($_POST['passwordInsc']) < 3)
    		$errors[] = 'Votre mot de passe est trop court (< 3)';
    	else if (strlen($_POST['passwordInsc']) > 63)
    		$errors[] = 'Votre mot de passe est trop long (< 63)';
    	else
    		$pswInsc = $_POST['passwordInsc'];

        if (empty($errors))
        	{
        		$sql = 'INSERT INTO users (email, pseudo, password) VALUES(?, ?, ?)';
        		$query = $pdo->prepare($sql);
        		$ret = $query->execute([$email, $pseudoInsc, $passwordInsc]); // http://php.net/manual/fr/pdostatement.execute.php
        		if ($ret === true)
        		{
        			$id = $pdo->lastInsertId();
        			// 4 : Redirection
        			header('Location: index.php');
        			exit;
        		}
        		else
        		{
        			$errors[] = "Erreur interne";
        		}
        	}
    }

?>
