<?php


class ArticleModel {
    private $conn;

    public function __construct() {
        $daoFactory = new DaoFactory();
        $this->conn = $daoFactory->getDbConnection();
    }

    public function getArticlesByCategory($categoryId) {
        $sql = "SELECT * FROM Article WHERE categorie = :categoryId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


