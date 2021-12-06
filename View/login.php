
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
</head>
<body>
<form action="index.php?action=login" method="POST">
        <p>Veuillez saisir le pseudo et le mot de passe pour vous connecter</p>
        <br>
        <label for="KeyWord">Vos identifiants de connexion :</label>
        <input type="text" name="login" id="Identifiant">
        <input type="password" name="password" id="Mot de passe">
        <input type="submit" name="connexion_form" value="Valider">
        <br><br>
        <a href="index.php?action=inscription">Inscription</a>
</form>

</body>
</html>

