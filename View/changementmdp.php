<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Changement de mot de passe</title>
</head>
<body>
<form action="index.php?action=changementmdp" method="POST">
        <p>Bienvenue sur le formulaire de changement de mot de passe.</p>
        <p>
            Nous vous rappelons que : 
            <ul>
                <li>Votre ancien mot de passe doit être le bon</li>
                <li>Votre nouveau mot de passe doit être le même dans les deux champs</li>
                <li>Votre nouveau mot de passe doit être différent de l'ancien</li>

            </ul>
        </p>
        <p>Veuillez entrer votre ancien mot de passe.</p>
        <input type="password" placeholder="Votre ancien mot de passe" name="ancienmdp">
        <p>Veuillez entrer votre nouveau mot de passe.</p>
        <input type="password" placeholder="Votre nouveau mot de passe" name="nouveaumdp1">
        <p>Veuillez confirmer votre nouveau mot de passe.</p>
        <input type="password" placeholder="Confirmation de votre nouveau mot de passe" name="nouveaumdp2">
        <br><br>
        <input type="submit" value="Changer le mot de passe" name="changementmdp_form">
        <br><br> <br><br>
        <a href="index.php">Retour au menu principal sans changer le mot de passe</a>
</form>

</body>
</html>

