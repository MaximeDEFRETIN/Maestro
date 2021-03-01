<?php
// On instancie un nouveel objet
$partitionUser = new partition();

// Si l'utilisateur est connecté
if(isset($_SESSION['id']) && filter_var($_SESSION['id'], FILTER_VALIDATE_INT) == true) {
    // Avec la méthode, on récupère les partitions d'un utilisateur en fonction de son id
    $partitionList = $partitionUser->getPartitionByIdUser($_SESSION['id']);
}

// On instancie un objet
$commentsUsers = new comment();

// On vérifie si l'utilisateur est conencté
if (isset($_SESSION['id'])) {
//    $commentsUsers->idUser = $_SESSION['id'];
    // On appelle la mééthode pour afficher les commentaires des autres uylisateurs en fonction de l'id de l'utilisateur
    $commentsUsersList = $commentsUsers->displayCommentsUsers($_SESSION['id']);
}

// On instancie un nouvel objet
$deletePartition = new partition();

// Si l'utilisateur clique sur un bouton supprimé, la partition correspondant à ce bouton supprimé sera suprimé
if (isset($_GET['del'])) {
    (filter_var($_SESSION['id'], FILTER_VALIDATE_INT))?$id = $_SESSION['id']:'';
    unlink($_GET['del']);
    var_dump($_GET['del']);
    $deletePartition->deletePartitionById($id, $_GET['del']);
    header('Location: Profil');
}