<?php
class avatar extends dataBase {
    public $pathAvatar = '';
    public $id = '';
    
    /**
     * Permet d'inserer une image dans la base de donnée
     * 
     * @param string $pathAvatar
     * @param int $id
     * @return object
     */
    public function insertAvatar($pathAvatar, $id) {
        $requestInsertAvatar = $this->db->prepare('INSERT INTO `'.self::prefix.'usersAvatar` (`pathAvatar`, `id_'.self::prefix.'Users`) VALUES (:pathAvatar, :id)');
        $requestInsertAvatar->bindValue(':pathAvatar', $pathAvatar, PDO::PARAM_STR);
        $requestInsertAvatar->bindValue(':id', $id, PDO::PARAM_INT);
        return $requestInsertAvatar->execute();
    }
    
    /**
     * Permet de récupérer l'avatar d'un utilisateur
     * 
     * @param integer $id
     * @return object
     */
    public function getAvatarById($id) {
        // On prépare la requête
        $avatar = $this->db->prepare('SELECT `asfbcvj_usersAvatar`.`pathAvatar` AS `path_Avatar` FROM `asfbcvj_usersAvatar` INNER JOIN `asfbcvj_Users` ON `asfbcvj_usersAvatar`.`id_asfbcvj_Users` = `asfbcvj_Users`.`id` WHERE `id_asfbcvj_Users` = :id');
        // On attribut l'id de l'utilisateur à idUser
        $avatar->bindValue(':id', $id, PDO::PARAM_INT);
        // Si la requête est exécuté
        if($avatar->execute()) {
            //On attribut les résultats de la requête à la variable $partitionList
            $avatarDisplayed = $avatar->fetch(PDO::FETCH_OBJ);
        }
        // On renvoie le résultats
        return $avatarDisplayed;
    }
    
    /**
     * Permet de supprimer un avatar
     * 
     * @param integer $id
     * @return object
     */
    public function deleteAvatarById($id) {
        // On prépare la requête
        $partitionDeleteResult = $this->db->prepare('DELETE FROM `'.self::prefix.'usersAvatar` WHERE `id_'.self::prefix.'Users` = :id');
        // On attribut l'id de l'utilisateur à idUser
        $partitionDeleteResult->bindValue(':id', $id, PDO::PARAM_INT);
        // On renvoie le résultats
        return $partitionDeleteResult->execute();
    }
}