<?php
class comment extends dataBase {
    
    public $id = 0;
    public $id_asfbcvj_Users = '';
    public $userComment = '';
    public $id_asfbcvj_Partitions = '';
    public $dateComment = '';


    /**
     * Permet d'insérer les commentaireqs des utilisateurs
     * 
     * @param String $userComment
     * @param Integer $id_asfbcvj_Users
     * @param Integer $id_asfbcvj_Partitions
     * @return Object
     */
    public function insertComment($userComment, $id_asfbcvj_Users, $id_asfbcvj_Partitions) {
        // On prépare la requête
        $insertComment = $this->db->prepare('INSERT INTO `'.self::prefix.'usersComment`(`userComment`, `id_asfbcvj_Users`, `id_asfbcvj_Partitions`, `dateComment`) VALUES (:userComment, :id_asfbcvj_Users, :id_asfbcvj_Partitions, CURRENT_DATE())');
        // On attribut :userComment à $this->userComment
        $insertComment->bindValue(':userComment', $userComment, PDO::PARAM_STR);
        // On attribut à $this->idUser :idUser
        $insertComment->bindValue(':id_asfbcvj_Users', $id_asfbcvj_Users, PDO::PARAM_INT);
        // On attribut :idPartitions à $this->idPartitions
        $insertComment->bindValue(':id_asfbcvj_Partitions', $id_asfbcvj_Partitions, PDO::PARAM_INT);
        // On exécute la requête
        return $insertComment->execute();
    }
    
    /**
     * Permet d'afficher les commentaires des utilisateurs
     * 
     * @param Integer $id_asfbcvj_Partitions
     * @return Object
     */
    public function displayComments($id_asfbcvj_Partitions) {
        // On sélectionne les commentaires avec la requête
        // On prépare la requête
        $requestDisplayCommentUser = $this->db->prepare('SELECT `asfbcvj_Users`.`pseudo`, DATE_FORMAT(`asfbcvj_usersComment`.`dateComment`, "%d/%m/%Y") AS `dateComment`, `asfbcvj_usersComment`.`id`, `asfbcvj_usersComment`.`userComment` FROM `asfbcvj_Users` INNER JOIN `asfbcvj_usersComment` ON `asfbcvj_usersComment`.`id_asfbcvj_Users` = `asfbcvj_Users`.`id` WHERE `asfbcvj_usersComment`.`id_asfbcvj_Partitions` = :id_asfbcvj_Partitions');
        // On attribut :idPartitions à $this->idPartitions
        $requestDisplayCommentUser->bindValue(':id_asfbcvj_Partitions', $id_asfbcvj_Partitions, PDO::PARAM_INT);
        // Si la requête est exécutée
        if($requestDisplayCommentUser->execute()) {
            // On renvoie les résultats
            return $displayCommentsUser = $requestDisplayCommentUser->fetchAll(PDO::FETCH_OBJ);
        }
    }
    
    /**
     * Permet d'afficher les commentairse des autres utilisateurs
     * 
     * @param Integer $id
     * @return Object
     */
    public function displayCommentsUsers($id) {
        // On prépare la requête
        $requestDisplayCommentsUsers = $this->db->prepare('SELECT `asfbcvj_usersComment`.`userComment`, `asfbcvj_Users`.`pseudo`, `asfbcvj_Partitions`.`namePartition` FROM `asfbcvj_usersComment` INNER JOIN `asfbcvj_Users` ON `asfbcvj_usersComment`.`id_asfbcvj_Users` = `asfbcvj_Users`.`id` INNER JOIN `asfbcvj_Partitions` ON `asfbcvj_usersComment`.`id_asfbcvj_Partitions` = `asfbcvj_Partitions`.`id` WHERE NOT `asfbcvj_usersComment`.`id_asfbcvj_Users` = :id AND `asfbcvj_Partitions`.`id_asfbcvj_Users` = :id');
        // On attribut à $this->idUser :id
        $requestDisplayCommentsUsers->bindValue(':id', $id, PDO::PARAM_INT);
        // Si la requête est exécutée
        if($requestDisplayCommentsUsers->execute()) {
            // On renvoie les résultats
            return $displayCommentsUsers = $requestDisplayCommentsUsers->fetchAll(PDO::FETCH_OBJ);
        }
    }
}
