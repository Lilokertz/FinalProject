<?php
class PanierManager
{

    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM paniers WHERE id=?";
        $query = $this->pdo->prepare($pdo);
        $query->execute($id);
        $paniers = $query->fetchObject('Panier');
        return $paniers;
    }

    public function create($idCommande, $idProduit,$idUser)
    {
        $paniers = new Pannier();

        $paniers->setId_commande($id_commande);
        $paniers->setId_produit($id_produit);
        $paniers->setId_user($id_user);

        $sql = "INSERT INTO paniers (id_commande, id_produit, id_user) VALUES (?, ?, ?)";
        $query = $this->pdo->prepare($sql);
        $query->execute([$paniers->getId_commande(),
                        $paniers->getId_produit(),
                        $paniers->getId_user()]);
        $id = $this->pdo->lastInsertId();
        return $this->findById($id);
    }

    public function remove(Panier $panier)
    {
        $sql = "DELETE FROM paniers WHERE id=?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$paniers->getId()]);
    }


?>
