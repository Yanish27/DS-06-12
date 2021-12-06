<?php
require 'controller/controller.php';
require 'Modele/modele.php'
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

        echo "<a href='index.php?action=logout'>Se déconnecter</a>";
    }
} else {
    if ($_GET['action'] == "login") {
        if (isset($_POST['connexion_form'])) {
            $ResLogin = LoginCompte(htmlspecialchars($_POST['login']), $_POST['password']);
            if($ResLogin == 1){  
                header('Location: index.php');
                $_SESSION['login'] = htmlspecialchars($_POST['login']);
            }
            else{
                echo $ResLogin;
                echo "<br>";
                echo "<a href='index.php?action=login'>Retour au formulaire de connexion</a>";
            }
        } else {
            include 'View/login.php';
        }
    }
    if ($_GET['action'] == "inscription") {
        if (isset($_POST['connexion_form'])) {
            $ResInscription = InscriptionCompte(htmlspecialchars($_POST['login']), $_POST['password']);
            if($ResInscription == 1){  
                header('Location: index.php?action=login');
            }
            else{
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