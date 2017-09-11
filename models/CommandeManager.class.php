<?php
class CommandeManager
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
        $query->execute([$id]);
        $commande = $query->fetchObject('Commande', [$this->pdo]);
        return $commande;
    }

    public function findByUser(User $user)
    {

    }

    public function create($idUser, $numCommande, $valeur)
    {
        $commande = new Commande();

        $commande->setIdUser($id_user);
        $commande->setNumCommande($num_commande);
        $commande->setValeur($valeur);

        $sql = "INSERT INTO commandes (id_user, num_commande, valeur) VALUES (?, ?, ?)";
		$query = $this->pdo->prepare($sql);
		$query->execute([$commande->getIdUser(),
						$commande->getNumCommande(),
						$commande->getValeur()]);
		$id = $this->pdo->lastInsertId();
		return $this->findById($id);
    }

}

?>
