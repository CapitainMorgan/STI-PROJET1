<?php
/**
 * Fichier de requêtes sql pour l'application studijob
 * Created by PhpStorm.
 * User: Axel Vallon, Lev Pozniakoff, Maude Issolah, Matthieu Godi
 * Date: 01.01.2020
 */
class DB
{
    private $user = "root";
    private $password= "";
    private $host = "localhost";
    private $dbName = "db_sti_projet1";
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
        $this->bd = null;
    }

    /**********
     * @param $sqlQuery
     * @return mixed
     */
    private function doQuerryReturn($sqlQuerry)
    {
        $this->connectBD();
        $sth = $this->db->prepare($sqlQuerry);
        $sth->execute();
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
    
    public function getAllUserName()
    {
        $sqlQuerry = "
            SELECT IdUser, Prenom, Nom
            FROM Utilisateur
            WHERE Actif != 0;       
        ";
        return $this->doQuerryReturn($sqlQuerry);
    }

    public function insertMessage($idSender,$idReceiver,$subject,$content)
    {
        $sqlQuerry = "
        INSERT INTO `message` (`DateReception`, `Sujet`,`Contenu`, `fk_emetteur`, `fk_recepteur`) 
        VALUES ('".date('Y-m-d H:i:s')."', '".$subject."','".$content."', '".$idSender."', '".$idReceiver."');     
        ";
        return $this->doQuerry($sqlQuerry);
    }
    
    public function insertMessageReponse($idSender,$idReceiver,$subject,$content,$idMessage)
    {
        $sqlQuerry = "
        INSERT INTO `message` (`DateReception`, `Sujet`,`Contenu`, `fk_emetteur`, `fk_recepteur`) 
        VALUES ('".date('Y-m-d H:i:s')."', '".$subject."','".$content."', '".$idSender."', '".$idReceiver."');     
        INSERT INTO `db_sti_projet1`.`reponse` (`IdRsp`, `fk_msg`) SELECT @@IDENTITY, '".$idMessage."';        
        ";
        return $this->doQuerry($sqlQuerry);
    }

    public function delMessage($id)
    {
        $sqlQuerry = "
        DELETE FROM `message` WHERE IdMsg = ".$id." 
        ";
        return $this->doQuerry($sqlQuerry);
    }

    public function delUser($id)
    {
        $sqlQuerry = "
        DELETE FROM `utilisateur` WHERE IdUser = ".$id." 
        ";
        return $this->doQuerry($sqlQuerry);
    }

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

    public function getMessageById($id)
    {
        $sqlQuerry = "
            SELECT *
            FROM Message
            INNER JOIN Utilisateur 
            ON Message.fk_emetteur = Utilisateur.idUser
            WHERE Message.idMsg = '".$id."';       
        ";
        return $this->doQuerryReturn($sqlQuerry);
    }


    /**
     * @param $id, l'id de l'utilisateur
     * @return mixed le type d'emploi ayant l'id en paramètre
     */
    public function loginValidation($username, $password){
        $sqlQuerry = "
            SELECT * 
            FROM utilisateur 
            WHERE NomUtilisateur = '".$username."'
            AND MotDePasse = '".$password."';";
        return $this->doQuerryReturn($sqlQuerry);
    }
}