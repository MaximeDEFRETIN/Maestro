<?php
$userAvatar = new avatar();
$messageErrorAvatar = array();
if (isset($_POST['submitNewAvatar'])) {
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (!empty($_FILES['newAvatar']['name']) && $_FILES['newAvatar']['error'] == 0) {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['newAvatar']['size'] <= 20000000) {
                // Testons si l'extension est autorisée
                $fileType = pathinfo($_FILES['newAvatar']['name']);
                $extension_upload = $fileType['extension'];
                $extensions_autorisees = array('png');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    $folderUser = 'avatar/' . $_SESSION['id'] . '/';
//                    if (!file_exists($folderUser)) {
                    (!file_exists($folderUser))?mkdir($folderUser, 0775, true):'';
                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($_FILES['newAvatar']['tmp_name'], $folderUser . $_FILES['newAvatar']['name']);
                    chmod($folderUser . $_FILES['newAvatar']['name'], 0775);
                    //On récupère l'id de l'utilisateur pour l'associer au chemin du fichier
                    $userAvatar->insertAvatar($folderUser . $_FILES['newAvatar']['name'], $_SESSION['id']);
                    $messageErrorAvatar['succes'] = 'Envoie effectué';
                    header('refresh:5; url=Modification-profil');
                } else {
                    $messageErrorAvatar['extensionFile'] = 'L\'extension du fichier n\'est pas autorisée.';
                }
            } else {
                $messageErrorAvatar['sizeFile'] = 'Le fichier est trop lourd.';
            }
    } else {
        $messageErrorAvatar['emptyFile'] = 'Il faut envoyer un avatar au format PNG.';
    }
}


$deleteAvatar = new avatar();
$messageDeleteAvatar = array();
if (isset($_POST['submitDeleteAvatar'])) {
    $deleteAvatar->deleteAvatarById($_SESSION['id']);
    $messageDeleteAvatar['deleteAvatar'] = 'Avatar supprimé.';
    header('refresh:5; url=Modification-profil');
    array_map('unlink', glob('avatar/' . $_SESSION['id'] . '/' . '*.*'));
}