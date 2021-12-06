<?php

function LoginCompte($identifiant = null, $mdp = null)
{
    if ($identifiant == null) {
        return "Identifiant manquant";
    } elseif ($mdp == null) {
        return "Mot de passe manquant";
    } elseif ($identifiant != null && $mdp != null) {
        $DepuisModele = new modele;
        $ReponseBDD = $DepuisModele->executerRequete("SELECT * FROM user WHERE nom = '$identifiant';");
        if ($ReponseBDD->rowCount() == 0) {
            return "Identifiant incorrect";
        } else {
            if (password_verify($mdp, $ReponseBDD->fetch()['password'])) {
                return true;
            } else {
                return "Mot de passe incorrect";
            }
        }
    }
}

function CheckUtilisateur($identifiant)
{
    $DepuisModele = new modele;
    $ReponseBDD = $DepuisModele->executerRequete("SELECT * FROM user WHERE nom = '$identifiant';");
    if ($ReponseBDD->rowCount() == 0) {
        return false;
    } else {
        return true;
    }
}

function InscriptionCompte($identifiant = null, $mdp = null)
{
    if ($identifiant == null) {
        return "Identifiant manquant";
    } elseif ($mdp == null) {
        return "Mot de passe manquant";
    } elseif ($identifiant != null && $mdp != null) {
        if (CheckUtilisateur($identifiant)) {
            return "Identifiant déjà utilisé";
        } else {
            $DepuisModele = new modele;

            $req = "INSERT INTO `user` (`nom`, `password`, `dateinscription`) VALUES (:nom, :password, :dateinscription);";

            $Values = array(
                ':nom' => $identifiant,
                ':password' => password_hash($mdp, PASSWORD_DEFAULT),
                ':dateinscription' => date("Y-m-d H:i:s")
            );
            $ReponseBDD = $DepuisModele->executerRequete($req, $Values);
            return true;
        }
    }
}
