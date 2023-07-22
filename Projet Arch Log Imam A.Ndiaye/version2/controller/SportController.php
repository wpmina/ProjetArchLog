<?php

class SportController {
 public function index() {
        // Logique pour récupérer les articles de la catégorie "Sport" depuis le modèle
        $sportModel = new ArticleModel();
        $articles = $sportModel->getArticlesByCategory(1); // 1 correspond à la catégorie "Sport"

        require 'views/sport.php';
    }
}