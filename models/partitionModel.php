
<?php
class partition extends dataBase {
    
    public $id = 0;
    public $pathPartition = '';
    public $id_asfbcvj_Users = '';
    public $id_asfbcvj_statusPartition = '';
    public $id_asfbcvj_typePartition = '';
    public $datePartition = '';
    public $namePartition = '';
    public $pseudo = '';
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Permet d'inserer une partition dans la base de donnée.
     * 
     * @param integer $id_asfbcvj_Users
     * @param string $pathPartition
     * @param integer $id_asfbcvj_statusPartition
     * @param integer $id_asfbcvj_typePartition
     * @param string $namePartition
     * @return object
     */
    public function insertPartition($id_asfbcvj_Users, $pathPartition, $id_asfbcvj_statusPartition, $id_asfbcvj_typePartition, $namePartition) {
        // On prépare la requête
        $requestInsertPartition = $this->db->prepare('INSERT INTO `asfbcvj_Partitions`(`pathPartition`, `datePartition`, `namePartition`, `id_asfbcvj_Users`, `id_asfbcvj_statusPartition`, `id_asfbcvj_typePartition`) VALUES (:pathPartition, CURRENT_DATE(), :namePartition, :id_asfbcvj_Users, :id_asfbcvj_statusPartition, :id_asfbcvj_typePartition)');
        // On associe une valeur à chaque paramètre nominatif
        $requestInsertPartition->bindValue(':id_asfbcvj_Users', $id_asfbcvj_Users, PDO::PARAM_INT);
        $requestInsertPartition->bindValue(':pathPartition', $pathPartition, PDO::PARAM_STR);
        $requestInsertPartition->bindValue(':id_asfbcvj_statusPartition', $id_asfbcvj_statusPartition, PDO::PARAM_INT);
        $requestInsertPartition->bindValue(':id_asfbcvj_typePartition', $id_asfbcvj_typePartition, PDO::PARAM_INT);
        $requestInsertPartition->bindValue(':namePartition', $namePartition, PDO::PARAM_STR);
        // On éexécute la reuête
        return $requestInsertPartition->execute();
    }
    
    /**
     * Permet de récupérer la liste des partitions d'un utilisateur.
     * 
     * @param integer $id
     * @return object
     */
    public function getPartitionByIdUser($id) {
        //On prépare la requête
        $partitionResult = $this->db->prepare('SELECT `pathPartition`, `namePartition`, DATE_FORMAT(`datePartition`, "%d/%m/%Y") AS `datePartition` FROM `'.self::prefix.'Partitions` WHERE `id_asfbcvj_Users` = :id ORDER BY `pathPartition` ASC');
        //On attribut l'id de l'utilisateur à idUser
        $partitionResult->bindValue(':id', $id, PDO::PARAM_INT);
        //Si la requête est exécuté
        if ($partitionResult->execute()) {
            //On attribut les résultats de la requête à la variable $partitionList, et on les renvoie
            return $partitionList = $partitionResult->fetchAll(PDO::FETCH_OBJ);
        }
    }
    
    /**
     * Permet de récupérer le chemin d'une partition d'après son id
     * 
     * @param integer $id
     * @return object
     */
    public function getPartitionById($id) {
//            $requestNamePartition = 'SELECT `pathPartition`, `namePartition` FROM `'.self::prefix.'Partitions` WHERE `id` = :id';
            // On prépare la requête
            $namePartitionResult = $this->db->prepare('SELECT `pathPartition`, `namePartition`, DATE_FORMAT(`asfbcvj_Partitions`.`datePartition`, "%d/%m/%Y") AS `datePartition`, `asfbcvj_Users`.`pseudo` FROM `asfbcvj_Partitions` INNER JOIN `asfbcvj_Users` ON `asfbcvj_Users`.`id` = `asfbcvj_Partitions`.`id_asfbcvj_Users` WHERE `asfbcvj_Partitions`.`id` = :id');
            // On attribut :id' à $this->id'
            $namePartitionResult->bindValue(':id', $id, PDO::PARAM_INT);
            // Si la requête est exécuté
            if ($namePartitionResult->execute()) {
                // On attribut les résultats de la requête à la variable $partitionName, et on les renvoie
                return $partitionOtherUser = $namePartitionResult->fetchAll(PDO::FETCH_OBJ);
            }
    }
    
    /*
     * Permet de récupérer le pseudo de l'auteur d'une partition
     */
    public function getPseudoById() {
        // Avec la requête le pseudo d'un utilisateur en fonction de l'id de la partition
        $requestPseudoUser = 'SELECT `'.self::prefix.'Users`.`pseudo` AS `pseudo` FROM `'.self::prefix.'Users` '
                              . 'INNER JOIN `'.self::prefix.'Partitions` '
                           . 'ON `'.self::prefix.'Users`.`id` = `'.self::prefix.'Partitions`.`idUser` '
                              . 'WHERE `'.self::prefix.'Partitions`.`id` = :id';
        // On prépare la requête
        $pseudoUserResult = $this->db->prepare($requestPseudoUser);
        // On associe une valeur à chaque paramètre nominatif
        $pseudoUserResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        // Si la requête est exécuté
        if ($pseudoUserResult->execute()) {
             // On attribut le résultat de la requête à la variable $partitionName, et on le renvoie
            return $pseudoUser = $pseudoUserResult->fetch(PDO::FETCH_OBJ);
        }
    }
    
    /**
     * Permet de supprimer une partition
     * 
     * @param integer $id_asfbcvj_Users
     * @param string $pathPartition
     * @return object
     */
    public function deletePartitionById($id_asfbcvj_Users, $pathPartition) {
        $partitionDeleteResult = $this->db->prepare('DELETE FROM `'.self::prefix.'Partitions` WHERE `id_asfbcvj_Users` = :id AND `pathPartition` = :pathPartition');
        // On associe une valeur à chaque paramètre nominatif
        $partitionDeleteResult->bindValue(':id', $id_asfbcvj_Users, PDO::PARAM_INT);
        $partitionDeleteResult->bindValue(':pathPartition', $pathPartition, PDO::PARAM_STR);
        // On exécute la requête
        return $partitionDeleteResult->execute();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
}