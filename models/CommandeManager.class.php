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
        $query = $this->pdo->prepare($sql);
        $query->execute([$id]);
        $commande = $query->fetchObject('Commande', [$this->pdo]);
        return $commande;
    }

    public function findByUser(User $user)
    {
        $sql = "SELECT * FROM commandes WHERE id=?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$user->getId()]);
        $commandes = $query->fetchAll(PDO::FETCH_CLASS, 'commande', [$this->pdo]);
        return $commande;
    }

    public function add($idUser, $numCommande, $price, $status)
    {
        $commande = new Commande();

        $commande->setIdUser($id_user);
        $commande->setNumCommande($num_commande);
        $commande->setPrice($price);
        $commande->setStatus($status);

        $sql = "INSERT INTO commandes (id_user, num_commande, price, status) VALUES (?, ?, ?, ?)";
		$query = $this->pdo->prepare($sql);
		$query->execute([$commande->getIdUser(),
						$commande->getNumCommande(),
						$commande->getPrice()
                        $commande->getStatus()]);
		$id = $this->pdo->lastInsertId();
		return $this->findById($id);
    }

    public function update($idUser, $numCommande, $price, $status)
    {
            $sql = "UPDATE commandes SET price=?, status=? WHERE id=?";
            $query = $this->pdo->prepare($sql);
            $query->execute([$commande->getPrice(),
                            $commande->getStatus()]);
            return $this->findById($commande->getId());
    }

}

?>
