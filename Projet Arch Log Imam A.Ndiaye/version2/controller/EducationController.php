<?php
class EducationController {
    public function index() {
        require_once 'modele/ArticleModel.php';
        $articleModel = new ArticleModel();
        $articles = $articleModel->getArticlesByCategory(3); // 3 correspond à la catégorie "Éducation"

        require 'views/education.php';
    }
}
