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
            if(strcmp($nouveaumdp1, $nouveaumdp2) == 0)
            {
                // On vérifie que le mot de passe actuel est bon
                // Grâce à la fonction déjà codée dans controller.php.
                // On a pas besoin de ré-écrire cette partie : Gain de temps / Pas de répétition de code
                if(LoginCompte($_SESSION['login'], $ancienmdp) == 1){
                    // On modifie le mot de passe

                    // On instancie un nouveau modele
                    $DepuisModele = new modele;
                    // On prépare la requête
                    $req = "UPDATE `user` SET `password` = :password WHERE `user`.`nom` = :username";
                    // On prépare les paramètres de la requete SQL
                    $Values = array(
                        ':password' => password_hash($nouveaumdp1, PASSWORD_DEFAULT),
                        ':username' => $_SESSION['login']
                    );
                    // On exécute la requête
                    $ReponseBDD = $DepuisModele->executerRequete($req, $Values);
                    // On returne true, tout s'est bien déroulé.
                    // Le mot de passe à été changé.
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