<?php

if (isset($_POST['searchBar'])) {
    // On inclut les models dataBase et user pour qu'ils soient utilisés par AJAX
    include_once '../models/dataBase.php';
    include_once '../models/user.php';
    // On instancie un objet
    $searchPartitionResult = new user();
    // On initialise la variable $search avec la valeur entrée dans la barre de recherche
    $search = $searchPartitionResult->searchPartition($_POST['searchBar']);
    // On encode la variable $search
    $encode = json_encode($search);
    // On retourne les informations encodées à checkUnique.js
    echo $encode;
}