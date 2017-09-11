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
        $sql = "SELECT * FROM commandes WHERE id_user=?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$user->getId()]);
        $commandes = $query->fetchAll(PDO::FETCH_CLASS, 'Commande', [$this->pdo]);
        return $commandes;
    }

    public function findCartByUser(User $user)
    {
        $sql = "SELECT * FROM commandes WHERE id_user=? AND status=?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$user->getId(), 'panier']);
        $commande = $query->fetchObject('Commande', [$this->pdo]);
        return $commande;
    }

    public function create(User $user)
    {
        $commande = new Commande($this->pdo);

        $commande->setUser($user);

        $sql = "INSERT INTO commandes (id_user, num_commande) VALUES (?, ?)";
		$query = $this->pdo->prepare($sql);
		$query->execute([$commande->getUser()->getId(),
                        $commande->getUser()->getId()."-".date("d/m/Y")]);
		$id = $this->pdo->lastInsertId();
		return $this->findById($id);
    }

    public function update($idUser, $price, $status)
    {
            $sql = "UPDATE commandes SET price=?, status=? WHERE id=?";
            $query = $this->pdo->prepare($sql);
            $query->execute([$commande->getPrice(),
                            $commande->getStatus()
                            ]);
            return $this->findById($commande->getId());
    }

    public function addProduit()
    {
        $sql = "INSERT INTO commandes (produit) VALUES (?)";
        $query = $this->pdo->prepare($sql);
    }

}

?>
