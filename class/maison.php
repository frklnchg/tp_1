<?php

class maison
{
    //---------------------CREATE---------------------
    public function createMaison($maison)
    {
        global $dbcon;
        $query = "INSERT INTO maison 
                  SET prix = :prix, annee_construite = :annee_construite, pied_carre = :pied_carre, nb_chambre = :nb_chambre";

        $stmt = $dbcon->prepare($query);
        $stmt->bindParam(':prix', $maison['prix'], PDO::PARAM_INT);
        $stmt->bindParam(':annee_construite', $maison['annee_construite'], PDO::PARAM_INT);
        $stmt->bindParam(':pied_carre', $maison['pied_carre'], PDO::PARAM_INT);
        $stmt->bindParam(":nb_chambre", $maison['nb_chambre'], PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() <= 0) {
            return false;
        }
    }
    //---------------------READ---------------------
    public function getAllMaison()
    {
        global $dbcon;

        $query = "SELECT matricule, prix, annee_construite, pied_carre, nb_chambre FROM maison";
        $stmt = $dbcon->prepare($query);
        $stmt->execute();

        $maisons = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $maisons[] = $row;
        }
        return $maisons;
    }
    public function getMaisonByMatricule($id)
    {
        global $dbcon;
        $query = "SELECT matricule, prix, annee_construite, pied_carre, nb_chambre FROM maison WHERE matricule = :id";
        $stmt = $dbcon->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $maison = $stmt->fetch(PDO::FETCH_ASSOC);
        return $maison;
    }
    //---------------------UPDATE---------------------
    public function updateMaison($id, $data)
    {
        global $dbcon;
        
        $query = "UPDATE maison
                  SET prix = :prix, annee_construite = :annee_construite, pied_carre = :pied_carre, nb_chambre = :nb_chambre
                  WHERE matricule = :matricule";
        $stmt = $dbcon->prepare($query);
        $stmt->bindParam(':matricule', $id, PDO::PARAM_INT);
        $stmt->bindParam(':prix', $data['prix'], PDO::PARAM_INT);
        $stmt->bindParam(':annee_construite', $data['annee_construite'], PDO::PARAM_INT);
        $stmt->bindParam(':pied_carre', $data['pied_carre'], PDO::PARAM_INT);
        $stmt->bindParam(':nb_chambre', $data['nb_chambre'], PDO::PARAM_INT);
        $stmt->execute();

        return $stmt;

    }
    //---------------------DELETE---------------------
    public function deleteMaison($id)
    {
        global $dbcon;
        $query = "DELETE FROM maison
                  WHERE matricule = :matricule";

        $stmt = $dbcon->prepare($query);
        $stmt->bindParam('matricule', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;

    }


}