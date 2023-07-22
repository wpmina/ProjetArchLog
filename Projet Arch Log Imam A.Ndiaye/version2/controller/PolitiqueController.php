<?php

class PolitiqueController {
    private $articleModel;

    public function __construct($articleModel) {
        $this->articleModel = $articleModel;
    }

    public function politique() {
        $category = 4; // ID de la catégorie 'Politique'
        $articles = $this->articleModel->getArticlesByCategory($category);

        require_once "views/politique.php";
    }
}
