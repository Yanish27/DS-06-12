<?php
require 'controller/controller.php';
require 'controller/ctchangemdp.php';

require 'Modele/modele.php';
?>
<html>
<title>Mon espace </title>
<?php
session_start();

if (!isset($_GET['action'])) {
    if (empty($_SESSION['login'])) {
        header('Location: index.php?action=login');
    } else {
        echo "Menu principal";

        echo "<br>";
        echo "<br>";

        echo "<a href='index.php?action=logout'>Se déconnecter</a>";


        echo "<br>";
        echo "<br>";

        echo "<a href='index.php?action=changementmdp'>Changement du mot de passe</a>";
    }
} else {
    if ($_GET['action'] == "login") {
        if (isset($_POST['connexion_form'])) {
            $ResLogin = LoginCompte(htmlspecialchars($_POST['login']), $_POST['password']);
            if ($ResLogin == 1) {
                header('Location: index.php');
                $_SESSION['login'] = htmlspecialchars($_POST['login']);
            } else {
                echo $ResLogin;
                echo "<br>";
                echo "<a href='index.php?action=login'>Retour au formulaire de connexion</a>";
            }
        } else {
            include 'View/login.php';
        }
    } else if ($_GET['action'] == "changementmdp") {
        if (!empty($_SESSION['login'])) {
        // On regarde si le formulaire a été rempli (via le button name chagementmdp)
        if (isset($_POST['changementmdp_form'])) {
            $ResultatChangementMDP = ChangementMDP($_POST['ancienmdp'], $_POST['nouveaumdp1'], $_POST['nouveaumdp2']);
            if($ResultatChangementMDP == 1){
                echo "Votre mot de passe a été changé";
                echo "<br>";
                echo "<a href='index.php'>Retour l'accueil</a>";
            } else {
                echo $ResultatChangementMDP;  
                echo "<br>";
                echo "<a href='index.php?action=changementmdp'>Retour </a>";
            }
        } else {
            // Sinon on affiche le formulaire
            include 'View/changementmdp.php';
        }
    } else {
        header('Location: index.php?action=login');
    }
    } else if ($_GET['action'] == "inscription") {
        if (isset($_POST['connexion_form'])) {
            $ResInscription = InscriptionCompte(htmlspecialchars($_POST['login']), $_POST['password']);
            if ($ResInscription == 1) {
                header('Location: index.php?action=login');
            } else {
                echo $ResInscription;
                echo "<br>";
                echo "<a href='index.php?action=inscription'>Retour au formulaire d'inscription</a>";
            }
        } else {
            include 'View/register.php';
        }
    }
    if ($_GET['action'] == "logout") {
        session_destroy();
        header('Location: index.php');
    }
}
?>

</html>