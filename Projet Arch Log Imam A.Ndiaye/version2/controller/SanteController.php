<?php
// SanteController.php

class SanteController {
    public function index() {
        require_once 'modele/ArticleModel.php';
        $articleModel = new ArticleModel();
        $articles = $articleModel->getArticlesByCategory(2); // 2 correspond à la catégorie "Santé"

        require 'views/sante.php';
    }
}
