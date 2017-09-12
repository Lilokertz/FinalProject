<?php
	if (isset($_POST['action']))
	{
		$action = $_POST['action'];
		if ($action == 'add')
		{
			if (isset($_SESSION['id'], $_POST['id_article']))
			{
				$manager = new ProduitManager($pdo);
				$produit = $manager->findById($_POST['id_article']);
				if ($produit)
				{
					$manager = new UserManager($pdo);
					$user = $manager->findById($_SESSION['id']);
					if ($user)
					{
						$commande = $user->getPanier();
						if ($commande)
						{
							$commande->addProduit($produit);
							header('Location: index.php?page=panier');
							exit;
						}
						else
							$error = "La commande que vous avez essayez d'ajouter n'existe pas";
					}
					else
						$error = "L'user que vous avez essayez d'ajouter n'existe pas";
				}
				else
					$error = "L'article que vous avez essayez d'ajouter n'existe pas";
			}
		}
		if ($action == 'update')
		{
			if (condition)
			{
				# code...
			}
			else
			{

			}
		}
	}

?>