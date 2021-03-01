<?php
// Permet d'exécuté ou non la suppression du profil
$deleteSuccess = false;
// On crée un tableau pour y stocker le message
$success = array();
// On crée un objet
$deleteProfile = new user();

// Si on clique sur le boutton
if (isset($_POST['submitDelete'])) {
    // On applique la suppresion de fichier à tous les fichier ayant le format PNG dans
    // le dossier avatar/' . $_SESSION['id']
    // glob() recherche des chemins ayant le même pattern. aray_map() exécute une fonction
    // un élément entré en 2ème patramètre
    $pathAvatar = 'avatar/' . $_SESSION['id'];
    array_map('unlink', glob($pathAvatar . '/*'));
    // Puis on supprime le dossier avatar/' . $_SESSION['id']
    rmdir($pathAvatar);
    // On applique la suppresion de fichier à tous les fichier ayant le format PDF
    // dans le dossier partitions/' . $_SESSION['id']
    $pathPartitions = 'partitions/' . $_SESSION['id'];
    array_map('unlink', glob($pathPartitions . '/*.pdf'));
    // Puis on supprime le dossier 'partitions/' . $_SESSION['pseudoConnection']
    rmdir($pathPartitions);
    
    
    //Si la méthode est bien exécutée
    if ($deleteProfile->deleteProfilById($_SESSION['id'])) {
        $deleteSuccess = true;
        // On envoie un message confirmant la suppression du profil
        $success['delete'] = 'Ton profil est bien supprimé.';
        // On rédirige l'utilisateur vers la page principale
        header('Location: Accueil');
        // On met fin au script
        exit;
    }
}