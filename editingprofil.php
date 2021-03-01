<?php
require_once 'header.php';
require_once 'controllers/editingProfil-Controllers.php';
require_once 'controllers/insertAvatar-Controller.php';
require_once 'controllers/deleted-Controllers.php';
?>
<div class="row">
    <div class="row marginTop center-align">
        <form id="formNewAvatar" class="marginTop" method="post" enctype="multipart/form-data">
            <label class="col s6 offset-s3">
                <img src="<?= (isset($avatarDisplayed->path_Avatar)?$avatarDisplayed->path_Avatar:"assets/img/imgpr.png") ?>"  height="150" width="150" class="circle responsive-img" id="avatar" alt="<?= $_SESSION['pseudo'] . ", avatar" ?>" />
                <input type="file" id="newAvatar" name="newAvatar" accept=".png, .jpg, .jpeg" hidden />
            </label>
            <input type="submit" class="col s6 offset-s3 amber btn-flat waves-effect waves-orange marginTopMin" <?= (isset($avatarDisplayed->path_Avatar))?'id="submitNewAvatar" name="submitNewAvatar" title="Envoyer" value="Envoyer"':'id="submitDeleteAvatar" name="submitDeleteAvatar" title="Supprimer" value="Supprimer"' ?> />
        </form>
    </div>
    <?php foreach ($messageErrorAvatar as $error) { ?>
        <p class="marginTop row center-align"><?= $error ?></p>
    <?php } ?>
    <?php foreach ($messageDeleteAvatar as $error) { ?>
        <p class="marginTop row center-align"><?= $error ?></p>
    <?php } ?>
    <img src="assets/img/separateur.png" class="img-responsive col s6 offset-s3 marginTopMin marginBottomMin" />
    <!--On crée plusieurs champs correspondant chacune à une information à modifiée-->
    <form class="bacckgroundE col offset-s1 s10" method="post" action="Modification-profil">
        <div class="row">
            <div class="col s12 center-align">
              <label for="lastName" class="validate black-text">Nom</label>
            </div>
            <div class="input-field col s6 offset-s3 center-align">
                <!--Chaque champs à comme valeur par défault les valeurs de l'utilisateurs-->
                <input type="text" name="lastName" id="lastName" placeholder="Nom"  value="<?= $_SESSION['lastName'] ?>" />
                <!--Si une erreur survient, on affiche un message d'erreur-->
                <?php if(isset($formMessageModification['lastName'])) { ?>
                    <p><?= $formMessageModification['lastName'] ?></p>
                <!--Sinon on affiche une message montrant que la modification est réussie-->
                <?php } else if(!empty($_POST['lastName'])) { ?>
                    <p>Le nom est bien modifié.</p>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col s12 center-align">
              <label for="firstName" class="validate black-text">Prénom</label>
            </div>
            <div class="input-field col s6 offset-s3 center-align">
                <input type="text" name="firstName" id="firstName" placeholder="Prénom"  value="<?= $_SESSION['firstName'] ?>" />
                <?php if(isset($formMessageModification['firstName'])) { ?>
                    <p><?= $formMessageModification['firstName'] ?></p>
                <?php } else if(!empty($_POST['firstName'])) { ?>
                    <p>Le prénom est bien modifié.</p>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col s12 center-align">
              <label for="pseudo" class="validat black-text">Pseudo</label>
            </div>
            <div class="input-field col s6 offset-s3 center-align">
                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo"  value="<?= $_SESSION['pseudo'] ?>" />
                <?php if(isset($formMessageModification['pseudo'])) { ?>
                    <p><?= $formMessageModification['pseudo'] ?></p>
                <?php } else if(!empty($_POST['pseudo'])){ ?>
                    <p>Le pseudo est bien modifié.</p>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col s12 center-align">
                <label for="mail" class="validate black-text">Adresse mail</label>
            </div>
            <div class="input-field col s6 offset-s3 center-align">
                <input type="email" name="mail" id="mail" placeholder="Adresse mail"  value="<?= $_SESSION['mail'] ?>" />
                <?php if (isset($formMessageModification['mail'])) { ?>
                    <p><?= $formMessageModification['mail'] ?></p>
                <?php } else if (!empty($_POST['mail'])) { ?>
                    <p>L'addresse mail est bien modifié.</p>
                <?php } ?>
            </div>
        </div>
        <!--Permet d'envoyer les modification du profil-->
        <div class="col s12 center-align">
            <input type="submit" class="amber btn-flat waves-effect waves-orange marginBottomMin" value="Envoyer" name="updateSubmit" />
        </div>
    </form>
    <img src="assets/img/separateur.png" class="img-responsive col s6 offset-s3 marginTopMin marginBottomMin" />
    <form method="post" class="bacckgroundE col offset-s1 s10">
        <div class="row marginTopMin">
            <div class="col s12 center-align">
              <label for="password" class="validate black-text">Mot de passe</label>
            </div>
            <div class="input-field col s6 offset-s3 center-align">
              <input type="password" name="password" id="password" placeholder="Mot de passe" />
                <?php if(isset($formErrorPassword['password'])) { ?>
                    <p><?= $formErrorPassword['password'] ?></p>
                <?php } else if(!empty($_POST['password'])){ ?>
                    <p>Le mot de passe est bien modifié.</p>
                <?php } ?>
            </div>
        </div>
        <!--Permet d'envoyer les modification du mot de passe-->
        <div class="col s6 offset-s3 center-align marginBottomMin">
            <input type="submit" class="amber btn-flat waves-effect waves-orange" value="Envoyer" name="updateSubmitPassword" />
        </div>
    </form>
    <img src="assets/img/separateur.png" class="img-responsive col s6 offset-s3 marginTopMin marginBottomMin" />
    <!--Permet de supprimer le profil-->
    <div class="row col s6 offset-s3 center-align">
        <form method="post">
            <input type="submit" class="amber btn-flat waves-effect waves-orange" name="submitDelete" value="Tu veux supprimer ton profil ?" title="Tu veux supprimer ton profil ?" />
        </form>
    </div>
</div>
<?php require_once 'footer.php';
