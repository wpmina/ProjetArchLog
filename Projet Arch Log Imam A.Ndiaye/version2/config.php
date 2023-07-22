<?php
class DaoFactory {
    // ... (code existant)
    
    private $conn;

    public function getDbConnection(){
        try {
            if (!$this->conn) {
                $this->conn = new PDO(
                    'mysql:host=localhost;dbname=mglsi_news;charset=utf8',
                    'root',
                    ''
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $this->conn;
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
    
    // ... (code existant)
}
