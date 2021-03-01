<?php
//On inclut les modèles etr les controlleurs
require_once 'models/dataBase.php';
require_once 'models/user.php';
require_once 'controllers/signIn-Controller.php';
require_once 'controllers/connection-Controller.php';
require_once 'controllers/passwordRecovery-Controller.php';

if(isset($_SESSION['id'])){
    session_start();
    ///session_unset() vide la session en cour
    sesion_unset();
    //session_destroy() détruit la session en cours
    session_destroy();
}
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
<body class="row " id="accueil">
    <div class="row">
        <div class="row marginTop">
            <?php foreach ($addUserError as $display) { ?>
                <p class="amber lighten-4 center col s2 offset-s5 error"><?= $display ?></p>
            <?php } foreach ($connectionMessage as $display) { ?>
                <p class="amber lighten-4 center col s2 offset-s5 error"><?= $display ?></p>
            <?php } foreach ($message as $display) { ?>
                <p class="amber lighten-4 center col s2 offset-s5 error"><?= $display ?></p>
            <?php } ?>
        </div>
        <div class="col offset-s1 s10 bacckgroundE">
            <div class="col s12 center-align">
                <p>Maestro est un site pour amateur de musique.</p>
                <p>Chacun pourra y trouver un piano, une batterie, un métronome et un éditeur de partition.</p>
            </div>
            <div  class="col s12 center-align marginTopMin">
                <img src="assets/img/abstract.png" class="responsive-img" />
            </div>
            <div class="marginLeft marginTopMin col s12 center-align">
                <a class="btn amber waves-effect waves-orange modal-trigger " href="#Connection">Connection</a>
                <p>Pour t'inscrire, c'est par <a class="modal-trigger amber-text" href="#Incription">ici</a>.</p>
                <p>Si tu as oublié ton mot de passe, c'est par <a class="modal-trigger amber-text" href="#ReMdp">là</a>.</p>
            </div>
        </div>
        <div id="Connection" class="modal">
            <div class="modal-content">
                <h4 class="center">Connectes-toi !</h4>
                <form action="" method="POST">
                    <div class="marginTop col s12 input-field">
                        <input type="text" id="pseudoConnection" name="pseudoConnection" class="validate" />
                        <label for="pseudoConnection" class="black-text">Pseudo</label>
                    </div>
                    <div class="marginTop col s12 input-field">
                        <input type="password" id="passwordConnection" name="passwordConnection" class="validate" />
                        <label for="passwordConnection" class="black-text">Mot de passe</label>
                    </div>
                    <div class="col s6 offset-s3 marginTop marginBottom btn amber waves-effect waves-orange">
                        <input type="submit" name="connection" value="Musique !" />
                    </div>
                </form>
            </div>
        </div>
        <div id="Incription" class="modal">
            <div class="modal-content">
                <h4 class="center">Inscription</h4>
                <form action="Accueil" method="POST">
                    <div class="marginTop col s12 input-field">
                        <input type="text" name="lastName" id="lastName" class="validate" required />
                        <label for="lastName" class="black-text">Nom</label>
                    </div>
                    <div class="marginTop col s12 input-field">
                        <input type="text" name="firstName" id="firstName" class="validate" required />
                        <label for="firstName" class="black-text">Prénom</label>
                    </div>
                    <div class="marginTop col s12 input-field">
                        <input type="email" name="mail" id="mail" class="validate" onblur="checkMailUnique()" required />
                        <label for="mail" class="black-text">Adresse mail</label>
                        <span id="errorCheckMailUnique">Cette addresse mail est déjà utilisée.</span>
                    </div>
                    <div class="marginTop col s12 input-field">
                        <input type="text" name="pseudo" id="pseudo" class="validate" onblur="checkPseudoUnique()" required />
                        <label for="pseudo" class="black-text">Pseudo</label>
                        <span id="errorCheckPseudoUnique">Ce pseudo est déjà utilisé.</span>
                    </div>
                    <div class="marginTop col s12 input-field">
                        <input type="password" name="password" id="password" class="validate" required />
                        <label for="password" class="black-text">Mot de passe</label>
                    </div>
                    <div class="marginTop col s12 input-field">
                        <input type="password" id="passwordConfirm" class="validate" required />
                        <label for="passwordConfirm" class="black-text">Conrfimation</label>
                    </div>
                    <div class="col s8 offset-s2 marginTop marginBottom btn amber waves-effect waves-orange">
                        <input type="submit" name="signIn" id="buttonValSignIn" value="Inscription" />
                    </div>
                </form>
            </div>
        </div>
        <div id="ReMdp" class="modal">
            <div class="modal-content">
                <h4 class="center">Entre ton adresse mail</h4>
                <form method="POST">
                    <div class="marginTop col s12 input-field">
                        <input type="email" name="mailRecovery" id="mailRecovery" class="validate" required />
                        <label for="mailRecovery" class="black-text">Adresse mail</label>
                    </div>
                    <div class="col s6 offset-s3 marginTop marginBottom btn amber waves-effect waves-orange">
                        <input type="submit" name="recoverySubmit" id="buttonMailRecovery" value="Envoyé" />
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require_once 'footer.php';
