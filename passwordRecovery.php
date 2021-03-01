<?php
require_once 'models/dataBase.php';
require_once 'models/user.php';
require_once 'controllers/changingPassword-Controller.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="bower_components/materialize/dist/css/materialize.min.css" />
        <link rel="stylesheet" href="assets/css/styleSlideBar.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <script src="assets/js/javascript.js" type="text/javascript" defer></script>
        <title>Maestro</title>
    </head>
<body class="row ">
    <h1 class="center-align marginTop">Modifie ton mot de passe</h1>
    <form action="" method="post" class="marginTop row">
        <div class="marginTopMin col s6 offset-s3 input-field">
            <input type="email" name="mailUser" id="mailUser" class="validate" required />
            <label for="mail" class="black-text">Adresse mail</label>
        </div>
        <div class="marginTop col s6 offset-s3 input-field">
            <input type="password" name="password" id="password" class="validate" required />
            <label for="password" class="black-text">Nouveau mot de passe</label>
        </div>
        <?php foreach ($newPasswordArray as $message) { ?>
            <p class="col s6 offset-s3 center-align marginTop"><?= $message ?></p>
        <?php } ?>
        <!--Permet d'envoyer les modification du mot de passe-->
        <div class="col s2 offset-s5 center marginTop">
            <input type="submit" class="btn amber waves-effect waves-orange" value="Envoyer" id="changingSubmitPassword" name="changingSubmitPassword" />
        </div>
    </form>
    <a href="/" class="btn amber waves-effect waves-orange col offset-s3 s6 marginTopMin marginBottomMin">Accueil</a>
<?php require_once 'footer.php';