<?php

function ChangementMDP($ancienmdp = null, $nouveaumdp1 = null, $nouveaumdp2 = null)
{
    // On vérifie que les champs sont remplis
    if($ancienmdp != null && $nouveaumdp1 != null && $nouveaumdp2 != null)
    {
        //  On vérifie que le nouveau mot de passe est bien différent de l'ancien
        if($ancienmdp != $nouveaumdp1)
        {
            // On vérifie que les deux nouveaux mots de passe sont identiques
            if($nouveaumdp1 == $nouveaumdp2)
            {
                // On vérifie que le mot de passe actuel est bon
                // Grâce à la fonction déjà codée dans controller.php.
                // On a pas besoin de ré-écrire cette partie : Gain de temps / Pas de répétition de code
                if(LoginCompte($_SESSION['login'], $ancienmdp) == 1){
                    // REQUETE SQL : UPDATE `user` SET `password` = 'NAPS' WHERE `user`.`nom` = 'yanis';
                    $DepuisModele = new modele;

                    $req = "UPDATE `user` SET `password` = :password WHERE `user`.`nom` = :username";

                    $Values = array(
                        ':password' => password_hash($nouveaumdp1, PASSWORD_DEFAULT),
                        ':username' => $_SESSION['login']
                    );
                    
                    $ReponseBDD = $DepuisModele->executerRequete($req, $Values);

                    return true;
                } else {
                    echo "L'ancien mot de passe est incorrect";
                }
            } else {
                echo "Le nouveau mot de passe et la confirmation ne correspondent pas";
            }
        } else {
            echo "Votre nouveau mot de passe ne peut pas être identque a l'ancien.";
        }
    } else {
        return "Au moins un des chamsp est nul.";
    }
}