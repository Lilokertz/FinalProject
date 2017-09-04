<?php
class UserManager
{

    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM commandes WHERE id=?";
        $query = $this->pdo->prepare($pdo);
        $query->execute($id);
        $commande = $query->fetchObject('commande');
        return $commande;
    }

    public function create($id_user, $num_commande, $valeur)
    {
        $commande = new Commande();

        $commande->setId_user($id_user);
        $commande->setNum_commande($num_commande);
        $commande->setValeur($valeur);

        $sql = "INSERT INTO commandes (id_user, num_commande, valeur) VALUES (?, ?, ?)";
		$query = $this->pdo->prepare($sql);
		$query->execute([$commande->getId_user(),
						$commande->getNumCommande(),
						$commande->getValeur()]);
		$id = $this->pdo->lastInsertId();
		return $this->findById($id);
    }

}

?>