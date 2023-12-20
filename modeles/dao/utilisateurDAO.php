<?php

class utilisateurDAO
{

    public static function verification(Utilisateur $unUtilisateur)
    {
        $requetePrepa = DBConnex::getInstance()->prepare("select mail, nomUtilisateur, prenomutilisateur, statut from utilisateur where mail = :mail and  mdp = :mdp");
        $mail = $unUtilisateur->getMail();
        $mdp = $unUtilisateur->getMdp();
        $requetePrepa->bindParam(":mail", $mail);
        $requetePrepa->bindParam(":mdp", $mdp);
        $requetePrepa->execute();
        $login = $requetePrepa->fetch();
        return $login;
    }

    public static function inscription(?string $unMail, ?string $unMdp, ?string $unStatut, ?string $unNom, ?string $unPrenom){
        $requetePrepa = DBConnex::getInstance()->prepare("INSERT INTO utilisateur (mail, mdp, statut, nomutilisateur, prenomUtilisateur) VALUES (:mail, :mdp, :statut, :nom, :prenom)");
        $requetePrepa->bindParam(":mail", $unMail);
        $requetePrepa->bindParam(":mdp", $unMdp);
        $requetePrepa->bindParam(":statut", $unStatut);
        $requetePrepa->bindParam(":nom", $unNom);
        $requetePrepa->bindParam(":prenom", $unPrenom);

        $requetePrepa->execute();
    }

    public static function getIdByMail(?string $unMail){
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT utilisateur.idUtilisateur FROM utilisateur WHERE mail = :mail");
        $requetePrepa->bindParam(":mail", $unMail);
        $requetePrepa->execute();
        $unId = $requetePrepa->fetch();
        return $unId[0];
    }

    public static function getInfoByID(?string $unId){
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT mail, mdp, statut, nomUtilisateur, prenomUtilisateur FROM utilisateur WHERE idUtilisateur = :unId");
        $requetePrepa->bindParam(":unId", $unId);
        $requetePrepa->execute();
        $infos = $requetePrepa->fetch();
        return $infos;
    }

    public static function updateInfos($unId, $unMail, $unNom, $unPrenom, $unMdp){
        $requetePrepa = DBConnex::getInstance()->prepare("UPDATE utilisateur SET mail = :mail, mdp = :mdp, prenomUtilisateur = :prenom, nomUtilisateur = :nom WHERE idUtilisateur = :unId");
        $requetePrepa->bindParam(":mail", $unMail);
        $requetePrepa->bindParam(":mdp", $unMdp);
        $requetePrepa->bindParam(":prenom", $unPrenom);
        $requetePrepa->bindParam(":nom", $unNom);
        $requetePrepa->bindParam(":unId", $unId);
        $requetePrepa->execute();
    }

    public static function delUtilisateur($unId){
        $requetePrepa = DBConnex::getInstance()->prepare("DELETE FROM utilisateur WHERE idUtilisateur = :unId");
        $requetePrepa->bindParam(":unId", $unId);
        $requetePrepa->execute();
    }

    public static function getAncienneCommandesById($unId){
        $requetePrepa = DBConnex::getInstance()->prepare("SELECT commande.idCommande, produit.nomProduit, proposer.quantite FROM commande, lignescommande, produit, proposer WHERE idAdherent = :unId AND commande.idCommande = lignescommande.idCommande AND lignescommande.idProduit = produit.idProduit AND produit.idProduit = proposer.idProduit");
        $requetePrepa->bindParam(":unId", $unId);
        $requetePrepa->execute();
        $infos = $requetePrepa->fetch();
        return $infos;
    }
}