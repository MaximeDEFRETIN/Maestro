<?php
// Permet de démarrer une session
session_start();

// include_once permet d'inclure les models et les contrôleurs si ils n'ont pas déjà été inclus
// On inclus les models
require_once 'models/dataBase.php';
require_once 'models/user.php';
require_once 'models/avatar.php';
require_once 'models/partitionModel.php';
require_once 'models/comment.php';
require_once 'controllers/displayAvatar-Controller.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="bower_components/materialize/dist/css/materialize.min.css" />
    <script src="bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="assets/js/partition.js" type="text/javascript"></script>
    <script src="assets/js/drums.js" type="text/javascript"></script>
    <script src="assets/js/javascript.js" type="text/javascript"></script>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/styleSlideBar.css" />
    <title>Maestro</title>
</head>
<body class="row">
    <div class="fixed-action-btn" role="navigation">
        <div class="valign-wrapper">
            <p><?= $_SESSION['pseudo'] ?></p>
            <img src="<?= (isset($avatarDisplayed->path_Avatar)?$avatarDisplayed->path_Avatar:"assets/img/imgpr.png") ?>"  height="50" width="50" class="circle responsive-img" id="avatarHeader" alt="<?= $_SESSION['pseudo'] . ", avatar" ?>" />
        </div>
        <ul>
          <li><a class="btn-floating amber" href="Profil" title="Profil"><i class="small material-icons">brightness_5</i></a></li>
          <li><a class="btn-floating amber" href="Modification-profil" title="Éditer le profil"><i class="small material-icons">format_align_justify</i></a></li>
          <li><a class="btn-floating amber" href="controllers/deconnection.php" title="Déconnexion"><i class="small material-icons">directions_walk</i></a></li>
        </ul>
    </div>