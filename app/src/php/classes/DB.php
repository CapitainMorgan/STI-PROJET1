<?php
/**
 * Fichier de requêtes sql pour l'application studijob
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
class DB
{
    private $user = "admin";
    private $password= "admin";
    private $host = "localhost";
    private $dbName = "db_STI_projet1";
    private $db;
    /***************************************
     * connexion à la BD
     */
    private function connectBD()
    {
        try{
            $this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName.'',$this->user,$this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
            die($msg);
        }
    } //end connectBD()

    /**********
     * deconnexion à la base de données
     */
    private function disconctBD()
    {
        $this->db = null;
    }

    /**********
     * @param $sqlQuery
     * @return mixed
     */
    private function doQuerryReturn($sqlQuerry)
    {
        $this->connectBD();
        $sth = $this->db->prepare($sqlQuerry);
        try{
            $sth->execute();
        }catch(Exception $e){
            print "Erreur !: " . $e->getMessage() . "<br/>";
        }
        $sections = $sth->fetchAll();
        $this->disconctBD();
        return $sections;
    }

    /**********
     * @param $sqlQuery
     */
    private function doQuerry($sqlQuerry)
    {
        $this->connectBD();
        $sth = $this->db->prepare($sqlQuerry);
        $sth->execute();
        $this->disconctBD();
    }

    /**
     * @return mixed tous les utilisateurs
     */
    public function getAllUser()
    {
        $sqlQuerry = "
            SELECT *
            FROM Utilisateur      
        ";
        return $this->doQuerryReturn($sqlQuerry);
    }
 
    /**
     * @return mixed le nom et l'id de tous les utilisateurs
     */
    public function getAllUserName()
    {
        $sqlQuerry = "
            SELECT IdUser, Prenom, Nom
            FROM Utilisateur
            WHERE Actif != 0;       
        ";
        return $this->doQuerryReturn($sqlQuerry);
    }

    /**
     * @param $id, l'id de l'utilisateur à exclure
     * @return mixed le nom et l'id de tous les utilisateurs sauf de l'utilisateur excul
     */
    public function getAllUserNameWithoutCurrentUser($id)
    {
        $sqlQuerry = "
            SELECT IdUser, Prenom, Nom
            FROM Utilisateur
            WHERE Actif != 0 AND IdUser != ".$id.";       
        ";
        return $this->doQuerryReturn($sqlQuerry);
    }

    /**
     * @param $id, l'id de l'utilisateur
     * @return mixed l'utilisateur
     */
    public function getUserById($id)
    {
        $sqlQuerry = "
            SELECT *
            FROM Utilisateur
            WHERE IdUser = ".$id.";       
        ";
        return $this->doQuerryReturn($sqlQuerry);
    }

    /**
     * @param $id, l'id de l'utilisateur
     * @param $mdp
     */
    public function updateMDP($id,$mdp)
    {
        $sqlQuerry = "
        UPDATE `Utilisateur` 
        SET `MotDePasse`='".$mdp."' 
        WHERE  `IdUser`=".$id.";      
        ";
        return $this->doQuerry($sqlQuerry);
    }

    /**
     * @param $id, l'id de l'utilisateur
     */
    public function delUser($id)
    {
        $sqlQuerry = "
        DELETE FROM `Utilisateur` WHERE IdUser = ".$id." 
        ";
        return $this->doQuerry($sqlQuerry);
    }

    /**
     * @param $id
     * @param $mdp
     * @param $actif
     * @param $role
     */
    public function updateUser($id, $mdp, $actif, $role)
    {
        $sqlQuerry = "
        UPDATE `db_STI_projet1`.`Utilisateur` 
        SET `MotDePasse`='".$mdp."', `Actif`='".$actif."', `Role`='".$role."' 
        WHERE  `IdUser`=".$id.";
        ";
        return $this->doQuerry($sqlQuerry);
    }

    /**
     * @param $nom
     * @param $prenom
     * @param $mdp
     * @param $actif
     * @param $nomUtilisateur
     * @param $role
     */
    public function createUser($nom, $prenom, $mdp, $actif, $nomUtilisateur, $role)
    {
        $sqlQuerry = "
        INSERT INTO `db_STI_projet1`.`Utilisateur` (`Prenom`, `Nom`, `MotDePasse`, `Actif`, `NomUtilisateur`, `Role`) 
        VALUES ('".$nom."', '".$prenom."', '".$mdp."', '".$actif."', '".$nomUtilisateur."', '".$role."');
        ";
        return $this->doQuerry($sqlQuerry);
    }

    /**
     * @param $idSender
     * @param $idReceiver
     * @param $subject
     * @param $content
     */
    public function insertMessage($idSender,$idReceiver,$subject,$content)
    {
        $sqlQuerry = "
        INSERT INTO `Message` (`DateReception`, `Sujet`,`Contenu`, `fk_emetteur`, `fk_recepteur`) 
        VALUES ('".date('Y-m-d H:i:s')."', '".$subject."','".$content."', '".$idSender."', '".$idReceiver."');     
        ";
        return $this->doQuerry($sqlQuerry);
    }
    
    /**
     * @param $idSender
     * @param $idReceiver
     * @param $subject
     * @param $content
     * @param $idMessage l'id du message qui recoit la réponse
     */
    public function insertMessageReponse($idSender,$idReceiver,$subject,$content,$idMessage)
    {
        $sqlQuerry = "
        INSERT INTO `Message` (`DateReception`, `Sujet`,`Contenu`, `fk_emetteur`, `fk_recepteur`) 
        VALUES ('".date('Y-m-d H:i:s')."', '".$subject."','".$content."', '".$idSender."', '".$idReceiver."');     
        INSERT INTO `db_STI_projet1`.`Reponse` (`IdRsp`, `fk_msg`) SELECT @@IDENTITY, '".$idMessage."';        
        ";
        return $this->doQuerry($sqlQuerry);
    }

    /**
     * @param $id, l'id du message
     */
    public function delMessage($id)
    {
        $sqlQuerry = "
        DELETE FROM `Message` WHERE IdMsg = ".$id." 
        ";
        return $this->doQuerry($sqlQuerry);
    }

    
    /**
     * @param $id, l'id de l'utilisateur
     * @return mixed tous les messages de l'utilisateur
     */
    public function getAllMessageToUser($id)
    {
        $sqlQuerry = "
            SELECT *
            FROM Message
            INNER JOIN Utilisateur 
            ON Message.fk_emetteur = Utilisateur.idUser
            WHERE Message.fk_recepteur = '".$id."';       
        ";
        return $this->doQuerryReturn($sqlQuerry);
    }

    /**
     * @param $id, l'id du message
     * @param $idUser, l'id de l'utilisateur pour verifier que l'utilisateur à accès au message
     * @return mixed le message
     */
    public function getMessageById($id,$idUser)
    {
        $sqlQuerry = "
            SELECT *
            FROM Message
            INNER JOIN Utilisateur 
            ON Message.fk_emetteur = Utilisateur.idUser
            WHERE Message.idMsg = '".$id."' AND Message.fk_recepteur = '".$idUser."';       
        ";
        return $this->doQuerryReturn($sqlQuerry);
    }  


    /**
     * @param $username
     * @param $password
     * @return mixed l'utilisateur trouvé s'il existe sinon vide
     */
    public function loginValidation($username){
        $sqlQuerry = "
            SELECT * 
            FROM Utilisateur 
            WHERE NomUtilisateur = '".$username."'
            AND Actif != 0;";
        return $this->doQuerryReturn($sqlQuerry);
    }
}
