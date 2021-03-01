<?php
// On instancie un objet
$newPassword = new user();
// On crée un tableau pour y mettre les messages déstinés à l'utilisateurs
$newPasswordArray = array ();

// Lorsque l'utilisateur clique sur le bouton 
if (isset($_POST['changingSubmitPassword'])) {
    // Si le champs correspondant au mot de passe n'est pas vide, on attribut la valeur entrée
    // dans le champs. Le mot de passe est hashé, ce qui permet de le sécuriser
    if (!empty($_POST['mailUser'])) {
        // On attribut l'adresse mail à $newPassword->mail
        (filter_var($_POST['mailUser'], FILTER_VALIDATE_EMAIL) == true)?$mailWrt = $_POST['mailUser']:$newPasswordArray['validateMail'] = 'Tu n\'a pas donné une adresse mail.';
        // On attribut la clé de l'utilisateur à $newPassword->keyUser, graçe à l'adresse URL
        (filter_var($_GET['keyUser'], FILTER_VALIDATE_INT) == true)?$keyUser = $_GET['keyUser']:$newPasswordArray['validateKeyUser'] = 'Il y a eu une erreur.';
        // On utilise la méthode verifyMailByKey() pour s'assurer l'addresse mail correspond bien à
        // une addresse enregistrée dans la base de donnée
        $mailByKey = $newPassword->verifyMailByKey($keyUser);
        $mail = $mailByKey->mail;
        // Si l'addresse mail correspond bien à une addresse enregistrée dans la base de donnée,
        // alors on change le mot de passe, on envoie un message à l'utilisateur et on réinitialise
        // l'attribut password de l'objetuser()
        if ($mail == $mailWrt) {
                // Si le champs correspondant au mot de passe n'est pas vide, on attribut
                // la valeur entrée dans le champs. Le mot de passe est hashé, ce qui permet de le sécuriser
                if (!empty($_POST['password'])) {
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    // On utilise la méthode replacePassword() pour modifier
                    // le mot de passe de l'utilisateur
                    $newPassword->replacePassword($mailWrt, $password);
                    // On envoie un message à l'utilisateur pour lui indiquer
                    // que son mot de passe est bien modifié
                    $newPasswordArray['newPassword'] = 'Le mot de passe est bien modifié.';
                    
                  // Si le champ est vide, on envoie un message d'erreur
                } else {
                    // On envoie un message à l'utilsiateir pour lui indiquer qu'il n'a pas donné de mot  de passe
                    $newPasswordArray['noPassword'] = 'Tu n\'as pas donné de mot de passe.';
                }
        } else {
            // On envoie un message à l'utilsiateir pour lui indiquer que l'adressse mail qu'il donne n'est pas bonne
            $newPasswordArray['wrongMail'] = 'Ton addresse mail n\'est pas enregistré.';
        }
    } else {
        // On envoie un message à l'utilsiateir pour lui indiquer qu'il n'a pas donner d'adresse mail
        $newPasswordArray['noMail'] = 'Tu n\'as pas donné ton addresse mail.';
    }
}