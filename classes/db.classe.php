<?php 
class DB{
    //Variable de connection a la BD
    private $DB_SERVEUR = 'localhost';
    private $DB_USERNAME = 'root';
    private $DB_PASSWORD = '';
    private $DB_NAME = 'tp2_maximecaron';
    private $db;

    //Constructeur
    public function __construct($DB_SERVEUR =  null, $DB_USERNAME = null, $DB_PASSWORD = null, $DB_NAME = null){
        if($DB_SERVEUR != null){
            $this->DB_SERVEUR = $DB_SERVEUR;
            $this->DB_USERNAME = $DB_USERNAME;
            $this->DB_PASSWORD = $DB_PASSWORD;
            $this->DB_NAME = $DB_NAME;
        }

        //Connexion a la BD (
        try{
            //Connection string
            $this->db = new PDO("mysql:host=" . $this->DB_SERVEUR . ";dbname=" . $this->DB_NAME, $this->DB_USERNAME, $this->DB_PASSWORD);
    
            //Defini le mode erreur pdo sur exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        }catch(PDOException $e){
            die("ERREUR: Connexion impossible <br>" . $e->getMessage());
        }
    }

    //Fonction permettant de faire une requete et de retourner en tableau object
    public function queryObj($sql, $data = array()){
        $req = $this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    //Fonction permettant de faire une requete et de retourner une seule reponse
    public function query($sql){
        $req = $this->db->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    //Fonction permettant de faire les requetes pour CREATE, UPDATE et DELETE
    public function queryCUD($sql, $data = array()){
        $req = $this->db->prepare($sql);
        $req->execute($data);
    }
}
?>