<?php

	if (isset($_POST['action']))
	{
		$action = $_POST['action'];
		if ($action == 'add')
		{
			if (isset($_SESSION['id'], $_POST['id_article']))
			{
				$manager = new ProduitManager($pdo);
				$produit = $manager->findByid($_POST['id_article']);
				$manager = new UserManager($pdo);
				$user = $manager->findById($_SESSION['id']);

				$commande = $user->getPanier();

					$manager = new CommandeManager($pdo);
					$commande = $manager->findCartByUser($_SESSION['id']);

				

				//$commande = $_SESSION['id']->getCommande();

				if ($produit) {
					$addPanier = $manager->"..."($_POST['id_article']);
					header('Location: index.php?page=panier');
					exit;
				}
				else
				{
					var_dump("L'article que vous avez essayez d'ajouter n'existe pas");
				}
			}
		}
		if ($action == update)
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