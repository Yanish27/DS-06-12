
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
</head>
<body>
<form action="index.php?action=inscription" method="POST">
        <p>Merci d'entrer vos informations pour vous inscrire</p>
        <br>
        <label for="KeyWord">Vos identifiants de connexion :</label>
        <input type="text" name="login" id="Identifiant">
        <input type="password" name="password" id="Mot de passe">
        <input type="submit" name="connexion_form" value="Valider">
        <br><br>
        <a href="index.php?action=login">Connexion</a>
</form>

</body>
</html>

